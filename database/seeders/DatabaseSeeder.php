<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{User, Role, Plan, Service, Solution, Industry, Partner, Client, Project, Ticket, ContactMessage};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Roles (idempotent)
        $adminRole = Role::firstOrCreate(
            ['name' => 'Admin'],
            ['description' => 'System administrator']
        );

        $userRole = Role::firstOrCreate(
            ['name' => 'User'],
            ['description' => 'Regular user']
        );

        // Users (idempotent)
        $admin = User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Test Admin',
                'password' => bcrypt('password'),
                'is_admin' => true,
            ]
        );
        $admin->roles()->syncWithoutDetaching([$adminRole->id]);

        $user = User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'),
            ]
        );
        $user->roles()->syncWithoutDetaching([$userRole->id]);

        // Plans
        Plan::firstOrCreate(
            ['slug' => 'basic'],
            [
                'name' => 'Basic',
                'description' => 'Entry-level plan',
                'price_cents' => 9900,
                'billing_period' => 'monthly',
                'is_active' => true,
                'sort_order' => 1,
            ]
        );

        Plan::firstOrCreate(
            ['slug' => 'pro'],
            [
                'name' => 'Pro',
                'description' => 'Professional plan',
                'price_cents' => 19900,
                'billing_period' => 'monthly',
                'is_active' => true,
                'sort_order' => 2,
            ]
        );

        // Services
        Service::firstOrCreate(
            ['slug' => 'consulting'],
            [
                'name' => 'Consulting',
                'summary' => 'Expert advice',
                'body' => 'We provide consulting services',
                'is_active' => true,
                'sort_order' => 1,
            ]
        );

        // Solutions
        Solution::firstOrCreate(
            ['slug' => 'cloud-hosting'],
            [
                'name' => 'Cloud Hosting',
                'summary' => 'Scalable hosting',
                'body' => 'Our cloud hosting solution',
                'is_active' => true,
                'sort_order' => 1,
            ]
        );

        // Industries
        Industry::firstOrCreate(
            ['slug' => 'telecom'],
            [
                'name' => 'Telecom',
                'description' => 'Telecommunications sector',
                'sort_order' => 1,
            ]
        );

        // Partners
        Partner::firstOrCreate(
            ['slug' => 'techcorp'],
            [
                'name' => 'TechCorp',
                'website_url' => 'https://techcorp.com',
                'description' => 'Strategic partner',
                'sort_order' => 1,
            ]
        );

        // Clients + Projects
        $client = Client::firstOrCreate(
            ['slug' => 'acme'],
            [
                'name' => 'Acme Ltd',
                'contact_email' => 'contact@acme.com',
                'contact_phone' => '123456789',
                'notes' => 'VIP client',
            ]
        );

        Project::firstOrCreate(
            ['slug' => 'website-redesign'],
            [
                'client_id' => $client->id,
                'name' => 'Website Redesign',
                'status' => 'active',
            ]
        );

        // Tickets
        Ticket::firstOrCreate(
            ['subject' => 'Support Request'],
            [
                'user_id' => $user->id,
                'client_id' => $client->id,
                'description' => 'Need help with setup',
                'status' => 'open',
                'priority' => 'normal',
            ]
        );

        // Contact Messages
        ContactMessage::firstOrCreate(
            ['email' => 'john@example.com'],
            [
                'name' => 'John Doe',
                'subject' => 'Inquiry',
                'message' => 'Can you tell me more about your services?',
                'status' => 'new',
            ]
        );
    }
}
