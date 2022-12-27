<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::truncate();

        $faker = \Faker\Factory::create('uk_UA');

        $data = [];
        $admin_id = 1;
        
        for($i = 1; $i <= 50000; $i++) {
            $item = [
                'full_name' => $faker->name(),
                'hire_date' => $faker->date(),
                'phone' => $faker->e164PhoneNumber(),
                'email' => $faker->freeEmail(),
                'salary' => $faker->numberBetween(0, 500000),
                'position_id' => $faker->numberBetween(1, 10),
                'manager_id' => null,
                'level' => 1,
                'photo' => $faker->imageUrl(),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
                'admin_created_id' => $admin_id,
                'admin_updated_id' => $admin_id,
            ];
            if($i > 1 && $i <= 1000) {
                $item['manager_id'] = 1;
                $item['level'] = 2;
            } elseif ($i > 1000 && $i <= 10000) {
                $item['manager_id'] = $faker->numberBetween(1, 1001);
                $item['level'] = 3;
            } elseif ($i > 10000 && $i <= 25000) {
                $item['manager_id'] = $faker->numberBetween(1000, 10001);
                $item['level'] = 4;
            } elseif ($i > 25000 && $i <= 50000) {
                $item['manager_id'] = $faker->numberBetween(10000, 25001);
                $item['level'] = 5;
            }
            $data[] = $item;
        }

        foreach(array_chunk($data, 5000) as $chunk) {
            Employee::insert($chunk);
        }
    }
}
