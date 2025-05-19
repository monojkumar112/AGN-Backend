<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('blogs')->insert([
                'slug' => $faker->slug,
                'category_id' => rand(3, 7),
                'title' => $faker->sentence,
                'short_description' => $faker->text(300),
                'body' => $faker->paragraph,
                'thumbnail' => $faker->imageUrl(),
                'status' => rand(0, 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
