<?php
include_once ('usuario.php');
include_once ('../perfil/perfil.php');
include_once ('../cabecalho.php');

$usuarios = new usuario();

if (!empty($_GET['id_usuario'])){
    $usuarios->carregarPorId($_GET['id_usuario']);
}
?>
<html>
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous">

    </script>

</head>
<body>
<h1 class="text-center">Usuario</h1>
<br>


<form enctype="multipart/form-data" class="form-horizontal" method="post" action="processamento.php?acao=salvar">
    <input type="hidden" name="id_usuario" value="<?=$usuarios->getIdUsuario()?>">
    <div class="form-group">
        <label for="nome" class="col-sm-2 control-label">Nome</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nome" name="nome" value="<?=$usuarios->getNome()?>">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" value="<?=$usuarios->getEmail()?>">
            <div  class="col-sm-15 alert-danger" id="mensagem" ></div>
        </div>
    </div>
    <div class="form-group">
        <label for="senha" class="col-sm-2 control-label">Senha</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="senha" name="senha" value="<?=$usuarios->getSenha()?>">
        </div>
    </div>
    <div class="form-group">

        <label for="id_perfil" class="col-sm-2 control-label">Perfil</label>
        <div class="col-sm-10">

            <select class="form-control" id="id_perfil" name="id_perfil">
                <option value="">Selecione</option>
                <?php
                $id_perfils = new perfil();
                $results = $id_perfils->recuperarDados();
                foreach ($results as $key=>$value){
                    $checked = (($value['id_perfil'] == $usuarios->getIdPerfil())?'selected' : '');
                    echo "<option $checked value='{$value['id_perfil']}'> {$value['id_perfil']} - {$value['nome']}</option>";
                }
                ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn <?=((!empty($_GET['id_usuario']))?'btn-primary':'btn-warning')?>"><span class='glyphicon <?=((!empty($_GET['id_usuario']))?'glyphicon-pencil':'glyphicon-edit')?>'></span><?=((!empty($_GET['id_usuario']))?' Alterar':' Inserir')?></button>
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
        $('#email').change(function () {
            $.ajax({
                url: 'processamento.php?acao=verificar_email&' + $('#email').serialize(),
                success: function (dados) {
                    $('#mensagem').html(dados);
                }
            });
        })
    });

</script>