<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for($i = 1; $i <= 10; $i++){
            \DB::table('ebook')->insert([
                'ebook_id' => $i,
                'title' => $faker->sentence,
                'author' => $faker->name,
                'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true)
            ]);
        }
    }
}
