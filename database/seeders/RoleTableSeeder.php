<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // para inserir dados no banco.
use App\Models\Permission;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([

            // Cria o usuário visitante sem nenhuma permissão.
            [
                'name' => 'Visitante',
                'description' => 'Usuário visitante do sistema'
            ]
        ]);

        // Cria o Papel Admin
        $role = Role::create([
            'name' => 'Administrador',
            'description' => 'Usuário administrador do sistema'
        ]);

        // Pega todas as Permissões
        $permissions = Permission::all();

        $role->permissions()->saveMany($permissions); // permissions() é la do relacionamento da model Role->Permission
    }
}
