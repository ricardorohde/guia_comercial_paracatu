<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAO/DAO.php';
$obj = DAO::getInstance();
$option = $_REQUEST['acao'];

if ($option == 'cadastrarAutonomo') {

    $nome = $_REQUEST['nome'];
    $endereco = $_REQUEST['endereco'];
    $telefone = $_REQUEST['telefone'];
    $celular = $_REQUEST['celular'];
    $campo_horario_abertura = $_REQUEST['campo_horario_abertura'];
    $campo_horario_fechamento = $_REQUEST['campo_horario_fechamento'];
    $paracatucard = $_REQUEST['paracatucard'];
    $categoria_um = $_REQUEST['categoria_um'];
    $categoria_dois = $_REQUEST['categoria_dois'];
    $categoria_tres = $_REQUEST['categoria_tres'];
	
	$a = $obj->buscarAutonomo_tres($nome);
    	$b = count($a);

	if($b == 0){
		echo('Sucesso!');
	}else{
		echo('Esta Empresa Já Existe');
		return;
	}
	
    if ($nome == "") {
        echo 'Digite O Nome Da Empresa';
        return;
    }

    if ($endereco == "") {
        echo 'Digite o Endereço Da empresa';
        return;
    }


    if ($categoria_um == "sem_valor") {
        echo 'A Categoria 1 é obrigatória';
        return;
    }

    if ($categoria_dois == "sem_valor") {
        $categoria_dois = $categoria_um;
    }

    if ($categoria_tres == "sem_valor") {
        $categoria_tres = $categoria_um;
    }

    if ($campo_horario_abertura == "") {
        echo 'Digite o Horario de Abertura Da empresa';
        return;
    }

    if ($campo_horario_fechamento == "") {
        echo 'Digite o Horario de fechamento Da empresa';
        return;
    }

    if ($obj->cadastrarAutonomo($nome, $endereco, $telefone, $celular, $campo_horario_abertura, $campo_horario_fechamento, $paracatucard, $categoria_um, $categoria_dois, $categoria_tres)) {
        echo 'Cadastro Realizado Com Sucesso!';
    } else {
        echo 'Erro ao Fazer Cadastro!';
    }
}if ($option == 'cadastrarEmpresa') {

    $nome = $_REQUEST['nome'];
    $endereco = $_REQUEST['endereco'];
    $telefone = $_REQUEST['telefone'];
    $celular = $_REQUEST['celular'];
    $campo_horario_abertura = $_REQUEST['campo_horario_abertura'];
    $campo_horario_fechamento = $_REQUEST['campo_horario_fechamento'];
    $paracatucard = $_REQUEST['paracatucard'];
    $categoria_um = $_REQUEST['categoria_um'];
    $categoria_dois = $_REQUEST['categoria_dois'];
    $categoria_tres = $_REQUEST['categoria_tres'];
	
	$a = $obj->buscarempresa_tres($nome);
    	$b = count($a);

	if($b == 0){
		echo('Sucesso!');
	}else{
		echo('Esta Empresa Já Existe');
		return;
	}
	
    if ($nome == "") {
        echo 'Digite O Nome Da Empresa';
        return;
    }

    if ($endereco == "") {
        echo 'Digite o Endereço Da empresa';
        return;
    }


    if ($categoria_um == "sem_valor") {
        echo 'A Categoria 1 é obrigatória';
        return;
    }

    if ($categoria_dois == "sem_valor") {
        $categoria_dois = $categoria_um;
    }

    if ($categoria_tres == "sem_valor") {
        $categoria_tres = $categoria_um;
    }

    if ($campo_horario_abertura == "") {
        echo 'Digite o Horario de Abertura Da empresa';
        return;
    }

    if ($campo_horario_fechamento == "") {
        echo 'Digite o Horario de fechamento Da empresa';
        return;
    }

    if ($obj->cadastrarEmpresas($nome, $endereco, $telefone, $celular, $campo_horario_abertura, $campo_horario_fechamento, $paracatucard, $categoria_um, $categoria_dois, $categoria_tres)) {
        echo 'Cadastro Realizado Com Sucesso!';
    } else {
        echo 'Erro ao Fazer Cadastro!';
    }
} else if ($option == 'excluirEmpresa') {
    $id = $_REQUEST['id'];
    if ($id == null) {
        echo 'Erro';
    } else {
        $obj->excluirEmpresas($id);
    }
} else if ($option == 'excluirAutonomo') {
    $id = $_REQUEST['id'];
    if ($id == null) {
        echo 'Erro';
    } else {
        $obj->excluirAutonomo($id);
    }
}  else if ($option == 'editarEmpresa') {
    $pieces = explode("=", $_REQUEST['id']);
    $id_empresa = $pieces[1];
    $nome = $_REQUEST['nome'];
    $endereco = $_REQUEST['endereco'];
    $telefone = $_REQUEST['telefone'];
    $celular = $_REQUEST['celular'];

    $campo_horario_abertura = $_REQUEST['campo_horario_abertura'];
    $campo_horario_fechamento = $_REQUEST['campo_horario_fechamento'];
    $paracatucard = $_REQUEST['paracatucard'];

    $categoria_um = $_REQUEST['categoria_um'];
    $categoria_dois = $_REQUEST['categoria_dois'];
    $categoria_tres = $_REQUEST['categoria_tres'];

    if ($nome == "") {
        echo 'Digite O Nome Da Empresa';
        return;
    }

    if ($endereco == "") {
        echo 'Digite o Telefone Da empresa';
        return;
    }

    /* if ($telefone == "") {
      echo 'Digite o Telefone Da empresa';
      return;
      }

      if ($celular == "") {
      echo 'Digite o Celular Da Empresa';
      return;
      } */

    if ($campo_horario_abertura == "") {
        echo 'Digite o Horario de Abertura Da empresa';
        return;
    }

    if ($campo_horario_fechamento == "") {
        echo 'Digite o Horario de fechamento Da empresa';
        return;
    }

    if ($categoria_um == "sem_valor") {
        echo 'A Categoria 1 é obrigatória';
        return;
    }


    if ($obj->editarEmpresas($nome, $endereco, $telefone, $celular, $campo_horario_abertura, $campo_horario_fechamento, $paracatucard, $categoria_um, $categoria_dois, $categoria_tres, $id_empresa)) {
        echo 'Edição Realizada Com Sucesso!';
    } else {
        echo 'Erro ao Fazer Cadastro!';
    }
} else if($option == 'editarAutonomo'){
    $pieces = explode("=", $_REQUEST['id']);
    $id_empresa = $pieces[1];
    $nome = $_REQUEST['nome'];
    $endereco = $_REQUEST['endereco'];
    $telefone = $_REQUEST['telefone'];
    $celular = $_REQUEST['celular'];

    $campo_horario_abertura = $_REQUEST['campo_horario_abertura'];
    $campo_horario_fechamento = $_REQUEST['campo_horario_fechamento'];
    $paracatucard = $_REQUEST['paracatucard'];

    $categoria_um = $_REQUEST['categoria_um'];
    $categoria_dois = $_REQUEST['categoria_dois'];
    $categoria_tres = $_REQUEST['categoria_tres'];

    if ($nome == "") {
        echo 'Digite O Nome Da Empresa';
        return;
    }

    if ($endereco == "") {
        echo 'Digite o Telefone Da empresa';
        return;
    }

    /* if ($telefone == "") {
      echo 'Digite o Telefone Da empresa';
      return;
      }

      if ($celular == "") {
      echo 'Digite o Celular Da Empresa';
      return;
      } */

    if ($campo_horario_abertura == "") {
        echo 'Digite o Horario de Abertura Da empresa';
        return;
    }

    if ($campo_horario_fechamento == "") {
        echo 'Digite o Horario de fechamento Da empresa';
        return;
    }

    if ($categoria_um == "sem_valor") {
        echo 'A Categoria 1 é obrigatória';
        return;
    }


    if ($obj->editarAutonomo($nome, $endereco, $telefone, $celular, $campo_horario_abertura, $campo_horario_fechamento, $paracatucard, $categoria_um, $categoria_dois, $categoria_tres, $id_empresa)) {
        echo 'Edição Realizada Com Sucesso!';
    } else {
        echo 'Erro ao Fazer Cadastro!';
    }
}else if ($option == 'adicionarCat') {

    $nome = $_REQUEST['nome'];
    $categorias = $obj->listarCategorias();
    $teste = true;


    if ($nome == "") {
        echo 'Digite o nome da categoria';
        return;
    } else {
        foreach ($categorias as &$var) {
            if ($var->categoria == $nome) {
                $teste = false;
            }
        }
    }

    if ($teste) {
        if ($obj->addCat($nome)) {
            echo 'Categoria Adicionada';
            return;
        } else {
            echo 'Erro';
            return;
        }
    } else {
        echo 'Categoria Já Existente';
        return;
    }
}else if ($option == 'adicionarCatAutonomos') {
    $nome = $_REQUEST['nome'];
    $categorias = $obj->listarCategoriasAutonomos();
    $teste = true;


    if ($nome == "") {
        echo 'Digite o nome da categoria';
        return;
    } else {
        foreach ($categorias as &$var) {
            if ($var->categoria == $nome) {
                $teste = false;
            }
        }
    }

    if ($teste) {
        if ($obj->addCatAutonomos($nome)) {
            echo 'Categoria Adicionada';
            return;
        } else {
            echo 'Erro';
            return;
        }
    } else {
        echo 'Categoria Já Existente';
        return;
    }
} else if ($option == 'excluirCategoria') {
    $id = $_REQUEST['id'];
    if ($id == null) {
        echo 'Erro';
    } else {
        $obj->excluirCategoria($id);
    }
}else if ($option == 'excluirCategoriaAutonomos') {
    $id = $_REQUEST['id'];
    if ($id == null) {
        echo 'Erro';
    } else {
        $obj->excluirCategoriaAutonomos($id);
    }
}else if ($option == 'alterarCategoria') {
    $id = $_REQUEST['id'];
    $novoNome = $_REQUEST['novoNome'];
    if ($novoNome == "") {
        echo 'Digite um nome!';
        return;
    } else {
        if ($obj->editarCategoria($id, $novoNome)) {
            echo 'Alterado com sucesso!';
            return;
        } else {
            echo 'Erro';
            return;
        }
    }
}else if ($option == 'alterarCategoriaAutonomos') {
    $id = $_REQUEST['id'];
    $novoNome = $_REQUEST['novoNome'];
    if ($novoNome == "") {
        echo 'Digite um nome!';
        return;
    } else {
        if ($obj->editarCategoriaAutonomos($id, $novoNome)) {
            echo 'Alterado com sucesso!';
            return;
        } else {
            echo 'Erro';
            return;
        }
    }
} else if ($option == 'buscarEmpresasPorCategoria') {
    $id = $_REQUEST['id'];
    if ($id == null) {
        echo 'erro';
    } else {
        $empresas = $obj->buscarEmpresasPorCategoria($id);
        if ($empresas == null) {
            echo 'null';
            return;
        } else {
            $resp = "";
            foreach ($empresas as &$var) {
                $resp = $resp . '<a><li onclick = verificarEmpresa(' . $var['id_empresa'] . '); style="background-color: #f6f6f6;  margin-bottom: 3px" class = "list-group-item">' . $var['nome'] . '</li><a>';
            }

            print_r($resp);
        }
    }
} else if ($option == 'buscarEmpresa') {
    $id = $_REQUEST['id'];
    if ($id == null) {
        echo 'erro';
    } else {
        $empresas = $obj->buscarempresa_dois($id);
        if ($empresas == null) {
            echo 'null';
            return;
        } else {
            $empresas = $empresas[0];
            $pieces = explode("htdocs", $empresas->logo);
            $empresas->logo = $pieces[1];
            print_r(json_encode($empresas));
        }
    }
} else if ($option == 'cadastrarPropaganda') {
    $empresa = $_REQUEST['empresa'];
    $descricao = $_REQUEST['descricao'];
    $link = "http://" . $_REQUEST['link'];

    if ($empresa == null) {
        echo 'Selecione a empresa';
    }

    if ($descricao == "") {
        echo 'Escreva uma Descrição';
    }

    //Flag que indica se há erro ou não
    $erro = null;

    //Quando enviado o formulário
    if (isset($_FILES['imagem'])) {

        // Extensões permitidas 
        $extensoes = array(".png", ".jpg", ".jpeg");

        //Caminho onde ficarão os arquivos  
        $caminho = $_SERVER['DOCUMENT_ROOT'] . '/propagandas/';

        //Recuperando informações do arquivo       
        $nome = $_FILES['imagem']['name'];
        $temp = $_FILES['imagem']['tmp_name'];

        //Verifica se a extensão é permitida     
        if (!in_array(strtolower(strrchr($nome, ".")), $extensoes)) {
            $erro = 'Extensão inválida';
        }

        //Se não houver erro
        if (!isset($erro)) {

            //Gerando um nome aleatório para o arquivo
            $nomeAleatorio = md5(uniqid(time())) . strrchr($nome, ".");

            //Movendo arquivo para servidor           
            if (!move_uploaded_file($temp, $caminho . $nomeAleatorio))
                $erro = 'Não foi possível anexar o arquivo';
        }
    }
    $caminho_final = $caminho . $nomeAleatorio;

    if ($link == NULL) {
        "http://" . $caminho;
    }

    if ($obj->cadastrarPropagandas($empresa, $descricao, $link, $caminho_final)) {
        echo 'Cadastro Realizado Com Sucesso!';
    } else {
        echo 'Erro ao Fazer Cadastro!';
    }
} else if ($option == 'cadastrarLogo') {
    $empresa = $_REQUEST['empresa'];

    if ($empresa == null) {
        echo 'Selecione a empresa';
    }

    //Flag que indica se há erro ou não
    $erro = null;

    //Quando enviado o formulário
    if (isset($_FILES['imagemLogo'])) {

        // Extensões permitidas 
        $extensoes = array(".png", ".jpg", ".jpeg");

        //Caminho onde ficarão os arquivos  
        $caminho = $_SERVER['DOCUMENT_ROOT'] . '/logos/';

        //Recuperando informações do arquivo       
        $nome = $_FILES['imagemLogo']['name'];
        $temp = $_FILES['imagemLogo']['tmp_name'];

        //Verifica se a extensão é permitida     
        if (!in_array(strtolower(strrchr($nome, ".")), $extensoes)) {
            $erro = 'Extensão inválida';
        }

        //Se não houver erro
        if (!isset($erro)) {

            //Gerando um nome aleatório para o arquivo
            $nomeAleatorio = md5(uniqid(time())) . strrchr($nome, ".");

            //Movendo arquivo para servidor           
            if (!move_uploaded_file($temp, $caminho . $nomeAleatorio))
                $erro = 'Não foi possível anexar o arquivo';
        }
    }

    $caminho_final = $caminho . $nomeAleatorio;

    if ($obj->cadastrarLogos($empresa, $caminho_final)) {
        echo 'Cadastro Realizado Com Sucesso!';
    } else {
        echo 'Erro ao Fazer Cadastro!';
    }
} else if($option == 'cadastrarLogoProfossional'){
     $empresa = $_REQUEST['empresa'];
    if ($empresa == null) {
        echo 'Selecione a empresa';
    }
    
    //Flag que indica se há erro ou não
    $erro = null;

    //Quando enviado o formulário
    if (isset($_FILES['imagemLogo'])) {

        // Extensões permitidas 
        $extensoes = array(".png", ".jpg", ".jpeg");

        //Caminho onde ficarão os arquivos  
        $caminho = $_SERVER['DOCUMENT_ROOT'] . '/logos/';

        //Recuperando informações do arquivo       
        $nome = $_FILES['imagemLogo']['name'];
        $temp = $_FILES['imagemLogo']['tmp_name'];

        //Verifica se a extensão é permitida     
        if (!in_array(strtolower(strrchr($nome, ".")), $extensoes)) {
            $erro = 'Extensão inválida';
        }

        //Se não houver erro
        if (!isset($erro)) {

            //Gerando um nome aleatório para o arquivo
            $nomeAleatorio = md5(uniqid(time())) . strrchr($nome, ".");

            //Movendo arquivo para servidor           
            if (!move_uploaded_file($temp, $caminho . $nomeAleatorio))
                $erro = 'Não foi possível anexar o arquivo';
        }
    }

    $caminho_final = $caminho . $nomeAleatorio;

    if ($obj->cadastrarLogos($empresa, $caminho_final)) {
        echo 'Cadastro Realizado Com Sucesso!';
    } else {
        echo 'Erro ao Fazer Cadastro!';
    }
}else if ($option == 'excluirLogo') {
    $empresa = $_REQUEST['empresa'];
    if ($empresa == null) {
        echo 'Erro';
    } else {
        $obj->excluirLogo($empresa);
    }
} else if ($option == 'login') {
    $login = $_REQUEST['login'];
    $senha = $_REQUEST['senha'];

    if (empty($login)) {
        echo 'Favor informe o login;';
        return;
    }
    if (empty($senha)) {
        echo 'Favor informe a senha;';
        return;
    }

    $admin = $obj->login($login, $senha);

    if ($admin) {
        $valor = 'logado';
        $_SESSION['node']['user'] = $valor;
        echo 'true';
    } else {
        echo 'Senha Incorreta';
    }
} else if ($option == 'deslogar') {
    $chave = 'user';
    if (isset($_SESSION['node'][$chave])) {
        unset($_SESSION['node'][$chave]);
        echo 'Deslogado';
    } else {
        echo 'Erro';
    }
} else if ($option == 'cadastrarDestaque') {

    //Flag que indica se há erro ou não
    $erro = null;

    //Quando enviado o formulário
    if (isset($_FILES['imagem'])) {

        // Extensões permitidas 
        $extensoes = array(".png", ".jpg", ".jpeg");

        //Caminho onde ficarão os arquivos  
        $caminho = $_SERVER['DOCUMENT_ROOT'] . '/img/';

        //Recuperando informações do arquivo       
        $nome = $_FILES['imagem']['name'];
        $temp = $_FILES['imagem']['tmp_name'];

        //Verifica se a extensão é permitida     
        if (!in_array(strtolower(strrchr($nome, ".")), $extensoes)) {
            $erro = 'Extensão inválida';
        }

        //Se não houver erro
        if (!isset($erro)) {

            //Gerando um nome aleatório para o arquivo
            $nomeAleatorio = md5(uniqid(time())) . strrchr($nome, ".");

            //Movendo arquivo para servidor           
            if (!move_uploaded_file($temp, $caminho . $nomeAleatorio))
                $erro = 'Não foi possível anexar o arquivo';
        }
    }
    $caminho_final = $caminho . $nomeAleatorio;

    if ($obj->cadastrarDestaque($caminho_final)) {
        echo 'Cadastro Realizado Com Sucesso!';
    } else {
        echo 'Erro ao Fazer Cadastro!';
    }
} else if ($option == 'excluirDestaque') {
    $id = ($_POST['id']);
    if ($obj->excluirDestaque($id)) {
        echo 'Sucesso!';
    } else {
        echo 'Erro';
    }
} else if ($option == 'buscarSenha') {
    $senha = $obj->buscarSenha();
    print_r($senha[0]->senha);
} else if ($option == 'cadastrarSenhaPainel') {
    $senha = $_REQUEST['senha'];
    $senha_dois = $_REQUEST['senha_dois'];
    
    if($senha == $senha_dois){
        if($obj->addSenhaPainel($senha)){
            echo 'Senha Cadastrada Com Sucesso';
        }else{
            echo 'Erro';
        }
    }else{
        echo 'Campos com senhas diferentes.';
    }
    
}