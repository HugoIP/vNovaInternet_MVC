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
		$query=$this->db->query("select * from `ClientePlanesinternet` where `id_cliente`=$clientId;");
		$total_num_rows = 0;
		if (!$query)
	    {
	     //... 
	    }
	    else if (is_object($query))
	    {
	        $total_num_rows = $query->num_rows;
	    }
	    else
	    {
	        $total_num_rows = 0;
	    }
			
		if ($total_num_rows > 0) {
			while($rows=$query->fetch_assoc())
			{
				$this->contracts[]=$rows;
			}
		}
		return $this->contracts;
	}
}

 ?>