<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Fun', 'Horror', 'Kids', 'Music', 'Active', 'Art'];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
