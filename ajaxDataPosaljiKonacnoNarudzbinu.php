<?php


	require_once 'dbconnect.php';

$id2 = $_GET['id'];

		$sql2 = "UPDATE korpa1 SET naruceno='poslato'  WHERE korpa1id='$id2' ";
			
			if (mysql_query($sql2)) {
				
				
 
                                        echo "<script>window.location = 'operator.php';</script>";
  
  
                                   }










?>