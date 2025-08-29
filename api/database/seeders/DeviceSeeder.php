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
        ]);

        Device::factory()->create([
            'name' => 'tv',
        ]);
    }
}
