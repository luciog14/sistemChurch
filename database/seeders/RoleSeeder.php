<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{

        $admin = Role::create(['name' => 'admin']);
        $secretaria = Role::create(['name' => 'secretaria']);
        $invitado = Role::create(['name' => 'invitado']);

        Permission::create(['name' =>'index'])->syncRoles([$admin, $secretaria, $invitado]);
        Permission::create(['name' =>'certificadoBautismo'])->syncRoles([$admin, $secretaria, $invitado]);
        Permission::create(['name' =>'home'])->syncRoles([$admin, $secretaria, $invitado]);
        Permission::create(['name' =>'padres'])->syncRoles([$admin, $secretaria, $invitado]);
        Permission::create(['name' =>'madres'])->syncRoles([$admin, $secretaria, $invitado]);
        Permission::create(['name' =>'documentos'])->syncRoles([$admin, $secretaria, $invitado]);
        Permission::create(['name' =>'defunciones'])->syncRoles([$admin, $secretaria, $invitado]);
        Permission::create(['name' =>'matrimonios'])->syncRoles([$admin, $secretaria, $invitado]);
        Permission::create(['name' =>'esposas'])->syncRoles([$admin, $secretaria, $invitado]);
        Permission::create(['name' =>'esposos'])->syncRoles([$admin, $secretaria, $invitado]);
        Permission::create(['name' =>'madrinas'])->syncRoles([$admin, $secretaria, $invitado]);
        Permission::create(['name' =>'padrinos'])->syncRoles([$admin, $secretaria, $invitado]);
        Permission::create(['name' =>'parrocos'])->syncRoles([$admin, $secretaria, $invitado]);
        Permission::create(['name' =>'usuarios'])->syncRoles([$admin]);
        Permission::create(['name' =>'confirmaciones'])->syncRoles([$admin, $secretaria, $invitado]);
        Permission::create(['name' =>'bautizos'])->syncRoles([$admin, $secretaria, $invitado]);

        User::find(1)->assignRole($admin);
        User::find(2)->assignRole($secretaria);
        User::find(3)->assignRole($invitado);
    }
}
