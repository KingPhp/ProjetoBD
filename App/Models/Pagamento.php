<?php
 namespace App\Models;

 use MF\Model\Model;

 class Pagamento extends Model{

	private $id_cliente;
	private $forma;

	public function __get($atributo){
		return $this->$atributo;
	}#end function __get()

	public function __set($atributo, $valor){
		$this->$atributo = $valor;
	}#end function __set()

	public function inserePagamento(){
		$query = "INSERT INTO Pagamento (forma) values (:forma)";

		$stmt  = $this->db->prepare($query);
		$stmt->bindValue(':forma', $this->__get('forma'));
		

		$stmt->execute();
		
	}#end function insereVendedor()

	

 }#end class

?>
