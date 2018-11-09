<?php
include_once ("pedido.php");

$pedido = new pedido();

$pedido = $pedido->recuperarDados();

include_once '../cabecalho.php';
?>

    <h1 class="text-center">Pedido</h1>
    <br>
    <a class="btn btn-warning" href="formulario.php"><span class='glyphicon glyphicon-edit'></span> Inserir</a>
    <br>
    <br>
    <table class="table table-bordered table-hover table-striped table-condensed">
        <tr>
            <td width="15%">Ações</td>
            <td>Id</td>
            <td>Quantidade de Livros</td>
            <td>Id Livros</td>
        </tr>

        <?php foreach ($pedido as $apedido){
            echo "
            <tr>
                <td>
                    <a class='btn btn-primary' href='formulario.php?id_pedido={$apedido['id_pedido']}'><span class='glyphicon glyphicon-pencil'></span> Alterar</a>
                    <a class='btn btn-danger' href='processamento.php?acao=excluir&id_pedido={$apedido['id_pedido']}'><span class='glyphicon glyphicon-trash'></span> Excluir</a>
                </td>
                <td>{$apedido['id_pedido']}</td>
                <td>{$apedido['qtd_livro']}</td>
                <td>{$apedido['id_livro']}</td>
                
            </tr>
        ";
        } ?>

    </table>

<?php
include_once '../rodape.php';