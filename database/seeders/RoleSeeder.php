<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // 1. Crear permisos
        Permission::create(['name' => 'edit articles']);
        
        // 2. Crear roles y asignar permisos
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo('edit articles');
        $roleAdmin->givePermissionTo('modify users');
        $roleAdmin->givePermissionTo('modify users');

        
        Role::create(['name' => 'usuario']);

        // 3. Asignar a un usuario existente (opcional)
        $user = User::where('email', 'admin@admin.com')->first();
        if ($user) {
            $user->assignRole($roleAdmin);
        }
    }
}
