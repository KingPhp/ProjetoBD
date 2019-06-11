<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;


//os models
use App\Models\Produto;
use App\Models\Info;


class EccomerceController extends Action {

	public function index(){
		$this->render('index', 'layoutEc');
	}#end function index()

	public function cadastroVendedor(){
		session_start();
		if(isset($_SESSION['tipo']) && $_SESSION['tipo']=='vendedor'){
			header("Location:/vendedor");
		}
		$this->render('cadastro_vendedor','layoutEc');
	}#end function cadastroVendedor()

	public function inserirVendedor(){
		$vendedor = Container::getModel('Vendedor');
		$vendedor->__set('nome',$_POST['nome']);
		$vendedor->__set('email',$_POST['email']);
		$vendedor->__set('username',$_POST['username']);
		$vendedor->__set('senha',$_POST['senha']);
		$vendedor->__set('cep',$_POST['cep']);
		$vendedor->__set('logradouro',$_POST['logradouro']);
		$vendedor->__set('bairro',$_POST['bairro']);
		$vendedor->__set('numero',$_POST['numero']);
		$vendedor->insereVendedor();

		session_start();
		$_SESSION['id_vendedor'] = $vendedor->__get('id_vendedor');
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['nome'] = $_POST['nome'];
		$_SESSION['senha']    = $_POST['senha'];
		$_SESSION['tipo']     = 'vendedor';

		header("Location: /vendedor");
	}#end function inserirVendedor()



}#end class


?>
