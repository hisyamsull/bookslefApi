<?php

namespace Database\Seeders;

use App\Models\book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class bookseed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \faker\Factory::create('id_ID');
        for ($i=0; $i < 10; $i++){
            book::create([
                'judul'=> $faker->sentence,
                'pengarang'=> $faker->name,
                'publikasi'=>$faker->date
            ]);
        }
    }
}
