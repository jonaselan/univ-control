<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = \UnivControl\User::create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('123123'),
            'status' => 'aprovado',
            'remember_token' => str_random(10),
        ]);

        $role = Role::create(['name' => 'admin']);
        $role->syncPermissions(
            // universities
            Permission::create(['name' => 'universities_index']),
            Permission::create(['name' => 'universities_edit']),
            Permission::create(['name' => 'universities_update']),
            Permission::create(['name' => 'universities_destroy']),
            Permission::create(['name' => 'universities_create']),
            Permission::create(['name' => 'universities_store']),
            // roles
            Permission::create(['name' => 'roles_index']),
            Permission::create(['name' => 'roles_edit']),
            Permission::create(['name' => 'roles_update']),
            Permission::create(['name' => 'roles_destroy']),
            Permission::create(['name' => 'roles_create']),
            Permission::create(['name' => 'roles_store']),
            // users
            // roles
            Permission::create(['name' => 'users_index']),
            Permission::create(['name' => 'users_edit']),
            Permission::create(['name' => 'users_update']),
            Permission::create(['name' => 'users_destroy']),
            Permission::create(['name' => 'users_create']),
            Permission::create(['name' => 'users_store'])
        );
        $admin->assignRole('admin');

        // $this->call(UsersTableSeeder::class);
    }
}
