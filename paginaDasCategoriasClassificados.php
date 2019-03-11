<!DOCTYPE html>
<?php
$id = $_GET['action'];
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAO/DAO.php';
$obj = DAO::getInstance();
$empresa = $obj->buscarEmpresasPorCategoria($id);
?>

<html>
    <head>
        <title>Resultados</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/functions.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/npm.js" type="text/javascript"></script>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/> 
    </head>

    <body>
        <div class="container" >
            <div class="col-md-12 col-md-offset-0" style="background-color: #FFF">
                <br>
                <div>
                    <b>Itens Econtrados:</b>
                    <ul id="ListaDeEmpresasEncontradas_dois" class="list-group" style="background-color: #ffffff">
                        <?php
                        if ($empresa == null) {
                            echo 'Não foram encontrados Resultados';
                        } else {                           
                            foreach ($empresa as $var) {
                                echo '<a onclick = "encaminharParaClassificado(' . $var->id_empresa . '.)"><li style="background-color: #f6f6f6;  margin-bottom: 3px" class = "list-group-item"><b>' . $var->nome . '</b></li></a>';
                            }
                        }
                        ?>   
                    </ul> 
                </div>
                <button class="btn btn-success btn-lg" id="voltarParaListaDeCategorias2">Voltar</button>
            </div>
        </div>
    </body>
</html>