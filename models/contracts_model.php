<?php 
class contracts_model{
	private $db;
	private $contracts;

	public function __construct(){
		$this->db=Connect::connection();
		$this->contracts=array();
	}
	public function get_contracts(){
		//find all contracts
		$query=$this->db->query("select * from `ClientePlanesinternet`;");
		while($rows=$query->fetch_assoc())
		{
			$this->contracts[]=$rows;
		}
		return $this->contracts;
	}
	public function get_contractsByClient($clientId){
		//find only contracts by client
		$query=$this->db->query("select * from `ClientePlanesinternet` where `id_cliente`=`$clientId`;");
		while($rows=$query->fetch_assoc())
		{
			$this->contracts[]=$rows;
		}
		return $this->contracts;
	}
}

 ?>