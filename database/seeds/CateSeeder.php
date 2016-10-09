<?php

use Illuminate\Database\Seeder;

class CateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cate = new \App\Models\Blog\Cate;
        $cate->id = 1;
        $cate->name = '未知分类';
        $cate->save();
    }
}
