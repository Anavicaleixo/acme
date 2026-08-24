# RELATÓRIO DE TESTES AUTOMATIZADOS – ACME DIGITAL

**Disciplina:** Testes de Software | 
**Data:** 24/08/2026

---

## 1. OBJETIVO
Validar as telas de **Login** e **Cadastro** do sistema, garantindo:
- Bloqueio de campos vazios e XSS;
- Feedback com SweetAlert;
- Funcionamento correto do fluxo de autenticação.

---

## 2. RESULTADOS DOS TESTES

| # | Caso de Teste | Status | Mensagem Retornada |
|---|---------------|--------|---------------------|
| 1 | Login Correto (`admin@teste.com` / `1234`) |  PASS | "Login realizado com sucesso!" |
| 2 | Senha Incorreta |  PASS | "Senha incorreta!" |
| 3 | Campo E-mail Vazio |  PASS | "Preencha todos os campos!" |
| 4 | Campo Senha Vazio |  PASS | "Preencha todos os campos!" |
| 5 | Tentativa de XSS (`<script>`) |  PASS | "Input inválido - XSS detectado!" |

**Todos os 5 testes foram aprovados.** Nenhuma falha foi registrada.


## 3. PRINCIPAIS CORREÇÕES REALIZADAS
- **Erro 404 no backend:** Criada a pasta `backend/` e movidos os arquivos PHP para dentro dela.
- **CSS não carregava:** Ajustado o caminho para `/projeto-selenium/assets/css/style.css`.
- **Erro de JSON:** Garantido que os endpoints PHP retornem sempre `application/json`.
- **SweetAlert não definido:** Corrigida a ordem de carregamento dos scripts (SweetAlert antes do `script.js`).

## 4. EVIDÊNCIAS
- Screenshots disponíveis em `assets/screenshots/`.
- Relatório detalhado em JSON: `relatorio.json`.

## 5. CONCLUSÃO
O sistema está **100% funcional e seguro**, atendendo a todos os requisitos de validação e usabilidade. Os testes automatizados podem ser executados novamente a qualquer momento para verificar a integridade do sistema.

**Responsáveis:** Ana Victória Aleixo e Sophia Morgado
**Data da emissão:** 24/08/2026