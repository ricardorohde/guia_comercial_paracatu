<!DOCTYPE html>
<?php
//session_start();
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAO/DAO.php';
$obj = DAO::getInstance();
$categorias = $obj->listarCategorias();

/*require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/sessao.php';
$sessao = new Sessao();
if($sessao->getNode('user')!= 'logado'){
    echo '<script>alert("Faça login para continuar"); window.location.href = "/login.php";</script>';
}*/
?>

<html>
    <head>
        <title>Guia Comercial de Paracatu</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/npm.js" type="text/javascript"></script>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/functions.js" type="text/javascript"></script>
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script src="js/jquery.mask.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#campoCelular").mask("(00) 0000-00009")

                $("#campoCelular").blur(function (event) {
                    if ($(this).val().length == 15) {
                        $("#campoCelular").mask("(00) 00000-0009")
                    } else {
                        $("#campoCelular").mask("(00) 0000-00009")
                    }
                })
            })
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#campoTelefone").mask("(00) 0000-00009")

                $("#campoTelefone").blur(function (event) {
                    if ($(this).val().length == 15) {
                        $("#campoTelefone").mask("(00) 00000-0009")
                    } else {
                        $("#campoTelefone").mask("(00) 0000-00009")
                    }
                })
            })
        </script>
    </head>

    <body style="background-color: #e9ebee">
        <br>
        <div class="container">
            <div class="col-md-12 col-md-offset-0" style="background-color: #FFF">
                <br>
                <h1>Cadastro de Senha</h1>
                <br>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form role="form" id="formCadSenhaPainel">
                                <div class="form-group">
                                    <label for="campoNovaSenha">
                                        Digite a nova senha
                                    </label>
                                    <input class="form-control" id="campoNovaSenha"  />
                                </div>
                                <div class="form-group">
                                    <label for="campoNovaSenha_dois">
                                        digite novamente a nova senha
                                    </label>
                                    <input class="form-control" id="campoNovaSenha_dois"  />
                                </div>                                                               
                                <button class="btn btn-primary" id="btnEnviarNovaSenha" type="button">
                                    ENVIAR
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    LIMPAR
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </body>
</html>