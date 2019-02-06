<?php 
require_once("models/contracts_model.php");
require_once("models/clients_model.php");
$client=new clients_model();
$data=$client->get_clients();
$dataContracts=getContractsJSON($data);
function getContractsJSON($data){
	$contracts=new contracts_model();
	$temp=array();
	foreach($data as $dat){

		$temp[] = array(
		    'name' => $dat["text_nombre"],
		    'id' => $dat["id_cliente"],
		    'size' => 0,
		    'contracts' => array()
		);
		$contractsByClient=$contracts-> get_contractsByClient($dat["id_cliente"]);

		$temp["size"]=sizeof($contractsByClient);
		echo "name ". $dat["text_nombre"];

		$collect = array();
		foreach($contractsByClient as  $contr){
			echo "contrato ". $contr["id_contratoInternet"];
			$tempContracts = array(
			    'contrato' => $contr["id_contratoInternet"],
			    'plan' => $contr["id_planInternet"],
			    'fechaInicio' => $contr["date_fechaInicioPeriodo"],
			    'FechaFin' => $contr["date_fechaFinPeriodo"]

			);
			$collect[]=$tempContracts;
		}

		$temp["contracts"]=$collect;

	}
	return $temp;
	//echo json_encode($dataContracts);
}

//call view
require_once("views/contracts_view.php");
 ?>