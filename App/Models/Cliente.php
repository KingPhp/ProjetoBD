<?php
 namespace App\Models;

 use MF\Model\Model;

 class Cliente extends Model{

	private $id_cliente;
	private $nome;
	private $email;
	private $senha;

	public function __get($atributo){
		return $this->$atributo;
	}#end function __get()

	public function __set($atributo, $valor){
		$this->$atributo = $valor;
	}#end function __set()

	public function insereCliente(){
		$query = "INSERT INTO Cliente (nome, email, senha) values (:nome, :email, :senha)";

		$stmt  = $this->db->prepare($query);
		$stmt->bindValue(':nome', $this->__get('nome'));
		$stmt->bindValue(':email',$this->__get('email'));
		$stmt->bindValue(':senha',$this->__get('senha'));
		

		$stmt->execute();
		
	}#end function insereVendedor()

	

 }#end class

?>
