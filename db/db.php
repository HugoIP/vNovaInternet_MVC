<?php 
class Connect{
	public function connect(){
		$connecting=new mysqli("localhost","hugoip","MONICA","vNovaInternet");
		$connecting->query("SET NAMES 'utf8'");
		return $connecting;

	}
}

 ?>
