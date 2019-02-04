<?php 
require_once("models/clients_model.php");
$client=new clients_model();
$data=$client->get_clients();
//call view
require_once("views/clients_views.php");
 ?>