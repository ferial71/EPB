<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\User');
        for ($i=0;$i<10;$i++){
            $user =factory(User::class)->create([
                'name'=>$faker->name,
                'email'=>$faker->email,
            ]);
            $user->assignRole($faker->randomElement(['consignataire','transitaire']));
        }

    }
}
