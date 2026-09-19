<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Registar Expediente
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h3 class="text-lg font-semibold mb-6">
                        Novo Expediente
                    </h3>

                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-100 text-red-800 rounded">
                            <ul class="list-disc ml-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form
                        method="POST"
                        action="{{ route('expedientes.store') }}"
                    >
                        @csrf

                        <div class="mb-4">
                            <label
                                for="numero"
                                class="block font-medium text-sm text-gray-700"
                            >
                                Número do Expediente
                            </label>

                            <input
                                id="numero"
                                name="numero"
                                type="text"
                                value="{{ old('numero') }}"
                                required
                                maxlength="50"
                                placeholder="Ex.: EXP-2026-0002"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            >
                        </div>

                        <div class="mb-4">
                            <label
                                for="assunto"
                                class="block font-medium text-sm text-gray-700"
                            >
                                Assunto
                            </label>

                            <input
                                id="assunto"
                                name="assunto"
                                type="text"
                                value="{{ old('assunto') }}"
                                required
                                maxlength="255"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            >
                        </div>

                        <div class="mb-4">
                            <label
                                for="remetente"
                                class="block font-medium text-sm text-gray-700"
                            >
                                Remetente
                            </label>

                            <input
                                id="remetente"
                                name="remetente"
                                type="text"
                                value="{{ old('remetente') }}"
                                required
                                maxlength="150"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            >
                        </div>

                        <div class="mb-4">
                            <label
                                for="tipo"
                                class="block font-medium text-sm text-gray-700"
                            >
                                Tipo
                            </label>

                            <input
                                id="tipo"
                                name="tipo"
                                type="text"
                                value="{{ old('tipo') }}"
                                required
                                maxlength="100"
                                placeholder="Ex.: Pedido, Ofício, Requerimento"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            >
                        </div>

                        <div class="mb-4">
                            <label
                                for="data_entrada"
                                class="block font-medium text-sm text-gray-700"
                            >
                                Data de Entrada
                            </label>

                            <input
                                id="data_entrada"
                                name="data_entrada"
                                type="date"
                                value="{{ old('data_entrada', now()->toDateString()) }}"
                                required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            >
                        </div>

                        <div class="mb-6">
                            <label
                                for="descricao"
                                class="block font-medium text-sm text-gray-700"
                            >
                                Descrição
                            </label>

                            <textarea
                                id="descricao"
                                name="descricao"
                                rows="5"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                            >{{ old('descricao') }}</textarea>
                        </div>

                        <div class="flex items-center gap-4">
                            <button
                                type="submit"
                                class="px-5 py-3 bg-gray-800 text-white font-semibold rounded-md hover:bg-gray-700"
                            >
                                Registar Expediente
                            </button>

                            <a
                                href="{{ route('dashboard') }}"
                                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300"
                            >
                                Cancelar
                            </a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>