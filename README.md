# ACME
#  Projeto ACME Digital - Testes Automatizados com Selenium

Sistema de Login e Cadastro com validações de segurança (XSS, campos vazios) e testes automatizados usando Selenium WebDriver. Desenvolvido para a disciplina de Testes de Software.

---

##  Índice

- Sobre o Projeto
- Tecnologias Utilizadas
  Problemas Encontrados e Correções
  - Erro 404 no process_login.php
  - CSS não carregava
  - Erro de JSON no fetch
  - SweetAlert não funcionava
  Pré-requisitos
- Instalação e Configuração
  - 1. Configurar o XAMPP
  - 2. Configurar o Banco de Dados
  - 3. Estrutura de Pastas
  - 4. Configurar o Selenium
- Como Executar o Sistema
- Como Executar os Testes Automatizados
- Credenciais de Teste
- Evidências dos Testes
- Autor


## Sobre o Projeto

Este projeto consiste em um sistema web de **Login** e **Cadastro** com as seguintes funcionalidades:

-  Validação de campos vazios (frontend e backend)
-  roteção contra **XSS** (Cross-Site Scripting)
-  Feedback visual com **SweetAlert2**
-  Sessão de usuário com **Dashboard** de boas-vindas
-  Testes automatizados com **Selenium WebDriver** (JavaScript)
-  Geração de relatório JSON e screenshots dos testes

---

##  Tecnologias Utilizadas

| Tecnologia | Versão | Finalidade |
|------------|--------|------------|
| **PHP** | 8.2+ | Backend, processamento de login/cadastro |
| **MySQL** | 8.0+ | Banco de dados para armazenar usuários |
| **HTML5 / CSS3** | - | Frontend com design amarelo manteiga |
| **JavaScript** | ES6 | Interações com SweetAlert e requisições AJAX |
| **SweetAlert2** | 11 | Alertas bonitos e responsivos |
| **Selenium WebDriver** | 4.0+ | Automação de testes no Chrome |
| **Node.js** | 16+ | Execução dos scripts de teste |
| **XAMPP** | 8.2.12 | Ambiente local (Apache + MySQL + PHP) |



##  Problemas Encontrados e Correções

Durante o desenvolvimento, enfrentamos alguns problemas. Abaixo estão descritos os erros e como foram resolvidos.

###  Erro 404 no process_login.php

**Problema:**  
O arquivo `backend/process_login.php` não era encontrado, resultando em erro 404 e o navegador retornava HTML em vez de JSON, causando `SyntaxError: Unexpected token '<'`.

**Causa:**  
A pasta `backend` não existia no diretório do projeto, ou o arquivo estava fora do lugar.

**Correção:**  
Criamos a pasta `backend` dentro de `C:\xampp\htdocs\projeto-selenium\` e colocamos os arquivos `process_login.php` e `process_register.php` dentro dela.

**Antes (errado):**
```
projeto-selenium/
├── process_login.php   (fora da pasta backend)
└── index.php
```

**Depois (correto):**
```
projeto-selenium/
├── backend/
│   ├── process_login.php   
│   └── process_register.php 
└── index.php
```


###  CSS não carregava

**Problema:**  
O CSS não era aplicado, e o navegador mostrava erro 404 para `style.css`.

**Causa:**  
O caminho relativo `assets/css/style.css` não funcionava porque a pasta `assets` não estava no lugar correto ou o caminho estava incorreto.

**Correção:**  
Criamos a estrutura `assets/css/` dentro da raiz do projeto e utilizamos o caminho absoluto:
```html
<link rel="stylesheet" href="/projeto-selenium/assets/css/style.css">
```
Ou mantivemos o relativo, mas garantimos que a pasta existisse.


###  Erro de JSON no fetch (SyntaxError: Unexpected token '<')

**Problema:**  
O JavaScript tentava parsear a resposta do servidor como JSON, mas o servidor retornava HTML (página de erro 404) porque o endpoint não existia.

**Causa:**  
Mesmo problema do erro 404 – o arquivo PHP não estava acessível.

**Correção:**  
Corrigimos a localização dos arquivos PHP e adicionamos logs no JavaScript para depuração.


###  SweetAlert não funcionava

**Problema:**  
A biblioteca SweetAlert não era carregada, resultando em erro `Swal is not defined`.

**Causa:**  
O script do SweetAlert era carregado **depois** do `script.js`, e a ordem de carregamento importa.

**Correção:**  
Colocamos a tag do SweetAlert **antes** do `script.js` no `<head>` ou no final do `<body>`:

```html

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="assets/js/script.js"></script>
```


##  Pré-requisitos

Antes de começar, certifique-se de ter instalado:

- **XAMPP** (com Apache, MySQL e PHP)
- **Node.js** (para executar os testes Selenium)
- **Google Chrome** (última versão)
- **Git** (opcional, para clonar o repositório)

---

##  Instalação e Configuração

### 1. Configurar o XAMPP

1. Inicie o **XAMPP Control Panel**.
2. Clique em **Start** no **Apache** e no **MySQL**.
3. Verifique se ambos estão com o status **Running** (verde).

---

### 2. Configurar o Banco de Dados

1. Acesse o phpMyAdmin: [http://localhost/phpmyadmin/](http://localhost/phpmyadmin/)
2. Clique em **Novo** e crie um banco chamado `selenium_teste`.
3. Selecione o banco e vá na aba **SQL**.
4. Execute o seguinte script:

```sql
CREATE TABLE usuarios (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Usuário de teste
INSERT INTO usuarios (nome, email, senha) VALUES 
('Administrador', 'admin@teste.com', '1234'),
('João Silva', 'joao@teste.com', '123456');
```


### 3. Estrutura de Pastas

Copie todos os arquivos do projeto para a pasta `C:\xampp\htdocs\projeto-selenium\`.

A estrutura final deve ser:

```
C:\xampp\htdocs\projeto-selenium\
│
├── assets\
│   ├── css\
│   │   └── style.css
│   └── js\
│       └── script.js
│
├── backend\
│   ├── process_login.php
│   └── process_register.php
│
├── index.php
├── cadastro.php
├── dashboard.php
├── logout.php
├── testeAutomatizado.js
├── package.json
├── package-lock.json
└── README.md
```


### 4. Configurar o Selenium

Os testes automatizados utilizam o **Selenium WebDriver** para Node.js.

#### 4.1 Instalar as dependências

Abra o terminal na pasta do projeto e execute:

```bash
npm init -y
npm install selenium-webdriver
```

#### 4.2 Baixar o ChromeDriver

1. Acesse [https://chromedriver.chromium.org/downloads](https://chromedriver.chromium.org/downloads)
2. Baixe a versão compatível com seu Google Chrome.
3. Extraia o arquivo `chromedriver.exe` e coloque-o na raiz do projeto (ou em uma pasta no PATH).

#### 4.3 Verificar a URL no arquivo de teste

No arquivo `testeAutomatizado.js`, altere a constante `TARGET_URL` para apontar para seu projeto:

```javascript
const TARGET_URL = "http://localhost/projeto-selenium/index.php";
```


## Como Executar o Sistema

1. Certifique-se de que o XAMPP está rodando (Apache e MySQL).
2. Abra o navegador e acesse:
   ```
   http://localhost/projeto-selenium/index.php
   ```
3. Faça login com as credenciais de teste:
   - **Email:** `admin@teste.com`
   - **Senha:** `1234`
4. Você será redirecionado para o Dashboard.

Para testar o cadastro, acesse:
```
http://localhost/projeto-selenium/cadastro.php
```

---

##  Como Executar os Testes Automatizados

Os testes estão definidos no arquivo `testeAutomatizado.js`. Eles executam os seguintes casos:

| Caso de Teste | Descrição |
|---------------|-----------|
| Login correto | Email e senha válidos |
| Senha incorreta | Email válido, senha errada |
| Campo email vazio | Email vazio, senha preenchida |
| Campo senha vazio | Email preenchido, senha vazia |
| Tentativa de XSS | Injeção de `<script>` no campo email |

### Para rodar:

1. Abra o terminal na pasta do projeto.
2. Execute:
   ```bash
   node testeAutomatizado.js
   ```
3. O navegador Chrome será aberto automaticamente e os testes serão executados um por um.
4. Ao final, será gerado:
   - Um arquivo `relatorio.json` com o resultado de cada teste.
   - Screenshots na pasta `assets/screenshots/`.

---

##  Credenciais de Teste

| Email | Senha |
|-------|-------|
| `admin@teste.com` | `1234` |
| `joao@teste.com`  | `123456` |

---

##  Evidências dos Testes

Os screenshots gerados pelos testes automatizados ficam salvos em:

```
assets/screenshots/
├── screenshot_Login_correto.png
├── screenshot_Senha_incorreta.png
├── screenshot_Campo_email_vazio.png
├── screenshot_Campo_senha_vazio.png
└── screenshot_Tentativa_de_XSS.png
```

O relatório em JSON pode ser aberto com qualquer editor de texto.

---

##  Autor

Desenvolvido como atividade da disciplina **Testes de Software** – Curso Técnico de Desenvolvimento de Sistemas.

**Professores:** Luis Felipe Cardoso e Lucas Machado
**Alunas:** Ana Victória Aleixo, Sophia Morgado

