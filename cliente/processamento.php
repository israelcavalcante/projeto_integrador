<?php
include_once("cliente.php");

$cliente = new cliente();

switch ($_GET['acao']){
    case 'salvar':
        if (!empty($_POST['id_cliente'])){
            // Método para alterar dados no banco
            $cliente->alterar($_POST);
        } else {
            // Método para inserir dados no banco
            $cliente->inserir($_POST);
        }
        break;
    case 'excluir':
        // Método para deletar dados no banco
        $cliente->excluir($_GET['id_cliente']);
        break;

    case 'verificar_cpf':
        $existe = $cliente->existeCpf($_GET['cpf']);

        if ($existe) {
            echo "Esse cpf {$_GET['cpf']} já existe informe outro.";
        }
        die;


    case 'verificar_rg':
        $existe = $cliente->existeRg($_GET['rg']);

        if ($existe) {
            echo "Esse RG {$_GET['rg']} já existe informe outro.";
        }
        die;
}

// Redireciona para a página index
header('location: index.php');
?>