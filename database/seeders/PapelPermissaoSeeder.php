<?php

namespace Database\Seeders;

use App\Models\Papel;
use App\Models\Permissao;
use Illuminate\Database\Seeder;

class PapelPermissaoSeeder extends Seeder
{
    public function run(): void
    {
        $administrador = Papel::where('nome', 'Administrador')->first();
        $recepcionista = Papel::where('nome', 'Recepcionista')->first();
        $tecnico = Papel::where('nome', 'Técnico')->first();
        $dirigente = Papel::where('nome', 'Dirigente')->first();

        $todas = Permissao::all();

        $administrador->permissoes()->sync($todas);

        $recepcionista->permissoes()->sync(
            Permissao::whereIn('nome', [
                'registar_expediente',
                'consultar_expediente',
                'consultar_historico',
                'consultar_relatorios',
            ])->get()
        );

        $tecnico->permissoes()->sync(
            Permissao::whereIn('nome', [
                'consultar_expediente',
                'tramitar_expediente',
                'consultar_historico',
                'consultar_relatorios',
            ])->get()
        );

        $dirigente->permissoes()->sync(
            Permissao::whereIn('nome', [
                'consultar_expediente',
                'consultar_historico',
                'registar_despacho',
                'arquivar_expediente',
                'consultar_relatorios',
            ])->get()
        );
    }
}