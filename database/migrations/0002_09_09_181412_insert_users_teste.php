<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Inserindo três usuários de teste na tabela users
        DB::table('users')->insert([
            [
                'name' => 'Usuário Teste 1',
                'email' => 'teste1@example.com',
                'password' => Hash::make('password123'), // Hash da senha
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Usuário Teste 2',
                'email' => 'teste2@example.com',
                'password' => Hash::make('password123'), // Hash da senha
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Usuário Teste 3',
                'email' => 'teste3@example.com',
                'password' => Hash::make('password123'), // Hash da senha
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       DB::table('users')->delete();
    }
};
