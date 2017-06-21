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
		$name = trim($_POST['name']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);
		
		$phone = trim($_POST['phone']);
		$phone = strip_tags($phone);
		$phone = htmlspecialchars($phone);
		
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		
	    $pass2 = trim($_POST['pass2']);
		$pass2 = strip_tags($pass2);
		$pass2 = htmlspecialchars($pass2);
		
		
		
		// basic name validation
		if (empty($name)) {
			$error = true;
			$nameError = "Unesite korisničko ime.";
			$phoneError = "Unesite broj telefona.";
		} else if (strlen($name) < 3) {
			$error = true;
			$nameError = "Korisničko ime mora sadržati minimum 3 karaktera.";
		} else if (!preg_match("/^[a-zA-Z 0-9 ]+$/",$name)) {
			$error = true;
			$nameError = "a";
		}
		
		
			if (empty($phone)) {
			$error = true;
		
			$phoneError = "Unesite broj telefona.";
		} else if (strlen($phone) < 3) {
			$error = true;
			$phoneError = "Broj telefona !";
		} else if (!preg_match("/^[0-9]+$/",$phone)) {
			$error = true;
			$phoneError = "Unesite validan broj telefona.";
		}
		
		
		
		
		
		//basic email validation
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Molimo Vas unesite validnu email adresu.";
		} else {
			// check email exist or not
			$query = "SELECT userEmail FROM users WHERE userEmail='$email'";
			$result = mysql_query($query);
			$count = mysql_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Email već postoji.";
			}
		}
		// password validation
		if (empty($pass)){
			$error = true;
			$passError = "Unesite lozinku.";
		} else if(strlen($pass) < 6) {
			$error = true;
			$passError = "Lozinka mora sadržati minimun 6 karaktera.";
		}
		
		
			
		  	 if($pass !== $pass2) {
			$error = true;
			$passError2 = "Lozinke se ne poklapaju.";
		}
		
		
			$query = "SELECT userPhone FROM users WHERE userPhone='$phone'";
			$result = mysql_query($query);
			$count = mysql_num_rows($result);
			if($count!=0){
				$error = true;
				$phoneError = "Broj telefona već postoji.";
			}	
			
		
		
		
		
		// password encrypt using SHA256();
		$password = $pass;
		
		// if there's no error, continue to signup
		if( !$error ) {
			
			$query = "INSERT INTO users(userName,userEmail,userPass,userPhone) VALUES('$name','$email','$password','$phone')";
			$res = mysql_query($query);
				
			if ($res) {
				$errTyp = "success";
				$errMSG = "Uspešno ste se registrovali.";
				
				
		
				
				unset($name);
				unset($email);
				unset($pass);
				unset($phone);
			} else {
				$errTyp = "danger";
				$errMSG = "Nešto nije u redu.";	
			}	
				
		}
		
		
	}
	
	
	
	
	
	
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

       <link href = "bootstrap/css/bootstrap.css" rel = "stylesheet">
	   <script src="bootstrap/js/bootstrap.js"></script>
	   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	   <link rel="stylesheet" href="css/animate.css">
	   <link href='http://fonts.googleapis.com/css?family=BenchNine' rel='stylesheet' type='text/css'>
	   <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	   
	  

	   



</head>
<body style="background:url('slike/fixed.jpg');font-family: Arial;font-size:18px;">
<div>

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    
    	<div class="col-md-12">
		
		
			<div style="text-align:center;margin-top:20px;margin-bottom:20px;" class="form-group">
			
            	<a href="index.php"><img id="logo" class="animated flipInX"  src="slike/logo2.png" style="width:260px;height:243px;" /></a>

            </div>
        
        	 <div class="animated bounceInLeft" >

        
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> 
				
				
				<?php

                
				if($errTyp=="success")
					
				
				
				
				
				{
echo $errMSG = "Uspešno ste se registrovali.";
				}else {echo "jok";}


		
				
				?>
                </div>
            	</div>
                <?php
			}
			?>
            
			
			<div id="uspesnaRegistracija">
			
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" style="height:50px;font-size:18px;" name="name" class="form-control" placeholder="Korisničko ime" maxlength="50" value="<?php echo $name ?>" />
                </div>
                <span class="text-danger"><?php echo $nameError; ?></span>
            </div>
			
			
			<div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
            	<input type="text" style="height:50px;font-size:18px;" name="phone" class="form-control" placeholder="Broj telefona ( 06xxxxxxxx )" maxlength="10" value="<?php echo $phone ?>" />
                </div>
                <span class="text-danger"><?php echo $phoneError; ?></span>
            </div>
			
			
			
			
			
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="text" style="height:50px;font-size:18px;;text-transform: lowercase;" name="email" class="form-control" placeholder="Email adresa" maxlength="40" value="<?php echo $email ?>" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" style="height:50px;font-size:18px;;" name="pass" class="form-control" placeholder="Lozinka" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
			
			
			<div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" style="height:50px;font-size:18px;;" name="pass2" class="form-control" placeholder="Potvrda Lozinke" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError2; ?></span>
            </div>
			
			
			
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" id="regDugme"  style="height:50px;font-size:18px;;" class="btn btn-block btn-primary" name="btn-signup">Kreiraj</button>
            </div>
            
			
			</div>
			
          
            
            <div   class="form-group">
            	<a  class="" href="index.php">Nazad</a>
            </div>
			
			
		
        </div>
        </div>
   
    </form>
    </div>	

</div>

</body>
</html>
<?php ob_end_flush(); ?>