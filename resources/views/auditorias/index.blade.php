<x-app-layout>
    <x-slot name="header">
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Auditoria do Sistema
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Registo das operações realizadas pelos utilizadores
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

            @if ($auditorias->isEmpty())
                <div class="bg-white shadow-sm sm:rounded-lg p-6">
                    <div class="text-center py-10 text-gray-500">
                        Ainda não existem registos de auditoria.
                    </div>
                </div>
            @else
                <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">
                                    Registos de auditoria
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $auditorias->count() }} operação(ões) registada(s)
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Data e Hora
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Utilizador
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Acção
                                    </th>

                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Descrição
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($auditorias as $auditoria)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">
                                            {{ $auditoria->data_hora?->format('d/m/Y H:i:s') }}
                                        </td>

                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                            {{ $auditoria->utilizador?->name ?? 'Utilizador removido' }}
                                        </td>

                                        <td class="px-6 py-4 text-sm">
                                            <span class="inline-flex px-2 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                                {{ $auditoria->acao }}
                                            </span>
                                        </td>

                                        <td class="px-6 py-4 text-sm text-gray-700">
                                            {{ $auditoria->descricao }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>