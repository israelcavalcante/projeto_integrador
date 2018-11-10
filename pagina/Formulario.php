<?php
include_once 'Pagina.php';
include_once '../perfil/Perfil.php';

$pagina = new Pagina();

$perfis = new Perfil();
$paginas = $pagina->recuperarDados();
$aperfil = $perfis->recuperarDados();


if(!empty($_GET['id_pagina'])){
$pagina->carregarPorId($_GET['id_pagina']);
}

include_once("../cabecalho.php");
?>
<div class="container">
    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft"><span class="fa fa-list-alt"></span> Página</h3>
            </div>
        </div>
    </div>
    <br/>
    <form class="form-horizontal" method="post" action="processamento.php?acao=salvar">

        <input type="hidden" name="id_pagina" value="<?= $pagina->getIdPagina(); ?>">

        <div class="form-group">
            <legend >Nome</legend>

                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?=$pagina->getNome()?>">
            </div>


        <div class="form-group">
            <legend >Caminho</legend>

                <input type="text" class="col-sm-2 form-control" id="nome" name="caminho" placeholder="Caminho" value="<?=$pagina->getCaminho()?>">

        </div>


        <div class="form-animate-checkbox" !important;">

                <legend >Pública?</legend>
                <label class="radio">
                    <input id="radio1" type="radio" name="publica"
                           value="1" <?= ("1" == $pagina->getPublica()) ? "checked": ""; ?>/>

                              <span class="inner"></span></span> Sim
                </label>
                <label class="radio">
                    <input id="radio1" type="radio" name="publica" value="0" <?= ("0" == $pagina->getPublica()) ? "checked": ""; ?>/>
                    <span class="outer">
                              <span class="inner"></span></span> Não
                </label> <br>

        </div>

    <div class="form-group">
            <fieldset>
                <legend><span></span> Perfis com permissão à esta página</legend>
            </fieldset>
        </div>
        <?php foreach ($aperfil as $perfil) { ?>
            <div class="checkbox">
                <input type="checkbox" class="checkbox" value="<?= $perfil['id_perfil'] ?>"
                       name="id_perfil[]">
                <label><?= $perfil['nome'] ?></label>
            </div>
        <?php } ?>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Salvar</button>
                <button type="reset" class="btn btn-info">Limpar</button>
                <a href="index.php" class="btn btn-danger">Voltar</a>
            </div>
        </div>
    </form>
</div>
<?php
include_once("../rodape.php");
?>

<script>
    // AJAX para verificação do nome
    $('#nome').change(function () {

        $.ajax({
            url: 'processamento.php?acao=verificar_nome&' + $('#nome').serialize(),
            success: function (dados) {
                $('#mensagemNome').html(dados);
            }
        });

        // Verificação em JQUERY Load
        // $('#mensagemNome').load('processamento.php?acao=verificar_nome&nome=' + $('#nome').val());

    });
</script>