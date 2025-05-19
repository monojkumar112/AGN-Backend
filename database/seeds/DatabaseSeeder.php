<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use Database\Seeders\BlogSeeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(BlogSeeder::class);

        // Manually seed products using Faker
        // $faker = Faker::create();

        // foreach (range(1, 50) as $index) {
        //     Product::create([
        //         'name' => $faker->word,
        //         'image' => $faker->imageUrl(),
        //         'link' => $faker->url,
        //     ]);
        // }
    }
}
