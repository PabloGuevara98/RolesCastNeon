<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Participante']);
        $role3 = Role::create(['name' => 'Jurado']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1,$role3]);

        //crear editar, eliminar los usuarios participantes
        Permission::create(['name' => 'admin.participantes.index'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.participantes.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.participantes.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.participantes.destroy'])->syncRoles([$role1]);
        //Permisos para asignacion de roles a usuarios
        Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$role1]);

        //crear editar, eliminar los usuarios casts o eventos
        Permission::create(['name' => 'admin.casts.index'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'admin.casts.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.casts.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.casts.destroy'])->syncRoles([$role1]);

        //crear editar, eliminar los jurados
        Permission::create(['name' => 'admin.jurados.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.jurados.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.jurados.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.jurados.destroy'])->syncRoles([$role1]);
        //crear permisos para asignar nota, editar nota o eliminar nota
        Permission::create(['name' => 'admin.calificaciones.index'])->syncRoles([$role3]);
        Permission::create(['name' => 'admin.calificaciones.create'])->syncRoles([$role3]);
        Permission::create(['name' => 'admin.calificaciones.edit'])->syncRoles([$role3]);
        Permission::create(['name' => 'admin.calificaciones.destroy'])->syncRoles([$role3]);

        //Permiso para ver la vista de cada usuario segun el rol
        Permission::create(['name' => 'participante.index'])->syncRoles([$role2]);
        Permission::create(['name' => 'participante.calificacion'])->syncRoles([$role2]);

    }
}
