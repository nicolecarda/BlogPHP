<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'Admin']); //role name creation
        $role2 = Role::create(['name'=>'Blogger']);

        //permissions setting
        
        $permission1 = Permission::create(['name' => 'admin.index',
                                            'description'=>'see the index'])->syncRoles([$role1, $role2]); //synchronize roles for a particular user

        $permission2 = Permission::create(['name' => 'admin.users.index',
                                            'description'=>'see the users list'])->syncRoles([$role1]);
        $permission3 = Permission::create(['name' => 'admin.users.edit',
                                            'description'=>'assign a role'])->syncRoles([$role1]);
       
        $permission5 = Permission::create(['name' => 'admin.categories.index',
                                            'description'=>'see the categories list'])->syncRoles([$role1]);
        $permission6 = Permission::create(['name' => 'admin.categories.create',
                                            'description'=>'create categories'])->syncRoles([$role1]);
        $permission7 = Permission::create(['name' => 'admin.categories.edit',
                                            'description'=>'edit categories'])->syncRoles([$role1]);
        $permission8 = Permission::create(['name' => 'admin.categories.destroy',
                                            'description'=>'delete categories'])->syncRoles([$role1]);
    
        $permission9 = Permission::create(['name' => 'admin.tags.index',
                                            'description'=>'see the tags list'])->syncRoles([$role1]);
        $permission10 = Permission::create(['name' => 'admin.tags.create',
                                            'description'=>'create tags'])->syncRoles([$role1]);
        $permission11 = Permission::create(['name' => 'admin.tags.edit',
                                            'description'=>'edit tags'])->syncRoles([$role1]);
        $permission12 = Permission::create(['name' => 'admin.tags.destroy',
                                            'description'=>'delete tags'])->syncRoles([$role1]);
    
        $permission13 = Permission::create(['name' => 'admin.posts.index',
                                            'description'=>'see the posts list'])->syncRoles([$role1, $role2]);
        $permission14 = Permission::create(['name' => 'admin.posts.create',
                                            'description'=>'create posts'])->syncRoles([$role1, $role2]);
        $permission15 = Permission::create(['name' => 'admin.posts.edit',
                                            'description'=>'edit posts'])->syncRoles([$role1, $role2]);
        $permission16 = Permission::create(['name' => 'admin.posts.destroy',
                                            'description'=>'delete posts'])->syncRoles([$role1, $role2]);

    }
}
