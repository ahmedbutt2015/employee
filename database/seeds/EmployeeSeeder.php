<?php

use app\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 100; $i++) {
            $temp = Employee::create(array(
                'name' => $faker->name,
                'age' => $faker->randomDigit,
                'startDate' => $faker->date('Y-m-d','now'),
                'departmentId'=>mt_rand(4,100)
            ));
        }
    }
}
