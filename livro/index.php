<?php
include_once ("livro.php");
$livro = new livro();

$livro = $livro->recuperarDados();

include_once '../cabecalho.php';
?>

    <h1 class="text-center">Livros</h1>
    <br>
    <a class="btn btn-warning" href="formulario.php"><span class='glyphicon glyphicon-edit'></span> Inserir</a>
    <br>
    <br>
    <table class="table table-bordered table-hover table-striped table-condensed">
        <tr>
            <td width="15%">Ações</td>
            <td>Id</td>
            <td>Titulo</td>
            <td>Preço Livro</td>
            <td>Categoria Livro</td>
            <td>ISBN</td>
            <td>Editora</td>
            <td>Foto</td>
        </tr>

        <?php foreach ($livro as $alivro){
            echo "
            <tr>
                <td>
                    <a class='btn btn-primary' href='formulario.php?id_livro={$alivro['id_livro']}'><span class='glyphicon glyphicon-pencil'></span> Alterar</a>
                    <a class='btn btn-danger' href='processamento.php?acao=excluir&id_livro={$alivro['id_livro']}'><span class='glyphicon glyphicon-trash'></span> Excluir</a>
                </td>
                <td>{$alivro['id_livro']}</td>
                <td>{$alivro['titulo']}</td>
                <td>{$alivro['preco_livro']}</td>
                <td>{$alivro['categoria_livro']}</td>
                <td>{$alivro['isbn']}</td>
                <td>{$alivro['id_editora']}</td>
                <td><img width='80px' src='../upload/livro/{$alivro['foto']}'></td>    
                 
                 </tr>
        ";
        } ?>

    </table>

<?php
include_once '../rodape.php';