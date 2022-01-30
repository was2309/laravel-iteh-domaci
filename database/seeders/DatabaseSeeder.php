<?php

namespace Database\Seeders;

use App\Models\Kategorija;
use App\Models\Knjiga;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Pisac;

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
        Knjiga::truncate();
        Pisac::truncate();

        $this->call([
            KategorijaSeeder::class
        ]);


         Knjiga::factory(10)->create();






    }
}
