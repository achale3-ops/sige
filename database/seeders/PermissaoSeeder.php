<?php

namespace Database\Seeders;

use App\Models\Permissao;
use Illuminate\Database\Seeder;

class PermissaoSeeder extends Seeder
{
    public function run(): void
    {
        Permissao::firstOrCreate(
            ['nome' => 'gerir_utilizadores'],
            ['descricao' => 'Criar, consultar, editar e desactivar utilizadores.']
        );

        Permissao::firstOrCreate(
            ['nome' => 'gerir_papeis'],
            ['descricao' => 'Gerir papéis e respectivas permissões.']
        );

        Permissao::firstOrCreate(
            ['nome' => 'registar_expediente'],
            ['descricao' => 'Registar novos expedientes.']
        );

        Permissao::firstOrCreate(
            ['nome' => 'consultar_expediente'],
            ['descricao' => 'Consultar informações dos expedientes.']
        );

        Permissao::firstOrCreate(
            ['nome' => 'tramitar_expediente'],
            ['descricao' => 'Tramitar e encaminhar expedientes.']
        );

        Permissao::firstOrCreate(
            ['nome' => 'consultar_historico'],
            ['descricao' => 'Consultar o histórico de tramitação.']
        );

        Permissao::firstOrCreate(
            ['nome' => 'registar_despacho'],
            ['descricao' => 'Registar despachos nos expedientes.']
        );

        Permissao::firstOrCreate(
            ['nome' => 'arquivar_expediente'],
            ['descricao' => 'Arquivar expedientes despachados.']
        );

        Permissao::firstOrCreate(
            ['nome' => 'consultar_auditoria'],
            ['descricao' => 'Consultar os registos de auditoria do sistema.']
        );

        Permissao::firstOrCreate(
            ['nome' => 'consultar_relatorios'],
            ['descricao' => 'Consultar relatórios do sistema.']
        );
    }
}