<?php

namespace App;

use MF\Init\Bootstrap;


class Route extends Bootstrap{

	protected function initRoutes(){

		/*==================================================================
		ROTAS REFERENTES AO SITE PRINCIPAL ECCOMERCE*/

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'eccomerceController',
			'action' => 'index'
		);

		$routes['cadVendor'] = array(
			'route' => '/cadastro_vendedor',
			'controller' => 'eccomerceController',
			'action' => 'cadastroVendedor'
		);

		$routes['inseVendor'] = array(
			'route' => '/inserir_vendedor',
			'controller' => 'eccomerceController',
			'action' => 'inserirVendedor'
		);

		/*==================================================================
		ROTAS DO PAINEL VENDEDOR*/

		$routes['vendedor'] = array(
			'route' => '/vendedor',
			'controller' => 'dashController',
			'action' => 'home'
		);


		$routes['perfil'] = array(
			'route' => '/perfil',
			'controller' => 'dashController',
			'action' => 'perfil'
		);

		$routes['update_dados'] = array(
			'route' => '/update_dados',
			'controller' => 'dashController',
			'action' => 'updateDados'
		);


/*=======================================
===============================*/

		$routes['logout'] = array(
			'route' => '/logout',
			'controller' => 'dashController',
			'action' => 'logout'
		);

		$routes['validar'] = array(
			'route' => '/validar',
			'controller' => 'authController',
			'action' => 'validar'
		);


		$routes['remove'] = array(
			'route' => '/remove',
			'controller' => 'dashController',
			'action' => 'remove'
		);









		$this->setRoutes($routes);

	}


}#end class

?>
