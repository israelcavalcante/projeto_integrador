<?php
include_once 'Perfil.php';

$perfil = new Perfil();
$aPerfil = $perfil->recuperarDados();

include_once '../cabecalho.php';
?>

    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h1 class="animated fadeInLeft">Perfil</h1>
            </div>
        </div>
    </div>

    <div class="col-md-12 top-20 padding-0">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <a class="btn btn-warning" href="formulario.php">Novo</a>
                </div>
                <div class="panel-body">
                    <div class="responsive-table">

                        <table id="datatables-example"
                               class="table table-bordered table-hover table-striped table-condensed">
                            <thead>
                            <tr>
                                <td width="15%">Ações</td>
                                <th>ID</th>
                                <th>Nome</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($aPerfil as $perfil) {
                                echo "
                                    <tr>
                                         <td>
                                              <a class='btn btn-primary' href='formulario.php?id_perfil={$perfil['id_perfil']}'><span class='glyphicon glyphicon-pencil'></span> Alterar</a>
                                              <a class='btn btn-danger' href='processamento.php?acao=excluir&id_perfil={$perfil['id_perfil']}'><span class='glyphicon glyphicon-trash'></span> Excluir</a>
                                        </td>
                                        <td>{$perfil['id_perfil']}</td>
                                        <td>{$perfil['nome']}</td>
                                    </tr>
                                ";
                            } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include_once '../rodape.php';