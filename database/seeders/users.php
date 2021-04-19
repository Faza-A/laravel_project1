<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=0;$i<50;$i++){
            DB::table('users')->insert([
                'id' => $i+1,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'phone_number' => $faker->phoneNumber,
                'gender'=> $faker->randomElement(['M','F']),
                'country_id' => rand(1,250),
                'password'=> bcrypt($faker->password),
                'created_at'=> $faker -> dateTime,
                'updated_at' => $faker -> dateTime,

            ]);
        }
    }
}
