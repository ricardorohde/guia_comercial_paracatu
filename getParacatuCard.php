<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAO/DAO.php';
$obj = DAO::getInstance();
$categorias = $obj->listarEmpresas_paracatucard_nome() ;
print_r(json_encode($categorias));
?>
