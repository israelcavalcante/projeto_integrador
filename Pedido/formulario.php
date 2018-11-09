<?php
include_once ('../livro/livro.php');
include_once ('../pedido/pedido.php');

include_once ('../cabecalho.php');

$pedidos = new pedido();

if (!empty($_GET['id_pedido'])){
    $pedidos->carregarPorId($_GET['id_pedido']);
}
?>

    <h1 class="text-center">Pedido</h1>
    <br>
    <form class="form-horizontal" method="post" action="processamento.php?acao=salvar">
        <input type="hidden" name="id_pedido" value="<?=$pedidos->getIdPedido()?>">
        <div class="form-group">
            <label for="qtd_livro" class="col-sm-2 control-label">Quantidade de Livros</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="qtd_livro" name="qtd_livro" value="<?=$pedidos->getQtdLivro()?>">
            </div>
        </div>
        <div class="form-group">
            <label for="id_livro" class="col-sm-2 control-label">id_livro</label>
            <div class="col-sm-10">
                <select class="form-control" id="id_livro" name="id_livro">
                    <option value="">Selecione</option>
                    <?php
                    $id_livros = new livro();
                    $results = $id_livros->recuperarDados();
                    foreach ($results as $key=>$value){
                        $checked = (($value['id_livro'] == $pedidos->getIdLivro())?'selected' : '');
                        echo "<option $checked value='{$value['id_livro']}'> {$value['id_livro']} - {$value['titulo']}</option>";
                    }
                    ?>
                </select>

            </div>
        </div>



        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn <?=((!empty($_GET['id_pedido']))?'btn-primary':'btn-warning')?>"><span class='glyphicon <?=((!empty($_GET['id_pedido']))?'glyphicon-pencil':'glyphicon-edit')?>'></span><?=((!empty($_GET['id_pedido']))?' Alterar':' Inserir')?></button>
                <a class="btn btn-success" href="index.php"><span class='glyphicon glyphicon-arrow-left'></span> Voltar</a>
            </div>
        </div>
    </form>

<?php
include_once ('../rodape.php');
?>