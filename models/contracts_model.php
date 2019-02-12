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
		$query=$this->db->query("select * from `ClientePlanesinternet` where `id_cliente`='$clientId';");
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
	public function updateStatus()
	{
		//day less
		$query=$this->db->query("SELECT TIMESTAMPDIFF( 
DAY , CURDATE() , `ClientePlanesinternet`.`date_fechaInicioPeriodo`) AS dias,`ClientePlanesinternet`.`id_contratoInternet`, `ClientePlanesinternet`.`id_planInternet`
FROM`ClientePlanesinternet` WHERE `ClientePlanesinternet`.`text_status`='activo'");

		while ($row=$query->fetch_assoc()){
		if($row["dias"] == 0){
			$sql ="";
			/*PENDIENTES*/
			//Obtener total de dias sin servicio
			//Obtener total de dias faltantes para este contrato
			if($row["id_planInternet"] == 2 || $row["id_planInternet"] == 7 || $row["id_planInternet"] == 9 || $row["id_planInternet"] == 12 || $row["id_planInternet"] == 13)
			{
				//wifi
				//Cobros wi-fi
				//prepago
				//Se debe indicar que hoy inicia el periodo
		   $sql="INSERT INTO `CobrosPlanesinternet` ( `id_cobroPlaninternet` , `id_contratoInternet` , `text_concepto` , `id_descuento`,`float_monto`,`date_FechaInicioPeriodo` ,`date_FechaFinPeriodo` , `text_status` )
				SELECT (CONCAT('C', `ClientePlanesinternet`.`id_contratoInternet`,`ClientePlanesinternet`.`date_fechaInicioPeriodo`,'U',`ClientePlanesinternet`.`id_cliente`)) ,`ClientePlanesinternet`.`id_contratoInternet`,  `planesInternet`.`text_nombrePlan`, `ClientePlanesinternet`.`id_descuento`,COALESCE(`planesInternet`.`float_costo`-COALESCE((SELECT `descuentos`.`float_montoDescuento` FROM`descuentos` ,`ClientePlanesinternet` WHERE`ClientePlanesinternet`.`id_descuento`=`descuentos`.`id_descuento` AND`ClientePlanesinternet`.`id_contratoInternet`=". $row["id_contratoInternet"]."),0),0),`ClientePlanesinternet`.`date_fechaInicioPeriodo`,`ClientePlanesinternet`.`date_fechaFinPeriodo`,'pendiente'
				FROM `planesInternet`, `ClientePlanesinternet` WHERE `planesInternet`.`id_planInternet`=  `ClientePlanesinternet`.`id_planInternet` AND  `ClientePlanesinternet`.`id_contratoInternet` =". $row["id_contratoInternet"];
			}
			else
			{
				//Cobros siguiente mes
				//pospago
			$sql="INSERT INTO `CobrosPlanesinternet` ( `id_cobroPlaninternet` , `id_contratoInternet` , `text_concepto` , `id_descuento`,`float_monto`,`date_FechaInicioPeriodo` ,`date_FechaFinPeriodo` , `text_status` )
				SELECT (CONCAT('C', `ClientePlanesinternet`.`id_contratoInternet`,`ClientePlanesinternet`.`date_fechaInicioPeriodo`,'U',`ClientePlanesinternet`.`id_cliente`)) ,`ClientePlanesinternet`.`id_contratoInternet`,  `planesInternet`.`text_nombrePlan`, `ClientePlanesinternet`.`id_descuento`,COALESCE(`planesInternet`.`float_costo`-COALESCE((SELECT`descuentos`.`float_montoDescuento` FROM`descuentos` ,`ClientePlanesinternet` WHERE`ClientePlanesinternet`.`id_descuento`=`descuentos`.`id_descuento` AND`ClientePlanesinternet`.`id_contratoInternet`=". $row["id_contratoInternet"]."),0),0),DATE_ADD(`ClientePlanesinternet`.`date_fechaInicioPeriodo` ,INTERVAL-1
MONTH),`ClientePlanesinternet`.`date_fechaInicioPeriodo`,'pendiente'
				FROM `planesInternet`, `ClientePlanesinternet` WHERE `planesInternet`.`id_planInternet`=  `ClientePlanesinternet`.`id_planInternet` AND  `ClientePlanesinternet`.`id_contratoInternet` =". $row["id_contratoInternet"];
			}
	}
	$query=$this->db->query($sql);
	 }
	}
}

 ?>