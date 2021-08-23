<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Categories-List',
            'Add-Categories',
            'Update-Categories',
            'Delete-Categories',

            'Tags-List',
            'Add-Tags',
            'Update-Tags',
            'Delete-Tags',

            'Articles-List',
            'Add-Articles',
            'Update-Articles',
            'Delete-Articles',

            'Users-List',
            'Add-Users',
            'Update-Users',
            'Delete-Users',

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
