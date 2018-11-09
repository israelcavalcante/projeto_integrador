<?php
include_once ("usuario.php");
$usuario = new usuario();

$usuario = $usuario->recuperarDados();

include_once '../cabecalho.php';
?>

    <h1 class="text-center">Usuario</h1>
    <br>
    <a class="btn btn-warning" href="formulario.php"><span class='glyphicon glyphicon-edit'></span> Inserir</a>
    <br>
    <br>
    <table class="table table-bordered table-hover table-striped table-condensed">
        <tr>
            <td width="15%">Ações</td>
            <td>Id</td>
            <td>Nome</td>
            <td>Email</td>
            <td>Perfil</td>
        </tr>

        <?php foreach ($usuario as $ausuario){
            echo "
            <tr>
                <td>
                    <a class='btn btn-primary' href='formulario.php?id_usuario={$ausuario['id_usuario']}'><span class='glyphicon glyphicon-pencil'></span> Alterar</a>
                    <a class='btn btn-danger' href='processamento.php?acao=excluir&id_usuario={$ausuario['id_usuario']}'><span class='glyphicon glyphicon-trash'></span> Excluir</a>
                </td>
                <td>{$ausuario['id_usuario']}</td>
                <td>{$ausuario['nome']}</td>
                <td>{$ausuario['email']}</td>
                <td>{$ausuario['id_perfil']}</td>               
            </tr>
        ";
        } ?>

    </table>

<?php
include_once '../rodape.php';