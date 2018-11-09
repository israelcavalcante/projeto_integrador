<?php
include_once ("cliente.php");
$cliente = new cliente();

$cliente = $cliente->recuperarDados();

include_once '../cabecalho.php';
?>

    <h1 class="text-center">Cliente</h1>
    <br>
    <a class="btn btn-warning" href="formulario.php"><span class='glyphicon glyphicon-edit'></span> Inserir</a>
    <br>
    <br>
    <table class="table table-bordered table-hover table-striped table-condensed">
        <tr>
            <td width="20%">Ações</td>
            <td>Id</td>
            <td>Nome</td>
            <td>RG</td>
            <td>CPF</td>
            <td>Logradouro</td>
            <td>Telefone</td>


        </tr>

        <?php foreach ($cliente as $acliente){
            echo "
            <tr>
                <td>
                    <a class='btn btn-primary' href='formulario.php?id_cliente={$acliente['id_cliente']}'><span class='glyphicon glyphicon-pencil'></span> Alterar</a>
                    <a class='btn btn-danger' href='processamento.php?acao=excluir&id_cliente={$acliente['id_cliente']}'><span class='glyphicon glyphicon-trash'></span> Excluir</a>
                </td>
                <td>{$acliente['id_cliente']}</td>
                <td>{$acliente['nome']}</td>
                <td>{$acliente['rg']}</td>
                <td>{$acliente['cpf']}</td>
                <td>{$acliente['rua']}</td>
                <td>{$acliente['telefone']}</td>
            </tr>
        ";
        } ?>

    </table>

<?php
include_once '../rodape.php';