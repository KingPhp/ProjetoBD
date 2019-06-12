<?php
 namespace App\Models;

 use MF\Model\Model;

 class Pedido extends Model{

	private $id_cliente;
    private $id_produto;
    private $data;

	public function __get($atributo){
		return $this->$atributo;
	}#end function __get()

	public function __set($atributo, $valor){
		$this->$atributo = $valor;
	}#end function __set()

	public function inserePedido(){
		$query = "INSERT INTO Pedido (data) values (:data)";

		$stmt  = $this->db->prepare($query);
		$stmt->bindValue(':data', $this->__get('data'));
		

		$stmt->execute();
		
	}#end function insereVendedor()

	

 }#end class

?>
