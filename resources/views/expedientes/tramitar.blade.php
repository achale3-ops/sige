<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tramitar Expediente
        </h2>
    </x-slot>

```
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

                        @if ($expediente->estado === 'RECEBIDO')
                            <span class="font-semibold text-green-700">
                                RECEBIDO
                            </span>
                        @elseif ($expediente->estado === 'EM TRAMITAÇÃO')
                            <span class="font-semibold text-blue-700">
                                EM TRAMITAÇÃO
                            </span>
                        @elseif ($expediente->estado === 'AGUARDANDO DESPACHO')
                            <span class="font-semibold text-orange-600">
                                AGUARDANDO DESPACHO
                            </span>
                        @elseif ($expediente->estado === 'DESPACHADO')
                            <span class="font-semibold text-purple-700">
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

                @if (session('error'))
                    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                        {{ session('error') }}
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

                @if (in_array($expediente->estado, ['RECEBIDO', 'EM TRAMITAÇÃO'], true))

                    <div class="mb-6">
                        <h4 class="text-lg font-semibold mb-4">
                            @if ($expediente->estado === 'RECEBIDO')
                                Registar primeira tramitação
                            @else
                                Registar nova tramitação
                            @endif
                        </h4>

                        @if ($expediente->estado === 'RECEBIDO')
                            <p class="text-sm text-gray-600 mb-4">
                                Este expediente foi recebido e ainda não possui
                                tramitação. Preencha os dados abaixo para
                                encaminhá-lo ao sector responsável.
                            </p>
                        @else
                            <p class="text-sm text-gray-600 mb-4">
                                Registe o próximo encaminhamento do expediente
                                durante o processo de tramitação.
                            </p>
                        @endif

                        <form
                            method="POST"
                            action="{{ route('expedientes.tramitar', $expediente) }}"
                        >
                            @csrf

                            <div class="mb-4">
                                <label
                                    for="origem"
                                    class="block font-medium text-sm text-gray-700"
                                >
                                    Origem
                                </label>

                                <input
                                    id="origem"
                                    name="origem"
                                    type="text"
                                    value="{{ old('origem') }}"
                                    required
                                    maxlength="150"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                >
                            </div>

                            <div class="mb-4">
                                <label
                                    for="destino"
                                    class="block font-medium text-sm text-gray-700"
                                >
                                    Destino
                                </label>

                                <input
                                    id="destino"
                                    name="destino"
                                    type="text"
                                    value="{{ old('destino') }}"
                                    required
                                    maxlength="150"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                >
                            </div>

                            <div class="mb-6">
                                <label
                                    for="observacao"
                                    class="block font-medium text-sm text-gray-700"
                                >
                                    Observação
                                </label>

                                <textarea
                                    id="observacao"
                                    name="observacao"
                                    rows="4"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                >{{ old('observacao') }}</textarea>
                            </div>

                            <button
                                type="submit"
                                style="background-color: #374151; color: #ffffff; border: 2px solid #1f2937; padding: 10px 20px; border-radius: 8px; font-weight: 600; cursor: pointer;"
                                onmouseover="this.style.backgroundColor='#1f2937'"
                                onmouseout="this.style.backgroundColor='#374151'"
                            >
                                Confirmar Tramitação
                            </button>
                        </form>
                    </div>

                    @if ($expediente->estado === 'EM TRAMITAÇÃO')

                        <div
                            class="mt-8 pt-6 border-t border-gray-200"
                            style="background-color: #f8fafc; padding: 24px; border-radius: 10px;"
                        >
                            <div class="mb-5">
                                <h4 class="text-lg font-semibold text-gray-800 mb-2">
                                    Próxima etapa
                                </h4>

                                <p class="text-sm text-gray-600">
                                    Quando a tramitação estiver concluída,
                                    encaminhe o expediente para apreciação do
                                    Dirigente.
                                </p>
                            </div>

                            <form
                                method="POST"
                                action="{{ route('expedientes.enviar-para-despacho', $expediente) }}"
                            >
                                @csrf

                                <button
                                    type="submit"
                                    style="display: inline-block; background-color: #2563eb; color: #ffffff; border: 2px solid #1d4ed8; padding: 13px 24px; border-radius: 8px; font-weight: 700; font-size: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15); cursor: pointer;"
                                    onmouseover="this.style.backgroundColor='#1d4ed8'"
                                    onmouseout="this.style.backgroundColor='#2563eb'"
                                >
                                    Enviar para despacho
                                </button>
                            </form>
                        </div>

                    @endif

                @elseif ($expediente->estado === 'AGUARDANDO DESPACHO')

                    <div class="mt-6 p-5 bg-orange-50 border border-orange-200 rounded-lg">
                        <h4 class="text-lg font-semibold text-orange-800 mb-2">
                            Expediente aguardando despacho
                        </h4>

                        <p class="text-sm text-orange-700">
                            A tramitação foi concluída. O expediente está
                            agora disponível para apreciação e despacho pelo
                            Dirigente.
                        </p>
                    </div>

                @elseif ($expediente->estado === 'DESPACHADO')

                    <div class="mt-6 p-5 bg-purple-50 border border-purple-200 rounded-lg">
                        <h4 class="text-lg font-semibold text-purple-800 mb-2">
                            Expediente despachado
                        </h4>

                        <p class="text-sm text-purple-700">
                            Este expediente já possui despacho e não pode
                            receber novas tramitações.
                        </p>
                    </div>

                @elseif ($expediente->estado === 'ARQUIVADO')

                    <div class="mt-6 p-5 bg-gray-100 border border-gray-200 rounded-lg">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">
                            Expediente arquivado
                        </h4>

                        <p class="text-sm text-gray-600">
                            Este expediente já foi arquivado e não pode
                            receber novas tramitações.
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
```

</x-app-layout>
