<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAO/DAO.php';
$categoria = $_GET['action'];

$obj = DAO::getInstance();
$a = $obj->buscarCategoriaProfissionalPorNome($categoria);

$id = $a[0]->id_categoria;
$empresas = $obj->buscarProfissionaisPorCategoria($id);

print_r(json_encode($empresas));
?>
