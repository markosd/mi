<?php

require_once 'dbconnect.php';

$prilog1 =  " ".$_POST['prilog1'];
$prilog2 =  " ".$_POST['prilog2'];
$prilog3 =  " ".$_POST['prilog3'];
$prilog4 =  " ".$_POST['prilog4'];
$prilog5 =  " ".$_POST['prilog5'];
$prilog6 =  " ".$_POST['prilog6'];
$prilog7 =  " ".$_POST['prilog7'];
$prilog8 =  " ".$_POST['prilog8'];
$prilog9 =  " ".$_POST['prilog9'];
$prilog10 = " ".$_POST['prilog10'];


$dodatni_prilog1 =  $_POST['dodatni_prilog1'];
$dodatni_prilog2 =  $_POST['dodatni_prilog2'];
$dodatni_prilog3 =  $_POST['dodatni_prilog3'];
$dodatni_prilog4 =  $_POST['dodatni_prilog4'];
$dodatni_prilog5 =  $_POST['dodatni_prilog5'];



$podkategorija = $_POST['podkategorija'];  // produkt_id

$velicina = $_POST['velicina'];
$velicina1 = $_POST['velicina1'];
$velicina2 = $_POST['velicina2'];
$velicina3 = $_POST['velicina3'];
$velicina1_cena = $_POST['velicina1_cena'];
$velicina2_cena = $_POST['velicina2_cena'];
$velicina3_cena = $_POST['velicina3_cena'];




$kolicina = $_POST['kolicina'];

///////////////////////////////

 $user_id = $_POST['user_id'];     ///// user_id

///////////////////////////////

	$opis = trim($_POST['opis']);
	$opis = strip_tags($opis);
	$opis = htmlspecialchars($opis);
	
	
	
	

	
	
	
	
	
	
	
	
	
if (!empty($dodatni_prilog1))
	
	{
		
		 $dodatni_prilog1_name =  $_POST['dodatni_prilog1_name'];		 
		 $dodatni_prilog1_cena =  " (+ ".$_POST['dodatni_prilog1_cena'].",00 rsd)";
		 $dp1 = " ".$dodatni_prilog1_name.$dodatni_prilog1_cena." ";
	
	}

	if (!empty($dodatni_prilog2))
	
	{
		
		 $dodatni_prilog2_name =  $_POST['dodatni_prilog2_name'];
		 $dodatni_prilog2_cena =  " (+ ".$_POST['dodatni_prilog2_cena'].",00 rsd)";
		 $dp2 = " ".$dodatni_prilog2_name.$dodatni_prilog2_cena." ";
	
	}

if (!empty($dodatni_prilog3))
	
	{
		
		$dodatni_prilog3_name =  $_POST['dodatni_prilog3_name'];
		$dodatni_prilog3_cena =  " (+ ".$_POST['dodatni_prilog3_cena'].",00 rsd)";
		$dp3 = " ".$dodatni_prilog3_name.$dodatni_prilog3_cena." ";
	
	}
	
if (!empty($dodatni_prilog4))
	
	{
		
		 $dodatni_prilog4_name =  $_POST['dodatni_prilog4_name'];
		 $dodatni_prilog4_cena =  " (+ ".$_POST['dodatni_prilog4_cena'].",00 rsd)";
		 $dp4 = " ".$dodatni_prilog4_name.$dodatni_prilog4_cena." ";
	
	}
	
if (!empty($dodatni_prilog5))
	
	{
		
		 $dodatni_prilog5_name =  $_POST['dodatni_prilog5_name'];
		 $dodatni_prilog5_cena =  " (+ ".$_POST['dodatni_prilog5_cena'].",00 rsd)";
		 $dp5 = " ".$dodatni_prilog5_name.$dodatni_prilog5_cena." ";
	
	}








			
	$expire = time()+1800;








if  (empty($velicina))
	

	{
	
  
	
 $cena =  $velicina1_cena;	
 $a = $kolicina * $cena;
 $pn =  $kolicina." x ".$podkategorija." ( ".$cena.",00 rsd"." )"." = ".$a.",00 rsd";
 $pn_prilog = $prilog1.$prilog2.$prilog3.$prilog4.$prilog5.$prilog6.$prilog7.$prilog8.$prilog9.$prilog10;
 $pn_dodatni_prilozi = $dp1.$dp2.$dp3.$dp4.$dp5;
 $pn_total = $kolicina * ($cena + $dodatni_prilog1 + $dodatni_prilog2 + $dodatni_prilog3 + $dodatni_prilog4 + $dodatni_prilog5);

			$query = "INSERT INTO privremena_narudzbina(user_id,pn,pn_prilog,pn_dodatni_prilozi,pn_opis,pn_total,expire) VALUES('$user_id','$pn','$pn_prilog','$pn_dodatni_prilozi','$opis','$pn_total','$expire')";
			$res = mysql_query($query);

              if ($res) {
				  
				  
				 header("Location: home2.php");
				  
			  }

		
	}
	
	
	
	
	
	elseif  ($velicina == $velicina1 ) 
	
	
	
	
	
	{
		
 $cena =  $velicina1_cena;	
 $a = $kolicina * $cena;
 $pn =  $kolicina." x ".$podkategorija." ( ".$cena.",00 rsd"." )"." = ".$a.",00 rsd";
 $pn_prilog = $prilog1.$prilog2.$prilog3.$prilog4.$prilog5.$prilog6.$prilog7.$prilog8.$prilog9.$prilog10;
 $pn_dodatni_prilozi = $dp1.$dp2.$dp3.$dp4.$dp5;
 $pn_total = $kolicina * ($cena + $dodatni_prilog1 + $dodatni_prilog2 + $dodatni_prilog3 + $dodatni_prilog4 + $dodatni_prilog5);

			$query = "INSERT INTO privremena_narudzbina(user_id,pn,pn_prilog,pn_dodatni_prilozi,pn_opis,pn_total,expire) VALUES('$user_id','$pn','$pn_prilog','$pn_dodatni_prilozi','$opis','$pn_total','$expire')";
			$res = mysql_query($query);

              if ($res) {
				  
				  
				 header("Location: home2.php");
				  
			  }
		
	}
	
	
	
	
	elseif  ($velicina == $velicina2 ) 
	
	
	
	
	
	{
		
 $cena =  $velicina2_cena;	
 $a = $kolicina * $cena;
 $pn =  $kolicina." x ".$podkategorija." ( ".$cena.",00 rsd"." )"." = ".$a.",00 rsd";
 $pn_prilog = $prilog1.$prilog2.$prilog3.$prilog4.$prilog5.$prilog6.$prilog7.$prilog8.$prilog9.$prilog10;
 $pn_dodatni_prilozi = $dp1.$dp2.$dp3.$dp4.$dp5;
 $pn_total = $kolicina * ($cena + $dodatni_prilog1 + $dodatni_prilog2 + $dodatni_prilog3 + $dodatni_prilog4 + $dodatni_prilog5);

			$query = "INSERT INTO privremena_narudzbina(user_id,pn,pn_prilog,pn_dodatni_prilozi,pn_opis,pn_total,expire) VALUES('$user_id','$pn','$pn_prilog','$pn_dodatni_prilozi','$opis','$pn_total','$expire')";
			$res = mysql_query($query);

              if ($res) {
				  
				  
				  header("Location: home2.php");
				  
			  }
		
	}	
	
	
		elseif  ($velicina == $velicina3 ) 
	
	
	
	
	
	{
		
 $cena =  $velicina3_cena;	
 $a = $kolicina * $cena;
 $pn =  $kolicina." x ".$podkategorija." ( ".$cena.",00 rsd"." )"." = ".$a.",00 rsd";
 $pn_prilog = $prilog1.$prilog2.$prilog3.$prilog4.$prilog5.$prilog6.$prilog7.$prilog8.$prilog9.$prilog10;
 $pn_dodatni_prilozi = $dp1.$dp2.$dp3.$dp4.$dp5;
 $pn_total = $kolicina * ($cena + $dodatni_prilog1 + $dodatni_prilog2 + $dodatni_prilog3 + $dodatni_prilog4 + $dodatni_prilog5);

			$query = "INSERT INTO privremena_narudzbina(user_id,pn,pn_prilog,pn_dodatni_prilozi,pn_opis,pn_total,expire) VALUES('$user_id','$pn','$pn_prilog','$pn_dodatni_prilozi','$opis','$pn_total','$expire')";
			$res = mysql_query($query);

              if ($res) {
				  
				  
				  header("Location: home2.php");
				  
			  }
		
	}	
	

	
	
	
	
	
	
	
	
	

?>