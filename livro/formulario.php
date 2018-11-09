<?php
include_once ('livro.php');
include_once ('../editora/editora.php');
include_once ('../cabecalho.php');

$livros = new livro();

if (!empty($_GET['id_livro'])){
    $livros->carregarPorId($_GET['id_livro']);
}
?>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

</head>
<body>
    <h1 class="text-center">Livro</h1>
    <br>


    <form enctype="multipart/form-data" class="form-horizontal" method="post" action="processamento.php?acao=salvar">
        <input type="hidden" name="id_livro" value="<?=$livros->getIdLivro()?>">
        <div class="form-group">
            <label for="titulo" class="col-sm-2 control-label">Titulo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?=$livros->getTitulo()?>">
            <div  class="col-sm-15 alert-danger" id="mensagem" ></div>
            </div>
        </div>
        <div class="form-group">
            <label for="preco_livro" class="col-sm-2 control-label">Preço Livro</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="preco_livro" name="preco_livro" value="<?=$livros->getPrecoLivro()?>">
            </div>
        </div>


        <div class="form-group">

            <label for="categoria_livro" class="col-sm-2 control-label">Categoria Livro</label>
            <div class="col-sm-10">
            <select class="form-control" id="categoria_livro" name="categoria_livro" value="<?=$livros->getCategoriaLivro()?>">
                <option>Selecione</option>
                <option name="Literatura" value="Literatura">Literatura</option>
                <option name="Equilibrio Pessoal" value="Equilíbrio Pessoal">Equilirio Pessoal</option>
                <option  name="Técnicos e Profissionais" value="Técnico e Profissional">Técnico e Profissional</option>
                <option  name="Periódicos" value="Periódicos">Periódicos</option>
            </select>
        </div>
        </div>

        <div class="form-group">
            <label for="isbn" class="col-sm-2 control-label">isbn</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="isbn" name="isbn" value="<?=$livros->getIsbn()?>">
            </div>
        </div>

        <div class="form-group">
            <label for="foto" class="col-sm-2 control-label">Foto</label>
            <div class="col-sm-10">
                <input type="file" class="form-text" id="foto" name="foto" value="<?php echo $livros->getFoto(); ?>">
            </div>
        </div>

        <div class="form-group">

            <label for="id_editora" class="col-sm-2 control-label">Editora</label>
        <div class="col-sm-10">

            <select class="form-control" id="id_editora" name="id_editora">
                <option value="">Selecione</option>
                <?php
                $id_editoras = new editora();
                $results = $id_editoras->recuperarDados();
                foreach ($results as $key=>$value){
                   $checked = (($value['id_editora'] == $livros->getIdEditora())?'selected' : '');
                    echo "<option $checked value='{$value['id_editora']}'> {$value['id_editora']} - {$value['nome_fantasia']}</option>";
                }
                ?>
            </select>
        </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn <?=((!empty($_GET['id_livro']))?'btn-primary':'btn-warning')?>"><span class='glyphicon <?=((!empty($_GET['id_livro']))?'glyphicon-pencil':'glyphicon-edit')?>'></span><?=((!empty($_GET['id_livro']))?' Alterar':' Inserir')?></button>
                <a class="btn btn-success" href="index.php"><span class='glyphicon glyphicon-arrow-left'></span> Voltar</a>
            </div>
        </div>
    </form>

<?php
include_once ('../rodape.php');
?>
<script>
    $(function () {
        // AJAX para verificação do título
        $('#titulo').change(function () {
            $.ajax({
                url: 'processamento.php?acao=verificar_nome&' + $('#titulo').serialize(),
                success: function (dados) {
                    $('#mensagem').html(dados);
                }
            });
        })
    });

</script>
