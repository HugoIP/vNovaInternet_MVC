<?php 
class clients_model{
	private $db;
	private $clients;

	public function __construct(){
		$this->db=Connect::connection();
		$this->clients=array();
	}
	public function get_clients(){
		$query=$this->db->query("select * from `clientes`;");
		while($rows=$query->fetch_assoc())
		{
			$this->clients[]=$rows;
		}
		return $this->clients;
	}
}

 ?>