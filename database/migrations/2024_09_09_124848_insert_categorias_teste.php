<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('categorias')->insert([
            ['nome' => 'Trabalho', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Estudos', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Lazer', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Saúde', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('categorias')->whereIn('nome', ['Trabalho', 'Estudos', 'Lazer', 'Saúde'])->delete();
    }
};
