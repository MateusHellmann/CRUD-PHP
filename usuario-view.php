<?php
require 'conexao.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Visualizar usuário
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $usuario_id = (int) $_GET['id'];
                            $stmt = $conn->prepare('SELECT * FROM usuarios WHERE id=:id');
                            $stmt->execute([':id' => $usuario_id]);

                            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                            
                            if ($usuario) {
                        ?>
                                <div class="mb-3">
                                    <label>Nome</label>
                                    <p class="form-control"><?= $usuario['nome'] ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Email</label>
                                    <p class="form-control"><?= $usuario['email'] ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Data de Nascimento</label>
                                    <p class="form-control"><?= date('d/m/Y', strtotime($usuario['data_nascimento'])) ?></p>
                                </div>
                        <?php
                            } else {
                                echo "<h5>Usuário não encontrado</h5>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>