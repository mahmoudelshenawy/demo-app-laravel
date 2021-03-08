<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'id' => 1,
                'name' => 'fashion'
            ],
            [
                'id' => 2,
                'name' => 'Technology'
            ],
            [
                'id' => 3,
                'name' => 'Speed'
            ],
            [
                'id' => 4,
                'name' => 'Art'
            ],
        ];
        Tag::insert($tags);
    }
}
