<?php

namespace Database\Seeders;

use App\Models\Device;
use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Device::factory()->create([
            'name' => 'phone',
            'uuid' => '2a1e60e5-12ab-45ee-8462-d4398c103a4c',
        ]);

        Device::factory()->create([
            'name' => 'tv',
            'uuid' => '8499e531-443c-4b29-99f7-a61aa168c00c',
        ]);
    }
}
