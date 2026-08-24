<?php
session_start();
header('Content-Type: application/json');

// ===== SEMPRE RETORNA ERRO =====
// Não importa os dados enviados, sempre dá erro!

$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$senha = isset($_POST['senha']) ? trim($_POST['senha']) : '';

// ===== VERIFICA SE VEIO DADOS =====
if (empty($email) || empty($senha)) {
    echo json_encode([
        'status' => 'error', 
        'mensagem' => ' Preencha todos os campos!'
    ]);
    exit;
}

// ===== SEMPRE DÁ ERRO DE SENHA =====
// Mesmo que a senha esteja correta, o sistema vai dar erro!
echo json_encode([
    'mensagem' => ' Login inválido'
]);
exit;
?>