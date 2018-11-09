<?php
include_once("pedido.php");

$pedido = new pedido();

switch ($_GET['acao']){
    case 'salvar':
        if (!empty($_POST['id_pedido'])){
            // Método para alterar dados no banco
            $pedido->alterar($_POST);
        } else {
            // Método para inserir dados no banco
            $pedido->inserir($_POST);
        }
        break;
    case 'excluir':
        // Método para deletar dados no banco
        $pedido->excluir($_GET['id_pedido']);
        break;
}

// Redireciona para a página index
header('location: index.php');
?>