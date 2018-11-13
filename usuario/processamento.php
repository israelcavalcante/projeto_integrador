<?php
session_start();
include_once 'Usuario.php';
include_once '../perfil/Perfil.php';

$usuario = new Usuario();

switch ($_GET['acao']) {
    case 'salvar':
        if (!empty($_POST['id_usuario'])) {
            $usuario->alterar($_POST);
        } else {
            $usuario->inserir($_POST);
        }
    break;
    case 'excluir':
        $usuario->excluir($_GET['id_usuario']);
    break;
    case 'logar':
        $usuario->logar($_POST);

        if (!empty($_SESSION['usuario'])){

            switch ($_SESSION['usuario']['id_perfil']){
                case Perfil::PERFIL_ADMINISTRADOR:
                    header('location: ../livro/index.php');
                die;
                case Perfil::PERFIL_SUPERVISOR:
                    header('location: ../editora/index.php');
                die;
                case Perfil::PERFIL_VENDEDOR:
                    header('location: ../venda/formulario.php');
                die;
                }
        };
    break;

    case 'verificar_email':
        $existe = $usuario->existeEmail($_GET['email']);

        if ($existe) {
            echo "Esse email {$_GET['email']} já existe informe outro.";
        }
    die;
}

header('location: index.php');
?>