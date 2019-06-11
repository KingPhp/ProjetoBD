<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action {


public function validar(){

	switch ($_POST['tipo']) {
		case 'cliente':
			$validar = Container::getModel('cliente');
			break;
		case 'vendedor':
			$validar = Container::getModel('vendedor');
			break;

		default:
			header("Location: /");
			break;
	}#end switch

	$validar->__set('email', $_POST['email']);
	$validar->__set('senha', $_POST['senha']);

	$validar->validar();

	if($validar->__get('access')==true){
		session_start();
		$_SESSION['id_vendedor'] = $validar->__get('id_vendedor');
		$_SESSION['nome'] = $validar->__get('nome');
		$_SESSION['username'] = $validar->__get('username');
		$_SESSION['senha'] = $_POST['senha'];
		$_SESSION['tipo']  = 'vendedor';
		header("Location: /vendedor");
	}else{
		header("Location: /?error");
	}



}#end function validar()

}#end class
