<?php

	
	require_once 'dbconnect.php';
	require_once 'connect.php';
	

$user_id = $_POST['user_id'];
	
$grad =  $_POST['selektuj'];
		$lokacija = trim($_POST['lokacija']);
		$lokacija = strip_tags($lokacija);
		$lokacija = htmlspecialchars($lokacija);
$narudzbina = mysql_real_escape_string($_POST['narudzbina']);
date_default_timezone_set("Europe/Belgrade");
$vreme = date("d-m-Y G:i:s", time());

$ok = 'ok';







			$sql = "UPDATE users SET userGrad = '$grad' , userLokacija = '$lokacija'  WHERE userId='$user_id' ";	
			if (mysql_query($sql)) {}




   

	

				$query = "INSERT INTO korpa1(user_id,user_grad,user_lokacija,user_narudzbina,vreme,naruceno,komentar) VALUES ('$user_id','$grad','$lokacija','$narudzbina','$vreme','$ok','')";
			$res = mysql_query($query);

              if ($res) {
				  
				  
			 							 $sql2 = "DELETE FROM privremena_narudzbina WHERE user_id = '$user_id'";

                                       if ($conn->query($sql2) === TRUE) {


                      


									      header("Location: home2.php");




									   }
				  
			  }else {echo "no";}
      























?>