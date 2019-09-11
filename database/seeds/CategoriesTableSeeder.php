<?php

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
        $categories = [
            'title' => 'Laravel',
            'slug' => 'laravel-php',
        ];

        DB::table('categories')->insert($categories);
    }
}
