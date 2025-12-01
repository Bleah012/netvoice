<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Client;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'client'      => 'Smart Factory Ltd',
                'name'        => 'Factory Automation & Surveillance',
                'slug'        => 'factory-automation-surveillance',
                'status'      => 'completed',
                'category'    => 'Manufacturing',
                'tags'        => ['Automation','Surveillance','Security'],
                'description' => 'Integrated automation and surveillance system for a modern factory.',
                'started_at'  => '2023-04-10',
                'completed_at'=> '2023-09-01',
            ],
            [
                'client'      => 'Tech Support Ltd',
                'name'        => 'Hardware & Software Maintenance',
                'slug'        => 'hardware-software-maintenance',
                'status'      => 'active',
                'category'    => 'Commercial',
                'tags'        => ['Maintenance','Support','IT'],
                'description' => 'Ongoing hardware and software maintenance services for enterprise clients.',
                'started_at'  => '2024-01-01',
                'completed_at'=> null,
            ],
            [
                'client'      => 'Kenya Secondary School',
                'name'        => 'School IT Lab Setup',
                'slug'        => 'lab-setup',
                'status'      => 'completed',
                'category'    => 'Education',
                'tags'        => ['IT','Lab','Education'],
                'description' => 'Setup of a modern IT lab with networking and software installation.',
                'started_at'  => '2021-01-15',
                'completed_at'=> '2021-03-10',
            ],
            [
                'client'      => 'Manufacturing Plant',
                'name'        => 'Solar Electrical Installations',
                'slug'        => 'solar-electrical-installations',
                'status'      => 'completed',
                'category'    => 'Manufacturing',
                'tags'        => ['Solar','Energy','Backup'],
                'description' => 'Solar electrical installation with backup systems for manufacturing operations.',
                'started_at'  => '2022-07-01',
                'completed_at'=> '2022-12-20',
            ],
            [
                'client'      => 'University of Kenya',
                'name'        => 'University Campus Surveillance',
                'slug'        => 'university-campus-surveillance',
                'status'      => 'completed',
                'category'    => 'Education',
                'tags'        => ['Surveillance','CCTV','Analytics'],
                'description' => 'Campus-wide surveillance system with analytics integration.',
                'started_at'  => '2020-02-14',
                'completed_at'=> '2020-08-30',
            ],
            [
                'client'      => 'Financial Institution',
                'name'        => 'Data Center Cabling',
                'slug'        => 'data-center-cabling',
                'status'      => 'completed',
                'category'    => 'Banking',
                'tags'        => ['Cabling','Fiber','Data Center'],
                'description' => 'High-density cabling infrastructure for a financial institution data center.',
                'started_at'  => '2021-10-05',
                'completed_at'=> '2022-01-22',
            ],
            [
                'client'      => 'Banking HQ',
                'name'        => 'Network Upgrade',
                'slug'        => 'network-upgrade',
                'status'      => 'completed',
                'category'    => 'Banking',
                'tags'        => ['Networking','Cisco','Upgrade'],
                'description' => 'Major network upgrade project for a banking headquarters.',
                'started_at'  => '2022-03-01',
                'completed_at'=> '2022-06-15',
            ],
        ];

        foreach ($projects as $item) {
            // ✅ Generate slug for client automatically
            $client = Client::firstOrCreate(
                ['slug' => Str::slug($item['client'])],
                ['name' => $item['client']]
            );

            Project::updateOrCreate(
                ['slug' => $item['slug']],
                [
                    'client_id'    => $client->id,
                    'name'         => $item['name'],
                    'slug'         => $item['slug'],
                    'status'       => $item['status'],
                    'category'     => $item['category'],
                    'tags'         => $item['tags'],
                    'description'  => $item['description'],
                    'started_at'   => $item['started_at'],
                    'completed_at' => $item['completed_at'],
                    'image'        => null, // fallback to public/images/projects/{slug}.jpg
                ]
            );
        }
    }
}
