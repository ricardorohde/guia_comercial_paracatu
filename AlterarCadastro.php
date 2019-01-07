<!DOCTYPE html>
<?php
//session_start();
/* require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/sessao.php';
  $sessao = new Sessao();
  if($sessao->getNode('user')!= 'logado'){
  echo '<script>alert("Faça login para continuar"); window.location.href = "/login.php";</script>';
  } */

$id = $_GET['action'];
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAO/DAO.php';
$obj = DAO::getInstance();
$empresa = $obj->buscarempresa($id);
$empresa = $empresa[0];
$categorias = $obj->listarCategorias();

$campo_horario_abertura = $empresa->horario_abertura;
$campo_horario_fechamento = $empresa->horario_fechamento;
$paracatucard = $empresa->paracatucard;

$cat_um = "Selecione a Categoria";
$cat_dois = "Selecione a Categoria";
$cat_tres = "Selecione a Categoria";

$cat_um = $empresa->categoria;
$cat_dois = $empresa->categoria_dois;
$cat_tres = $empresa->categoria_tres;

foreach ($categorias as &$var) {
    if ($cat_um == $var->id_categoria) {
        $cat_um = $var->categoria;
    }

    if ($cat_dois == $var->id_categoria) {
        $cat_dois = $var->categoria;
    }

    if ($cat_tres == $var->id_categoria) {
        $cat_tres = $var->categoria;
    }
}
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
?>

<html>
    <head>
        <title>EDITANDO EMPRESA</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/functions.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/npm.js" type="text/javascript"></script>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/> 
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
        <script>tinymce.init({selector: 'textarea'});</script>
    </head>

    <body style="background-color: #e9ebee">
        <br>
        <div class="container">
            <div class="col-md-12 col-md-offset-0" style="background-color: #FFF">
                <br>
                <h1 id="">EDITANDO <?php echo $empresa->nome; ?></h1>
                <br>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form role="form" id="formEditarEmpresa">
                                <div class="form-group">
                                    <label for="campoNome">
                                        Nome:
                                    </label>
                                    <input class="form-control" id="campoNome" value="<?php echo($empresa->nome); ?>"/>
                                </div> 
                                <div class="form-group">
                                    <label for="campoEndereco">
                                        Endereço:
                                    </label>
                                    <input class="form-control" id="campoEndereco"  value="<?php echo($empresa->endereco); ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="campoTelefone">
                                        Telefone:
                                    </label>
                                    <input class="form-control" id="campoTelefone"  value="<?php echo($empresa->telefone); ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="campoCelular">
                                        Celular: (WHATSAPP)
                                    </label>
                                    <input class="form-control" id="campoCelular" value="<?php echo($empresa->celular); ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="campo_horario_abertura">
                                        Horario de Funcionamento: (ABERTURA)
                                    </label>
                                    <input value="<?php echo($empresa->horario_abertura); ?>"  class="form-control" id="campo_horario_abertura" placeholder="Digite o horário de abertura" type="text" name="phone" required/>
                                </div>
                                <div class="form-group">
                                    <label for="campo_horario_fechamento">
                                        Horario de Funcionamento: (FECHAMENTO)
                                    </label>
                                    <input value="<?php echo($empresa->horario_fechamento); ?>" class="form-control" id="campo_horario_fechamento" placeholder="Digite o horário de fechamento" type="text" name="phone" required/>
                                </div>
                                <div class="form-group">
                                    <label for="paracatucard">Aceita PARACATUCARD?</label>
                                    <select class="form-control" id="paracatucard">
                                        <option value='0'>Não</option>  
                                        <option value='1'>Sim</option>  
                                        //parei aqui 
                                        ?>
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="categoria_um">Categoria 1:</label>
                                    <select class="form-control" id="categoria_um" >
                                        <option value="<?php echo $empresa->categoria ?>"><?php echo $cat_um ?></option>
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
                                        <option value="<?php echo $empresa->categoria_dois ?>"><?php echo $cat_dois ?></option>
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
                                        <option value="<?php echo $empresa->categoria_tres ?>"><?php echo $cat_tres ?></option>
                                        <?php
                                        foreach ($categorias as &$var) {
                                            echo '<option value=' . $var->id_categoria . '>' . $var->categoria . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button class="btn btn-primary" id="btnEditarEmpresa" type="button">
                                    EDITAR
                                </button>                              
                                <INPUT TYPE="button" VALUE="VOLTAR" id="btnVoltarPainel" class="btn btn-default">
                            </form>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>       
    </body>
</html>