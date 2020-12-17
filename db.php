<?php 
 //The config file for connecting to DB
    $db=new mysqli("localhost","root","","pharmeasy");
	if(!$db)
	{
		echo "Database is  Not Connected";
	}
?>