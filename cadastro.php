<!DOCTYPE html>
<?php
//session_start();
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
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
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/npm.js" type="text/javascript"></script>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/functions.js" type="text/javascript"></script>
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script src="js/jquery.mask.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#campoCelular").mask("(00) 0000-00009")

                $("#campoCelular").blur(function (event) {
                    if ($(this).val().length == 15) {
                        $("#campoCelular").mask("(00) 00000-0009")
                    } else {
                        $("#campoCelular").mask("(00) 0000-00009")
                    }
                })
            })
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#campoTelefone").mask("(00) 0000-00009")

                $("#campoTelefone").blur(function (event) {
                    if ($(this).val().length == 15) {
                        $("#campoTelefone").mask("(00) 00000-0009")
                    } else {
                        $("#campoTelefone").mask("(00) 0000-00009")
                    }
                })
            })
        </script>
    </head>

    <body style="background-color: #e9ebee">
        <br>
        <div class="container">
            <div class="col-md-12 col-md-offset-0" style="background-color: #FFF">
                <br>
                <h1>Cadastro de Empresas</h1>
                <br>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form role="form" id="formCadempresa">
                                <div class="form-group">
                                    <label for="campoNome">
                                        Nome:
                                    </label>
                                    <input class="form-control" id="campoNome"  />
                                </div>
                                <div class="form-group">
                                    <label for="campoEndereco">
                                        Endereço:
                                    </label>
                                    <input class="form-control" id="campoEndereco"  />
                                </div>   
                                <div class="form-group">
                                    <label for="campoTelefone">
                                        Telefone:
                                    </label>
                                    <input class="form-control" id="campoTelefone"  />
                                </div>
                                <div class="form-group">
                                    <label for="campoCelular">
                                        Celular: (WHATSAPP)
                                    </label>
                                    <input class="form-control" id="campoCelular" placeholder="Digite seu telefone" type="text" name="phone" required/>
                                </div>
                                  <div class="form-group">
                                      <label for="campo_horario_abertura">
                                          Horario de Funcionamento: (ABERTURA)
                                      </label>
                                      <input class="form-control" id="campo_horario_abertura" placeholder="Digite o horário de abertura" type="text" name="phone" required/>
                                  </div>
                                <div class="form-group">
                                      <label for="campo_horario_fechamento">
                                          Horario de Funcionamento: (FECHAMENTO)
                                      </label>
                                      <input class="form-control" id="campo_horario_fechamento" placeholder="Digite o horário de fechamento" type="text" name="phone" required/>
                                  </div>
                                <div class="form-group">
                                    <label for="paracatucard">Aceita PARACATUCARD?</label>
                                    <select class="form-control" id="paracatucard">
                                            <option value='0'>Não</option>  
                                            <option value='1'>Sim</option>                                                                                 
                                        ?>
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="categoria_um">Categoria 1:</label>
                                    <select class="form-control" id="categoria_um">
                                        <option value="sem_valor">Selecione a Categoria</option>
                                        <?php
                                        foreach ($categorias as &$var) {
                                            echo '<option value=' . $var->id_categoria . '>' . $var->categoria . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="categoria_dois">Categoria 2: (OPCIONAL)</label>
                                    <select class="form-control" id="categoria_dois">
                                        <option value="sem_valor">Selecione a Categoria</option>
                                        <?php
                                        foreach ($categorias as &$var) {
                                            echo '<option value=' . $var->id_categoria . '>' . $var->categoria . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="categoria_tres">Categoria 3: (OPCIONAL)</label>
                                    <select class="form-control" id="categoria_tres">
                                        <option value="sem_valor">Selecione a Categoria</option>
                                        <?php
                                        foreach ($categorias as &$var) {
                                            echo '<option value=' . $var->id_categoria . '>' . $var->categoria . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>                               
                                <button class="btn btn-primary" id="btnEnviarEmpresa" type="button">
                                    ENVIAR
                                </button>
                                <button type="reset" class="btn btn-danger">
                                    LIMPAR
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </body>
</html>