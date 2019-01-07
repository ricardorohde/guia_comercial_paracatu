<!DOCTYPE html>
<?php
//session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAO/DAO.php';
$obj = DAO::getInstance();
$categorias = $obj->listarCategorias();

/*require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/sessao.php';
$sessao = new Sessao();
if($sessao->getNode('user')!= 'logado'){
    echo '<script>alert("Faça login para continuar"); window.location.href = "/login.php";</script>';
}*/
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
        <h1>Painel de Controle</h1>
        <br>
        <a href="/painel.php"><button class="btn btn-success btn-lg">Voltar</button></a>        
        <br>
        <br>
        <div class="container col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="row">
                <table class="table col-md-6">                  
                    <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                NOME
                            </th>                                                                                                                          
                            <th>
                                OPÇÕES 
                            </th>
                        </tr>
                    </thead>
                    <tbody>                            
                        <?php
                        foreach ($categorias as &$var) {
                            echo
                            '<tr class = "active">' .
                            '<td>' . $var->id_categoria . '</td>' .
                            '<td>' . $var->categoria . '</td>' .
                            '<td>' . '<button class = "btn btn-warning" onclick = "excluirCategoria(' . $var->id_categoria . ');"> Excluir </button> '
                            . '<button class = "btn btn-success" onclick = "alterarCategoria(' . $var->id_categoria . ');"> Editar </button> <br>' . '</td>' .
                            '</tr>';
                        }
                        ?>                       
                    </tbody>
                </table>
            </div>
        </div>
        <br>                
    </body>
</html>


