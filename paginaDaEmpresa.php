<!DOCTYPE html>
<?php
$id = $_GET['action'];
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAO/DAO.php';
$obj = DAO::getInstance();
$empresa = $obj->buscarempresa($id);
$empresa = $empresa[0];
$url_antiga = $_GET['url_antiga'];
$propagandas = $obj->listarPropagandas($id);

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
    </head>

    <body>
        <div class="container" >
            <br>
            <div class="col-md-12 col-md-offset-0" style="background-color:#f6f6f6">
                <br>
                <div class="form-group">
                    <div id="NomeDaEmpresa">
                        <b><p style="font-size: 140%"><?php echo $empresa->nome; ?></p></b>
                    </div>
                </div>
                <div class="form-group">
                    <div id="enderecoDaEmpresa" style="background-color:#f6f6f6" width="300" height="100">
                        <p style="font-size: 110%"><b>Endereço:</b>&nbsp;<?php echo $empresa->endereco ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <div id="telefoneDaempresa" style="background-color:#f6f6f6" width="300" height="100">
                        <a href="tel:<?php echo $empresa->telefone; ?>"><p style="font-size: 150%"><b>Telefone:</b>&nbsp;<?php echo $empresa->telefone; ?></p></a>
                    </div>
                </div>
                <div class="form-group">
                    <div id="celularDaempresa" style="background-color:#f6f6f6">                       
                        <a href="tel:<?php echo $empresa->celular; ?>"><p style="font-size: 150%"><b>Celular: </b><?php echo $empresa->celular; ?></p></a>
                    </div>
                </div>
                <div class="form-group">
                    <div id="horario" style="background-color:#f6f6f6">
                        <p style="font-size: 150%"><b>Horário de Funcionamento:</b>&nbsp;<?php echo $empresa->horario_abertura . "h ás " . $empresa->horario_fechamento . "h"; ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <div id="paracatucard" style="background-color:#f6f6f6">
                        <p style="font-size: 150%"><b>Aceita Paracatucard ?</b>&nbsp;<?php echo $ptucard ?></p>
                    </div>
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
                <div class="form-group">
                    <div id="" style="background-color:" width="300" height="100"> 
                        <button type="button" class="btn btn-success btn-lg" id="btnVoltarLista2" onclick="btnVoltarLista2('<?php echo $url_antiga; ?>');">Voltar</button>
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