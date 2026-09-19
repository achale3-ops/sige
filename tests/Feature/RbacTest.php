<?php

use App\Models\Papel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed([
        \Database\Seeders\PapelSeeder::class,
        \Database\Seeders\PermissaoSeeder::class,
        \Database\Seeders\PapelPermissaoSeeder::class,
    ]);
});

test('tecnico pode aceder à tramitação de expediente', function () {
    $papel = Papel::where('nome', 'Técnico')->firstOrFail();

    $user = User::factory()->create([
        'papel_id' => $papel->id,
        'active' => true,
    ]);

    $expediente = \App\Models\Expediente::create([
        'numero' => 'TEST-RBAC-001',
        'assunto' => 'Teste de tramitação',
        'remetente' => 'Teste',
        'tipo' => 'Teste',
        'data_entrada' => now()->toDateString(),
        'descricao' => 'Expediente criado para teste automatizado.',
        'estado' => 'RECEBIDO',
        'criado_por' => $user->id,
    ]);

    $response = $this
        ->actingAs($user)
        ->get(route('expedientes.tramitar.form', $expediente));

    $response->assertStatus(200);
});

test('recepcionista não pode aceder à tramitação de expediente', function () {
    $papel = Papel::where('nome', 'Recepcionista')->firstOrFail();

    $user = User::factory()->create([
        'papel_id' => $papel->id,
        'active' => true,
    ]);

    $expediente = \App\Models\Expediente::create([
        'numero' => 'TEST-RBAC-002',
        'assunto' => 'Teste de autorização',
        'remetente' => 'Teste',
        'tipo' => 'Teste',
        'data_entrada' => now()->toDateString(),
        'descricao' => 'Expediente criado para teste automatizado.',
        'estado' => 'RECEBIDO',
        'criado_por' => $user->id,
    ]);

    $response = $this
        ->actingAs($user)
        ->get(route('expedientes.tramitar.form', $expediente));

    $response->assertForbidden();
});