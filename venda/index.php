<?php
include_once ("venda.php");
$venda = new venda();

$venda = $venda->recuperarDados();

include_once '../cabecalho.php';
?>

    <h1 class="text-center">Venda</h1>
    <br>
    <a class="btn btn-warning" href="formulario.php"><span class='glyphicon glyphicon-edit'></span> Inserir</a>
    <br>
    <br>
    <table class="table table-bordered table-hover table-striped table-condensed">
        <tr>
            <td width="15%">Ações</td>
            <td>Id</td>
            <td>Data Venda</td>
            <td>Valor Bruto</td>
            <td>Pedido</td>
            <td>Cliente</td>
        </tr>

        <?php foreach ($venda as $avenda){
            echo "
            <tr>
                <td>
                    <a class='btn btn-primary' href='formulario.php?id_venda={$avenda['id_venda']}'><span class='glyphicon glyphicon-pencil'></span> Alterar</a>
                    <a class='btn btn-danger' href='processamento.php?acao=excluir&id_venda={$avenda['id_venda']}'><span class='glyphicon glyphicon-trash'></span> Excluir</a>
                </td>
                <td>{$avenda['id_venda']}</td>
                <td>{$avenda['data_venda']}</td>
                <td>{$avenda['valorbruto_venda']}</td>
                <td>{$avenda['id_pedido']}</td>
                <td>{$avenda['id_cliente']}</td>
            </tr>
        ";
        } ?>

    </table>

<?php
include_once '../rodape.php';