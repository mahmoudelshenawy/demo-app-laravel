<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'id' => 1,
                'parent_id' => null,
                'name' => 'electronics'
            ],
            [
                'id' => 2,
                'parent_id' => null,
                'name' => 'clothes'
            ],
            [
                'id' => 3,
                'parent_id' => null,
                'name' => 'vehicles'
            ],
            [
                'id' => 4,
                'parent_id' => 1,
                'name' => 'smart phone'
            ],
            [
                'id' => 5,
                'parent_id' => 1,
                'name' => 'TV'
            ],
            [
                'id' => 6,
                'parent_id' => 2,
                'name' => 'jacket'
            ],
            [
                'id' => 7,
                'parent_id' => 2,
                'name' => 'sweater'
            ],
            [
                'id' => 8,
                'parent_id' => 3,
                'name' => 'bicycle'
            ],
        ]);
    }
}
