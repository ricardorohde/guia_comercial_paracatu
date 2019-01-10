<!DOCTYPE html>

<?php
$palavra = $_REQUEST['action'];
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAO/DAO.php';
$obj = DAO::getInstance();
$empresasEncontradas = $obj->buscarEmpresasPorPalavraChave($palavra);
$categoriasEncontradas = $obj->buscarCategoriasPorPalavraChave($palavra);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Guia Comercial de Paracatu</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/functions.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/npm.js" type="text/javascript"></script>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/> 
    </head>

    <body style="background-color: #FFF">
        <br>
        <div class="container">
            <div class="col-md-12 col-md-offset-0" style="background-color: #FFF">
                <br>              
                <div class="tab-content">
                    <div>
                        <b>Empresas Econtradas:</b>
                        <ul id="ListaDeEmpresasEncontradas" class="list-group" style="background-color: #ffffff">
                            <?php
                            if ($empresasEncontradas == null) {
                                echo 'Não foram encontrados Resultados';
                            } else {
                                foreach ($empresasEncontradas as $var) {
                                    if ($obj->verificarPropaganda($var->id_empresa) == 1) {
                                        if ($var->paracatucard == 1) {
                                            echo '<a onclick = "encaminharParaEmpresas(' . $var->id_empresa . '.)"><li style="background-color: #f6f6f6; color :#a71b1b; margin-bottom: 3px" class = "list-group-item"><b>✪  ' . strtoupper($var->nome) . ' ✪</b></li></a>';
                                        }
                                    } else {
                                        if ($var->paracatucard == 1) {
                                             echo '<a onclick = "encaminharParaEmpresas(' . $var->id_empresa . '.)"><li style="background-color: #f6f6f6;  color:#070707; margin-bottom: 3px" class = "list-group-item"><b>' . $var->nome . '</b></li></a>';
                                        }
                                    }
                                }
                            }
                            ?>   
                        </ul> 
                    </div>
                    <div>
                        <b>Categorias Encontradas:</b>
                        <ul id="ListaDeCategoriasEncontradas" class="list-group" style="background-color: #ffffff">              
                            <?php
                            if ($categoriasEncontradas == null) {
                                echo 'Não foram encontrados Resultados';
                            } else {
                                foreach ($categoriasEncontradas as $var) {
                                    echo '<a onclick = "encaminharParaCategorias(' . $var->id_categoria . '.)"><li style="background-color: #f6f6f6;  margin-bottom: 3px" class = "list-group-item">' . $var->categoria . '</li></a>';
                                }
                            }
                            ?>           
                        </ul> 
                    </div>
                    <br>
                    <a href="/index.php"><button class="btn btn-success btn-lg">Voltar</button></a>
                </div>      
            </div>
        </div>
    </div>
</body>
</html>