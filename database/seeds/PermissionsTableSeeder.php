<?php

use App\Models\Admin\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = new Permission;
        $permissions->name = '控制台';
        $permissions->slug = 'admin.systems.index';
        $permissions->description = '控制台';
        $permissions->save();

        $permissions = new Permission;
        $permissions->name = '系统管理';
        $permissions->slug = 'admin.systems.manage';
        $permissions->description = '系统管理';
        $permissions->save();

        $permissions = new Permission;
        $permissions->name = '登录后台';
        $permissions->slug = 'admin.systems.login';
        $permissions->description = '登录后台';
        $permissions->save();

        $permissions = new Permission;
        $permissions->name = '显示菜单列表';
        $permissions->slug = 'admin.menus.list';
        $permissions->description = '显示菜单列表';
        $permissions->save();

        $permissions = new Permission;
        $permissions->name = '创建菜单';
        $permissions->slug = 'admin.menus.create';
        $permissions->description = '创建菜单';
        $permissions->save();

        $permissions = new Permission;
        $permissions->name = '删除菜单';
        $permissions->slug = 'admin.menus.delete';
        $permissions->description = '删除菜单';
        $permissions->save();

        $permissions = new Permission;
        $permissions->name = '修改菜单';
        $permissions->slug = 'admin.menus.edit';
        $permissions->description = '修改菜单';
        $permissions->save();

        $permissions = new Permission;
        $permissions->name = '显示角色列表';
        $permissions->slug = 'admin.roles.list';
        $permissions->description = '显示角色列表';
        $permissions->save();

        $permissions = new Permission;
        $permissions->name = '创建角色';
        $permissions->slug = 'admin.roles.create';
        $permissions->description = '创建角色';
        $permissions->save();

        $permissions = new Permission;
        $permissions->name = '删除角色';
        $permissions->slug = 'admin.roles.delete';
        $permissions->description = '删除角色';
        $permissions->save();

        $permissions = new Permission;
        $permissions->name = '修改角色';
        $permissions->slug = 'admin.roles.edit';
        $permissions->description = '修改角色';
        $permissions->save();

        $permissions = new Permission;
        $permissions->name = '显示权限列表';
        $permissions->slug = 'admin.permissions.list';
        $permissions->description = '显示权限列表';
        $permissions->save();

        $permissions = new Permission;
        $permissions->name = '创建权限';
        $permissions->slug = 'admin.permissions.create';
        $permissions->description = '创建权限';
        $permissions->save();

        $permissions = new Permission;
        $permissions->name = '删除权限';
        $permissions->slug = 'admin.permissions.delete';
        $permissions->description = '删除权限';
        $permissions->save();

        $permissions = new Permission;
        $permissions->name = '修改权限';
        $permissions->slug = 'admin.permissions.edit';
        $permissions->description = '修改权限';
        $permissions->save();

        $permissions = new Permission;
        $permissions->name = '显示用户列表';
        $permissions->slug = 'admin.users.list';
        $permissions->description = '显示用户列表';
        $permissions->save();

        $permissions = new Permission;
        $permissions->name = '创建用户';
        $permissions->slug = 'admin.users.create';
        $permissions->description = '创建用户';
        $permissions->save();

        $permissions = new Permission;
        $permissions->name = '删除用户';
        $permissions->slug = 'admin.users.delete';
        $permissions->description = '删除用户';
        $permissions->save();


        $permissions = new Permission;
        $permissions->name = '修改用户';
        $permissions->slug = 'admin.users.edit';
        $permissions->description = '修改用户';
        $permissions->save();

        $permissions=new Permission;
        $permissions->name='博客管理';
        $permissions->slug='blog.systems.manage';
        $permissions->description='博客管理';
        $permissions->save();

        $permissions=new Permission;
        $permissions->name='博客文章列表';
        $permissions->slug='blog.article.list';
        $permissions->description='博客文章列表';
        $permissions->save();

        $permissions=new Permission;
        $permissions->name='添加文章列表';
        $permissions->slug='blog.article.create';
        $permissions->description='添加文章列表';
        $permissions->save();

        $permissions=new Permission;
        $permissions->name='修改文章列表';
        $permissions->slug='blog.article.edit';
        $permissions->description='修改文章列表';
        $permissions->save();

        $permissions=new Permission;
        $permissions->name='删除文章列表';
        $permissions->slug='blog.article.delete';
        $permissions->description='删除文章列表';
        $permissions->save();

        $permissions=new Permission;
        $permissions->name='博客标签列表';
        $permissions->slug='blog.tag.list';
        $permissions->description='博客标签列表';
        $permissions->save();

        $permissions=new Permission;
        $permissions->name='博客标签添加';
        $permissions->slug='blog.tag.create';
        $permissions->description='博客标签添加';
        $permissions->save();

        $permissions=new Permission;
        $permissions->name='博客标签修改';
        $permissions->slug='blog.tag.edit';
        $permissions->description='博客标签修改';
        $permissions->save();

        $permissions=new Permission;
        $permissions->name='博客标签删除';
        $permissions->slug='blog.tag.delete';
        $permissions->description='博客标签删除';
        $permissions->save();

        $permissions=new Permission;
        $permissions->name='博客分类列表';
        $permissions->slug='blog.cate.list';
        $permissions->description='博客分类列表';
        $permissions->save();

        $permissions=new Permission;
        $permissions->name='博客分类添加';
        $permissions->slug='blog.cate.create';
        $permissions->description='博客分类添加';
        $permissions->save();

        $permissions=new Permission;
        $permissions->name='博客分类修改';
        $permissions->slug='blog.cate.edit';
        $permissions->description='博客分类修改';
        $permissions->save();

        $permissions=new Permission;
        $permissions->name='博客分类删除';
        $permissions->slug='blog.cate.delete';
        $permissions->description='博客分类删除';
        $permissions->save();

    }
}
