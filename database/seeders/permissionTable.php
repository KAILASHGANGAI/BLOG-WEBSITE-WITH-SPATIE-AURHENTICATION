<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class permissionTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);
        Permission::create(['name' => 'show articles']);


        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'writer']);
        $role1->givePermissionTo('edit articles');
        $role1->givePermissionTo('delete articles');
        $role1->givePermissionTo('show articles');


        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('publish articles');
        $role2->givePermissionTo('unpublish articles');
        $role2->givePermissionTo('show articles');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        $role4 = Role::create(['name' => 'default']);
        $role4->givePermissionTo('show articles');


        // create demo users
        $user = User::create([
            'name' => 'writer',
            'email' => 'writer@gmail.com',
            'phone'=>'9807010378',
            'password'=> Hash::make('password')
        ]);
        $user->assignRole($role1);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone'=>'9824368999',
            'password'=> Hash::make('password')
        ]);
        $user->assignRole($role2);

        $user = User::create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@gmail.com',
            'phone'=>'9807012785',
            'password'=> Hash::make('password')
        ]);
        $user->assignRole($role3);
        $user = User::create([
            'name' => 'default',
            'email' => 'default@gmail.com',
            'phone'=>'981245896',
            'password'=> Hash::make('password')
        ]);
        $user->assignRole($role4);

        
    }
}
