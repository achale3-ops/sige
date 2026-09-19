<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Registar Despacho
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h3 class="text-lg font-semibold mb-4">
                        Expediente: {{ $expediente->numero }}
                    </h3>

                    <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                        <p>
                            <strong>Assunto:</strong>
                            {{ $expediente->assunto }}
                        </p>

                        <p>
                            <strong>Remetente:</strong>
                            {{ $expediente->remetente }}
                        </p>

                        <p>
                            <strong>Tipo:</strong>
                            {{ $expediente->tipo }}
                        </p>

                        <p class="mt-2">
                            <strong>Estado actual:</strong>

                            @if ($expediente->estado === 'DESPACHADO')
                                <span class="font-semibold text-green-700">
                                    DESPACHADO
                                </span>
                            @elseif ($expediente->estado === 'ARQUIVADO')
                                <span class="font-semibold text-gray-700">
                                    ARQUIVADO
                                </span>
                            @else
                                <span class="font-semibold">
                                    {{ $expediente->estado }}
                                </span>
                            @endif
                        </p>
                    </div>

                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                            <ul class="list-disc ml-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if ($expediente->estado === 'AGUARDANDO DESPACHO')

                        <div class="mb-6">
                            <label
                                for="conteudo"
                                class="block font-medium text-sm text-gray-700"
                            >
                                Conteúdo do Despacho
                            </label>

                            <form
                                method="POST"
                                action="{{ route('expedientes.despachar', $expediente) }}"
                            >
                                @csrf

                                <textarea
                                    id="conteudo"
                                    name="conteudo"
                                    rows="6"
                                    required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                >{{ old('conteudo') }}</textarea>

                                <button
                                    type="submit"
                                    class="mt-4 px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700"
                                >
                                    Registar Despacho
                                </button>
                            </form>
                        </div>

                    @elseif ($expediente->estado === 'DESPACHADO')

                        <div class="mb-6 p-5 bg-green-50 border border-green-200 rounded-lg">
                            <h4 class="text-lg font-semibold text-green-800 mb-2">
                                Despacho registado
                            </h4>

                            <p class="text-sm text-green-700 mb-4">
                                O expediente foi despachado e está pronto para ser arquivado.
                            </p>

                            <form
                                method="POST"
                                action="{{ route('expedientes.arquivar', $expediente) }}"
                            >
                                @csrf

                                <button
                                    type="submit"
                                    class="px-5 py-3 bg-green-700 text-white font-semibold rounded-md hover:bg-green-600"
                                >
                                    Arquivar expediente
                                </button>
                            </form>
                        </div>

                    @elseif ($expediente->estado === 'ARQUIVADO')

                        <div class="mb-6 p-5 bg-gray-100 border border-gray-300 rounded-lg">
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">
                                Expediente arquivado
                            </h4>

                            <p class="text-sm text-gray-600">
                                Este expediente foi concluído e encontra-se arquivado.
                            </p>
                        </div>

                    @endif

                    <div class="mt-6">
                        <a
                            href="{{ route('dashboard') }}"
                            class="inline-block px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300"
                        >
                            Voltar ao Dashboard
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>