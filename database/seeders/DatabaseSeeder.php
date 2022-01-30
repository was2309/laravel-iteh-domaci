<?php

namespace Database\Seeders;

use App\Models\Kategorija;
use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Kategorija::truncate();
        User::truncate();



         $user = User::factory(10)->create();

         $kat1 = Kategorija::create([
             'naziv' => 'Romani'
         ]);

         $kat2 = Kategorija::create([
            'naziv' => 'Basne'
        ]);

        $kat3 = Kategorija::create([
            'naziv' => 'Pripovetke'
        ]);






    }
}
