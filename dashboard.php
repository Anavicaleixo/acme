<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit;
}

$nome_usuario = $_SESSION['usuario_nome'] ?? 'Usuário';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - ACME Digital</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .card-dashboard {
            background: #fff9f0;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            padding: 40px 35px;
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }
        .welcome-box {
            background: #fefcf8;
            padding: 20px;
            border-radius: 10px;
            border-left: 4px solid #27ae60;
            margin: 20px 0;
        }
        .welcome-box h2 {
            color: #27ae60;
            font-size: 24px;
        }
        .btn-dashboard {
            display: inline-block;
            padding: 12px 25px;
            font-size: 14px;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            background: #e74c3c;
            color: #fff;
        }
        .btn-dashboard:hover {
            background: #c0392b;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card-dashboard">
            <h1>🏠 Dashboard</h1>
            <div class="welcome-box">
                <h2>✅ Bem-vindo, <?php echo htmlspecialchars($nome_usuario); ?>!</h2>
                <p>Você conseguiu logar! (Isso não deveria acontecer)</p>
            </div>
            <a href="logout.php" class="btn-dashboard">🚪 Sair</a>
        </div>
    </div>
</body>
</html>