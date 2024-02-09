<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Retrieve all existing permissions and roles
        $permissions = Permission::all();
        $roles = Role::all();

        // Create 50 users
        User::factory(50)->create()->each(function ($user) use ($permissions, $roles) {
            // Randomly assign permissions to the user
            $user->givePermissionTo($permissions->random(rand(1, $permissions->count())));

            // get a random number
            $random = rand(1, 100);
            // check if the random number is the user's id
            if ($random === $user->id) {
                // assign a random role to the user
                $user->assignRole($roles->random());
            } 
        });
    }
}
