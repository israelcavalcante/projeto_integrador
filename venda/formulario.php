<?php
include_once ('venda.php');
include_once ('../cliente/cliente.php');
include_once ('../pedido/pedido.php');

include_once ('../cabecalho.php');

$vendas = new venda();

if (!empty($_GET['id_venda'])){
    $vendas->carregarPorId($_GET['id_venda']);
}
?>

    <h1 class="text-center">Venda</h1>
    <br>
    <form class="form-horizontal" method="post" action="processamento.php?acao=salvar">
        <input type="hidden" name="id_venda" value="<?=$vendas->getIdvenda()?>">
        <div class="form-group">
            <label for="data_venda" class="col-sm-2 control-label">Data Venda</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="data_venda" name="data_venda" value="<?=$vendas->getDataVenda()?>">
            </div>
        </div>
        <div class="form-group">
            <label for="valorbruto_venda" class="col-sm-2 control-label">Valor venda</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="valorbruto_venda" name="valorbruto_venda" value="<?=$vendas->getValorbrutoVenda()?>">
            </div>
        </div>
        <div class="form-group">
            <label for="id_pedido" class="col-sm-2 control-label">Pedido</label>
            <div class="col-sm-10">
                <select class="form-control" id="id_pedido" name="id_pedido">
                    <option value="">Selecione</option>
                    <?php
                    $id_pedidos = new pedido();
                    $results = $id_pedidos->recuperarDados();
                    foreach ($results as $key=>$value){
                        $checked = (($value['id_pedido'] == $vendas->getIdPedido())?'selected' : '');
                        echo "<option $checked value='{$value['id_pedido']}'> {$value['id_pedido']} - {$value['id_pedido']}</option>";
                    }
                    ?>
                </select>

            </div>
        </div>

            <div class="form-group">

                <label for="id_cliente" class="col-sm-2 control-label">Cliente</label>
                <div class="col-sm-10">

                    <select class="form-control" id="id_cliente" name="id_cliente">
                        <option value="">Selecione</option>
                        <?php
                        $clientes = new cliente();
                        $results = $clientes->recuperarDados();
                        foreach ($results as $key=>$value){
                            $checked = (($value['id_cliente'] == $vendas->getIdCliente())?'selected' : '');
                            echo "<option $checked value='{$value['id_cliente']}'> {$value['id_cliente']} - {$value['nome']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn <?=((!empty($_GET['id_venda']))?'btn-primary':'btn-warning')?>"><span class='glyphicon <?=((!empty($_GET['id_venda']))?'glyphicon-pencil':'glyphicon-edit')?>'></span><?=((!empty($_GET['id_venda']))?' Alterar':' Inserir')?></button>
                <a class="btn btn-success" href="index.php"><span class='glyphicon glyphicon-arrow-left'></span> Voltar</a>
            </div>
        </div>
    </form>

<?php
include_once ('../rodape.php');
?>