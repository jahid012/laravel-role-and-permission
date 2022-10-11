<?php

namespace Database\Seeders;

use App\Models\FrontUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'=> 'adminjahid',
            'email'=> 'adminjahid@gmail.com',
            'password'=>'$2y$10$Q0Ar5Ap.3JtsegrGWXN0cOAY0qUAPj9qDkLJWeNH9Uht.vwtIsuD.'
        ]);
        
        $writer = User::create([
            'name'=> 'writerjahid',
            'email'=> 'writerjahid@gmail.com',
            'password'=>'$2y$10$Q0Ar5Ap.3JtsegrGWXN0cOAY0qUAPj9qDkLJWeNH9Uht.vwtIsuD.'
        ]);


        //
        $admin_role = Role::create(['name' => 'admin']);
        $writer_role = Role::create(['name' => 'writer']);

        $permission = Permission::create(['name' => 'Post access']);
        $permission = Permission::create(['name' => 'Post edit']);
        $permission = Permission::create(['name' => 'Post create']);
        $permission = Permission::create(['name' => 'Post delete']);

        $permission = Permission::create(['name' => 'Role access']);
        $permission = Permission::create(['name' => 'Role edit']);
        $permission = Permission::create(['name' => 'Role create']);
        $permission = Permission::create(['name' => 'Role delete']);

        $permission = Permission::create(['name' => 'User access']);
        $permission = Permission::create(['name' => 'User edit']);
        $permission = Permission::create(['name' => 'User create']);
        $permission = Permission::create(['name' => 'User delete']);

        $permission = Permission::create(['name' => 'Permission access']);
        $permission = Permission::create(['name' => 'Permission edit']);
        $permission = Permission::create(['name' => 'Permission create']);
        $permission = Permission::create(['name' => 'Permission delete']);

        $permission = Permission::create(['name' => 'Mail access']);
        $permission = Permission::create(['name' => 'Mail edit']);



        $admin->assignRole($admin_role);
        $writer->assignRole($writer_role);


        $admin_role->givePermissionTo(Permission::all());

    }
}
