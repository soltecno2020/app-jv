<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
        	'name' => 'Super Administrador',
        	'email' => 'admin@soltecno.cl',
        	'password' => bcrypt('123')
        ]);
        $role = Role::create(['name' => 'Super Administrador']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
