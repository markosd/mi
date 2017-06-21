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
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

       <link href = "bootstrap/css/bootstrap.css" rel = "stylesheet">
	   <script src="bootstrap/js/bootstrap.js"></script>
	   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	   <link href='http://fonts.googleapis.com/css?family=BenchNine' rel='stylesheet' type='text/css'>
	   <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	

	  
	
        <style type="text/css">
            
            * {
                margin: 0;
                padding: 0;
            }
            
            body {
                  font-family: Arial;font-size:20px;
              
				background: url("slike/fixed.jpg");
            }
            
     
        </style>
		

    </head>
    <body>
        
		
		
   
            
           
	
			
	<div class="col-xs-12 col-sm-6 col-md-12" style='height:160px;text-align:center;margin-top:15px;'><img src="slike/logo2.png" class="animated flipInX"  style="width:150px;height:143px;" /></div>
   
            
     
    <div class="col-xs-12 col-sm-6 col-md-12 animated bounceInLeft " style='font-size:20px;padding-top:1%;height:auto;text-align:center;padding-left:7%;padding-right:7%;background:#f5f5f5;box-shadow: -5px 2px 15px black;margin-bottom:25%;padding-bottom:5%;'>
	
	
	
	
	Dobrodošli,<br/>
	
	
	Info text Info text Info text Info text Info text Info text Info text Info text Info text 
	Info text Info text Info text Info text Info text Info text Info text Info text Info text 
	Info text Info text Info text Info text Info text Info text Info text Info text Info text 

	

	 
            
            
	
    <div class="col-xs-12 col-sm-6 col-md-12 animated bounceInLeft " style='height:auto;text-align:center;padding-left:2%;padding-right:2%;margin-top:10px;'>

	
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
	
	<select name="selektuj" class="form-control" style="font-size:20px;height:50px;background:#f5f5f5;" >
	
	<option value="">Odaberite grad</option>
	<option value="Kovin">Kovin</option>
	<option value="Smederevo">Smederevo</option>
	</select>
	
	    <div class="col-xs-12 col-sm-6 col-md-12 animated bounceInLeft " style='height:50px;text-align:center;padding-left:0px;padding-right:0px;padding-top:20px;padding-bottom:20px;margin-bottom:30px;'>

            	<button type="submit" style="height:50px;font-size:25px;" class="btn btn-block btn-success"  name="btn">Dalje</button>
				
         </div>
	
	</form>
	
	<?php
	
	$userId = $userRow['userId'];
	$selektuj = $_POST['selektuj'];
	
	
	if(isset($_POST['btn']) ) {	
	
	
	
	
		if($selektuj != "") {
			
			$sql = "UPDATE users SET userGrad = '$selektuj' WHERE userId='$userId' ";
			
			if (mysql_query($sql)) {
				
				
 
                                        header("Location: home2.php");
  
  
                                   }
			
	
		
	}
	
	else {echo "<font style='color:red;'>Odaberite grad u kome želite da se izvrši dostava.</font>";}

	}
	else { echo "";}
	
	
	
	?>
	
	</div>
	
	
	</div>
     
  
    
        
        

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
        

    


	
	
	
    </body>
</html>
<?php ob_end_flush(); ?>