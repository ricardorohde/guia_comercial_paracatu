<!DOCTYPE html>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAO/DAO.php';
$obj = DAO::getInstance();
$categorias = $obj->listarCategorias();
$destaques = $obj->listarDestaques();
$empresas = $obj->listarEmpresasParacatuCard();
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
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-md-offset-0" id="pagina" style="background-color: #FFF;">
                    <div class="row">
                        <ul class="nav nav-tabs mediaquery col-md-12 col-md-offset-0" style="white-space: nowrap;">
                            <li class="active"><a href="#first-tab" data-toggle="tab"><b><i style="font-size:12px;" class="fas fa-home fa-2x"> Home</i></b></a></li>
                            <li><a href="#second-tab" data-toggle="tab"><i style="font-size:12px;" class="fas fa-align-justify fa-2x"> Categorias</i></a></li>
                            <li><a href="#third-tab" data-toggle="tab"><i style="font-size:12px;" class="fas fa-credit-card fa-2x"> Paracatu Card</i></a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active in" id="first-tab">
                            <div class="configdiv">
                                <br>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Buscar" id="palavraChave">
                                    <br>
                                    <div class="col-md-offset-5">
                                        <button id="btnBuscar" class="btn btn-success btn-lg"><i style="font-size:19px;" class="fas fa-search fa-2x"> Buscar</i></button>                 
                                    </div>                       
                                </div>                   
                            </div>
                            <div id="divEscondida" hidden="true">
                                <p>Resultados</p>
                            </div>    
                            <b><p class="mediaquery-destaque" style="font-size : 230%">Destaques</p></b>

                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <?php
                                    $aux = 0;
                                    foreach ($destaques as &$var) {
                                        $aux++;
                                        $pedacos = explode("/home/guiacom3/public_html/", $var->destaque);
                                        $v = $pedacos[1];
                                        if ($aux > 1) {
                                            echo '<div class="item"><img src=' . $v . '  /></div>';
                                        } else {
                                            echo '<div class="item active"><img src=' . $v . '  /></div>';
                                        }
                                    }
                                    ?>                                                                  
                                </div>

                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <br> 
                            <img src="outdoor/botao.jpg" class="img-responsive"/>
                        </div>
                        <div class="tab-pane" id="second-tab" style="background-color: #ffffff">
                            <br>               
                            <div id="lista" style="background-color: #ffffff">
                                <p><b>Todos os Seguimentos :</b></p>
                                <ul class="list-group" style="background-color: #ffffff">
                                    <?php
                                    foreach ($categorias as &$var) {
                                        echo '<a onclick = "encaminharParaCategorias(' . $var->id_categoria . '.)"><li style="background-color: #f6f6f6;  margin-bottom: 3px" class = "list-group-item">' . $var->categoria . '</li></a>';
                                    }
                                    ?>
                                </ul> 
                            </div>
                            <div id="listaDeEmpresasEncontradas" style="background-color: #ffffff" hidden="true">
                                <div id="respostaDeListaDeEmpresasEncontradas"><b>Empresas Encontradas :</b></div>
                                <ul id="respostaComAsempresas" class="list-group" style="background-color: #ffffff">
                                </ul>
                                <button class="btn btn-success btn-lg" id="voltarParaListaDeCategorias">Voltar</button>
                            </div>                     
                            <br>
                        </div>
                        <div class="tab-pane" id="third-tab" style="background-color: #ffffff">
<br>
                            <div id="lista" style="background-color: #ffffff">
<br>
                                <p><b>Empresas Que Aceitam Paracatu Card:</b></p>
<br>
                                <div class="configdiv">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Buscar" id="palavraChavePtuCard">

                                        <div class="col-md-offset-5">
                                            <button id="btnBuscarPtuCard" class="btn btn-success"/>Buscar</button>                 
                                        </div>                       
                                    </div>                   
                                </div>
                                <ul class="list-group" style="background-color: #ffffff">
                                    <?php
                                    foreach ($empresas as &$var) {
                                        echo '<a onclick = "encaminharParaEmpresas(' . $var->id_empresa . '.)"><li style="background-color: #f6f6f6;  margin-bottom: 3px" class = "list-group-item"><b>' . $var->nome . '</b></li></a>';
                                    }
                                    ?>
                                </ul>                            
                            </div>                          
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div> 
</body>
</html>