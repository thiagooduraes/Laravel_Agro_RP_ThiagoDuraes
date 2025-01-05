<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['nome' => 'Max Verstappen', 'email' => 'redbull', 'senha' => '12345678'],
            ['nome' => 'Charles Leclerc', 'email' => 'ferrari', 'senha' => '12345678'],
            ['nome' => 'Lewis Hamilton', 'email' => 'mercedes', 'senha' => '12345678'],
            ['nome' => 'Lando Norris', 'email' => 'mclaren', 'senha' => '12345678'],
            ['nome' => 'Carlos Sainz', 'email' => 'ferrari', 'senha' => '12345678'],
            ['nome' => 'George Russell', 'email' => 'mercedes', 'senha' => '12345678'],
            ['nome' => 'Sergio Perez', 'email' => 'redbull', 'senha' => '12345678'],
            ['nome' => 'Oscar Piastri', 'email' => 'mclaren', 'senha' => '12345678'],
            ['nome' => 'Fernando Alonso', 'email' => 'astonmartin', 'senha' => '12345678'],
            ['nome' => 'Lance Stroll', 'email' => 'astonmartin', 'senha' => '12345678'],
            ['nome' => 'Esteban Ocon', 'email' => 'alpine', 'senha' => '12345678'],
            ['nome' => 'Pierre Gasly', 'email' => 'alpine', 'senha' => '12345678'],
            ['nome' => 'Yuki Tsunoda', 'email' => 'rb', 'senha' => '12345678'],
            ['nome' => 'Daniel Ricciardo', 'email' => 'rb', 'senha' => '12345678'],
            ['nome' => 'Alexander Albon', 'email' => 'williams', 'senha' => '12345678'],
            ['nome' => 'Logan Sargeant', 'email' => 'williams', 'senha' => '12345678'],
            ['nome' => 'Valtteri Bottas', 'email' => 'stake', 'senha' => '12345678'],
            ['nome' => 'Zhou Guanyu', 'email' => 'stake', 'senha' => '12345678'],
            ['nome' => 'Nico Hulkenberg', 'email' => 'haas', 'senha' => '12345678'],
            ['nome' => 'Kevin Magnussen', 'email' => 'haas', 'senha' => '12345678'],
        ];

        foreach ($users as $user) {
            $nomeFormatado = strtolower(str_replace(' ', '.', $user['nome']));
            $email = "{$nomeFormatado}@{$user['email']}.com";

            User::updateOrCreate(
                ['email' => $email],
                [
                    'name' => $user['nome'],
                    'password' => Hash::make($user['senha']),
                ]
            );
        }
    }
}