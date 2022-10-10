<?php

namespace Database\Seeders;

use App\Models\FrontUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        $writer_role = Role::create(['name'=>'writer']);
        $admin_role = Role::create(['name'=>'admin']);

        $permission = Permission::create(['name'=> 'edit article']);
        $admin_role->givePermissionTo($permission);

        $admin->assignRole($admin_role);
        $writer->assignRole($writer_role);

    }
}
