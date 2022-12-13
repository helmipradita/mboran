<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Permission::create(['name' => 'crud']);

        $role1 = Role::create(['name' => 'admin']);

        $role1->givePermissionTo('crud');

        $superAdmin = User::create([
            'name' => 'Allif',
            'username' => 'allif',
            'password' => bcrypt('password'),
        ]);
        $superAdmin->assignRole($role1);
    }
}
