<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // cria o Usuário
        $user = User::create([
            'name' => 'Bruno Lima',
            'email' => 'brunolimadevelopment@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // buscou todas as Roles
        $roles = Role::all();

        $user->roles()->saveMany($roles); // roles é lá do relacionamento da model User->Role
    }
}
