<?php

use Illuminate\Database\Seeder;
use Faker\factory as Faker;
use Illuminate\Support\Facades\DB;

class NavireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\armateur');
        for ($i=0;$i<10;$i++){
            db::table('armateurs')->insert([
                'nom' => $faker->name,
                'nationalite' => $faker->country,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
        $faker = Faker::create('App\navire');

        for ($i=0;$i<10;$i++){
            db::table('navires')->insert([
                'nom' => $faker->name,
                'pavillon' => $faker->country,
                'longeur'=> $faker->numberBetween($min = 80, $max = 150),
                'largeur'=> $faker->numberBetween($min = 10, $max = 30),
                'imo'=> $faker->numerify('#######'),
                'port_lourd'=> $faker->numerify('####'),
                'tirant_eau'=> $faker->numerify('#.##'),
                'poids'=> $faker->numerify('####'),
                'type'=> $faker->randomElement(['CARGO', 'RO/RO', 'PORTE CONTENEURS', 'PETROLIER', 'BARGE', 'CEREALIER', 'NAVIRE SUCRE','HUILIER','GAZIER']),
                'armateur_id'=> $faker->numberBetween(1,10),

                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }

        $faker = Faker::create('App\navire');

        for ($i=0;$i<10;$i++){
            db::table('utilisateur_exterieurs')->insert([
                'numero_tel'=> $faker->numerify('0# ## ## ## ##'),
                'numero_tel_fix'=> $faker->numerify('+213 ## ## ## ##'),
                'numero_fax'=> $faker->numerify('+213 ## ## ## ##'),
                'type'=> $faker->randomElement(['consignataire', 'transitaire']),
                'user_id'=> $faker->numberBetween(1,10),

                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }

    }
}
