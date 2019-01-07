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
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>

    <body style="background-color: #ededed;">
        <br>
        <div class="container">
            <div class="col-md-12 col-md-offset-0" id="pagina" style="background-color: #FFF;">
                <br>
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#first-tab" data-toggle="tab">Pesquisar</a></li>
                    <li><a href="#second-tab" data-toggle="tab">Categorias</a></li>
                    <li><a href="#third-tab" data-toggle="tab"><b>Paracatu Card</b></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active in" id="first-tab">
                        <div class="configdiv">
                            <br>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Buscar" id="palavraChave">
                                <br>
                                <div class="col-md-offset-5">
                                    <button id="btnBuscar" class="btn btn-success"/>Buscar</button>                 
                                </div>                       
                            </div>                   
                        </div>
                        <div id="carrossel">
                            <div id="meuSlider" class="carousel slide" data-ride="carousel">                             
                                <div class="carousel-inner" class="col-md-offset-12" aling="center">
                                   <!--- <img class="img-responsive" src="outdoor/logo.png" alt="Slider 1"/>  -->                              
                                </div>
                            </div>
                        </div>
                        <div id="divEscondida" hidden="true">
                            <p>Resultados</p>
                        </div>
                        <br>
                        <h1>Destaques</h1>
                        <div id="meuSlider" class="carousel slide" data-ride="carousel">                          
                            <ol class="carousel-indicators">
                                <li data-slide-to="0" class="active"></li>
                                <li data-slide-to="1"></li>
                                <li data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-inner">
                                    <?php
                                    $aux = 0;
                                    foreach ($destaques as &$var) {
                                        $aux++;
                                        $pedacos = explode("htdocs", $var->destaque);
                                        $v = $pedacos[1];
                                        if ($aux > 1) {
                                            echo '<div class="item"><img src=' . $v . '  /></div>';
                                        } else {
                                            echo '<div class="item active"><img src=' . $v . '  /></div>';
                                        }
                                    }
                                    ?>  
                                </div>
                            </div>
                            <a class="left carousel-control" href="" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                            <a class="right carousel-control" href="" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <br>                          
                        <div class="sobre-container">
                            <div class="sobre">    
                                <a href="http://www.casadoempresarioparacatu.com.br/2015/?page_id=1033"><img class="sobre-logo"src="outdoor/sobre.png"/></a>
                            </div>  

                        </div>
                        <br>         
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
                            <p><b>Empresas Que Aceitam Paracatu Card:</b></p>
                            <div class="configdiv">
                                <br>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Buscar" id="palavraChavePtuCard">
                                    <br>
                                    <div class="col-md-offset-5">
                                        <button id="btnBuscarPtuCard" class="btn btn-success"/>Buscar</button>                 
                                    </div>                       
                                </div>                   
                                </di
                                <ul class="list-group" style="background-color: #ffffff">
                                    <?php
                                    foreach ($empresas as &$var) {
                                        echo '<a onclick = "encaminharParaEmpresas(' . $var->id_empresa . '.)"><li style="background-color: #f6f6f6;  margin-bottom: 3px" class = "list-group-item"><b>' . $var->nome . '</b></li></a>';
                                    }
                                    ?>
                                </ul> 
                            </div>                                          
                            <br>
                        </div>   
                    </div>
                </div>
            </div>      
    </body>
</html>