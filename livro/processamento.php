<?php
include_once("livro.php");

$livro = new livro();

switch ($_GET['acao']){
    case 'salvar':
        $origem = $_FILES['foto']['tmp_name'];
        $destino = '../upload/Livro/' . $_FILES['foto']['name'];
        move_uploaded_file($origem, $destino);

        if (!empty($_POST['id_livro'])){
            // Método para alterar dados no banco
            $livro->alterar($_POST);
        } else {
            // Método para inserir dados no banco
            $livro->inserir($_POST);
        }
        break;
    case 'excluir':
        // Método para deletar dados no banco
        $livro->excluir($_GET['id_livro']);
        break;

    case 'verificar_nome':
        $existe = $livro->existeNome($_GET['titulo']);

        if ($existe) {
            echo "Esse livro {$_GET['titulo']} já existe informe outro.";
        }
        die;
}

// Redireciona para a página index
header('location: index.php');
?>