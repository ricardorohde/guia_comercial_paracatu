<!DOCTYPE html>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAO/DAO.php';
$obj = DAO::getInstance();
$categorias = $obj->listarCategorias();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Guia Comercial de Paracatu - Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/functions.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/npm.js" type="text/javascript"></script>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/> 
    </head>

    <body style="background-color: #ededed">
        <br>
        <div class="container">
            <div class="col-md-12 col-md-offset-0" style="background-color: #FFF">
                <br>
                <h1>Login</h1>
                <br>
                <form role="form" id="login"> 
                    <div class="form-group">                                                                                
                        <div class="form-group">
                            <label for="campoLogin">
                                Login:
                            </label>
                            <input class="form-control" id="campoLogin"  />
                        </div>   
                        <div class="form-group">
                            <label for="campoSenha">
                                Senha:
                            </label>
                            <input class="form-control" id="campoSenha"  type="password"/>
                        </div>
                        <br>
                        <button class="btn btn-success" id="btnLogin" type="button">
                            ENVIAR
                        </button>
                        <button type="reset" class="btn btn-danger">
                            LIMPAR
                        </button>
                </form> 
            </div>                        
        </div>
    </div>
</div>
</body>
</html>