<?php
session_start();
if (isset($_SESSION['usuario_id'])) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema ACME</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1> ACME Digital</h1>
                <p>Faça login para acessar o sistema</p>
            </div>
            
            <form id="formLogin" method="POST" action="backend/process_login.php">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
                </div>
                
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                </div>
                
                <button type="submit" id="btn-login" class="btn btn-primary">Entrar</button>
                
                <div class="form-footer">
                    <p>Não tem conta? <a href="cadastro.php">Cadastre-se</a></p>
                </div>
                
                <div id="mensagem" style="display:none;"></div>
            </form>
        </div>
    </div>
    
    <script src="assets/js/script.js"></script>
</body>
</html>