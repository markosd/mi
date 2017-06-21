<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// it will never let you open index(login) page if session is set
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: home.php");
		exit;
	}
	
	$error = false;
	
	if( isset($_POST['btn-login']) ) {	
		
		// prevent sql injections/ clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent sql injections / clear user invalid inputs
		
		if(empty($email)){
			$error = true;
			$emailError = "Molimo Vas unesite email adresu.";
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Molimo Vas unesite validnu email adresu.";
		}
		
		if(empty($pass)){
			$error = true;
			$passError = "Unesite lozinku.";
		}
		
	
		
		// if there's no error, continue to login
		if (!$error) {
			
			
		
			$res=mysql_query("SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
			$row=mysql_fetch_array($res);
			$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
			
			if( $count == 1 && $row['userPass'] === $pass ) {
				$_SESSION['user'] = $row['userId'];
				header("Location: home.php");
			} else {
				$errMSG = "Uneti podaci se ne poklapaju.Proverite email ili lozinku.";
			}
				
		}
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('nema konekcije bre')</script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

       <link href = "bootstrap/css/bootstrap.css" rel = "stylesheet">
	   <script src="bootstrap/js/bootstrap.js"></script>
	   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	   <link href='http://fonts.googleapis.com/css?family=BenchNine' rel='stylesheet' type='text/css'>
	   <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	

	   <link rel="stylesheet" href="animate/animate.css">
	
	   

	   
</head>
<body style="background:url('slike/fixed.jpg');font-family: BenchNine;font-size:25px;">

<div>

	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
    	<div class="col-md-12 ">
        
        	<div style="text-align:center;margin-top:20px;margin-bottom:20px;" class="form-group">
			
            	<img class="animated flipInX"  id="logo" src="slike/logo2.png" style="width:260px;height:243px;" />

            </div>
        
        	
            
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div  class="form-group">
            	<div class="alert alert-danger">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
            <div class="animated bounceInLeft" >
            <div  class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="text" name="email" style="height:50px;font-size:25px;text-transform: lowercase;" class="form-control" placeholder="Email" value="demo@demo.com" maxlength="40" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" style="height:50px;font-size:25px;" name="pass" class="form-control" placeholder="Lozinka" value="000000" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" style="height:50px;font-size:25px;" class="btn btn-block btn-success"  name="btn-login">Log In</button>
            </div>
            
           
            
            <div style="font-size:22px;" class="form-group">
			
            	<a href="register.php">Kreiraj nalog</a>
				<a style="float:right;" href="zaboravljenaLozinka.php">Zaboravili ste lozinku ?</a>
				
            </div>
			
			
             </div>
            
        
        </div>
   
    </form>
    </div>	

</div>

</body>
</html>
<?php ob_end_flush(); ?>