<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/DAO/Conexao.php";

class DAO {

    private static $instancia = null;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (self::$instancia == NULL) {
            self::$instancia = new DAO();
        }
        return self::$instancia;
    }

    function listarCategorias() {
        try {
            $sql = "SELECT * FROM categoria ORDER BY categoria";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }
    
    
    function listarCategoriasAutonomos() {
        try {
            $sql = "SELECT * FROM categoria_autonomos ORDER BY categoria";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }

    function cadastrarEmpresas($nome, $endereco, $telefone, $celular, $campo_horario_abertura, $campo_horario_fechamento, $paracatucard, $categoria, $categoria_dois, $categoria_tres) {
        try {
            $sql = "INSERT INTO `empresa` (`id_empresa`, `nome`, `endereco`, `telefone`, `celular`, `horario_abertura`, `horario_fechamento`, "
                    . "`paracatucard`,`categoria`, `categoria_dois`, `categoria_tres`)"
                    . " VALUES (NULL, ?, ?, ?, ?, ?, ?, ?,?,?,?)";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $nome);
            $p_sql->bindValue(2, $endereco);
            $p_sql->bindValue(3, $telefone);
            $p_sql->bindValue(4, $celular);
            $p_sql->bindValue(5, $campo_horario_abertura);
            $p_sql->bindValue(6, $campo_horario_fechamento);
            $p_sql->bindValue(7, $paracatucard);
            $p_sql->bindValue(8, $categoria);
            $p_sql->bindValue(9, $categoria_dois);
            $p_sql->bindValue(10, $categoria_tres);
            if ($p_sql->execute()) {
                return true;
            }
        } catch (Exception $exc) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $exc";
        }
    }
    
    function cadastrarAutonomo($nome, $endereco, $telefone, $celular, $campo_horario_abertura, $campo_horario_fechamento, $paracatucard, $categoria, $categoria_dois, $categoria_tres) {
        try {
            $sql = "INSERT INTO `profissional_autonomo` (`id_empresa`, `nome`, `endereco`, `telefone`, `celular`, `horario_abertura`, `horario_fechamento`, "
                    . "`paracatucard`,`categoria`, `categoria_dois`, `categoria_tres`)"
                    . " VALUES ('', ?, ?, ?, ?, ?, ?, ?,?,?,?)";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $nome);
            $p_sql->bindValue(2, $endereco);
            $p_sql->bindValue(3, $telefone);
            $p_sql->bindValue(4, $celular);
            $p_sql->bindValue(5, $campo_horario_abertura);
            $p_sql->bindValue(6, $campo_horario_fechamento);
            $p_sql->bindValue(7, $paracatucard);
            $p_sql->bindValue(8, $categoria);
            $p_sql->bindValue(9, $categoria_dois);
            $p_sql->bindValue(10, $categoria_tres);
            if ($p_sql->execute()) {
                return true;
            }
        } catch (Exception $exc) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $exc";
        }
    }


    function listarEmpresas() {
        try {

            $sql = "SELECT empresa.id_empresa, empresa.nome, empresa.endereco, empresa.telefone, empresa.celular, empresa.horario_abertura, empresa.horario_fechamento,empresa.paracatucard,cat1.categoria as cat_um , cat2.categoria as cat_dois, "
                    . "cat3.categoria as cat_tres FROM empresa LEFT join categoria as cat1 ON (cat1.id_categoria = empresa.categoria) LEFT join categoria as cat2 "
                    . "ON (cat2.id_categoria = empresa.categoria_dois) LEFT join categoria as cat3 ON (cat3.id_categoria = empresa.categoria_tres) ORDER BY empresa.nome";

            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }
    
    function listarAutonomos() {
        try {

            $sql = "SELECT profissional_autonomo.id_empresa, profissional_autonomo.nome, profissional_autonomo.endereco, profissional_autonomo.telefone, profissional_autonomo.celular, profissional_autonomo.horario_abertura, profissional_autonomo.horario_fechamento,profissional_autonomo.paracatucard,cat1.categoria as cat_um , cat2.categoria as cat_dois, "
                    . "cat3.categoria as cat_tres FROM profissional_autonomo LEFT join categoria_autonomos as cat1 ON (cat1.id_categoria = profissional_autonomo.categoria) LEFT join categoria as cat2 "
                    . "ON (cat2.id_categoria = profissional_autonomo.categoria_dois) LEFT join categoria as cat3 ON (cat3.id_categoria = profissional_autonomo.categoria_tres) ORDER BY profissional_autonomo.nome";

            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }

    function excluirEmpresas($id) {
        try {
            $sql = "DELETE FROM empresa WHERE id_empresa = ?";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $id);

            if ($stmt->execute()) {
                echo 'Deletado com Sucesso!';
            }
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }
 function excluirAutonomo($id) {
        try {
            $sql = "DELETE FROM profissional_autonomo WHERE id_empresa = ?";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $id);

            if ($stmt->execute()) {
                echo 'Deletado com Sucesso!';
            }
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }
    function excluirCategoria($id) {
        try {
            $sql = "DELETE FROM categoria WHERE id_categoria = ?";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $id);
            if ($stmt->execute()) {
                echo 'Deletado com Sucesso!';
            }
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Existe um empresa com esta categoria!";
        }
    }
    
    function excluirCategoriaAutonomos($id) {
        try {
            $sql = "DELETE FROM categoria_autonomos WHERE id_categoria = ?";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $id);
            if ($stmt->execute()) {
                echo 'Deletado com Sucesso!';
            }
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Existe um empresa com esta categoria!";
        }
    }

    function buscarempresa($id) {
        try {
            $sql = "SELECT * FROM empresa WHERE id_empresa = ?";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }
	
	function buscarprofissional($id) {
        try {
            $sql = "SELECT * FROM profissional_autonomo WHERE id_empresa = ?";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }
    
    function buscarAutonomo($id) {
        try {
            $sql = "SELECT * FROM profissional_autonomo WHERE id_empresa = ?";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }
	
	function buscarempresa_porNome($nome) {
        try {
            $sql = "select empresa.id_empresa, empresa.nome FROM empresa WHERE empresa.nome = ?";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $nome);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }
	
	function buscarprofissional_porNome($nome) {
        try {
            $sql = "select profissional_autonomo.id_empresa, profissional_autonomo.nome FROM profissional_autonomo WHERE profissional_autonomo.nome = ?";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $nome);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }


    function buscarempresa_dois($id) {
        try {
            $sql = "SELECT * FROM empresa WHERE id_empresa = ?";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }
	
	
	
	function buscarempresa_tres($nome) {
        try {
            $sql = "SELECT * FROM empresa WHERE nome = ?";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $nome);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }
    
    function buscarAutonomo_tres($nome) {
        try {
            $sql = "SELECT * FROM profissional_autonomo WHERE nome = ?";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $nome);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }

    function editarEmpresas($nome, $endereco, $telefone, $celular, $campo_horario_abertura, $campo_horario_fechamento, $paracatucard, $categoria, $categoria_dois, $categoria_tres, $id_empresa) {
        try {
            $sql = "UPDATE empresa SET nome = ?, endereco = ?, telefone = ?, celular = ?, horario_abertura = ?, horario_fechamento = ?, paracatucard = ?, categoria = ?, "
                    . "categoria_dois = ?, categoria_tres = ?"
                    . "WHERE id_empresa = ?;";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $nome);
            $p_sql->bindValue(2, $endereco);
            $p_sql->bindValue(3, $telefone);
            $p_sql->bindValue(4, $celular);
            $p_sql->bindValue(5, $campo_horario_abertura);
            $p_sql->bindValue(6, $campo_horario_fechamento);
            $p_sql->bindValue(7, $paracatucard);
            $p_sql->bindValue(8, $categoria);
            $p_sql->bindValue(9, $categoria_dois);
            $p_sql->bindValue(10, $categoria_tres);
            $p_sql->bindValue(11, $id_empresa);

            if ($p_sql->execute()) {
                return true;
            }
        } catch (Exception $exc) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $exc";
        }
    }
    
    function editarAutonomo($nome, $endereco, $telefone, $celular, $campo_horario_abertura, $campo_horario_fechamento, $paracatucard, $categoria, $categoria_dois, $categoria_tres, $id_empresa) {
        try {
            $sql = "UPDATE profissional_autonomo  SET nome = ?, endereco = ?, telefone = ?, celular = ?, horario_abertura = ?, horario_fechamento = ?, paracatucard = ?, categoria = ?, "
                    . "categoria_dois = ?, categoria_tres = ?"
                    . "WHERE id_empresa = ?;";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $nome);
            $p_sql->bindValue(2, $endereco);
            $p_sql->bindValue(3, $telefone);
            $p_sql->bindValue(4, $celular);
            $p_sql->bindValue(5, $campo_horario_abertura);
            $p_sql->bindValue(6, $campo_horario_fechamento);
            $p_sql->bindValue(7, $paracatucard);
            $p_sql->bindValue(8, $categoria);
            $p_sql->bindValue(9, $categoria_dois);
            $p_sql->bindValue(10, $categoria_tres);
            $p_sql->bindValue(11, $id_empresa);

            if ($p_sql->execute()) {
                return true;
            }
        } catch (Exception $exc) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $exc";
        }
    }

    function addCat($nome) {
        try {
            $sql = "INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES (NULL, ?)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $nome);
            if ($p_sql->execute()) {
                return true;
            }
        } catch (Exception $exc) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $exc";
        }
    }
    
    function addCatAutonomos($nome) {
        try {
            $sql = "INSERT INTO `categoria_autonomos` (`id_categoria`, `categoria`) VALUES (NULL, ?)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $nome);
            if ($p_sql->execute()) {
                return true;
            }
        } catch (Exception $exc) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $exc";
        }
    }

    function editarCategoria($id, $novoNome) {
        try {
            $sql = "UPDATE categoria SET categoria = ?"
                    . "WHERE id_categoria = ?;";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $novoNome);
            $p_sql->bindValue(2, $id);
            if ($p_sql->execute()) {
                return true;
            }
        } catch (Exception $exc) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $exc";
        }
    }
    
    function editarCategoriaAutonomos($id, $novoNome) {
        try {
            $sql = "UPDATE categoria_autonomos SET categoria = ?"
                    . "WHERE id_categoria = ?;";

            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $novoNome);
            $p_sql->bindValue(2, $id);
            if ($p_sql->execute()) {
                return true;
            }
        } catch (Exception $exc) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $exc";
        }
    }

    function buscarEmpresasPorCategoria($id) {
        try {

            $sql = "SELECT id_empresa, nome FROM empresa WHERE categoria = ? or categoria_dois = ? or categoria_tres = ? ORDER BY nome ASC";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->bindValue(2, $id);
            $stmt->bindValue(3, $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $exc";
        }
    }
	
	function buscarProfissionaisPorCategoria($id) {
        try {

            $sql = "SELECT id_empresa, nome FROM profissional_autonomo WHERE categoria = ? or categoria_dois = ? or categoria_tres = ? ORDER BY nome ASC";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->bindValue(2, $id);
            $stmt->bindValue(3, $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $exc";
        }
    }

    function buscarEmpresasPorPalavraChave($palavraChave) {
        try {
            $sql = "SELECT * FROM empresa WHERE nome LIKE ? ORDER BY nome ASC";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, '%' . $palavraChave . '%');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $exc";
        }
    }
	
     
    function buscarCategoriasPorPalavraChave($palavraChave) {
        try {
            $sql = "SELECT * FROM categoria WHERE categoria LIKE ?";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, '%' . $palavraChave . '%');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $exc";
        }
    }

    function verificarPropaganda($id) {
        try {
            $sql = "select count(*)as numero from propaganda WHERE propaganda.id_empresa = ?";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $var = $stmt->fetchAll(PDO::FETCH_OBJ);
            $var = $var[0]->numero;

            if ($var > 0) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }

    function listarEmpresasOrd() {
        try {
            $sql = "SELECT id_empresa, nome FROM empresa ORDER BY nome";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }

    function listarEmpresasParacatuCard() {
        try {
            $sql = "SELECT id_empresa, nome FROM empresa where paracatucard = 1 ORDER BY nome";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }

    function cadastrarPropagandas($empresa, $descricao, $link, $caminho_final) {
        try {
            $sql = "INSERT INTO `propaganda` (`id_propaganda`, `caminho`, `descricao`, `link`, `id_empresa`) VALUES (NULL, ?, ?, ?, ?)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $caminho_final);
            $p_sql->bindValue(2, $descricao);
            $p_sql->bindValue(3, $link);
            $p_sql->bindValue(4, $empresa);
            if ($p_sql->execute()) {
                return true;
            }
        } catch (Exception $exc) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $exc";
        }
    }

    function cadastrarDestaque($caminho_final) {
        try {
            $sql = "INSERT INTO `destaques` (`id_destaque`, `destaque`) VALUES (NULL, ?)";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $caminho_final);
            if ($p_sql->execute()) {
                return true;
            }
        } catch (Exception $exc) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $exc";
        }
    }

    function listarPropagandas($id) {
        try {
            $sql = "SELECT * FROM propaganda WHERE id_empresa = ?";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }

    function listarDestaques() {
        try {
            $sql = "select * from destaques";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }

    function cadastrarLogos($empresa, $caminho_final) {
        try {
            $sql = "UPDATE empresa SET logo = ? WHERE id_empresa = ?";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $caminho_final);
            $p_sql->bindValue(2, $empresa);
            if ($p_sql->execute()) {
                return true;
            }
        } catch (Exception $exc) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $exc";
        }
    }
	
	function cadastrarLogosProfissional($empresa, $caminho_final) {
        try {
            $sql = "UPDATE profissional_autonomo SET logo = ? WHERE id_empresa = ?";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $caminho_final);
            $p_sql->bindValue(2, $empresa);
            if ($p_sql->execute()) {
                return true;
            }
        } catch (Exception $exc) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $exc";
        }
    }

    function excluirLogo($empresa) {
        try {
            $sql = "UPDATE empresa SET logo = ? WHERE id_empresa = ?";
			$p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, "");
            $p_sql->bindValue(2, $empresa);

            if ($p_sql->execute()) {
                echo 'Deletado com Sucesso!';
            }
            return $p_sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Existe um empresa com esta categoria!";
        }
    }
	
	 function excluirLogoProfissional($empresa) {
        try {
            $sql = "UPDATE profissional_autonomo SET logo = ? WHERE id_empresa = ?";
			$p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, "");
            $p_sql->bindValue(2, $empresa);

            if ($p_sql->execute()) {
                echo 'Deletado com Sucesso!';
            }
            return $p_sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Existe um empresa com esta categoria!";
        }
    }
	
	 function listarProfissionaisOrd() {
        try {
            $sql = "SELECT id_empresa, nome FROM profissional_autonomo ORDER BY nome";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }

    public function login($login, $senha) {
        try {
            $sql = "SELECT * FROM user WHERE login = ?  AND senha = ?";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $login);
            $p_sql->bindValue(2, $senha);
            $p_sql->execute();
            if ($p_sql->rowCount() == 1)
                return true;
            else
                return false;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação. <br> $e";
        }
    }

    function excluirDestaque($id) {
        try {
            $sql = "DELETE FROM destaques WHERE id_destaque = ?";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(1, $id);

            if ($stmt->execute()) {
                echo 'Deletado com Sucesso!';
            }
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }
    
    function buscarSenha() {
        try {
            $sql = "SELECT senha FROM `supersu`";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }
    
    function addSenhaPainel($senha) {
        try {
            $sql = "UPDATE supersu SET senha = ?";                  
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(1, $senha);
            if ($p_sql->execute()) {
                return true;
            }
        } catch (Exception $exc) {
            echo "Ocorreu um erro ao tentar executar esta ação. <br> $exc";
        }
    }
	
	 function listarCategorias_classificados() {
        try {
            $sql = "SELECT categoria FROM categoria_classificados ORDER BY categoria";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }
	
	function listarCategorias_autonomos() {
        try {
            $sql = "SELECT * FROM `categoria_autonomos` WHERE 1 ";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }
	
	function listarCategorias_nome() {
        try {
            $sql = "SELECT categoria FROM categoria ORDER BY categoria";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }
	
	
	function listarEmpresas_paracatucard_nome() {
        try {
            $sql = "SELECT nome FROM `empresa` WHERE empresa.paracatucard = 0";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }
	
	function buscarCategoriaPorNome($nome) {
        try {
            $sql = "select categoria.id_categoria FROM categoria where categoria = ?";
            $stmt = Conexao::getInstance()->prepare($sql);
			$stmt->bindValue(1, $nome);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }
	
	function buscarCategoriaProfissionalPorNome($nome) {
        try {
            $sql = "select categoria_autonomos.id_categoria FROM categoria_autonomos where categoria = ?";
            $stmt = Conexao::getInstance()->prepare($sql);
			$stmt->bindValue(1, $nome);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage();
        }
    }
	
	
}