<?php
 namespace App\Models;

 use MF\Model\Model;

 class Produto extends Model{

    private $id_vendedor;
	private $id_produto;
	private $nome;
	private $descricao;
    private $preco;

	public function __get($atributo){
		return $this->$atributo;
	}#end function __get()

	public function __set($atributo, $valor){
		$this->$atributo = $valor;
	}#end function __set()

	public function insereProduto(){
		$query = "INSERT INTO Produto (id_produto, nome, descricao, preco) values (:id_produto, :nome, :descricao, :preco)";

		$stmt  = $this->db->prepare($query);
		$stmt->bindValue(':id_produto', $this->__get('id_produto'));
		$stmt->bindValue(':nome', $this->__get('nome'));
		$stmt->bindValue(':descricao',$this->__get('descricao'));
		$stmt->bindValue(':preco',$this->__get('preco'));
		

		$stmt->execute();
		
	}#end function insereVendedor()

	

 }#end class

?>
