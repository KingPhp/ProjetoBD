<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class DashController extends Action {

	public function home(){
    $this->validaSessao();
		$this->view->nome = explode(' ', $_SESSION['nome']);
		$this->render('index', 'layoutDash');
	}#end function index()


	public function perfil(){
		$this->validaSessao();
		$infoVendor = Container::getModel('Vendedor');
		$infoVendor->__set('id_vendedor',$_SESSION['id_vendedor']);
		$this->view->info = $infoVendor->getVendedor();
		$this->view->nome = $_SESSION['nome'];
		$this->render('perfil', 'layoutDash');
	}#end function perfil()


	public function remove(){
		$this->validaSessao();
		$vendedor = Container::getModel('Vendedor');
		$vendedor->__set('id_vendedor',$_POST['id_vendedor']);
		$vendedor->removerUser();
		session_destroy();
		header("Location: /");
	}#end function remove()


	public function updateDados(){
		$this->validaSessao();
		$vendedor = Container::getModel('Vendedor');
		$vendedor->__set('id_vendedor',$_POST['id_vendedor']);
		$vendedor->__set('nome',$_POST['nome']);
		$vendedor->__set('username',$_POST['username']);
		$vendedor->__set('senha',$_POST['senha']);
		$vendedor->updateDados();
		$_SESSION['dados_pessoais'] = true;
		$_SESSION['nome'] = $vendedor->__get('nome');
		header("Location: /perfil");
	}#end function updateDados()






	public function validaSessao(){
    session_start();
		if(!isset($_SESSION['username']) && !isset($_SESSION['senha']) || $_SESSION['tipo'] != 'vendedor'){
			header("Location: /");
		}

	}#end function validaSessao()


	public function logout(){
		session_start();
		session_destroy();
		header("Location:/");
	}#end function logout()




}#end class


?>
