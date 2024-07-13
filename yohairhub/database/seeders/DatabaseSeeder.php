<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user = \App\Models\User::factory()->create([
            'name' => 'Nkinzi',
            'email' => 'nkinzijozeline@gmail.com',
            'password' => Hash::make('kali'), 
        ]);

        // create admin role
        $role = Role::create(['name' => 'admin']);

        // create permissions
        $permissions = [
            'create user',
            'read user',
            'update user',
            'delete user',
            'create role',
            'read role',
            'update role',
            'delete role',
            'create permission',
            'read permission',
            'update permission',
            'delete permission',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // assign all permissions to admin role
        $role->givePermissionTo($permissions);

        // assign admin role to the user
        $user->assignRole('admin');


        // call UserSeeder
        // $this->call(UserSeeder::class);
    }
}
