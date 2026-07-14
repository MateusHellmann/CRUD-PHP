<?php
session_start();
require 'conexao.php';

if (isset($_POST['create_usuario'])) {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $dataNasc = trim($_POST['data_nascimento']);
    $senha = isset($_POST['senha']) ? password_hash(trim($_POST['senha']), PASSWORD_DEFAULT) : '';

    $stmt = $conn->prepare("
        INSERT INTO usuarios
        (nome, email, data_nascimento, senha)
        VALUES
        (:nome, :email, :data_nascimento, :senha)
    ");
    $stmt->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':data_nascimento' => $dataNasc,
        ':senha' => $senha
    ]);

    $count = $stmt->rowCount();

    if ($count > 0) {
        $_SESSION['mensagem'] = 'Usuário criado com sucesso.';
        header('Location: index.php');
        exit;
        } else {
        $_SESSION['mensagem'] = 'Falha ao criar usuário.';
        header('Location: index.php');
        exit;
    }
}
