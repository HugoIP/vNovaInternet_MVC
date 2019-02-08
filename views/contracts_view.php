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



	foreach($dataContracts as $object) {

        foreach($object as $value) {

            echo $value;

        }

	}
 ?>
</body>
</html>