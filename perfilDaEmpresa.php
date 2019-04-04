﻿<!DOCTYPE html>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAO/DAO.php';

$nome_da_empresa = $_GET['action'];
$obj = DAO::getInstance();
$empresa = $obj->buscarempresa_porNome($nome_da_empresa);
$empresa = $empresa[0];
$empresa = $obj->buscarempresa($empresa->id_empresa);
$empresa = $empresa[0];

$propagandas = $obj->listarPropagandas($empresa->id_empresa);

if ($empresa->logo) {
    $pedacos = explode("htdocs", $empresa->logo);
    $logoDaempresa = $pedacos[1];
} else {
    $logoDaempresa = 'nada';
}

if ($empresa->paracatucard == 0) {
    $ptucard = "Não";
} else {
    $ptucard = "Sim";
}

if ($empresa->horario_abertura == "") {
    $empresa->horario_abertura = "08:00";
    $empresa->horario_fechamento = "18:00";
}
?>

<html>
    <head>
        <title><?php echo $empresa->nome; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/functions.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/npm.js" type="text/javascript"></script>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    </head>

    <body>
        <div class="container" >
            <br>
            <div class="col-md-12 col-md-offset-0" style="background-color:#f6f6f6">
                <br>
                <div class="form-group">
                    <div id="NomeDaEmpresa">
                        <b><p style="font-size: 130%"><?php echo $empresa->nome; ?></p></b>
                    </div>
                </div>               
                <div class="form-group">
                    <i style="margin-top: 1%; font-size:20px;" class="fas fa-map-marker-alt fa-2x"> <?php echo $empresa->endereco; ?></i><br> 
                    <a href="tel:<?php echo $empresa->telefone; ?>"><p><i style="margin-top: 3%; font-size:20px;" class="fas fa-phone-square">&nbsp;<?php echo $empresa->telefone; ?></i></p><br></a> 
                    <a href="tel:<?php echo $empresa->celular; ?>"><p><i style="margin-top: -4%; font-size:20px;" class="fas fa-mobile-alt fa-2x">&nbsp;<?php echo $empresa->celular; ?></i></p><br></a> 
                    <i style="margin-top: -3%; font-size:20px;" class="fas fa-clock fa-2x"> <?php echo $empresa->horario_abertura . "h ás " . $empresa->horario_fechamento . "h"; ?></i><br> 
                    <i style="margin-top: 1%; font-size:20px;" class="fas fa-credit-card fa-2x"> <?php echo $ptucard ?></i><br> 
                </div>

                <div class="form-group">
                    <div id="servicos" style="background-color:#f6f6f6 "width="300" height="100">
                        <p style="font-size: 30%">&nbsp;<?php echo $empresa->servicos; ?></p>
                    </div>
                </div> 
                <div class="form-group">
                    <div id="LogoDaEmpresa" style="background-color:" width="300" height="100">
                        <?php
                        if ($logoDaempresa == 'nada') {
                            echo '';
                        } else {
                            echo "<img style='width:100%; height:100' src='$logoDaempresa'>";
                        }
                        ?>	                     
                    </div>
                </div>             
                <br>
            </div>
            <div class="form-group">                               
                <div id="propagandas" width="300" height="100">                      
                    <?php
                    foreach ($propagandas as &$var) {
                        $pieces = explode("propagandas", $var->caminho);
                        $imagem = "https://guiacomercialdeparacatu.com.br/propagandas" . $pieces[1];
                        echo(" <br>
                                    <div>
                                        <div class='col-md-10' style='background-color: #ededed'>
                                        <br>
                                        <p>Publicidade</p>
                                            <div class='img-responsive'>
                                                <a href='$var->link'>
                                                    <img src='$imagem' style='width:100%'>
                                                </a>
                                                <div class='caption' style='margin-top: 2%'>
                                                <br>
                                                <p>$var->descricao</p>
                                            </div>
                                        </div>
                                    <br>
                            </div>");
                    }
                    ?>       
                </div>
            </div>
        </div>
    </body>
</html>
