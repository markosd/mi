<?php
	ob_start();
	session_start();
	if( isset($_SESSION['user'])!="" ){
		header("Location: home.php");
	}
	include_once 'dbconnect.php';

	$error = false;

	if ( isset($_POST['btn-signup']) ) {
		
		// clean user inputs to prevent sql injections

		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
	
		
		
		
		// basic name validation

		
		

		
		
		
		//basic email validation
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Molimo Vas unesite validnu email adresu.";
		} else {
			// check email exist or not
			$query = "SELECT userEmail FROM users WHERE userEmail='$email'";
			$result = mysql_query($query);
			$count = mysql_num_rows($result);
			if($count != 0){
		
		
			$res=mysql_query("SELECT * FROM users WHERE userEmail='$email'");
	        $userRow=mysql_fetch_array($res);
			$lozinka = $userRow['userPass'];
			
			
			$to = $email;
$subject = "POVRATAK LOZINKE";
$txt = "Vaša lozinka je : ".$lozinka;
$headers = "From: office@mojemaslo.com" . "\r\n" .
"CC:".$email." ";

mail($to,$subject,$txt,$headers);
			
			

		
		
		
				$emailError = "<font style='color:green;'>Vaša lozinka je poslata na email adresu.</font>";
			}else {
				
					$error = true;
				$emailError = "Email ne  postoji u bazi";

			}
		}
		// password validation
		if (empty($pass)){
			$error = true;
			$passError = "Unesite lozinku.";
		} else if(strlen($pass) < 6) {
			$error = true;
			$passError = "Lozinka mora sadrzati minimun 6 karaktera.";
		}
		
		
			
		  	 if($pass !== $pass2) {
			$error = true;
			$passError2 = "Lozinke se ne podudaraju";
		}
		
		
			$query = "SELECT userPhone FROM users WHERE userPhone='$phone'";
			$result = mysql_query($query);
			$count = mysql_num_rows($result);
			if($count!=0){
				$error = true;
				$phoneError = "Broj telefona vec postoji u bazi";
			}	
			
		
		
		
		
		// password encrypt using SHA256();
		$password = $pass;
		
		// if there's no error, continue to signup
		if( !$error ) {
			
			$query = "INSERT INTO users(userName,userEmail,userPass,userPhone) VALUES('$name','$email','$password','$phone')";
			$res = mysql_query($query);
				
			if ($res) {
				$errTyp = "success";
				$errMSG = "Uspesno ste se registrovali.";
				
				
		
				
				unset($name);
				unset($email);
				unset($pass);
				unset($phone);
			} else {
				$errTyp = "danger";
				$errMSG = "Nesto nije u redu.";	
			}	
				
		}
		
		
	}
	
	
	
	
	
	
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

       <link href = "bootstrap/css/bootstrap.css" rel = "stylesheet">
	   <script src="bootstrap/js/bootstrap.js"></script>
	   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	   <link rel="stylesheet" href="css/animate.css">
	   <link href='http://fonts.googleapis.com/css?family=BenchNine' rel='stylesheet' type='text/css'>
	
		   <link rel="stylesheet" href="animate/animate.css">

	

	
</head>	   
<body style="background:url('slike/fixed.jpg');font-family: BenchNine;font-size:25px;">


<div>

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12">
        
		<div style="text-align:center;margin-top:20px;margin-bottom:20px;" class="form-group">
			
            	<a href="index.php"><img id="logo" class="animated flipInX"  src="slike/logo2.png" style="width:260px;height:243px;" /></a>

            </div>
        
		 <div class="animated bounceInLeft" >
		
        	<div style="text-align:center;font-family: BenchNine;font-size:25px;"  class="form-group">
            	<h2 class="">Unesite email adresu kako bi povratili lozinku.</h2>
            </div>
        
		
		
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div  class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> 
				
				
				<?php

         
				
				?>
                </div>
				 </div>
            	</div>
                <?php
			}
			?>
            
			
		
			
       
			
		
			
			
			
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="text" style="height:50px;font-family: BenchNine;font-size:25px;text-transform: lowercase;" name="email" class="form-control" placeholder="Email adresa" maxlength="40"  />
                </div>
                <span class="text-danger"><?php echo $emailError;





				?></span>
            </div>
            
       
			
		
			
			
			
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" style="height:50px;font-family: BenchNine;font-size:25px;" class="btn btn-block btn-primary" name="btn-signup">Potvrdi</button>
            </div>
            
			
			
		
              <div  id="loginDugme" class="form-group">
            	<a   href="index.php">Nazad</a>
            </div>
         
		
        
        </div>
   
    </form>
    </div>	

</div>

</body>
</html>
<?php ob_end_flush(); ?>