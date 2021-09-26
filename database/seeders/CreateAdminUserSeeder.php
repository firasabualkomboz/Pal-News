<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{

    public function run()
    {
        $user = User::create([
        'name' => 'admin',
        'email' => 'admin@admin.com',
        'password' => bcrypt('123456'),
        'roles_name' => ["owner"],
        'status' => 'active'
        ]);
        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }


}
