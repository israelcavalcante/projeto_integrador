<?php
include_once 'Perfil.php';

$perfil = new Perfil();

if (!empty($_GET['id_perfil'])) {
    $perfil->carregarPorId($_GET['id_perfil']);
}

include_once '../cabecalho.php';
?>

    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft">União Federativa</h3>
            </div>
        </div>
    </div>

    <div class="col-md-offset-1 col-md-10 panel">
        <div class="col-md-12 panel-body" style="padding-bottom:30px;">
            <div class="col-md-12">
                    <div class="col-md-offset-1 col-md-10 panel-danger">
                        <div id="mensagem"></div>

                    </div>

                <form action="processamento.php?acao=salvar" method="post" class="form-horizontal">
                    <input type="hidden" name="id_perfil" id="id_perfil"  value="<?php echo $perfil->getIdPerfil(); ?>">

                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        <input type="text" class="form-text" id="nome" name="nome" required
                               value="<?php echo $perfil->getNome(); ?>">
                        <span class="bar"></span>
                        <label>Nome</label>
                    </div>
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
include_once '../rodape.php';
?>
