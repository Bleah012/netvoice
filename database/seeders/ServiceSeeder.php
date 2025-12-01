<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name'    => 'Structured Cabling',
                'slug'    => 'structured-cabling',
                'summary' => 'Enterprise-grade cabling infrastructure for optimal network performance.',
                'body'    => <<<TEXT
We provide structured cabling products for building automation, including:
- UTP, FTP, SFTP, and Fiber Optic cables
- Modular outlet components and patch panels
- S110 block wiring and patch cords
- Clone boxes, adapters, and administration point products
- Testing, certification, and cable management
TEXT,
                'features' => json_encode([
                    'Cat5e/Cat6 copper cabling solutions',
                    'Fiber optic installations (single-mode & multi-mode)',
                    'Green network installations',
                    'Network design & implementation',
                    'Testing & certification',
                ]),
                'process_steps' => json_encode([
                    'Site Survey & Design',
                    'Installation',
                    'Testing & Certification',
                ]),
                'partners' => json_encode(['Raritan', 'Commscope']),
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name'    => 'Network Integration',
                'slug'    => 'network-integration',
                'summary' => 'Comprehensive network design, implementation, and optimization.',
                'body'    => <<<TEXT
Our network integration services include:
- Network design and architecture
- Wireless network solutions (Wi-Fi)
- Load balancing and redundancy
- Cisco switches and routers
- Network and security implementation
- Network monitoring and management
TEXT,
                'features' => json_encode([
                    'Certified engineers',
                    'Latest technology & equipment',
                    'Customized solutions',
                ]),
                'process_steps' => json_encode([
                    'Assessment',
                    'Design',
                    'Implementation',
                    'Testing & Certification',
                ]),
                'partners' => json_encode(['Cisco', 'HP Aruba', 'Ubiquiti', 'MikroTik']),
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name'    => 'Voice & Telephone Systems',
                'slug'    => 'voice-telephone-systems',
                'summary' => 'Modern PBX and unified communications solutions.',
                'body'    => <<<TEXT
We offer:
- PBX systems and call center solutions
- VoIP implementation and unified communications
- Video conferencing and mobile integration
- Installation, training, and after-sales support
TEXT,
                'features' => json_encode([
                    'PBX systems',
                    'VoIP solutions',
                    'Unified communications',
                    'Mobile integration',
                ]),
                'process_steps' => json_encode([
                    'Assessment & Analysis',
                    'Custom Implementation',
                    'Training & Support',
                ]),
                'partners' => json_encode(['Cisco', 'Avaya', 'Grandstream', 'Yealink']),
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name'    => 'Digital Video Surveillance',
                'slug'    => 'digital-video-surveillance',
                'summary' => 'Advanced CCTV and remote monitoring solutions.',
                'body'    => <<<TEXT
Our surveillance systems feature:
- HD/4K IP cameras and NVRs
- Access control integration
- Motion detection and analytics
- Remote viewing and thermal imaging
- Night vision and security assessment
TEXT,
                'features' => json_encode([
                    '4K IP Cameras',
                    'Mobile access',
                    'Night vision-enabled devices (NVR)',
                    'Scalable video storage',
                ]),
                'process_steps' => json_encode([
                    'Assessment',
                    'Camera Installation',
                    'System Configuration',
                ]),
                'partners' => json_encode(['Hikvision', 'Dahua', 'Axis', 'Avigilon']),
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name'    => 'Solar & Electrical Installations',
                'slug'    => 'solar-electrical-installations',
                'summary' => 'Sustainable energy solutions for commercial and residential setups.',
                'body'    => <<<TEXT
We deliver:
- Solar panel installations and hybrid solar solutions
- Inverter systems and battery backups
- Grid-tied and off-grid systems
- Energy audits and optimization
- Electrical wiring with top cable standards
TEXT,
                'features' => json_encode([
                    'Solar power systems',
                    'Battery backup systems',
                    'Electrical panel upgrades',
                    'EV charger installations',
                    'Generator installations',
                ]),
                'process_steps' => json_encode([
                    'Site Assessment',
                    'Installation & Wiring',
                    'Testing & Commissioning',
                ]),
                'partners' => json_encode(['Canadian Solar', 'Tesla', 'Enphase']),
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name'    => 'Hardware & Software Maintenance',
                'slug'    => 'hardware-software-maintenance',
                'summary' => 'Comprehensive IT support and lifecycle management.',
                'body'    => <<<TEXT
Our maintenance services include:
- Preventive maintenance and break-fix support
- Software updates and hardware upgrades
- Network monitoring and annual audits
- Multi-vendor support and help-desk services
TEXT,
                'features' => json_encode([
                    'Proactive maintenance',
                    'Software updates',
                    'Remote & on-site support',
                    'Network monitoring',
                    'Asset tracking',
                ]),
                'process_steps' => json_encode([
                    'Preventive Planning',
                    'Regular Inspections',
                    'Proactive Support',
                ]),
                'partners' => json_encode(['Microsoft', 'Dell', 'Lenovo']),
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $data) {
            Service::updateOrCreate(['slug' => $data['slug']], $data);
        }
    }
}
