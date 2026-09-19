<?php

namespace Database\Seeders;

use App\Models\Papel;
use Illuminate\Database\Seeder;

class PapelSeeder extends Seeder
{
    public function run(): void
    {
        Papel::firstOrCreate(
            ['nome' => 'Administrador'],
            ['descricao' => 'Responsável pela administração do sistema.']
        );

        Papel::firstOrCreate(
            ['nome' => 'Recepcionista'],
            ['descricao' => 'Responsável pelo registo e consulta de expedientes.']
        );

        Papel::firstOrCreate(
            ['nome' => 'Técnico'],
            ['descricao' => 'Responsável pela tramitação e acompanhamento de expedientes.']
        );

        Papel::firstOrCreate(
            ['nome' => 'Dirigente'],
            ['descricao' => 'Responsável pela análise, despacho e arquivo de expedientes.']
        );
    }
}