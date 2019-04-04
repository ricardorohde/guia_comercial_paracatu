<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DAO/DAO.php';
$empresa = 'Maia Auto Escola';

$obj = DAO::getInstance();
$a = $obj->buscarempresa_tres($empresa);
$b = count($a);

	if($b == 1){
		print('Normal');
	}else{
		print('repetido');
	}

print($b);
?>
