<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIGE — Sistema Integrado de Gestão de Expedientes</title>

    <style>
        :root {
            --primary: #173b70;
            --primary-dark: #102b52;
            --secondary: #0f766e;
            --accent: #2563eb;
            --text: #172033;
            --muted: #667085;
            --light: #f5f8fc;
            --white: #ffffff;
            --border: #e5eaf1;
            --shadow: 0 18px 45px rgba(23, 59, 112, 0.10);
            --radius: 18px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family:
                Inter,
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;
            background:
                radial-gradient(circle at 10% 10%, rgba(37, 99, 235, 0.08), transparent 28%),
                radial-gradient(circle at 90% 15%, rgba(15, 118, 110, 0.07), transparent 26%),
                #f8fafc;
            color: var(--text);
            min-height: 100vh;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .page {
            overflow: hidden;
        }

        /* =========================
           HEADER
        ========================== */

        .header {
            width: 100%;
            position: relative;
            z-index: 10;
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(229, 234, 241, 0.8);
        }

        .header-inner {
            width: min(1180px, calc(100% - 40px));
            margin: 0 auto;
            min-height: 76px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            width: 44px;
            height: 44px;
            border-radius: 13px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            display: grid;
            place-items: center;
            color: white;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.22);
        }

        .brand-icon svg {
            width: 24px;
            height: 24px;
        }

        .brand-text strong {
            display: block;
            font-size: 20px;
            line-height: 1.1;
            letter-spacing: -0.4px;
            color: var(--primary-dark);
        }

        .brand-text span {
            display: block;
            font-size: 11px;
            color: var(--muted);
            margin-top: 3px;
        }

        .header-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 18px;
            border-radius: 10px;
            background: var(--primary);
            color: white;
            font-size: 14px;
            font-weight: 700;
            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;
        }

        .header-action:hover {
            transform: translateY(-2px);
            background: var(--primary-dark);
            box-shadow: 0 8px 20px rgba(23, 59, 112, 0.20);
        }

        /* =========================
           HERO
        ========================== */

        .hero {
            position: relative;
            padding: 86px 0 72px;
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 360px;
            height: 360px;
            border-radius: 50%;
            background: rgba(37, 99, 235, 0.07);
            top: -120px;
            right: -120px;
            filter: blur(2px);
            pointer-events: none;
        }

        .hero-inner {
            width: min(1180px, calc(100% - 40px));
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.08fr 0.92fr;
            align-items: center;
            gap: 70px;
        }

        .hero-content {
            animation: fadeUp 0.7s ease both;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 12px;
            border-radius: 999px;
            background: rgba(37, 99, 235, 0.08);
            border: 1px solid rgba(37, 99, 235, 0.12);
            color: var(--accent);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.2px;
            margin-bottom: 20px;
        }

        .badge-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--secondary);
            box-shadow: 0 0 0 4px rgba(15, 118, 110, 0.10);
        }

        .hero h1 {
            max-width: 700px;
            font-size: clamp(40px, 5vw, 65px);
            line-height: 1.05;
            letter-spacing: -2.5px;
            color: var(--primary-dark);
            margin-bottom: 22px;
        }

        .hero h1 span {
            color: var(--accent);
        }

        .hero-description {
            max-width: 650px;
            font-size: 17px;
            color: var(--muted);
            margin-bottom: 30px;
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            min-height: 46px;
            padding: 11px 18px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 750;
            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            box-shadow: 0 10px 24px rgba(23, 59, 112, 0.16);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            background: var(--primary-dark);
            box-shadow: 0 14px 28px rgba(23, 59, 112, 0.22);
        }

        .btn-secondary {
            background: white;
            color: var(--primary);
            border: 1px solid var(--border);
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            border-color: #cbd5e1;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.08);
        }

        /* =========================
           HERO VISUAL
        ========================== */

        .hero-visual {
            animation: fadeUp 0.8s 0.1s ease both;
            position: relative;
        }

        .dashboard-card {
            background: rgba(255, 255, 255, 0.94);
            border: 1px solid rgba(229, 234, 241, 0.95);
            border-radius: 22px;
            padding: 20px;
            box-shadow: var(--shadow);
            transform: rotate(1deg);
            transition: transform 0.35s ease;
        }

        .dashboard-card:hover {
            transform: rotate(0deg) translateY(-4px);
        }

        .dashboard-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .dashboard-title strong {
            display: block;
            color: var(--primary-dark);
            font-size: 15px;
        }

        .dashboard-title span {
            font-size: 11px;
            color: var(--muted);
        }

        .status {
            padding: 5px 9px;
            border-radius: 999px;
            background: #ecfdf3;
            color: #047857;
            font-size: 10px;
            font-weight: 800;
        }

        .mini-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-bottom: 14px;
        }

        .mini-stat {
            padding: 15px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: #fbfcfe;
        }

        .mini-stat small {
            display: block;
            color: var(--muted);
            font-size: 10px;
            margin-bottom: 3px;
        }

        .mini-stat strong {
            color: var(--primary-dark);
            font-size: 22px;
        }

        .flow-preview {
            padding: 17px;
            border-radius: 15px;
            background: linear-gradient(135deg, #f1f5ff, #f0fdfa);
            border: 1px solid #e2e8f0;
        }

        .flow-preview-title {
            font-size: 11px;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 13px;
        }

        .flow-line {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .flow-item {
            flex: 1;
            min-width: 0;
            text-align: center;
        }

        .flow-circle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            margin: 0 auto 6px;
            background: white;
            border: 1px solid #dbe3ef;
            color: var(--accent);
            font-size: 11px;
            font-weight: 800;
        }

        .flow-item span {
            display: block;
            color: var(--muted);
            font-size: 9px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .flow-arrow {
            color: #94a3b8;
            font-size: 12px;
            margin-top: -17px;
        }

        /* =========================
           SECTION
        ========================== */

        .section {
            padding: 78px 0;
        }

        .section-inner {
            width: min(1180px, calc(100% - 40px));
            margin: 0 auto;
        }

        .section-heading {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 42px;
        }

        .section-heading .eyebrow {
            display: inline-block;
            color: var(--secondary);
            text-transform: uppercase;
            letter-spacing: 1.3px;
            font-size: 11px;
            font-weight: 850;
            margin-bottom: 10px;
        }

        .section-heading h2 {
            color: var(--primary-dark);
            font-size: clamp(28px, 4vw, 40px);
            line-height: 1.15;
            letter-spacing: -1px;
            margin-bottom: 12px;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 15px;
        }

        /* =========================
           FEATURES
        ========================== */

        .features {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        .feature {
            background: white;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 24px;
            box-shadow: 0 8px 28px rgba(15, 23, 42, 0.04);
            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease,
                border-color 0.25s ease;
            animation: fadeUp 0.7s ease both;
        }

        .feature:nth-child(2) {
            animation-delay: 0.08s;
        }

        .feature:nth-child(3) {
            animation-delay: 0.16s;
        }

        .feature:nth-child(4) {
            animation-delay: 0.24s;
        }

        .feature:hover {
            transform: translateY(-6px);
            border-color: #d5deeb;
            box-shadow: 0 16px 34px rgba(15, 23, 42, 0.08);
        }

        .feature-icon {
            width: 45px;
            height: 45px;
            border-radius: 13px;
            display: grid;
            place-items: center;
            background: #eff4ff;
            color: var(--accent);
            margin-bottom: 18px;
        }

        .feature-icon svg {
            width: 22px;
            height: 22px;
        }

        .feature h3 {
            font-size: 16px;
            color: var(--primary-dark);
            margin-bottom: 8px;
        }

        .feature p {
            font-size: 13px;
            color: var(--muted);
        }

        /* =========================
           PROCESS
        ========================== */

        .process-section {
            background: white;
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
        }

        .process {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .process-item {
            position: relative;
            text-align: center;
            padding: 12px;
        }

        .process-number {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            margin: 0 auto 15px;
            display: grid;
            place-items: center;
            background: var(--primary);
            color: white;
            font-size: 14px;
            font-weight: 800;
            box-shadow: 0 8px 18px rgba(23, 59, 112, 0.18);
        }

        .process-item h3 {
            font-size: 16px;
            color: var(--primary-dark);
            margin-bottom: 5px;
        }

        .process-item p {
            font-size: 12px;
            color: var(--muted);
        }

        .process-item:not(:last-child)::after {
            content: "→";
            position: absolute;
            right: -15px;
            top: 22px;
            color: #94a3b8;
            font-size: 20px;
            font-weight: 700;
        }

        /* =========================
           CTA
        ========================== */

        .cta {
            padding: 78px 0;
        }

        .cta-card {
            width: min(1180px, calc(100% - 40px));
            margin: 0 auto;
            padding: 45px;
            border-radius: 24px;
            background:
                radial-gradient(circle at 90% 20%, rgba(255,255,255,0.12), transparent 28%),
                linear-gradient(135deg, var(--primary-dark), var(--primary));
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            box-shadow: 0 20px 45px rgba(16, 43, 82, 0.20);
        }

        .cta-card h2 {
            font-size: clamp(24px, 3vw, 34px);
            line-height: 1.15;
            margin-bottom: 8px;
        }

        .cta-card p {
            color: rgba(255,255,255,0.78);
            font-size: 14px;
            max-width: 650px;
        }

        .cta-button {
            flex-shrink: 0;
            background: white;
            color: var(--primary-dark);
            padding: 12px 19px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 800;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(0,0,0,0.15);
        }

        /* =========================
           FOOTER
        ========================== */

        .footer {
            background: #0c1f3b;
            color: white;
            padding: 28px 0;
        }

        .footer-inner {
            width: min(1180px, calc(100% - 40px));
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .footer-brand strong {
            display: block;
            font-size: 15px;
        }

        .footer-brand span {
            color: rgba(255,255,255,0.58);
            font-size: 11px;
        }

        .footer-copy {
            color: rgba(255,255,255,0.52);
            font-size: 11px;
            text-align: right;
        }

        /* =========================
           ANIMATIONS
        ========================== */

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(18px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                scroll-behavior: auto !important;
                transition-duration: 0.01ms !important;
            }
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 980px) {
            .hero-inner {
                grid-template-columns: 1fr;
                gap: 45px;
            }

            .hero-content {
                text-align: center;
            }

            .hero-description {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-visual {
                max-width: 620px;
                width: 100%;
                margin: 0 auto;
            }

            .features {
                grid-template-columns: repeat(2, 1fr);
            }

            .process {
                grid-template-columns: repeat(2, 1fr);
                row-gap: 35px;
            }

            .process-item:nth-child(2)::after {
                display: none;
            }
        }

        @media (max-width: 640px) {
            .header-inner {
                width: min(100% - 24px, 1180px);
                min-height: 68px;
            }

            .brand-text span {
                display: none;
            }

            .brand-text strong {
                font-size: 18px;
            }

            .brand-icon {
                width: 40px;
                height: 40px;
            }

            .header-action {
                padding: 9px 13px;
                font-size: 12px;
            }

            .hero {
                padding: 60px 0 55px;
            }

            .hero-inner,
            .section-inner,
            .cta-card,
            .footer-inner {
                width: min(100% - 24px, 1180px);
            }

            .hero h1 {
                font-size: 39px;
                letter-spacing: -1.6px;
            }

            .hero-description {
                font-size: 15px;
            }

            .dashboard-card {
                padding: 15px;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .process {
                grid-template-columns: 1fr;
            }

            .process-item:not(:last-child)::after {
                display: none;
            }

            .cta {
                padding: 55px 0;
            }

            .cta-card {
                padding: 30px 24px;
                flex-direction: column;
                align-items: flex-start;
            }

            .footer-inner {
                flex-direction: column;
                align-items: flex-start;
            }

            .footer-copy {
                text-align: left;
            }
        }
    </style>
</head>

<body>
<div class="page">

    <!-- HEADER -->
    <header class="header">
        <div class="header-inner">

            <a href="{{ url('/') }}" class="brand">
                <div class="brand-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M6 3.5h8l4 4V20a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V4.5a1 1 0 0 1 1-1Z"/>
                        <path d="M14 3.5V8h4"/>
                        <path d="M8 12h8M8 16h6"/>
                    </svg>
                </div>

                <div class="brand-text">
                    <strong>SIGE</strong>
                    <span>Sistema Integrado de Gestão de Expedientes</span>
                </div>
            </a>

            @auth
                <a href="{{ route('dashboard') }}" class="header-action">
                    Abrir painel
                </a>
            @else
                <a href="{{ route('login') }}" class="header-action">
                    Entrar no sistema
                </a>
            @endauth

        </div>
    </header>


    <!-- HERO -->
    <main>

        <section class="hero">
            <div class="hero-inner">

                <div class="hero-content">

                    <div class="badge">
                        <span class="badge-dot"></span>
                        Gestão administrativa integrada
                    </div>

                    <h1>
                        Organize.
                        <span>Tramite.</span>
                        Decida.
                        Arquive.
                    </h1>

                    <p class="hero-description">
                        O SIGE centraliza a gestão de expedientes, acompanha
                        cada etapa do processo administrativo e garante
                        controlo de acesso, rastreabilidade e organização
                        das informações.
                    </p>

                    <div class="hero-buttons">

                        @auth
                            <a href="{{ route('dashboard') }}" class="btn btn-primary">
                                Aceder ao painel
                                <span>→</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">
                                Entrar no sistema
                                <span>→</span>
                            </a>
                        @endauth

                        <a href="#funcionalidades" class="btn btn-secondary">
                            Conhecer o SIGE
                        </a>

                    </div>
                </div>


                <!-- VISUAL DO SISTEMA -->
                <div class="hero-visual">

                    <div class="dashboard-card">

                        <div class="dashboard-top">

                            <div class="dashboard-title">
                                <strong>Painel de controlo</strong>
                                <span>Gestão de expedientes</span>
                            </div>

                            <span class="status">
                                SISTEMA ACTIVO
                            </span>

                        </div>


                        <div class="mini-stats">

                            <div class="mini-stat">
                                <small>Expedientes</small>
                                <strong>24</strong>
                            </div>

                            <div class="mini-stat">
                                <small>Em tramitação</small>
                                <strong>08</strong>
                            </div>

                            <div class="mini-stat">
                                <small>Aguardam despacho</small>
                                <strong>05</strong>
                            </div>

                            <div class="mini-stat">
                                <small>Arquivados</small>
                                <strong>11</strong>
                            </div>

                        </div>


                        <div class="flow-preview">

                            <div class="flow-preview-title">
                                FLUXO DO EXPEDIENTE
                            </div>

                            <div class="flow-line">

                                <div class="flow-item">
                                    <div class="flow-circle">01</div>
                                    <span>Entrada</span>
                                </div>

                                <div class="flow-arrow">→</div>

                                <div class="flow-item">
                                    <div class="flow-circle">02</div>
                                    <span>Tramitação</span>
                                </div>

                                <div class="flow-arrow">→</div>

                                <div class="flow-item">
                                    <div class="flow-circle">03</div>
                                    <span>Despacho</span>
                                </div>

                                <div class="flow-arrow">→</div>

                                <div class="flow-item">
                                    <div class="flow-circle">04</div>
                                    <span>Arquivo</span>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </section>


        <!-- FUNCIONALIDADES -->
        <section class="section" id="funcionalidades">

            <div class="section-inner">

                <div class="section-heading">

                    <span class="eyebrow">
                        Funcionalidades
                    </span>

                    <h2>
                        Uma plataforma para organizar todo o ciclo administrativo
                    </h2>

                    <p>
                        O SIGE reúne os principais recursos necessários para
                        controlar expedientes com segurança e transparência.
                    </p>

                </div>


                <div class="features">

                    <article class="feature">

                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M6 3.5h8l4 4V20a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V4.5a1 1 0 0 1 1-1Z"/>
                                <path d="M14 3.5V8h4"/>
                                <path d="M8 12h8M8 16h6"/>
                            </svg>
                        </div>

                        <h3>Gestão de Expedientes</h3>

                        <p>
                            Registo, consulta e acompanhamento dos
                            expedientes durante o seu ciclo administrativo.
                        </p>

                    </article>


                    <article class="feature">

                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M5 12h13"/>
                                <path d="m14 8 4 4-4 4"/>
                                <path d="M5 6h5M5 18h5"/>
                            </svg>
                        </div>

                        <h3>Tramitação</h3>

                        <p>
                            Registo dos encaminhamentos e acompanhamento
                            do percurso de cada expediente.
                        </p>

                    </article>


                    <article class="feature">

                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <circle cx="12" cy="8" r="3"/>
                                <path d="M5 20a7 7 0 0 1 14 0"/>
                            </svg>
                        </div>

                        <h3>Controlo de Acesso</h3>

                        <p>
                            Permissões organizadas por papéis para garantir
                            que cada utilizador aceda apenas às funções autorizadas.
                        </p>

                    </article>


                    <article class="feature">

                        <div class="feature-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M4 19V5"/>
                                <path d="M4 19h16"/>
                                <path d="m7 15 3-4 3 2 5-6"/>
                            </svg>
                        </div>

                        <h3>Auditoria e Relatórios</h3>

                        <p>
                            Registo das operações relevantes e disponibilização
                            de informações para acompanhamento e controlo.
                        </p>

                    </article>

                </div>

            </div>

        </section>


        <!-- FLUXO -->
        <section class="section process-section">

            <div class="section-inner">

                <div class="section-heading">

                    <span class="eyebrow">
                        Ciclo do expediente
                    </span>

                    <h2>
                        Do recebimento ao arquivo
                    </h2>

                    <p>
                        O fluxo do SIGE acompanha as principais fases
                        do tratamento administrativo do expediente.
                    </p>

                </div>


                <div class="process">

                    <div class="process-item">

                        <div class="process-number">
                            01
                        </div>

                        <h3>Entrada</h3>

                        <p>
                            Registo do expediente no sistema.
                        </p>

                    </div>


                    <div class="process-item">

                        <div class="process-number">
                            02
                        </div>

                        <h3>Tramitação</h3>

                        <p>
                            Encaminhamento e acompanhamento.
                        </p>

                    </div>


                    <div class="process-item">

                        <div class="process-number">
                            03
                        </div>

                        <h3>Despacho</h3>

                        <p>
                            Registo da decisão responsável.
                        </p>

                    </div>


                    <div class="process-item">

                        <div class="process-number">
                            04
                        </div>

                        <h3>Arquivo</h3>

                        <p>
                            Encerramento e preservação do expediente.
                        </p>

                    </div>

                </div>

            </div>

        </section>


        <!-- CTA -->
        <section class="cta">

            <div class="cta-card">

                <div>
                    <h2>
                        Gestão mais organizada e rastreável.
                    </h2>

                    <p>
                        Utilize o SIGE para acompanhar os expedientes,
                        controlar responsabilidades e melhorar a circulação
                        das informações administrativas.
                    </p>
                </div>

                @auth
                    <a href="{{ route('dashboard') }}" class="cta-button">
                        Abrir painel
                    </a>
                @else
                    <a href="{{ route('login') }}" class="cta-button">
                        Entrar no sistema
                    </a>
                @endauth

            </div>

        </section>

    </main>


    <!-- FOOTER -->
    <footer class="footer">

        <div class="footer-inner">

            <div class="footer-brand">
                <strong>SIGE</strong>
                <span>Sistema Integrado de Gestão de Expedientes</span>
            </div>

            <div class="footer-copy">
                Sistema de gestão administrativa e documental
            </div>

        </div>

    </footer>

</div>
</body>
</html>