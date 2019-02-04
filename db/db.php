<?php 
class Connect{
	public static function connect(){
		$connect=new mysqli("localhost","hugoip"´,"MONICA","vNovaInternet");
		$connect->query("SET NAMES 'utf8'");
		return $connect;

	}
}

 ?>
