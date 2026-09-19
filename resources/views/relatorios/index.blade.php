<x-app-layout>
    <x-slot name="header">
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Relatórios de Expedientes
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Consulta e filtragem dos expedientes registados no SIGE
                </p>
            </div>

            <a
                href="{{ route('dashboard') }}"
                style="display: inline-block; background-color: #2563eb; color: #ffffff; padding: 10px 16px; border-radius: 6px; font-weight: 700; text-decoration: none;"
            >
                Voltar ao Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-5">
                        Filtros de consulta
                    </h3>

                    <form method="GET" action="{{ route('relatorios.index') }}">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

                            <div>
                                <label for="estado" class="block text-sm font-medium text-gray-700 mb-1">
                                    Estado
                                </label>

                                <select
                                    id="estado"
                                    name="estado"
                                    class="w-full border-gray-300 rounded-md shadow-sm"
                                >
                                    <option value="">Todos os estados</option>

                                    @foreach ($estados as $estado)
                                        <option
                                            value="{{ $estado }}"
                                            @selected(request('estado') === $estado)
                                        >
                                            {{ $estado }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="tipo" class="block text-sm font-medium text-gray-700 mb-1">
                                    Tipo
                                </label>

                                <select
                                    id="tipo"
                                    name="tipo"
                                    class="w-full border-gray-300 rounded-md shadow-sm"
                                >
                                    <option value="">Todos os tipos</option>

                                    @foreach ($tipos as $tipo)
                                        <option
                                            value="{{ $tipo }}"
                                            @selected(request('tipo') === $tipo)
                                        >
                                            {{ $tipo }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="data_inicio" class="block text-sm font-medium text-gray-700 mb-1">
                                    Data inicial
                                </label>

                                <input
                                    type="date"
                                    id="data_inicio"
                                    name="data_inicio"
                                    value="{{ request('data_inicio') }}"
                                    class="w-full border-gray-300 rounded-md shadow-sm"
                                >
                            </div>

                            <div>
                                <label for="data_fim" class="block text-sm font-medium text-gray-700 mb-1">
                                    Data final
                                </label>

                                <input
                                    type="date"
                                    id="data_fim"
                                    name="data_fim"
                                    value="{{ request('data_fim') }}"
                                    class="w-full border-gray-300 rounded-md shadow-sm"
                                >
                            </div>

                        </div>

                        <div class="mt-5 flex flex-wrap gap-3">
                            <button
                                type="submit"
                                style="background-color: #2563eb; color: #ffffff; padding: 10px 16px; border-radius: 6px; font-weight: 700; border: none; cursor: pointer;"
                            >
                                Aplicar filtros
                            </button>

                            <a
                                href="{{ route('relatorios.index') }}"
                                style="background-color: #e5e7eb; color: #374151; padding: 10px 16px; border-radius: 6px; font-weight: 700; text-decoration: none;"
                            >
                                Limpar filtros
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">
                        Resultado da consulta
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        {{ $expedientes->count() }} expediente(s) encontrado(s)
                    </p>
                </div>

                @if ($expedientes->isEmpty())
                    <div class="p-10 text-center text-gray-500">
                        Nenhum expediente corresponde aos filtros seleccionados.
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Número
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Assunto
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Tipo
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Data de Entrada
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Estado
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Criado por
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($expedientes as $expediente)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm font-semibold text-gray-900 whitespace-nowrap">
                                            {{ $expediente->numero }}
                                        </td>

                                        <td class="px-6 py-4 text-sm text-gray-700">
                                            {{ $expediente->assunto }}
                                        </td>

                                        <td class="px-6 py-4 text-sm text-gray-700">
                                            {{ $expediente->tipo }}
                                        </td>

                                        <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">
                                            {{ $expediente->data_entrada?->format('d/m/Y') }}
                                        </td>

                                        <td class="px-6 py-4 text-sm">
                                            @php
                                                $classeEstado = match ($expediente->estado) {
                                                    'RECEBIDO' => 'bg-gray-100 text-gray-700',
                                                    'EM TRAMITAÇÃO' => 'bg-blue-100 text-blue-700',
                                                    'AGUARDANDO DESPACHO' => 'bg-yellow-100 text-yellow-700',
                                                    'DESPACHADO' => 'bg-green-100 text-green-700',
                                                    'ARQUIVADO' => 'bg-purple-100 text-purple-700',
                                                    default => 'bg-gray-100 text-gray-700',
                                                };
                                            @endphp

                                            <span class="inline-flex px-2 py-1 rounded-full text-xs font-semibold {{ $classeEstado }}">
                                                {{ $expediente->estado }}
                                            </span>
                                        </td>

                                        <td class="px-6 py-4 text-sm text-gray-700">
                                            {{ $expediente->criador?->name ?? 'Utilizador removido' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>