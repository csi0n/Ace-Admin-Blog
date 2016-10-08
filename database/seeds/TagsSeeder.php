<?php

use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = new \App\Models\Blog\Tag();
        $tag->id = 1;
        $tag->name = 'PHP';
        $tag->save();

        $tag = new \App\Models\Blog\Tag();
        $tag->id = 2;
        $tag->name = 'Android';
        $tag->save();
    }
}
