<x-app-layout>
    <x-slot name="header">
        <div
            style="display: flex !important; align-items: center !important; justify-content: space-between !important;"
        >
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Gestão de Utilizadores
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Administração dos utilizadores e respectivos papéis
                </p>
            </div>

            <a
                href="{{ route('utilizadores.create') }}"
                style="display: inline-block !important; visibility: visible !important; opacity: 1 !important; background-color: #2563eb !important; color: #ffffff !important; padding: 10px 16px !important; border-radius: 6px !important; font-weight: 700 !important; text-decoration: none !important; font-size: 14px !important; border: 2px solid #2563eb !important; cursor: pointer !important;"
            >
                Novo Utilizador
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Mensagem de sucesso --}}
            @if (session('success'))
                <div class="mb-6 bg-green-100 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Mensagem de erro --}}
            @if (session('error'))
                <div class="mb-6 bg-red-100 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Lista --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">
                                Utilizadores do sistema
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                {{ $utilizadores->count() }} utilizador(es) registado(s)
                            </p>
                        </div>
                    </div>

                    @if ($utilizadores->isEmpty())

                        <div class="text-center py-8 text-gray-500">
                            Ainda não existem utilizadores registados.
                        </div>

                    @else

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">

                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Nome
                                        </th>

                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            E-mail
                                        </th>

                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Papel
                                        </th>

                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Estado
                                        </th>

                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Acção
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-gray-200">

                                    @foreach ($utilizadores as $utilizador)

                                        <tr>

                                            <td class="px-4 py-3 text-sm font-medium text-gray-900">
                                                {{ $utilizador->name }}
                                            </td>

                                            <td class="px-4 py-3 text-sm text-gray-700">
                                                {{ $utilizador->email }}
                                            </td>

                                            <td class="px-4 py-3 text-sm text-gray-700">
                                                {{ $utilizador->papel?->nome ?? 'Sem papel' }}
                                            </td>

                                            <td class="px-4 py-3 text-sm">

                                                @if ($utilizador->active)
                                                    <span class="inline-flex px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                                        Activo
                                                    </span>
                                                @else
                                                    <span class="inline-flex px-2 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                                        Inactivo
                                                    </span>
                                                @endif

                                            </td>

                                            <td class="px-4 py-3 text-sm">

                                                <div class="flex flex-wrap items-center gap-3">

                                                    <a
                                                        href="{{ route('utilizadores.edit', $utilizador) }}"
                                                        class="text-blue-600 hover:text-blue-800 font-semibold"
                                                    >
                                                        Editar
                                                    </a>

                                                    <form
                                                        method="POST"
                                                        action="{{ route('utilizadores.toggle-estado', $utilizador) }}"
                                                        class="inline"
                                                    >
                                                        @csrf
                                                        @method('PATCH')

                                                        <button
                                                            type="submit"
                                                            class="text-gray-700 hover:text-gray-900 font-semibold"
                                                        >
                                                            {{ $utilizador->active ? 'Desactivar' : 'Activar' }}
                                                        </button>

                                                    </form>

                                                </div>

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
    </div>
</x-app-layout>