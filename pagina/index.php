<?php
include_once 'Pagina.php';

$pagina = new Pagina();
$aPagina = $pagina->recuperarDados();


include_once '../cabecalho.php';
?>

    <div class="panel box-shadow-none content-header">
        <div class="panel-body">
            <div class="col-md-12">
                <h3 class="animated fadeInLeft"><span class="fa fa-list-alt"></span> Página</h3>
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
                                <th>Nome</th>
                                <th>Caminho</th>
                                <th>Pública (S/N)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($aPagina as $pagina) { ?>
                                <tr>
                                    <td>
                                        <a class='btn btn-primary'<a href="formulario.php?id_pagina=<?= $pagina['id_pagina'] ?>">Alterar</a>
                                        <a class='btn btn-danger' href="processamento.php?acao=excluir&id_pagina=<?= $pagina['id_pagina'] ?>"> Excluir</a>
                                    </td>
                                    <td><?= $pagina['nome'] ?></td>
                                    <td><?= $pagina['caminho'] ?></td>
                                    <td><?= ($pagina['publica'] == 0) ? "<span class='fa fa-circle' style='color: #ff6656'></span> Não" : "<span class='fa fa-circle' style='color: #27c24c;'></span> Sim" ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include_once '../rodape.php';