<?php

use Illuminate\Database\Seeder;

class PaintingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i=0; $i<=100; $i++):
            DB::table('paintings')
                ->insert([
                    'title' => $faker->sentence,
                    'description' => $faker->paragraph,
                    'image' => 'default.jpg',
                    'gallery_id' => $faker->numberBetween($min = 1, $max = 20),
                    'for_sale' => $faker->boolean,
                    'price' => strval($faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 10000)),
                    'votes_average' => 0,
                    'created_at' => new DateTime,
                    'updated_at' => null,
                ]);
        endfor;
    }
}
