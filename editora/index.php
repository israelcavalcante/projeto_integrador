<?php
include_once ("editora.php");
$editora = new editora();

$editora = $editora->recuperarDados();

include_once '../cabecalho.php';
?>

    <h1 class="text-center">Editora</h1>
    <br>
    <a class="btn btn-warning" href="formulario.php"><span class='glyphicon glyphicon-edit'></span> Inserir</a>
    <br>
    <br>
    <table class="table table-bordered table-hover table-striped table-condensed">
        <tr>
            <td width="15%">Ações</td>
            <td>Id</td>
            <td>Nome</td>
            <td>CNPJ</td>
            <td>Endereco</td>
            <td>Telefone</td>
            <td>E-mail</td>
        </tr>

        <?php foreach ($editora as $aeditora){
            echo "
            <tr>
                <td>
                    <a class='btn btn-primary' href='formulario.php?id_editora={$aeditora['id_editora']}'><span class='glyphicon glyphicon-pencil'></span> Alterar</a>
                    <a class='btn btn-danger' href='processamento.php?acao=excluir&id_editora={$aeditora['id_editora']}'><span class='glyphicon glyphicon-trash'></span> Excluir</a>
                </td>
                <td>{$aeditora['id_editora']}</td>
                <td>{$aeditora['nome_fantasia']}</td>
                <td>{$aeditora['cnpj']}</td>
                <td>{$aeditora['rua']}</td>
                <td>{$aeditora['telefone']}</td>
                <td>{$aeditora['email']}</td>
            </tr>
        ";
        } ?>

    </table>

<?php
include_once '../rodape.php';