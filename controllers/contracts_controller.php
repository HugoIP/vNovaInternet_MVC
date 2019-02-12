<?php 
require_once("models/contracts_model.php");
require_once("models/clients_model.php");
$client=new clients_model();
$data=$client->get_clients();
$dataContracts=getContractsJSON($data);
showStatus();
function getContractsJSON($data){
	
	$temp=array();
	foreach($data as $dat){
		$contracts=new contracts_model();
		$contractsByClient=array();
		$contractsByClient=$contracts-> get_contractsByClient($dat["id_cliente"]);
		$collect = array();
		foreach($contractsByClient as  $contr){
			$tempContracts = array(
			    "contrato" => $contr["id_contratoInternet"],
			    "plan" => $contr["id_planInternet"],
			    "fechaInicio" => $contr["date_fechaInicioPeriodo"],
			    "FechaFin" => $contr["date_fechaFinPeriodo"]

			);
			$collect[]=$tempContracts;
		}

		$temp[] = array(
			"id" => $dat["id_cliente"],
		    "name" => $dat["text_nombre"],
		    "contracts" => $collect
		);
		

	}
	return $temp;
}
function showStatus()
{
	updateStatus();
}
//call view
require_once("views/contracts_view.php");
 ?>