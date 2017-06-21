<?php
	ob_start();
	session_start();
    require_once 'dbconnect.php';
	require_once 'connect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	
	
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
     
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

       <link href = "bootstrap/css/bootstrap.css" rel = "stylesheet">
	   <script src="bootstrap/js/bootstrap.js"></script>
	   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	   <link href='http://fonts.googleapis.com/css?family=BenchNine' rel='stylesheet' type='text/css'>
	   <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	

	   <link rel="stylesheet" href="animate/animate.css">
	
        <style type="text/css">
            
            * {
                margin: 0;
                padding: 0;
            }
            
            body {
              font-family: BenchNine;font-size:25px;
                overflow-x: hidden;
				background: url("slike/fixed.jpg");
            }
            
     
        </style>

    </head>
    <body>
        
		
		
   
            
           
	
			

   
            
     
	

      	<div class="col-xs-12 col-sm-6 col-md-12" style='height:160px;text-align:center;margin-top:15px;'><img src="slike/logo2.png" class="animated flipInX"  style="width:150px;height:143px;" /></div>      
	
                     <div class="col-xs-12 col-sm-6 col-md-12 animated bounceInLeft" style='height:auto;text-align:center;box-shadow: 1px 1px 15px #212121;background:#f5f5f5;padding-top:10px;'><font style="font-size:30px;">Lokacija dostave</font>  


	
	
    <div class="col-xs-12 col-sm-6 col-md-12 animated bounceInLeft " style='height:auto;text-align:center;padding-left:2%;padding-right:2%;margin-top:0px;padding-top:20px;'>

	
	<form action="zavrsni_korak.php" method="POST">
	
	<input type='hidden' name='user_id' value="<?php  echo $_SESSION['user'];   ?>" />
	
	
		<textarea name='narudzbina' style='display:none;' >
	<?php
	
	  $user_id = $_SESSION['user'];
	
			$res2=mysql_query("SELECT *  FROM privremena_narudzbina  WHERE user_id ='$user_id'");


			while($row2=mysql_fetch_array($res2))
				
			
			
			{

             echo "<div  class='narudzbenica' style='text-align:left;height:auto;padding:5px;margin-bottom:2px;background:#f5f5f5;box-shadow:inset 0px 11px 8px -10px #CCC;margin-top:5px;'>";
			
                echo "<font style='color:#212121;font-weight:bold;'>".$row2['pn']."</font>"."<br/>";
				echo "<font style='color:#212121;font-weight:bold;'>Prilog : </font>".$row2['pn_prilog']."<br/>";
				
				echo "<font style='color:#212121;font-weight:bold;'>Dodatni prilozi : </font>".$row2['pn_dodatni_prilozi']."<br/>";
				echo "<font style='color:#212121;font-weight:bold;'>Dodatna uputstva : </font>".$row2['pn_opis']."<br/>";
			
			
				echo "<font style='color:#212121;font-weight:bold;'>Vrednost narudžbine : </font>"."<font style='font-family:Arial;color:red;font-weight:bold;font-size:15px;'>".$row2['pn_total'].",00 rsd</font>"."<br/>";

				echo "</div>";
				

			}
	
	    			$res3=mysql_query("SELECT SUM(pn_total) AS total  FROM privremena_narudzbina  WHERE user_id ='$user_id'");
         
				
				

			while($row3=mysql_fetch_array($res3))
				
				{
			    
				if(!empty($row3['total']))
					
				 
				
					{




					echo "<div class='ukupno' style='width:100%;height:auto;text-align:center;background:#dcdcdc;font-size:20px;color:#212121;box-shadow:inset 0px 11px 8px -10px #CCC;'>Ukupno : ".$row3['total'].",00 rsd"."</div>"; 





					}else { header("Location: home2.php");}
				
				
		

			}	
	
	?>
	</textarea>
	
	
	
    <div style="text-align:left;">Grad</div>

	
	<select name="selektuj" class="form-control" style="font-size:25px;height:50px;background:white;box-shadow:inset 0px 11px 8px -10px #CCC;" >
	
	<?php
	
	
	
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
	
	
	if($userRow['userGrad']=='Kovin')
		
		{
			
			echo "<option value='Kovin'>Kovin</option>";
			echo "<option value='Smederevo'>Smederevo</option>";

			
		}else if($userRow['userGrad']=='Smederevo')
		
		{
			
			echo "<option value='Smederevo'>Smederevo</option>";
			echo "<option value='Kovin'>Kovin</option>";
			

			
		}
	

	
	
	?>
	
	
	</select><br/>
	
	<div style="text-align:left;">Adresa / Lokacija</div>
	<textarea  name="lokacija" style="height:100px;font-size:25px;resize:none;box-shadow:inset 0px 11px 8px -10px #CCC;margin-bottom:100px;" required  class="form-control" placeholder="Adresa / Lokacija" ><?php echo $userRow['userLokacija']; ?></textarea>

			<script>
		
		
		document.addEventListener("DOMContentLoaded", function() {
    var elements = document.getElementsByTagName("TEXTAREA");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("Molimo Vas unesite zeljenu adresu ili lokaciju.");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
})
		
		
		
		
		</script>

	
	

   
	
	
	</div>
	</div>
	
	        <input type="submit" style="outline:none;border:none;width:100%;padding:10px;position:fixed;bottom:0px;font-size:27px;border-radius:0px;box-shadow: 5px 1px 5px black;;font-family: BenchNine;color:white;background:#02a651;" class="btn btn-block btn-primary" value='Potvrda'  name="btn" />
				
    
	
	</form>

     
  
    
        
        

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
        



	
	
	
    </body>
</html>
<?php ob_end_flush(); ?>