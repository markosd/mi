<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
   
        $(".ukupno").hide();
   
 
});
</script>

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

        $user_id = $_SESSION['user'];
	
		$res=mysql_query("SELECT *  FROM korpa1  WHERE user_id='$user_id' ORDER BY vreme DESC  ");


			while($row=mysql_fetch_array($res))
				
			
			
			{ 
			
		
	        echo "<div style='width:100%;height:auto;text-align:center;background:#dcdcdc;font-size:20px;color:#212121;box-shadow:inset 0px 11px 8px -10px #CCC;padding:5px;'></div>";
			echo $row['vreme']."<br/>";
			echo $row['user_narudzbina'];
			echo "<div style='width:100%;height:auto;text-align:center;background:#dcdcdc;font-size:20px;color:#212121;box-shadow:inset 0px 11px 8px -10px #CCC;padding:5px;margin-bottom:5px;'></div>";
			
			
			
			
		
			

			
			
			
			}



	?>








<?php ob_end_flush(); ?>