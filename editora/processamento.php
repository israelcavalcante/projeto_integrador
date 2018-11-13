<?php
include_once("editora.php");

$editora = new editora();

switch ($_GET['acao']) {
    case 'salvar':
        if (!empty($_POST['id_editora'])) {
            // Método para alterar dados no banco
            $editora->alterar($_POST);
        } else {
            // Método para inserir dados no banco
            $editora->inserir($_POST);
        }
        break;
    case 'excluir':
        // Método para deletar dados no banco
        $editora->excluir($_GET['id_editora']);

        break;

    case 'verificar_nome':
        $existe = $editora->existeNome($_GET['nome_fantasia']);

        if ($existe) {
            echo "Essa editora {$_GET['nome_fantasia']} já existe informe outra.";
        }
        die;
    case 'verificar_email':
        $existe = $editora->existeEmail($_GET['email']);

        if ($existe) {
            echo "Esse email {$_GET['email']} já existe informe outro.";
        }
        die;


};
// Redireciona para a página index
header('location: index.php');
?>