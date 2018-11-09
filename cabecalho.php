<?php
session_start();
include_once '../usuario/Usuario.php';

$possuiAcesso = (new Usuario())->possuiAcesso();

if (!$possuiAcesso) {
    header('location: ../usuario/login.php');
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projeto Integrador</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/jquery.mask.js"></script>
    <script src="js/sweetalert2.all.js"></script>

</head>
<body>

<?php if (!empty($_SESSION['usuario'])) { ?>
<!-- Menu Superior -->
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">Projeto Integrador</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../home/index.php">Home</a></li>
                <li><a href="../pedido/index.php">Pedidos</a></li>
                <li><a href="../venda/index.php">Venda</a></li>
                <li><a href="../cliente/index.php">Clientes</a></li>
                <li><a href="../livro/index.php">Livros</a></li>
                <li><a href="../editora/index.php">Editora</a></li>
                <li><a href="../perfil/index.php">Perfil</a></li>
                <li><a href="../usuario/index.php">Usuario</a></li>
                <li><a href="../pagina/index.php">Pagina</a></li>
                <li style="color:rgba(242,248,255,0.86); padding-top: 1.1em;" class="user-name"><?= $_SESSION['usuario']['nome']; ?></li>
                <li>
                    <a href="../usuario/logof.php"><i class="glyphicon glyphicon-log-out"></i></a>
<!--                    <a style="color: #f9fffa" title="Sair" href="../usuario/processamento.php?acao=deslogar" class="fa fa-sign-out"></a>-->
                </li>

            </ul>
        </div>
    </div>
</nav>
<?php } ?>