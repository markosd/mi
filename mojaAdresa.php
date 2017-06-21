<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
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
     
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

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
	
        <div class="col-xs-12 col-sm-6 col-md-12 animated bounceInLeft" style='height:auto;text-align:center;box-shadow: 1px 1px 15px #212121;margin-bottom:30px;background:#f5f5f5;padding-top:10px;'><font style="font-size:30px;">Moja adresa</font>

<div class="col-xs-12 col-sm-6 col-md-12 animated bounceInLeft" style='' >
	
	


	
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
	
    <div style="text-align:left;">Grad</div>

	
	<select name="selektuj" class="form-control" style="font-size:25px;height:50px;background:white;box-shadow:inset 0px 11px 8px -10px #CCC;" >
	
	<?php
	
	$userId = $userRow['userId'];
	
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
	<textarea type="text" name="lokacija" style="height:100px;font-size:25px;resize:none;box-shadow:inset 0px 11px 8px -10px #CCC;margin-bottom:100px;" require class="form-control" placeholder="Adresa / Lokacija" ><?php echo $userRow['userLokacija']; ?></textarea>

	
	

	
	<?php
	
	$userId = $userRow['userId'];
	$selektuj = $_POST['selektuj'];
	
		$lokacija = trim($_POST['lokacija']);
		$lokacija = strip_tags($lokacija);
		$lokacija = htmlspecialchars($lokacija);
	

	
	
	if(isset($_POST['btn']) ) {	
	
	
	
	
		if($selektuj != "" ) {
			
			$sql = "UPDATE users SET userGrad = '$selektuj' , userLokacija = '$lokacija'  WHERE userId='$userId' ";
			
			if (mysql_query($sql)) {
				
				
 
                                        header("Location: home2.php");
  
  
                                   }
			
	
		
	}
	
	else {echo "<font style='color:red;'>Odaberite lokaciju kako bi se izvršila dostava.</font>";}

	}
	else { echo "";}
	
	
	
	?>
	
	</div>
	
	</div> 
	
     
  
    

           <button type="submit" style="outline:none;border:none;width:100%;padding:10px;position:fixed;bottom:0px;font-size:27px;border-radius:0px;box-shadow: 5px 1px 5px black;;font-family: BenchNine;color:white;background:#02a651;" class="btn btn-block btn-primary animated flipInX"  name="btn">Potvrda</button>
				
       
	
	</form>
        
        

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
        



	
	
	
    </body>
</html>
<?php ob_end_flush(); ?>