<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Consultar Expediente
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Detalhes e histórico do expediente
            </p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Dados principais --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">
                                {{ $expediente->numero }}
                            </h3>

                            <p class="text-sm text-gray-500">
                                Expediente registado no SIGE
                            </p>
                        </div>

                        <span class="inline-flex px-3 py-1 rounded-full text-sm font-semibold bg-gray-100 text-gray-700">
                            {{ $expediente->estado }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div>
                            <p class="text-sm text-gray-500">Assunto</p>
                            <p class="font-medium text-gray-900">
                                {{ $expediente->assunto }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Tipo</p>
                            <p class="font-medium text-gray-900">
                                {{ $expediente->tipo }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Remetente</p>
                            <p class="font-medium text-gray-900">
                                {{ $expediente->remetente }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Data de entrada</p>
                            <p class="font-medium text-gray-900">
                                {{ $expediente->data_entrada?->format('d/m/Y') }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Registado por</p>
                            <p class="font-medium text-gray-900">
                                {{ $expediente->criador?->name ?? 'Não disponível' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Data de registo</p>
                            <p class="font-medium text-gray-900">
                                {{ $expediente->created_at?->format('d/m/Y H:i') }}
                            </p>
                        </div>

                    </div>

                    @if ($expediente->descricao)
                        <div class="mt-6">
                            <p class="text-sm text-gray-500 mb-1">Descrição</p>

                            <div class="bg-gray-50 rounded-lg p-4 text-gray-800">
                                {{ $expediente->descricao }}
                            </div>
                        </div>
                    @endif

                </div>
            </div>

            {{-- Histórico de tramitações --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <h3 class="text-lg font-semibold text-gray-800 mb-5">
                        Histórico de Tramitações
                    </h3>

                    @if ($expediente->tramitacoes->isEmpty())

                        <p class="text-gray-500">
                            Ainda não existem tramitações registadas para este expediente.
                        </p>

                    @else

                        <div class="space-y-4">

                            @foreach ($expediente->tramitacoes as $tramitacao)

                                <div class="border border-gray-200 rounded-lg p-4">

                                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">

                                        <div>
                                            <p class="font-semibold text-gray-800">
                                                {{ $tramitacao->origem }}
                                                →
                                                {{ $tramitacao->destino }}
                                            </p>

                                            <p class="text-sm text-gray-500 mt-1">
                                                Responsável:
                                                {{ $tramitacao->responsavel?->name ?? 'Não disponível' }}
                                            </p>
                                        </div>

                                        <p class="text-sm text-gray-500">
                                            {{ $tramitacao->data_tramitacao?->format('d/m/Y H:i') }}
                                        </p>

                                    </div>

                                    @if ($tramitacao->observacao)
                                        <div class="mt-3 bg-gray-50 rounded p-3 text-sm text-gray-700">
                                            {{ $tramitacao->observacao }}
                                        </div>
                                    @endif

                                </div>

                            @endforeach

                        </div>

                    @endif

                </div>
            </div>

            {{-- Despacho --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <h3 class="text-lg font-semibold text-gray-800 mb-5">
                        Despacho
                    </h3>

                    @if ($expediente->despacho)

                        <div class="border border-gray-200 rounded-lg p-4">

                            <p class="text-gray-800">
                                {{ $expediente->despacho->conteudo }}
                            </p>

                            <div class="mt-4 text-sm text-gray-500">
                                <p>
                                    Responsável:
                                    {{ $expediente->despacho->responsavel?->name ?? 'Não disponível' }}
                                </p>

                                <p class="mt-1">
                                    Data:
                                    {{ $expediente->despacho->data_despacho?->format('d/m/Y H:i') }}
                                </p>
                            </div>

                        </div>

                    @else

                        <p class="text-gray-500">
                            Ainda não existe despacho registado para este expediente.
                        </p>

                    @endif

                </div>
            </div>

            {{-- Navegação --}}
            <div class="flex justify-between">

                <a
                    href="{{ route('dashboard') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300"
                >
                    Voltar ao Dashboard
                </a>

            </div>

        </div>
    </div>
</x-app-layout>