<?php
include_once ('cliente.php');
include_once ('../cabecalho.php');

$clientes = new cliente();

if (!empty($_GET['id_cliente'])){
    $clientes->carregarPorId($_GET['id_cliente']);
}

?>

<html>
<head>
    <title>ViaCEP Webservice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>


    <h1 class="text-center">Clientes</h1>
    <br>
</head>
<body>
    <form class="form-horizontal" method="post" action="processamento.php?acao=salvar">
        <input type="hidden" name="id_cliente" value="<?=$clientes->getIdcliente()?>">
        <div class="form-group">
            <label for="nome" class="col-sm-2 control-label">Nome</label>

            <div class="col-sm-10">
                <input type="text" class="form-control" id="nome" name="nome" value="<?=$clientes->getNome()?>">
            </div>
        </div>
        <div class="form-group">
            <label for="rg" class="col-sm-2 control-label">RG</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="rg" name="rg" value="<?=$clientes->getRg()?>">
                <div class="alert-danger" id="mensagem1"></div>
            </div>
        </div>
        <div class="form-group">
            <label for="cpf" class="col-sm-2 control-label">CPF</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="cpf" name="cpf" value="<?=$clientes->getCpf()?>">
            <div class="alert-danger" id="mensagem"></div>
            </div>
        </div>

        <div class="form-group">
            <label for="telefone" class="col-sm-2 control-label">Telefone</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="telefone" name="telefone" value="<?=$clientes->getTelefone()?>">
            </div>
        </div>
        <div class="form-group">
            <label for="cep" class="col-sm-2 control-label">CEP</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="cep" name="cep" value="<?=$clientes->getCep()?>">
            </div>
        </div>

        <div class="form-group">
            <label for="cidade" class="col-sm-2 control-label">Cidade</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="cidade" name="cidade" value="<?=$clientes->getCidade()?>" >
            </div>
        </div>

        <div class="form-group">
            <label for="bairro" class="col-sm-2 control-label">Bairro</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="bairro" name="bairro" value="<?=$clientes->getBairro()?>">
            </div>
        </div>

        <div class="form-group">
            <label for="rua" class="col-sm-2 control-label">Rua</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="rua" name="rua" value="<?=$clientes->getRua()?>" >
            </div>
        </div>


        <div class="form-group">
            <label for="uf" class="col-sm-2 control-label">Estado</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="uf" name="uf" value="<?=$clientes->getUf()?>">
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn <?=((!empty($_GET['id_cliente']))?'btn-primary':'btn-warning')?>"><span class='glyphicon <?=((!empty($_GET['id_cliente']))?'glyphicon-pencil':'glyphicon-edit')?>'></span><?=((!empty($_GET['id_cliente']))?' Alterar':' Inserir')?></button>
                <a class="btn btn-success" href="index.php"><span class='glyphicon glyphicon-arrow-left'></span> Voltar</a>
            </div>
        </div>
    </form>
</body>

<?php
include_once ('../rodape.php');
?>
<script>
$(document).ready(function() {

function limpa_formulário_cep() {
// Limpa valores do formulário de cep.
$("#rua").val("");
$("#bairro").val("");
$("#cidade").val("");
$("#uf").val("");
$("#ibge").val("");
}

//Quando o campo cep perde o foco.
$("#cep").blur(function() {

//Nova variável "cep" somente com dígitos.
var cep = $(this).val().replace(/\D/g, '');

//Verifica se campo cep possui valor informado.
if (cep != "") {

//Expressão regular para validar o CEP.
var validacep = /^[0-9]{8}$/;

//Valida o formato do CEP.
if(validacep.test(cep)) {

//Preenche os campos com "..." enquanto consulta webservice.
$("#rua").val("...");
$("#bairro").val("...");
$("#cidade").val("...");
$("#uf").val("...");
$("#ibge").val("...");

//Consulta o webservice viacep.com.br/
$.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

if (!("erro" in dados)) {
//Atualiza os campos com os valores da consulta.
$("#rua").val(dados.logradouro);
$("#bairro").val(dados.bairro);
$("#cidade").val(dados.localidade);
$("#uf").val(dados.uf);
$("#ibge").val(dados.ibge);
} //end if.
else {
//CEP pesquisado não foi encontrado.
limpa_formulário_cep();
alert("CEP não encontrado.");
}
});
} //end if.
else {
//cep é inválido.
limpa_formulário_cep();
alert("Formato de CEP inválido.");
}
} //end if.
else {
//cep sem valor, limpa formulário.
limpa_formulário_cep();
}
});
});

$(function () {
    // AJAX para verificação do email
    $('#cpf').change(function () {
        $.ajax({
            url: 'processamento.php?acao=verificar_cpf&' + $('#cpf').serialize(),
            success: function (dados) {
                $('#mensagem').html(dados);
            }
        });
    })
});

$(function () {
    // AJAX para verificação do email
    $('#rg').change(function () {
        $.ajax({
            url: 'processamento.php?acao=verificar_rg&' + $('#rg').serialize(),
            success: function (dados) {
                $('#mensagem1').html(dados);
            }
        });
    })
});


</script>