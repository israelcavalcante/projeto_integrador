<?php
include_once 'Pagina.php';

$pagina = new Pagina();

if (!empty($_GET['id_pagina'])) {
    $pagina->carregarPorId($_GET['id_pagina']);
}

include_once '../perfil/Perfil.php';
$perfis = (new Perfil())->recuperarDados();

include_once '../cabecalho.php';
?>

    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft"><span class="fa fa-list-alt"></span> Página</h3>
            </div>
        </div>
    </div>

    <div class="col-md-offset-1 col-md-10 panel">
        <div id="mensagem"></div>

        <div class="col-md-12 panel-body">
            <div class="col-md-12">
                <form action="processamento.php?acao=salvar" method="post" class="form-horizontal">

                    <!-- id_pagina -->
                    <div class="form-control" !important;">
                        <input type="hidden" class="form-text" id="id_pagina" name="id_pagina" value="<?= $pagina->getIdPagina(); ?>">
                    </div>
                    <!-- Nome -->
                    <div class="form-control" !important;">
                        <label>Nome</label>
                        <input type="text" class="form-text" id="nome" name="nome" value="<?= $pagina->getNome(); ?>">

                    </div>
                    <!-- Caminho -->
                    <div class="form-control" !important;">
                        <label>Caminho</label>
                        <input type="text" class="form-text" id="caminho" name="caminho" value="<?= $pagina->getCaminho(); ?>">

                    </div>
                    <!-- Pública -->

                    <div class="radio">
        <label><input id="radio1" type="radio" name="publica"
                      value="1" <?= ("1" == $pagina->getPublica()) ? "checked": ""; ?>/>Sim</label>
    </div>
    <div class="radio">
        <label> <input id="radio1" type="radio" name="publica" value="0" <?= ("0" == $pagina->getPublica()) ? "checked": ""; ?>/>Não</label>
    </div>


                    <!-- Permissão à pagina -->
                    <div class="form-group">
                        <fieldset>
                           <label>Perfis com permissão à esta página</label>
                        </fieldset>
                    </div>
                    <?php foreach ($perfis as $aperfil) { ?>
                        <div class="form-control form-animate-checkbox">
                            <input type="checkbox" class="checkbox" value="<?= $aperfil['id_perfil'] ?>"
                                   name="id_perfil[]">
                            <label><?= $aperfil['nome'] ?></label>
                        </div>
                    <?php } ?>
                    <!-- Enviando ou cancelando o Envio -->
                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success"><span class="fa fa-thumbs-o-up"> </span>
                                Salvar
                            </button>
                            <a class="btn btn-danger" href="index.php"><span class="fa fa-reply"> </span> Voltar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
include_once '../rodape.php'; ?>