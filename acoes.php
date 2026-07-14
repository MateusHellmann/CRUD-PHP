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

if (isset($_POST['update_usuario'])) {
    $usuario_id = (int) $_POST['usuario_id'];
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $dataNasc = trim($_POST['data_nascimento']);
    $senha = isset($_POST['senha']);

    $sql = "
        UPDATE usuarios SET
        nome = :nome, email = :email, data_nascimento = :data_nascimento
    ";

    $params = [
        ':nome' => $nome,
        ':email' => $email,
        ':data_nascimento' => $dataNasc,
        ':id' => $usuario_id
    ];

    if (!empty($senha)) {
        $sql .= ", senha = :senha";
        $params[':senha'] = password_hash($senha, PASSWORD_DEFAULT);
    }

    $sql .= " WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->execute($params);

    $count = $stmt->rowCount();

    if ($count > 0) {
        $_SESSION['mensagem'] = 'Usuário atualizado com sucesso.';
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Falha ao atualizar usuário.';
        header('Location: index.php');
        exit;
    }
}

if (isset($_POST['delete_usuario'])) {
    $usuario_id = (int) $_POST['delete_usuario'];

    $stmt = $conn->prepare('DELETE FROM usuarios WHERE id = :id');
    $stmt->execute([':id' => $usuario_id]);

    $afetados = $stmt->rowCount();

    if ($afetados > 0) {
        $_SESSION['mensagem'] = 'Usuário deletado com sucesso';
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Usuário não foi deletado';
        header('Location: index.php');
        exit;
    }
}
