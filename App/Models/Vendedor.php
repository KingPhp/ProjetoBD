<?php
 namespace App\Models;

 use MF\Model\Model;

 class Vendedor extends Model{

	private $id_vendedor;
	private $nome;
	private $username;
	private $email;
	private $senha;
	private $cep;
	private $logradouro;
	private $bairro;
	private $numero;
	private $access;

	public function __get($atributo){
		return $this->$atributo;
	}#end function __get()

	public function __set($atributo, $valor){
		$this->$atributo = $valor;
	}#end function __set()

	public function insereVendedor(){
		$query = "INSERT INTO vendedor VALUES (default, :nome, :username, :email, :senha, :cep, :logradouro, :bairro, :numero)";
		$stmt  = $this->db->prepare($query);

		$stmt->bindValue(':nome',$this->__get('nome'));
		$stmt->bindValue(':username',$this->__get('username'));
		$stmt->bindValue(':email',$this->__get('email'));
		$stmt->bindValue(':senha',$this->__get('senha'));
		$stmt->bindValue(':cep',$this->__get('cep'));
		$stmt->bindValue(':logradouro',$this->__get('logradouro'));
		$stmt->bindValue(':bairro',$this->__get('bairro'));
		$stmt->bindValue(':numero',$this->__get('numero'));
		$stmt->execute();
		$this->__set('id_vendedor',$this->db->lastInsertId());
	}#end function insereVendedor()

	public function getVendedor(){
		$query = "SELECT * FROM vendedor WHERE id_vendedor = :id_vendedor";
		$stmt  = $this->db->prepare($query);
		$stmt->bindValue(':id_vendedor',$this->__get('id_vendedor'));
		$stmt->execute();
		return $stmt->fetch(\PDO::FETCH_ASSOC);
	}#end function getVendedor()


	public function validar(){
		$query = "SELECT id_vendedor,nome, username, email, senha FROM vendedor WHERE email = :email and senha = :senha";
		$stmt  = $this->db->prepare($query);
		$stmt->bindValue(':email', $this->__get('email'));
		$stmt->bindValue(':senha', $this->__get('senha'));
		$stmt->execute();
		$usuario = $stmt->fetch(\PDO::FETCH_ASSOC);

		if($usuario['id_vendedor'] != ''){
			$this->__set('id_vendedor', $usuario['id_vendedor']);
			$this->__set('nome', $usuario['nome']);
			$this->__set('username', $usuario['username']);
			$this->__set('access', true);
		}

	}#end functio validar()

	public function updateDados(){
		$query =
		"UPDATE vendedor
		SET nome = :nome, username = :username, senha = :senha
		WHERE id_vendedor = :id_vendedor";
		
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':nome',$this->__get('nome'));
		$stmt->bindValue(':username',$this->__get('username'));
		$stmt->bindValue(':senha',$this->__get('senha'));
		$stmt->bindValue(':id_vendedor',$this->__get('id_vendedor'));
		$stmt->execute();
	}#end function updateDados()

	public function removerUser(){
		$query = "DELETE FROM vendedor WHERE id_vendedor = :id_vendedor";
		$stmt  = $this->db->prepare($query);
		$stmt->bindValue('id_vendedor',$this->__get('id_vendedor'));
		$stmt->execute();
	}#end function removerUser()


 }#end class

?>
