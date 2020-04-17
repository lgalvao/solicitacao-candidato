<!DOCTYPE html>
<html>
<head>
    <title>TRE-PE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="img/tre-pe.png" width="370" height="80" class="d-inline-block align-top" alt="tre-pe">
    </a>
</nav>

<h3 class="text-center mt-3">Formulário de Regularização</h3>
<div class="container mt-4">
    <div class="alert alert-success" role="alert">
        <a href="<?= $_GET['link'].'&infra_hash='.$_GET['infra_hash']; ?>">
            Processo gerado: <?= $_GET['numero']; ?>
        </a>
    </div>
</div>
</body>
<script src="js/jquey.js"></script>
<script src="js/regra-formulario.js"></script>
</html>