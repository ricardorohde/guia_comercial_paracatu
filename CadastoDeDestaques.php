<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAO/DAO.php';
$obj = DAO::getInstance();
$empresas = $obj->listarEmpresas();
$destaques = $obj->listarDestaques();
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
        <br>
        <h1>Cadastro de Destaques</h1>
        <br>
        <a href="/AdicionarDestaque.php"><button class="btn btn-success">Adicionar Novo Destaque</button></a>
        <br>
        <div class="container-fluid">
            <div class="row">
                <?php
                foreach ($destaques as &$var) {
                    $pedacos = explode("htdocs", $var->destaque);
                    $v = $pedacos[1];
                    echo '<div class="item"><img height="960" width="940" src=' . $v . '  /></div><BR><button onclick = "excluirDestaque('.$var->id_destaque.')" class="btn btn-DANGER" type="button">EXCLUIR</button><br><BR>'; 
                }
                ?>  
            </div>
        </div>
        <br>              
    </body>
</html>
