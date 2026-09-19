<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Novo Utilizador
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Registar um novo utilizador e atribuir-lhe um papel no sistema
            </p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            {{-- Erros de validação --}}
            @if ($errors->any())
                <div class="mb-6 bg-red-100 border border-red-200 text-red-800 px-4 py-3 rounded-lg">
                    <p class="font-semibold mb-2">
                        Verifique os seguintes erros:
                    </p>

                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <form
                        method="POST"
                        action="{{ route('utilizadores.store') }}"
                        class="space-y-6"
                    >
                        @csrf

                        {{-- Nome --}}
                        <div>
                            <label
                                for="name"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Nome completo
                            </label>

                            <input
                                id="name"
                                name="name"
                                type="text"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >
                        </div>

                        {{-- E-mail --}}
                        <div>
                            <label
                                for="email"
                                class="block text-sm font-medium text-gray-700"
                            >
                                E-mail
                            </label>

                            <input
                                id="email"
                                name="email"
                                type="email"
                                value="{{ old('email') }}"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >
                        </div>

                        {{-- Papel --}}
                        <div>
                            <label
                                for="papel_id"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Papel
                            </label>

                            <select
                                id="papel_id"
                                name="papel_id"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >
                                <option value="">
                                    Seleccione o papel
                                </option>

                                @foreach ($papeis as $papel)
                                    <option
                                        value="{{ $papel->id }}"
                                        {{ old('papel_id') == $papel->id ? 'selected' : '' }}
                                    >
                                        {{ $papel->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Palavra-passe --}}
                        <div>
                            <label
                                for="password"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Palavra-passe
                            </label>

                            <input
                                id="password"
                                name="password"
                                type="password"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >

                            <p class="mt-1 text-xs text-gray-500">
                                Mínimo de 8 caracteres.
                            </p>
                        </div>

                        {{-- Confirmação --}}
                        <div>
                            <label
                                for="password_confirmation"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Confirmar palavra-passe
                            </label>

                            <input
                                id="password_confirmation"
                                name="password_confirmation"
                                type="password"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >
                        </div>

                        {{-- Botões --}}
                        <div
                            style="display: flex !important; justify-content: flex-end !important; align-items: center !important; gap: 12px !important; padding-top: 24px !important; border-top: 1px solid #e5e7eb !important;"
                        >

                            <a
                                href="{{ route('utilizadores.index') }}"
                                style="display: inline-block !important; visibility: visible !important; opacity: 1 !important; background-color: #e5e7eb !important; color: #1f2937 !important; padding: 10px 16px !important; border-radius: 6px !important; font-weight: 600 !important; text-decoration: none !important; font-size: 14px !important;"
                            >
                                Cancelar
                            </a>

                            <button
                                type="submit"
                                style="display: inline-block !important; visibility: visible !important; opacity: 1 !important; background-color: #2563eb !important; color: #ffffff !important; padding: 10px 16px !important; border-radius: 6px !important; font-weight: 700 !important; text-decoration: none !important; font-size: 14px !important; border: 2px solid #2563eb !important; cursor: pointer !important; min-width: 160px !important; height: 42px !important;"
                            >
                                Criar Utilizador
                            </button>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>