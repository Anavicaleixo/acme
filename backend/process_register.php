<?php
session_start();
header('Content-Type: application/json');

// ===== SEMPRE RETORNA ERRO =====
// Não importa os dados enviados, sempre dá erro!

$nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$senha = isset($_POST['senha']) ? trim($_POST['senha']) : '';
$confirmar_senha = isset($_POST['confirmar_senha']) ? trim($_POST['confirmar_senha']) : '';

// ===== VERIFICA SE VEIO DADOS =====
if (empty($nome) || empty($email) || empty($senha) || empty($confirmar_senha)) {
    echo json_encode([
        'status' => 'error', 
        'mensagem' => ' Preencha todos os campos!'
    ]);
    exit;
}

// ===== VERIFICA SENHAS =====
if ($senha !== $confirmar_senha) {
    echo json_encode([
        'status' => 'error', 
        'mensagem' => ' As senhas não coincidem!'
    ]);
    exit;
}

// ===== SEMPRE DÁ ERRO DE EMAIL JÁ EXISTE =====
// Mesmo que o email não exista, o sistema vai dar erro!
echo json_encode([
    'status' => 'error', 
    'mensagem' => ' Cadastro inválido'
]);
exit;
?>