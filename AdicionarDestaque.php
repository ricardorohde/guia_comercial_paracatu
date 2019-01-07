<!DOCTYPE html>
<?php
//session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAO/DAO.php';
$obj = DAO::getInstance();

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
        <script src="js/functions.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/npm.js" type="text/javascript"></script>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/> 
    </head>

    <body style="background-color: #e9ebee">
        <br>
        <div class="container">
            <div class="col-md-12 col-md-offset-0" style="background-color: #FFF">
                <br>
                <h1>Cadastro de Propagandas</h1>
                <br>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form role="form" id="formCadDestaque"> <div class="form-group">
                                </div>                               
                                <div class="form-group">
                                    <b><p> IMAGEM (1920 X 1080):</p></b>
                                    <img id="uploadPreview2" style="width: 720px; height: 480px;" />
                                    <input id="logo2" type="file" name="myPhoto" onchange="PreviewImage_dois();" />                                                                 
                                </div>                               
                                <button class="btn btn-primary" id="btnEnviarDestaque" type="button">
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
        <script>
            function PreviewImage_dois() {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("logo2").files[0]);
                oFReader.onload = function (oFREvent) {
                    document.getElementById("uploadPreview2").src = oFREvent.target.result;
                };
            }
        </script>
    </body>
</html>