<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAO/DAO.php';
$obj = DAO::getInstance();
$empresas = $obj->listarCategorias();
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

    <body>
        <h1>Relatório Por Categoria :</h1>           
        <?php
        foreach ($empresas as &$var) {
            echo '<b><td>'."Categoria:". strtoupper($var->categoria). '</td></b><br>';
            $e = $obj->buscarEmpresasPorCategoria($var->id_categoria);
            foreach ($e as &$idcat) {
                echo $idcat->nome.'<br>';
            }
        }
        ?>     
    </body>
</html>
