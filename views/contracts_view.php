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
	/*
	foreach($json_a as $person => $value)
	{
	    foreach($value as $key => $personal)
	    {
	    	if(gettype($personal)=="array")
	    	{
		        //check list off contracts
		        foreach($personal as $subkey => $subpersonal)
			    {
			        foreach($subpersonal as $fkey => $fpersonal)
				    {
				        echo $fkey. " is ".$fpersonal;
				        echo "<br>";
				    }
			    }
			}
			else
			{
				echo $key . " : ".$personal;
		        echo "<br>";
			}
	    }

	}*/
?>
<table>
	<tbody>
		<tr>
			<th>Id</th>
			<th>Nombre</th>
		</tr>
		<?php foreach ($json_a as $person => $value){ echo "_______"; ?>
        <tr>
        <?php 
	        foreach($value as $key => $personal)
		    {
		    	if(gettype($personal)=="array")
		    	{
			        //check list off contracts
			        foreach($personal as $subkey => $subpersonal)
				    {
				        foreach($subpersonal as $fkey => $fpersonal)
					    {

				    	?>
            <td> <?php echo "". $fpersonal ?> </td>
            			<?php 
	             		}
				    }
				}
				else
				{
					?>
			<td> <?php echo $personal ?> </td>
			        <?php 
				}
            ?>
        </tr>
		<?php }
	 } ?>
	</tbody>
</table>
</body>
</html>