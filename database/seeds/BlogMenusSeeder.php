<?php

use App\Models\Blog\Menu;
use Illuminate\Database\Seeder;

class BlogMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu=new Menu;
        $menu->name='标签1';
        $menu->url='';
        $menu->save();


        $menu=new Menu;
        $menu->name='标签2';
        $menu->url='';
        $menu->save();

        $menu=new Menu;
        $menu->name='标签3';
        $menu->url='';
        $menu->save();
    }
}
