<?php
session_start();
require 'conexao.php';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Usuários</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0"> <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none"> <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap"></use>
          </svg> </a> </div>
      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
        <li><a href="#" class="nav-link px-2">Features</a></li>
        <li><a href="#" class="nav-link px-2">Pricing</a></li>
        <li><a href="#" class="nav-link px-2">FAQs</a></li>
        <li><a href="#" class="nav-link px-2">About</a></li>
      </ul>
      <div class="col-md-3 text-end"> <button type="button" class="btn btn-outline-primary me-2">Login</button> <button type="button" class="btn btn-primary">Sign-up</button> </div>
    </header>
  </div>

  <div class="container mt-5">
    <?php include('mensagem.php'); ?>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>
              Lista de usuários
              <a href="usuario-create.php" class="btn btn-primary float-end">Adicionar Usuário</a>
            </h4>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Data Nascimento</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $stmt = $conn->prepare("SELECT * FROM usuarios");
                $stmt->execute();

                $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($usuarios) > 0) {
                  foreach ($usuarios as $usuario) {
                ?>
                <tr>
                  <td><?= $usuario['id'] ?></td>
                  <td><?= $usuario['nome'] ?></td>
                  <td><?= $usuario['email'] ?></td>
                  <td><?= date('d/m/Y', strtotime($usuario['data_nascimento'])) ?></td>
                  <td>
                    <a href="usuario-view.php?id=<?= $usuario['id'] ?>" class="btn btn-secondary btn-sm"><span class="bi-eye-fill"></span>&nbsp;Visualizar</a>
                    <a href="usuario-edit.php?id=<?= $usuario['id'] ?>" class="btn btn-success btn-sm"><span class="bi-pencil-fill"></span>&nbsp;Editar</a>
                    <form action="acoes.php" method="POST" class="d-inline">
                      <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="delete_usuario" value="<?= $usuario['id'] ?>" class="btn btn-danger btn-sm"><span class="bi-trash3-fill"></span>&nbsp;Excluir</button>
                    </form>
                  </td>
                </tr>
                <?php
                  }
                } else {
                  echo '<h5>Nenhum usuário encontrado</h5>';
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>