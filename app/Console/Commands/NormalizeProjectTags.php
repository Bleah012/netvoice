<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Project;

class NormalizeProjectTags extends Command
{
    /**
     * The name and signature of the console command.
     *
     * Example usage: php artisan projects:normalize-tags
     */
    protected $signature = 'projects:normalize-tags';

    /**
     * The console command description.
     */
    protected $description = 'Normalize project tags into proper JSON arrays';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Starting normalization of project tags...');

        $count = 0;

        Project::chunk(100, function ($projects) use (&$count) {
            foreach ($projects as $project) {
                $tags = $project->getRawOriginal('tags'); // raw DB value

                // If already valid JSON array, skip
                $decoded = json_decode($tags, true);
                if (is_array($decoded)) {
                    continue;
                }

                // If it's a comma-separated string, convert to array
                if (is_string($tags) && !empty($tags)) {
                    $normalized = array_map('trim', explode(',', $tags));
                    $project->tags = $normalized;
                    $project->save();
                    $count++;
                    $this->line("Normalized project #{$project->id} ({$project->name})");
                }
            }
        });

        $this->info("Normalization complete. {$count} projects updated.");

        return Command::SUCCESS;
    }
}
