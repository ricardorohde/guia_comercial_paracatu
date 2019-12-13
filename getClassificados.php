<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAO/DAO.php';
$obj = DAO::getInstance();
$categorias = $obj->listarCategorias_classificados() ;
print_r(json_encode($categorias));
?>


//vai tomar no cu