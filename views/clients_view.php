<!DOCTYPE html>
<html lang="es">
<head>
	<title>Clientes</title>
</head>
<body>
<?php 
	foreach($data as $dat){
		echo $dat["text_nombre"]."<br/>";
	}
 ?>
</body>
</html>