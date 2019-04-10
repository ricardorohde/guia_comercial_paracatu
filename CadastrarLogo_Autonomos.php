<!DOCTYPE html>
<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/DAO/DAO.php';
$obj = DAO::getInstance();
$empresas = $obj->listarProfissionaisOrd();

?>

<html>
    <head>
        <title>Gerência de Logos</title>
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
                <h1>Cadastro de Logos</h1>
                <br>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form role="form" id="formCadLogoProfissional"> <div class="form-group">
                                    <label for="empresa_selecionada">Selecione a Empresa:</label>
                                    <select class="form-control" id="empresaSelecionada">
                                        <option value="sem_valor">Selecione a Empresa</option>
                                        <?php
                                        foreach ($empresas as &$var) {
                                            echo '<option value=' . $var->id_empresa . '>' . $var->nome . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>                               
                                <div class="form-group">
                                    <b><p> IMAGEM (1920 X 1080):</p></b>
                                    <img id="uploadPreview2" style="width: 720px; height: 480px;" />
                                    <input id="logo2" type="file" name="myPhoto" onchange="PreviewImage_dois();" />                                                                 
                                </div>                                                        
                                <button class="btn btn-primary" id="btnEnviarLogoProfissional" type="button">
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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form role="form" id="excluirLogos"> <div class="form-group">
                                     <h1>Exclusão de Logos</h1>
                                    <label for="empresa_selecionada_logo">Selecione a Empresa:</label>
                                    <select class="form-control" id="logoSelecionada">
                                        <option value="sem_valor">Selecione a Empresa</option>
                                        <?php
                                        foreach ($empresas as &$var) {
                                            echo '<option value=' . $var->id_empresa . '>' . $var->nome . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>                                                                                                                    
                                <button class="btn btn-danger" id="btnExcluirLogoProfissional" type="button">
                                    Excluir
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