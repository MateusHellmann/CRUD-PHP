<?php
session_start();
require 'conexao.php';

if (isset($_POST['create_usuario'])) {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $dataNasc = trim($_POST['data_nascimento']);
    $senha = isset($_POST['senha']) ? password_hash(trim($_POST['senha']), PASSWORD_DEFAULT) : '';

    $sql = "INSERT INTO usuarios (nome, email, data_nascimento, senha) VALUES ('$nome', '$email', '$dataNasc', '$senha')";
    $conn->exec($sql);
}
