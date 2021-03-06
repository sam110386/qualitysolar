<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $categories = [
            "Residential", "Commercial"
        ];

        foreach ($categories as $category) {
            Category::create([
                'name'  => $category,
                'color' => $faker->hexcolor
            ]);
        }
    }
}
