<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAO/DAO.php';
$obj = DAO::getInstance();
$empresas = $obj->listarEmpresas();
$senha_do_painel = $obj->buscarSenha();
$senha_do_painel = $senha_do_painel[0]->senha;

if($senha_do_painel == ""){
    header('Location: re87yiugstesartjnes53ty456.php');
}

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
        <h1>Painel de Controle Profissionais Autônomos</h1>
        <br>
        <a href="/cadastro.php"><button class="btn btn-success">Adicionar Nova Empresa</button></a>
        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Adicionar Nova Categoria</button>
        <a href="/painelCategorias_Autonomos.php"><button class="btn btn-warning">Editar/Excluir Categoria</button></a>
        <a href="/CadastoDePropagandas.php"><button class="btn btn-danger">Cadastrar Propaganda</button></a>
        <a href="/CadastoDeDestaques.php"><button class="btn btn-default">Cadastrar Destaques</button></a>
        <button class="btn btn-primary" id="deslogar">Sair</button>
        <br>
        <br>
        <div class="container-fluid">
            <div class="row">
                <table class="table table-bordered">                  
                    <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                NOME
                            </th>
                            <th>
                                ENDERE�O
                            </th>
                            <th>
                                TELEFONE
                            </th>
                            <th>
                                CELULAR
                            </th>
                            <th>
                                Horario de Funcionamento: (ABERTURA)
                            </th>
                            <th>
                                Horario de Funcionamento: (FECHAMENTO)
                            </th>
                            <th>
                                ACEITA PARACATUCARD?
                            </th>
                            <th>
                                CATEGORIA
                            </th>
                            <th>
                                CATEGORIA 2
                            </th>
                            <th>
                                CATEGORIA 3 
                            </th>                                                                                                      
                            <th>
                                OPÇOES 
                            </th>
                        </tr>
                    </thead>
                    <tbody>                            
                        <?php
                        foreach ($empresas as &$var) {
                            $ptucard = "";
                            if($var->paracatucard ==0){
                                $ptucard = "Não";
                            }else{
                                $ptucard = "Sim";
                            }
                            
                            echo
                            '<tr class = "active">' .
                            '<td>' . $var->id_empresa . '</td>' .
                            '<td>' . $var->nome . '</td>' .
                            '<td>' . $var->endereco . '</td>' .
                            '<td>' . $var->telefone . '</td>' .
                            '<td>' . $var->celular . '</td>' .
                            '<td>' . $var->horario_abertura . '</td>' .
                            '<td>' . $var->horario_fechamento. '</td>' .
                            '<td>' . $ptucard . '</td>' .
                            '<td>' . $var->cat_um . '</td>' .
                            '<td>' . $var->cat_dois . '</td>' .
                            '<td>' . $var->cat_tres . '</td>' .
                            '<td>' . '<button class="btn btn-warning" onclick = "excluirEmpresa(' . $var->id_empresa . ');"> Excluir </button>&nbsp<button class = "btn btn-success" onclick= " alterarEmpresa(' . $var->id_empresa . ');"> Editar </button> <br>' . '</td>' .
                            '</tr>';
                        }
                        ?>                       
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">ADICIONAR CATEGORIA</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="campoNomeAutonomos">
                                Nome:
                            </label>
                            <form id="formAddCatAutonomos">
                                <input class="form-control" id="campoNomeCatAutonomos" />
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">                      
                        <button type="button" class="btn btn-success" data-dismiss="modal" id="adicionarCatAutonomos">Adicionar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>           
                    </div>
                </div>
            </div>
        </div>               
    </body>
</html>
