# SIGE — Sistema Integrado de Gestão de Expedientes

Sistema Web para Gestão de Expedientes desenvolvido no âmbito da disciplina de **Engenharia de Software**.

O SIGE permite gerir o ciclo de vida dos expedientes administrativos, desde o seu registo e tramitação até ao despacho e arquivo, utilizando **controlo de acesso baseado em papéis (RBAC)**, auditoria das operações e relatórios de consulta.

---

## 1. Sobre o Projecto

O **SIGE — Sistema Integrado de Gestão de Expedientes** foi desenvolvido com o objectivo de apoiar a gestão organizada e rastreável de expedientes administrativos.

O sistema permite:

* autenticação de utilizadores;
* controlo de acesso baseado em papéis;
* gestão de utilizadores;
* registo de expedientes;
* consulta de expedientes;
* tramitação;
* envio para despacho;
* registo de despacho;
* arquivo;
* consulta do histórico;
* auditoria das operações;
* relatórios com filtros.

O ciclo principal de um expediente é:

**RECEBIDO → EM TRAMITAÇÃO → AGUARDANDO DESPACHO → DESPACHADO → ARQUIVADO**

---

## 2. Tecnologias Utilizadas

### Backend

* PHP 8.5
* Laravel 13
* Laravel Breeze
* Eloquent ORM

### Frontend

* Blade
* HTML
* CSS
* JavaScript
* Tailwind CSS

### Base de Dados

* MySQL 8.0

### Ferramentas

* Composer
* Node.js
* NPM
* Git
* GitHub

---

## 3. Requisitos do Sistema

Antes de executar o projecto, é necessário ter instalado:

* PHP 8.5 ou superior;
* Composer;
* Node.js e NPM;
* MySQL 8.0 ou superior;
* Git.

---

## 4. Funcionalidades Principais

### 4.1 Autenticação

O sistema disponibiliza:

* início de sessão;
* encerramento de sessão;
* validação de credenciais;
* protecção das rotas;
* bloqueio de contas inactivas;
* controlo de tentativas de autenticação.

O registo público de novos utilizadores encontra-se desactivado. A criação de utilizadores é realizada pelo Administrador.

### 4.2 Gestão de Utilizadores

O Administrador pode:

* consultar utilizadores;
* criar utilizadores;
* editar utilizadores;
* atribuir papéis;
* activar contas;
* desactivar contas.

O sistema impede que um utilizador desactive a própria conta.

### 4.3 Controlo de Acesso — RBAC

O acesso às funcionalidades é controlado através de papéis e permissões.

Papéis implementados:

1. Administrador
2. Recepcionista
3. Técnico
4. Dirigente

Cada utilizador possui um papel, e cada papel possui um conjunto de permissões.

### 4.4 Gestão de Expedientes

O sistema permite:

* registar expedientes;
* consultar expedientes;
* acompanhar o estado;
* consultar histórico de tramitações;
* consultar despacho;
* acompanhar o ciclo de vida do expediente.

### 4.5 Tramitação

O Técnico pode encaminhar um expediente entre unidades ou sectores, registando:

* origem;
* destino;
* observação;
* responsável;
* data da tramitação.

Após a tramitação, o estado do expediente passa para **EM TRAMITAÇÃO**.

### 4.6 Despacho

Quando o expediente está pronto para despacho, passa para o estado:

**AGUARDANDO DESPACHO**

O Dirigente pode registar o despacho e o expediente passa para:

**DESPACHADO**

### 4.7 Arquivo

Depois de despachado, o expediente pode ser arquivado por um utilizador autorizado.

O estado passa para:

**ARQUIVADO**

### 4.8 Auditoria

As operações relevantes realizadas no sistema são registadas na tabela de auditoria.

São registadas, entre outras:

* criação de utilizadores;
* actualização de utilizadores;
* alteração do estado de utilizadores;
* registo de expedientes;
* tramitação;
* envio para despacho;
* registo de despacho;
* arquivo.

A consulta da auditoria é restrita ao Administrador.

### 4.9 Relatórios

O módulo de relatórios permite consultar expedientes utilizando filtros por:

* estado;
* tipo;
* data inicial;
* data final.

---

## 5. Matriz de Permissões

| Funcionalidade            | Administrador | Recepcionista | Técnico | Dirigente |
| ------------------------- | :-----------: | :-----------: | :-----: | :-------: |
| Iniciar sessão            |       ✓       |       ✓       |    ✓    |     ✓     |
| Gerir utilizadores        |       ✓       |       —       |    —    |     —     |
| Gerir papéis e permissões |       ✓       |       —       |    —    |     —     |
| Registar expediente       |       ✓       |       ✓       |    —    |     —     |
| Consultar expediente      |       ✓       |       ✓       |    ✓    |     ✓     |
| Tramitar expediente       |       ✓       |       —       |    ✓    |     —     |
| Consultar histórico       |       ✓       |       ✓       |    ✓    |     ✓     |
| Registar despacho         |       ✓       |       —       |    —    |     ✓     |
| Arquivar expediente       |       ✓       |       —       |    —    |     ✓     |
| Consultar auditoria       |       ✓       |       —       |    —    |     —     |
| Consultar relatórios      |       ✓       |       ✓       |    ✓    |     ✓     |

---

## 6. Estrutura do Projecto

A aplicação segue uma arquitectura baseada no framework Laravel:

```text
sige/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Requests/
│   ├── Models/
│   └── Services/
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│
├── routes/
│   ├── auth.php
│   ├── console.php
│   └── web.php
│
├── tests/
├── public/
├── config/
├── bootstrap/
├── composer.json
├── package.json
└── README.md
```

---

## 7. Modelo de Dados

As principais entidades implementadas são:

* `users`
* `papeis`
* `permissoes`
* `papel_permissao`
* `expedientes`
* `tramitacoes`
* `despachos`
* `auditorias`

Relacionamentos principais:

* Um papel pode estar associado a vários utilizadores;
* Um papel pode possuir várias permissões;
* Uma permissão pode pertencer a vários papéis;
* Um expediente pode possuir várias tramitações;
* Um expediente pode possuir um despacho;
* Um utilizador pode criar vários expedientes;
* Um utilizador pode realizar várias tramitações;
* Um utilizador pode realizar vários despachos;
* Um utilizador pode gerar vários registos de auditoria.

---

## 8. Instalação

### 8.1 Clonar o projecto

```bash
git clone <LINK_DO_REPOSITORIO_GITHUB>
cd sige
```

### 8.2 Instalar dependências PHP

```bash
composer install
```

### 8.3 Instalar dependências JavaScript

```bash
npm install
```

### 8.4 Criar o ficheiro de ambiente

No Windows:

```powershell
Copy-Item .env.example .env
```

No Linux/macOS:

```bash
cp .env.example .env
```

### 8.5 Gerar a chave da aplicação

```bash
php artisan key:generate
```

### 8.6 Configurar a base de dados

No ficheiro `.env`, configurar os dados da base de dados:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sige
DB_USERNAME=root
DB_PASSWORD=
```

A senha deve corresponder à configuração local do MySQL.

### 8.7 Criar a base de dados

No MySQL:

```sql
CREATE DATABASE sige CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 8.8 Executar as migrations e seeders

```bash
php artisan migrate --seed
```

Este comando cria as tabelas e os papéis e permissões iniciais do sistema.

### 8.9 Compilar os recursos frontend

```bash
npm run build
```

### 8.10 Iniciar o servidor

```bash
php artisan serve
```

Por padrão, a aplicação estará disponível em:

```text
http://127.0.0.1:8000
```

---

## 9. Papéis Iniciais

O sistema possui quatro papéis principais:

### Administrador

Responsável pela administração do sistema, gestão de utilizadores, consulta da auditoria e acesso às funcionalidades autorizadas.

### Recepcionista

Responsável pelo registo e consulta de expedientes.

### Técnico

Responsável pela tramitação dos expedientes.

### Dirigente

Responsável pelo despacho e arquivo dos expedientes.

---

## 10. Segurança

O SIGE utiliza mecanismos de segurança fornecidos pelo Laravel e mecanismos próprios da aplicação, incluindo:

* autenticação;
* sessões;
* protecção de rotas;
* controlo de permissões;
* validação de dados;
* passwords armazenadas através de hashing;
* bloqueio de utilizadores inactivos;
* protecção contra acesso não autorizado;
* auditoria das operações relevantes.

O ficheiro `.env` não deve ser publicado no repositório, pois contém configurações específicas do ambiente local.

---

## 11. Testes Realizados

Durante o desenvolvimento foram realizados testes funcionais dos principais módulos, incluindo:

* autenticação;
* bloqueio de utilizador inactivo;
* gestão de utilizadores;
* controlo de acesso por papel;
* registo de expediente;
* tramitação;
* envio para despacho;
* registo de despacho;
* arquivo;
* consulta do histórico;
* auditoria;
* relatórios;
* restrição de acesso a funcionalidades não autorizadas.

Também foi verificado o ciclo completo de um expediente:

```text
RECEBIDO
   ↓
EM TRAMITAÇÃO
   ↓
AGUARDANDO DESPACHO
   ↓
DESPACHADO
   ↓
ARQUIVADO
```

---

## 12. Metodologia de Desenvolvimento

O desenvolvimento foi realizado de forma incremental, seguindo etapas de:

1. levantamento e análise dos requisitos;
2. definição dos actores e casos de uso;
3. modelação UML;
4. modelação da base de dados;
5. implementação;
6. implementação do RBAC;
7. testes funcionais;
8. documentação;
9. preparação do repositório Git/GitHub.

---

## 13. Documentação Académica

A documentação técnica do projecto contempla:

* Introdução;
* Objectivo geral;
* Objectivos específicos;
* Metodologia de Desenvolvimento de Software;
* Requisitos funcionais;
* Requisitos não funcionais;
* Diagrama de Casos de Uso;
* Diagrama de Classes;
* Diagrama de Actividades;
* Diagrama de Sequência;
* Modelo Entidade-Relacionamento;
* descrição da implementação;
* controlo de acesso RBAC;
* testes realizados.

---

## 14. Integrantes do Grupo

**Estudante 1:** Amisse Ruicho Chale

**Estudante 2:** [A preencher]

---

## 15. Repositório

Repositório público do projecto:

**[A preencher após publicação no GitHub]**

---

## 16. Estado do Projecto

O sistema encontra-se implementado com os principais módulos funcionais previstos no enunciado:

* [x] Autenticação
* [x] Gestão de utilizadores
* [x] RBAC
* [x] Gestão de expedientes
* [x] Tramitação
* [x] Despacho
* [x] Arquivo
* [x] Histórico
* [x] Auditoria
* [x] Relatórios
* [x] Base de dados MySQL
* [x] Testes funcionais
* [x] Versionamento com Git

A publicação do repositório no GitHub e a documentação académica final serão concluídas nas etapas seguintes.

---

## 17. Licença

Projecto académico desenvolvido para fins educacionais no âmbito da disciplina de Engenharia de Software.
