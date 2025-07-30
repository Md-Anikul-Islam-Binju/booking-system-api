<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Hill View Room',
                'description' => 'Relaxing room with a hill view.',
                'price' => 3000,
                'status' => 'active'
            ],
            [
                'name' => 'Sea View Room',
                'description' => 'Premium room with sea view.',
                'price' => 3500,
                'status' => 'active'
            ],
            [
                'name' => 'Standard Room',
                'description' => 'A budget-friendly option.',
                'price' => 2000,
                'status' => 'inactive'
            ]
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['name' => $service['name']], $service);
        }
    }
}
