<?php


	require_once 'dbconnect.php';

$id = $_GET['id'];

		$sql = "UPDATE korpa1 SET naruceno=''  WHERE korpa1id='$id' ";
			
			if (mysql_query($sql)) {
				
				
 
                                        echo "<script>window.location = 'operator.php';</script>";
  
  
                                   }










?>