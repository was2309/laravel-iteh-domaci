<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategorija;
class KategorijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategorija::create([
            'naziv'=>'Action and Adventure'
        ]);
        Kategorija::create([
            'naziv'=>'Classic'
        ]);
        Kategorija::create([
            'naziv'=>'Drama'
        ]);
        Kategorija::create([
            'naziv'=>'Comic Book'
        ]);
        Kategorija::create([
            'naziv'=>'Detective and Mystery'
        ]);
        Kategorija::create([
            'naziv'=>'Fantasy'
        ]);
        Kategorija::create([
            'naziv'=>'Historical Fiction'
        ]);
        Kategorija::create([
            'naziv'=>'Horror'
        ]);
        Kategorija::create([
            'naziv'=>'Romance'
        ]);
    }
}