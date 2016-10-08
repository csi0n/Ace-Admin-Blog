<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ArticlesSeeder::class);
        $this->call(BlogMenusSeeder::class);
        $this->call(TagsSeeder::class);
    }
}
