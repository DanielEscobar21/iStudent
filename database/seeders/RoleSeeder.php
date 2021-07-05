<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=> 'Estudiante']);
        $role2 = Role::create(['name'=> 'Maestro']);
        $role3 = Role::create(['name'=> 'Administrador']);

        Permission::create(['name' => 'admin.home'])->assignRole($role3);
        Permission::create(['name' => 'admin.user.index'])->assignRole($role3);
        Permission::create(['name' => 'admin.user.create'])->assignRole($role3);
        Permission::create(['name' => 'admin.user.edit'])->assignRole($role3);
        Permission::create(['name' => 'admin.user.destroy'])->assignRole($role3);



        
    }
}
