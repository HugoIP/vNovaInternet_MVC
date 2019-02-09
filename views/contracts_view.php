<!DOCTYPE html>
<html lang="es">
<head>
	<title>Contracts</title>
</head>
<body>
<?php 
	$container=json_encode($dataContracts);
	//echo $container;
	$json_a = json_decode($container, TRUE);
	$json_o = json_decode($container);

	foreach($json_a as $person => $value)
	{
	    foreach($value as $key => $personal)
	    {
	        echo $key . " : ".$personal;
	        echo "<br>";
	        foreach($personal as $subkey => $subpersonal)
		    {
		        echo $subkey. " is ".$subpersonal;
		        echo "<br>";
		    }
	    }

	}
?>
	<table>
	<tbody>
		<tr>
			<th>Id</th>
			<th>Nombre</th>
		</tr>
		<?php foreach ($json_a as $client) : ?>
        <tr>
            <td> <?php echo $client->id; ?> </td>
            <td> <?php echo $client->name; ?> </td>
        </tr>
		<?php endforeach; ?>
	</tbody>
</table>
</body>
</html>