<!DOCTYPE html>
<html lang="es">
<head>
	<title>Contracts</title>
</head>
<body>
<?php 
	$container=json_encode($dataContracts);
	echo $container;
	$json_a = json_decode($container, TRUE);
	$json_o = json_decode($container);



	foreach($json_a as $clie => $value)
	{
	    foreach($value as $key => $personal)
	    {
	        echo $clie. " with ".$key . " is ".$personal;
	        echo "<br>";
	    }

	}
 ?>
</body>
</html>