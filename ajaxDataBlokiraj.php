<?php


	require_once 'dbconnect.php';

$id = $_GET['id'];

		$sql = "UPDATE users SET blok ='da'   WHERE userId='$id' ";
			
			if (mysql_query($sql)) {
				
				
 
                                        echo "<script>window.location = 'operator.php';</script>";
  
  
                                   }


		$sql2 = "UPDATE korpa1 SET naruceno=''  WHERE user_id='$id' ";
			
			if (mysql_query($sql2)) {
				
				
 
                                        echo "<script>window.location = 'operator.php';</script>";
  
  
                                   }








?>