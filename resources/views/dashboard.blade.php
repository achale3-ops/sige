<x-app-layout>

    <x-slot name="header">

        <div class="sige-header">

            <div>
                <div class="sige-header-label">
                    SISTEMA INTEGRADO DE GESTÃO DE EXPEDIENTES
                </div>

                <h2 class="sige-header-title">
                    Painel de Controlo
                </h2>

                <p class="sige-header-subtitle">
                    Gestão centralizada do ciclo dos expedientes
                </p>
            </div>

            <div class="sige-header-user">
                <div class="sige-user-avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <div>
                    <strong>{{ auth()->user()->name }}</strong>

                    <span>
                        {{ auth()->user()->papel?->nome ?? 'Sem papel atribuído' }}
                    </span>
                </div>
            </div>

        </div>

    </x-slot>


    <style>

        .sige-dashboard {
            --sige-primary: #173b70;
            --sige-primary-dark: #102b52;
            --sige-blue: #2563eb;
            --sige-teal: #0f766e;
            --sige-text: #172033;
            --sige-muted: #667085;
            --sige-border: #e5eaf1;
            --sige-bg: #f6f8fc;
            --sige-white: #ffffff;

            min-height: calc(100vh - 80px);
            background:
                radial-gradient(
                    circle at 5% 0%,
                    rgba(37, 99, 235, 0.07),
                    transparent 24%
                ),
                radial-gradient(
                    circle at 95% 10%,
                    rgba(15, 118, 110, 0.06),
                    transparent 22%
                ),
                var(--sige-bg);

            padding: 32px 0 55px;
        }

        .sige-container {
            width: min(1280px, calc(100% - 40px));
            margin: 0 auto;
        }

        .sige-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
        }

        .sige-header-label {
            color: #2563eb;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.2px;
            margin-bottom: 4px;
        }

        .sige-header-title {
            font-size: 24px;
            line-height: 1.2;
            font-weight: 750;
            color: #173b70;
        }

        .sige-header-subtitle {
            margin-top: 4px;
            color: #667085;
            font-size: 13px;
        }

        .sige-header-user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sige-header-user strong {
            display: block;
            color: #172033;
            font-size: 13px;
        }

        .sige-header-user span {
            display: block;
            color: #667085;
            font-size: 11px;
            margin-top: 2px;
        }

        .sige-user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            background: linear-gradient(
                135deg,
                #173b70,
                #2563eb
            );
            color: white;
            font-size: 15px;
            font-weight: 800;
            box-shadow: 0 7px 18px rgba(37, 99, 235, 0.18);
        }

        .sige-animate {
            animation: sigeFadeUp 0.55s ease both;
        }

        .sige-delay-1 {
            animation-delay: 0.05s;
        }

        .sige-delay-2 {
            animation-delay: 0.10s;
        }

        .sige-delay-3 {
            animation-delay: 0.15s;
        }

        .sige-delay-4 {
            animation-delay: 0.20s;
        }

        @keyframes sigeFadeUp {

            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }

        .sige-message {
            margin-bottom: 22px;
            padding: 13px 16px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 600;
            border: 1px solid transparent;
        }

        .sige-message-success {
            background: #ecfdf3;
            border-color: #bbf7d0;
            color: #166534;
        }

        .sige-message-error {
            background: #fef2f2;
            border-color: #fecaca;
            color: #991b1b;
        }

        .sige-welcome {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(
                    circle at 90% 10%,
                    rgba(255,255,255,0.13),
                    transparent 28%
                ),
                linear-gradient(
                    135deg,
                    #173b70,
                    #102b52
                );

            border-radius: 20px;
            padding: 28px 30px;
            color: white;
            box-shadow: 0 16px 38px rgba(16, 43, 82, 0.14);
            margin-bottom: 24px;
        }

        .sige-welcome::after {
            content: "";
            position: absolute;
            width: 170px;
            height: 170px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.10);
            right: -55px;
            bottom: -85px;
        }

        .sige-welcome-content {
            position: relative;
            z-index: 1;
        }

        .sige-welcome-label {
            color: rgba(255,255,255,0.66);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1.1px;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .sige-welcome h3 {
            font-size: 24px;
            line-height: 1.2;
            font-weight: 750;
        }

        .sige-welcome p {
            margin-top: 7px;
            color: rgba(255,255,255,0.74);
            font-size: 13px;
            max-width: 700px;
        }

        .sige-section-heading {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 13px;
        }

        .sige-section-heading h3 {
            color: #173b70;
            font-size: 16px;
            font-weight: 750;
        }

        .sige-section-heading p {
            color: #667085;
            font-size: 11px;
            margin-top: 2px;
        }

        .sige-indicators {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 13px;
            margin-bottom: 28px;
        }

        .sige-indicator {
            background: white;
            border: 1px solid var(--sige-border);
            border-radius: 15px;
            padding: 18px;
            position: relative;
            overflow: hidden;

            transition:
                transform 0.22s ease,
                box-shadow 0.22s ease,
                border-color 0.22s ease;

            box-shadow: 0 5px 18px rgba(15, 23, 42, 0.035);
        }

        .sige-indicator:hover {
            transform: translateY(-4px);
            border-color: #d5deeb;
            box-shadow: 0 13px 28px rgba(15, 23, 42, 0.08);
        }

        .sige-indicator::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: #2563eb;
            opacity: 0.75;
        }

        .sige-indicator-label {
            color: #667085;
            font-size: 11px;
            font-weight: 650;
        }

        .sige-indicator-number {
            color: #172033;
            font-size: 28px;
            line-height: 1;
            font-weight: 800;
            margin-top: 8px;
        }

        .sige-indicator-note {
            color: #98a2b3;
            font-size: 10px;
            margin-top: 7px;
        }

        .sige-modules {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 30px;
        }

        .sige-module {
            background: white;
            border: 1px solid var(--sige-border);
            border-radius: 16px;
            padding: 20px;

            transition:
                transform 0.22s ease,
                box-shadow 0.22s ease,
                border-color 0.22s ease;

            box-shadow: 0 5px 18px rgba(15, 23, 42, 0.035);
        }

        .sige-module:hover {
            transform: translateY(-5px);
            border-color: #d3dce9;
            box-shadow: 0 15px 30px rgba(15, 23, 42, 0.08);
        }

        .sige-module-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: #eff4ff;
            color: #2563eb;
            margin-bottom: 14px;
        }

        .sige-module-icon svg {
            width: 21px;
            height: 21px;
        }

        .sige-module h4 {
            color: #173b70;
            font-size: 14px;
            font-weight: 750;
        }

        .sige-module p {
            color: #667085;
            font-size: 11px;
            line-height: 1.55;
            margin-top: 5px;
            min-height: 34px;
        }

        .sige-module-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-top: 13px;
            color: #2563eb;
            font-size: 11px;
            font-weight: 750;
        }

        .sige-module-link:hover {
            color: #173b70;
        }

        .sige-actions-card {
            background: white;
            border: 1px solid var(--sige-border);
            border-radius: 16px;
            padding: 21px;
            margin-bottom: 28px;
            box-shadow: 0 5px 18px rgba(15, 23, 42, 0.035);
        }

        .sige-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
        }

        .sige-action {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 13px;
            border-radius: 9px;
            font-size: 11px;
            font-weight: 750;
            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;
        }

        .sige-action:hover {
            transform: translateY(-2px);
        }

        .sige-action-primary {
            background: #2563eb;
            color: white;
            box-shadow: 0 7px 16px rgba(37, 99, 235, 0.15);
        }

        .sige-action-primary:hover {
            background: #173b70;
        }

        .sige-action-neutral {
            background: #f1f5f9;
            color: #334155;
        }

        .sige-action-neutral:hover {
            background: #e2e8f0;
        }

        .sige-table-card {
            background: white;
            border: 1px solid var(--sige-border);
            border-radius: 17px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(15, 23, 42, 0.035);
        }

        .sige-table-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 20px 21px;
            border-bottom: 1px solid var(--sige-border);
        }

        .sige-table-title h3 {
            color: #173b70;
            font-size: 16px;
            font-weight: 750;
        }

        .sige-table-title p {
            color: #667085;
            font-size: 11px;
            margin-top: 2px;
        }

        .sige-record-count {
            padding: 6px 10px;
            border-radius: 999px;
            background: #f1f5f9;
            color: #475569;
            font-size: 10px;
            font-weight: 750;
        }

        .sige-table-wrap {
            overflow-x: auto;
        }

        .sige-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        .sige-table th {
            background: #f8fafc;
            color: #667085;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 0.65px;
            text-transform: uppercase;
            text-align: left;
            padding: 12px 15px;
            border-bottom: 1px solid var(--sige-border);
        }

        .sige-table td {
            padding: 14px 15px;
            border-bottom: 1px solid #eef1f5;
            color: #475467;
            font-size: 11px;
            vertical-align: middle;
        }

        .sige-table tbody tr {
            transition: background 0.18s ease;
        }

        .sige-table tbody tr:hover {
            background: #fafcff;
        }

        .sige-table tbody tr:last-child td {
            border-bottom: none;
        }

        .sige-number {
            color: #173b70;
            font-weight: 750;
        }

        .sige-subject {
            color: #344054;
            font-weight: 600;
        }

        .sige-date {
            white-space: nowrap;
        }

        .sige-status {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 8px;
            border-radius: 999px;
            font-size: 9px;
            font-weight: 800;
            white-space: nowrap;
        }

        .sige-status::before {
            content: "";
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: currentColor;
        }

        .sige-status-recebido {
            background: #eff6ff;
            color: #2563eb;
        }

        .sige-status-tramitacao {
            background: #fefce8;
            color: #a16207;
        }

        .sige-status-despacho {
            background: #fff7ed;
            color: #c2410c;
        }

        .sige-status-despachado {
            background: #ecfdf3;
            color: #047857;
        }

        .sige-status-arquivado {
            background: #f1f5f9;
            color: #475569;
        }

        .sige-status-default {
            background: #f1f5f9;
            color: #475569;
        }

        .sige-row-actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }

        .sige-row-action {
            color: #2563eb;
            font-size: 10px;
            font-weight: 750;
            transition: color 0.18s ease;
        }

        .sige-row-action:hover {
            color: #173b70;
        }

        .sige-row-action-neutral {
            color: #475467;
        }

        .sige-row-action-neutral:hover {
            color: #172033;
        }

        .sige-no-action {
            color: #98a2b3;
        }

        .sige-empty {
            text-align: center;
            padding: 55px 20px;
        }

        .sige-empty-icon {
            width: 52px;
            height: 52px;
            margin: 0 auto 14px;
            display: grid;
            place-items: center;
            border-radius: 15px;
            background: #eff4ff;
            color: #2563eb;
        }

        .sige-empty h4 {
            color: #344054;
            font-size: 14px;
            font-weight: 750;
        }

        .sige-empty p {
            color: #98a2b3;
            font-size: 11px;
            margin-top: 4px;
        }

        @media (max-width: 1100px) {

            .sige-indicators {
                grid-template-columns: repeat(3, 1fr);
            }

            .sige-modules {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media (max-width: 760px) {

            .sige-container {
                width: min(100% - 24px, 1280px);
            }

            .sige-header {
                align-items: flex-start;
            }

            .sige-header-user {
                display: none;
            }

            .sige-indicators {
                grid-template-columns: repeat(2, 1fr);
            }

            .sige-modules {
                grid-template-columns: 1fr;
            }

            .sige-welcome {
                padding: 23px;
            }

            .sige-welcome h3 {
                font-size: 20px;
            }

        }

        @media (max-width: 480px) {

            .sige-dashboard {
                padding-top: 22px;
            }

            .sige-indicators {
                grid-template-columns: 1fr;
            }

            .sige-section-heading {
                align-items: flex-start;
            }

            .sige-table-header {
                align-items: flex-start;
            }

        }

        @media (prefers-reduced-motion: reduce) {

            .sige-animate,
            .sige-indicator,
            .sige-module,
            .sige-action {
                animation: none !important;
                transition: none !important;
            }

        }

    </style>


    <div class="sige-dashboard">

        <div class="sige-container">


            @if (session('success'))
                <div class="sige-message sige-message-success sige-animate">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="sige-message sige-message-error sige-animate">
                    {{ session('error') }}
                </div>
            @endif


            <section class="sige-welcome sige-animate">

                <div class="sige-welcome-content">

                    <div class="sige-welcome-label">
                        Área de trabalho
                    </div>

                    <h3>
                        Bem-vindo, {{ auth()->user()->name }}
                    </h3>

                    <p>
                        Está autenticado como
                        <strong>
                            {{ auth()->user()->papel?->nome ?? 'Sem papel atribuído' }}
                        </strong>.
                        Utilize os módulos abaixo para acompanhar e gerir
                        os expedientes de acordo com as suas permissões.
                    </p>

                </div>

            </section>


            <div class="sige-section-heading">

                <div>
                    <h3>Visão geral</h3>

                    <p>
                        Situação actual dos expedientes registados
                    </p>
                </div>

            </div>


            <section class="sige-indicators">

                <div class="sige-indicator sige-animate sige-delay-1">
                    <div class="sige-indicator-label">
                        Total de Expedientes
                    </div>

                    <div class="sige-indicator-number">
                        {{ $expedientes->count() }}
                    </div>

                    <div class="sige-indicator-note">
                        Registos no sistema
                    </div>
                </div>

                <div class="sige-indicator sige-animate sige-delay-1">
                    <div class="sige-indicator-label">
                        Recebidos
                    </div>

                    <div class="sige-indicator-number">
                        {{ $expedientes->where('estado', 'RECEBIDO')->count() }}
                    </div>

                    <div class="sige-indicator-note">
                        Aguardam tramitação
                    </div>
                </div>

                <div class="sige-indicator sige-animate sige-delay-2">
                    <div class="sige-indicator-label">
                        Em Tramitação
                    </div>

                    <div class="sige-indicator-number">
                        {{ $expedientes->where('estado', 'EM TRAMITAÇÃO')->count() }}
                    </div>

                    <div class="sige-indicator-note">
                        Em tratamento
                    </div>
                </div>

                <div class="sige-indicator sige-animate sige-delay-3">
                    <div class="sige-indicator-label">
                        Aguardando Despacho
                    </div>

                    <div class="sige-indicator-number">
                        {{ $expedientes->where('estado', 'AGUARDANDO DESPACHO')->count() }}
                    </div>

                    <div class="sige-indicator-note">
                        Aguardam decisão
                    </div>
                </div>

                <div class="sige-indicator sige-animate sige-delay-4">
                    <div class="sige-indicator-label">
                        Arquivados
                    </div>

                    <div class="sige-indicator-number">
                        {{ $expedientes->where('estado', 'ARQUIVADO')->count() }}
                    </div>

                    <div class="sige-indicator-note">
                        Processos encerrados
                    </div>
                </div>

            </section>


            <div class="sige-section-heading">

                <div>
                    <h3>Módulos do sistema</h3>

                    <p>
                        Funcionalidades disponíveis de acordo com o seu papel
                    </p>
                </div>

            </div>


            <section class="sige-modules">

                @if (
                    auth()->user()->papel &&
                    auth()->user()->papel->permissoes()->where('nome', 'consultar_expediente')->exists()
                )

                    <div class="sige-module sige-animate">

                        <div class="sige-module-icon">

                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.8">

                                <path d="M6 3.5h8l4 4V20a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V4.5a1 1 0 0 1 1-1Z"/>
                                <path d="M14 3.5V8h4"/>
                                <path d="M8 12h8M8 16h6"/>

                            </svg>

                        </div>

                        <h4>
                            Gestão de Expedientes
                        </h4>

                        <p>
                            Consulte e acompanhe os expedientes
                            existentes no sistema.
                        </p>

                        <a
                            href="#expedientes"
                            class="sige-module-link"
                        >
                            Ver expedientes →
                        </a>

                    </div>

                @endif


                @if (
                    auth()->user()->papel &&
                    auth()->user()->papel->permissoes()->where('nome', 'registar_expediente')->exists()
                )

                    <div class="sige-module sige-animate sige-delay-1">

                        <div class="sige-module-icon">

                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.8">

                                <path d="M12 5v14"/>
                                <path d="M5 12h14"/>

                            </svg>

                        </div>

                        <h4>
                            Registar Expediente
                        </h4>

                        <p>
                            Registe novos expedientes e inicie
                            o seu acompanhamento.
                        </p>

                        <a
                            href="{{ route('expedientes.create') }}"
                            class="sige-module-link"
                        >
                            Novo expediente →
                        </a>

                    </div>

                @endif


                @if (
                    auth()->user()->papel &&
                    auth()->user()->papel->permissoes()->where('nome', 'tramitar_expediente')->exists()
                )

                    <div class="sige-module sige-animate sige-delay-2">

                        <div class="sige-module-icon">

                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.8">

                                <path d="M5 12h13"/>
                                <path d="m14 8 4 4-4 4"/>
                                <path d="M5 6h5M5 18h5"/>

                            </svg>

                        </div>

                        <h4>
                            Tramitação
                        </h4>

                        <p>
                            Encaminhe expedientes e mantenha
                            o histórico do seu percurso.
                        </p>

                        <a
                            href="#expedientes"
                            class="sige-module-link"
                        >
                            Consultar expedientes →
                        </a>

                    </div>

                @endif


                @if (
                    auth()->user()->papel &&
                    auth()->user()->papel->permissoes()->where('nome', 'registar_despacho')->exists()
                )

                    <div class="sige-module sige-animate sige-delay-3">

                        <div class="sige-module-icon">

                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.8">

                                <path d="M5 19h14"/>
                                <path d="M7 16V5h10v11"/>
                                <path d="M9 9h6M9 12h5"/>

                            </svg>

                        </div>

                        <h4>
                            Despacho
                        </h4>

                        <p>
                            Registe decisões sobre expedientes
                            que aguardam despacho.
                        </p>

                        <a
                            href="#expedientes"
                            class="sige-module-link"
                        >
                            Ver pendentes →
                        </a>

                    </div>

                @endif


                @if (
                    auth()->user()->papel &&
                    auth()->user()->papel->permissoes()->where('nome', 'arquivar_expediente')->exists()
                )

                    <div class="sige-module sige-animate">

                        <div class="sige-module-icon">

                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.8">

                                <path d="M4 7h16v13H4z"/>
                                <path d="M3 4h18v3H3z"/>
                                <path d="M9 11h6"/>

                            </svg>

                        </div>

                        <h4>
                            Arquivo
                        </h4>

                        <p>
                            Encerre e arquive os expedientes
                            após o respectivo despacho.
                        </p>

                        <a
                            href="#expedientes"
                            class="sige-module-link"
                        >
                            Ver expedientes →
                        </a>

                    </div>

                @endif


                @if (
                    auth()->user()->papel &&
                    auth()->user()->papel->permissoes()->where('nome', 'gerir_utilizadores')->exists()
                )

                    <div class="sige-module sige-animate sige-delay-1">

                        <div class="sige-module-icon">

                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.8">

                                <circle cx="9" cy="8" r="3"/>
                                <path d="M3 20a6 6 0 0 1 12 0"/>
                                <path d="M16 5a3 3 0 0 1 0 6"/>
                                <path d="M17 14a5 5 0 0 1 4 6"/>

                            </svg>

                        </div>

                        <h4>
                            Utilizadores
                        </h4>

                        <p>
                            Crie, edite e controle os utilizadores
                            e respectivos papéis.
                        </p>

                        <a
                            href="{{ route('utilizadores.index') }}"
                            class="sige-module-link"
                        >
                            Gerir utilizadores →
                        </a>

                    </div>

                @endif


                {{-- Auditoria --}}
                @if (
                    auth()->user()->papel &&
                    auth()->user()->papel->permissoes()->where('nome', 'consultar_auditoria')->exists()
                )

                    <div class="sige-module sige-animate sige-delay-2">

                        <div class="sige-module-icon">

                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.8">

                                <circle cx="12" cy="12" r="8"/>
                                <path d="M12 8v4l3 2"/>

                            </svg>

                        </div>

                        <h4>
                            Auditoria
                        </h4>

                        <p>
                            Acompanhe as operações relevantes
                            realizadas no sistema.
                        </p>

                        <a
                            href="{{ route('auditoria.index') }}"
                            class="sige-module-link"
                        >
                            Consultar auditoria →
                        </a>

                    </div>

                @endif


                {{-- Relatórios --}}
                @if (
                    auth()->user()->papel &&
                    auth()->user()->papel->permissoes()->where('nome', 'consultar_relatorios')->exists()
                )

                    <div class="sige-module sige-animate sige-delay-3">

                        <div class="sige-module-icon">

                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.8">

                                <path d="M4 19V5"/>
                                <path d="M4 19h16"/>
                                <path d="m7 15 3-4 3 2 5-6"/>

                            </svg>

                        </div>

                        <h4>
                            Relatórios
                        </h4>

                        <p>
                            Consulte informações consolidadas
                            sobre os expedientes.
                        </p>

                        <a
                            href="{{ route('relatorios.index') }}"
                            class="sige-module-link"
                        >
                            Consultar relatórios →
                        </a>

                    </div>

                @endif

            </section>


            <section class="sige-actions-card sige-animate">

                <div class="sige-section-heading">

                    <div>
                        <h3>Ações rápidas</h3>

                        <p>
                            Acesso directo às operações mais utilizadas
                        </p>
                    </div>

                </div>


                <div class="sige-actions">

                    @if (
                        auth()->user()->papel &&
                        auth()->user()->papel->permissoes()->where('nome', 'registar_expediente')->exists()
                    )

                        <a
                            href="{{ route('expedientes.create') }}"
                            class="sige-action sige-action-primary"
                        >
                            + Registar Expediente
                        </a>

                    @endif


                    @if (
                        auth()->user()->papel &&
                        auth()->user()->papel->permissoes()->where('nome', 'gerir_utilizadores')->exists()
                    )

                        <a
                            href="{{ route('utilizadores.index') }}"
                            class="sige-action sige-action-neutral"
                        >
                            Utilizadores
                        </a>

                    @endif


                    <a
                        href="#expedientes"
                        class="sige-action sige-action-neutral"
                    >
                        Consultar Expedientes
                    </a>

                </div>

            </section>


            <section
                id="expedientes"
                class="sige-table-card sige-animate"
            >

                <div class="sige-table-header">

                    <div class="sige-table-title">

                        <h3>
                            Expedientes recentes
                        </h3>

                        <p>
                            Acompanhamento dos processos registados
                        </p>

                    </div>

                    <span class="sige-record-count">
                        {{ $expedientes->count() }} registo(s)
                    </span>

                </div>


                @if ($expedientes->isEmpty())

                    <div class="sige-empty">

                        <div class="sige-empty-icon">

                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="1.7">

                                <path d="M6 3.5h8l4 4V20a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V4.5a1 1 0 0 1 1-1Z"/>
                                <path d="M14 3.5V8h4"/>

                            </svg>

                        </div>

                        <h4>
                            Ainda não existem expedientes
                        </h4>

                        <p>
                            Os novos expedientes registados aparecerão aqui.
                        </p>

                    </div>

                @else

                    <div class="sige-table-wrap">

                        <table class="sige-table">

                            <thead>

                                <tr>

                                    <th>Número</th>
                                    <th>Assunto</th>
                                    <th>Tipo</th>
                                    <th>Data</th>
                                    <th>Estado</th>
                                    <th>Acção</th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach ($expedientes as $expediente)

                                    <tr>

                                        <td>
                                            <span class="sige-number">
                                                {{ $expediente->numero }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="sige-subject">
                                                {{ $expediente->assunto }}
                                            </span>
                                        </td>

                                        <td>
                                            {{ $expediente->tipo }}
                                        </td>

                                        <td>
                                            <span class="sige-date">
                                                {{ $expediente->data_entrada?->format('d/m/Y') }}
                                            </span>
                                        </td>

                                        <td>

                                            @php
                                                $classeEstado = match ($expediente->estado) {
                                                    'RECEBIDO' => 'sige-status-recebido',
                                                    'EM TRAMITAÇÃO' => 'sige-status-tramitacao',
                                                    'AGUARDANDO DESPACHO' => 'sige-status-despacho',
                                                    'DESPACHADO' => 'sige-status-despachado',
                                                    'ARQUIVADO' => 'sige-status-arquivado',
                                                    default => 'sige-status-default',
                                                };
                                            @endphp

                                            <span class="sige-status {{ $classeEstado }}">
                                                {{ $expediente->estado }}
                                            </span>

                                        </td>

                                        <td>

                                            <div class="sige-row-actions">

                                                @if (
                                                    auth()->user()->papel &&
                                                    auth()->user()->papel->permissoes()->where('nome', 'consultar_expediente')->exists()
                                                )

                                                    <a
                                                        href="{{ route('expedientes.show', $expediente) }}"
                                                        class="sige-row-action sige-row-action-neutral"
                                                    >
                                                        Consultar
                                                    </a>

                                                @endif


                                                @if (
                                                    auth()->user()->papel &&
                                                    auth()->user()->papel->permissoes()->where('nome', 'tramitar_expediente')->exists() &&
                                                    in_array($expediente->estado, ['RECEBIDO', 'EM TRAMITAÇÃO'])
                                                )

                                                    <a
                                                        href="{{ route('expedientes.tramitar.form', $expediente) }}"
                                                        class="sige-row-action"
                                                    >
                                                        Tramitar
                                                    </a>

                                                @endif


                                                @if (
                                                    auth()->user()->papel &&
                                                    auth()->user()->papel->permissoes()->where('nome', 'registar_despacho')->exists() &&
                                                    $expediente->estado === 'AGUARDANDO DESPACHO'
                                                )

                                                    <a
                                                        href="{{ route('expedientes.despachar.form', $expediente) }}"
                                                        class="sige-row-action"
                                                    >
                                                        Despachar
                                                    </a>

                                                @endif


                                                @if (
                                                    auth()->user()->papel &&
                                                    auth()->user()->papel->permissoes()->where('nome', 'arquivar_expediente')->exists() &&
                                                    $expediente->estado === 'DESPACHADO'
                                                )

                                                    <form
                                                        method="POST"
                                                        action="{{ route('expedientes.arquivar', $expediente) }}"
                                                        style="display:inline;"
                                                    >

                                                        @csrf

                                                        <button
                                                            type="submit"
                                                            class="sige-row-action"
                                                            style="background:none;border:0;padding:0;cursor:pointer;"
                                                        >
                                                            Arquivar
                                                        </button>

                                                    </form>

                                                @endif


                                                @php

                                                    $podeConsultar =
                                                        auth()->user()->papel &&
                                                        auth()->user()->papel->permissoes()->where('nome', 'consultar_expediente')->exists();

                                                    $podeTramitar =
                                                        auth()->user()->papel &&
                                                        auth()->user()->papel->permissoes()->where('nome', 'tramitar_expediente')->exists() &&
                                                        in_array($expediente->estado, ['RECEBIDO', 'EM TRAMITAÇÃO']);

                                                    $podeDespachar =
                                                        auth()->user()->papel &&
                                                        auth()->user()->papel->permissoes()->where('nome', 'registar_despacho')->exists() &&
                                                        $expediente->estado === 'AGUARDANDO DESPACHO';

                                                    $podeArquivar =
                                                        auth()->user()->papel &&
                                                        auth()->user()->papel->permissoes()->where('nome', 'arquivar_expediente')->exists() &&
                                                        $expediente->estado === 'DESPACHADO';

                                                @endphp


                                                @if (
                                                    !$podeConsultar &&
                                                    !$podeTramitar &&
                                                    !$podeDespachar &&
                                                    !$podeArquivar
                                                )

                                                    <span class="sige-no-action">
                                                        —
                                                    </span>

                                                @endif

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @endif

            </section>


        </div>

    </div>

</x-app-layout>