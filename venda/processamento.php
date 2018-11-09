<?php
include_once("venda.php");

$venda = new venda();

switch ($_GET['acao']){
    case 'salvar':
        if (!empty($_POST['id_venda'])){
            // Método para alterar dados no banco
            $venda->alterar($_POST);
        } else {
            // Método para inserir dados no banco
            $venda->inserir($_POST);
        }
        break;
    case 'excluir':
        // Método para deletar dados no banco
        $venda->excluir($_GET['id_venda']);
        break;
}

// Redireciona para a página index
header('location: index.php');
?>