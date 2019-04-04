<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAO/DAO.php';
$id = $_GET['action'];
$obj = DAO::getInstance();
$empresas = $obj->buscarempresa($id);
print_r(json_encode($empresas));
?>
