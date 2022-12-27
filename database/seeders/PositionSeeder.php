<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::truncate();

        $faker = \Faker\Factory::create('uk_UA');

        $data = [];
        $admin_id = 1;

        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
            'position' => $faker->jobTitle(),
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
            'admin_created_id' => $admin_id,
            'admin_updated_id' => $admin_id,
        ];
        }

        Position::insert($data);
    }
}
