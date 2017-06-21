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
	
	
	$res2=mysql_query("SELECT * FROM privremena_narudzbina WHERE user_id=".$_SESSION['user']);
	
	
				while($row=mysql_fetch_array($res2))
				
			
			
			{ 
                      $user_id = $_SESSION['user'];
                     $sad = time();
					$expire = $row['expire'];
					  
					  
					  if($expire < $sad)
             
			                {
								
															 $sql = "DELETE FROM privremena_narudzbina WHERE user_id='$user_id'";

                                       if ($conn->query($sql) === TRUE) { }
								
							}else {}

			}
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <meta name="description" content="Some slide and push menu demos using CSS3 transitions.">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.min.css">
	   <script src="bootstrap/js/bootstrap.js"></script>
      <link href = "bootstrap/css/bootstrap.css" rel = "stylesheet">

         <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

	   <link href='http://fonts.googleapis.com/css?family=BenchNine' rel='stylesheet' type='text/css'>
	   <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	   <script src="rangeSlider/bootstrap-slider.js"></script>
	   <link href = "rangeSlider/bootstrap-slider.css" rel = "stylesheet">
	   
        <style type="text/css">
            
            * {
                margin: 0;
                padding: 0;
            }
            
            body {
                  font-family: Arial;font-size:18px;
                overflow-x: hidden;
				background: url("slike/fixed.jpg");
			
            }	
	.kat {
		
		
		width:100%;height:auto;background:#f5f5f5;box-shadow: -1px 1px 7px black;border-radius:3px;
		
		
	}
.kat:hover {   


opacity:1;

}	

.m:hover {
	
	
	opacity:0.7;
	
}

.effect7
{
    position:relative;
    -webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
       -moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
}
.effect7:before, .effect7:after
{
    content:"";
    position:absolute;
    z-index:-1;
    -webkit-box-shadow:0 0 20px rgba(0,0,0,0.8);
    -moz-box-shadow:0 0 20px rgba(0,0,0,0.8);
    box-shadow:0 0 20px rgba(0,0,0,0.8);
    top:0;
    bottom:0;
    left:10px;
    right:10px;
    -moz-border-radius:100px / 10px;
    border-radius:100px / 10px;
}
.effect7:after
{
    right:10px;
    left:auto;
    -webkit-transform:skew(8deg) rotate(3deg);
       -moz-transform:skew(8deg) rotate(3deg);
        -ms-transform:skew(8deg) rotate(3deg);
         -o-transform:skew(8deg) rotate(3deg);
            transform:skew(8deg) rotate(3deg);
}
	
	
	
	
.checkboxFour {
	width:30px;
	height: 30px;
	background: #ddd;
    margin: 20px 30px;

	border-radius: 100%;
	position: relative;
	box-shadow: 0px 1px 3px rgba(0,0,0,0.5);

}

.prilozi {
	
	width:80%;
	height: 25px;
	
	margin-top: -48px;
	margin-left:70px;
	text-align:left;
	
line-height: 25px;
font-size:20px;
	
	position: relative;
	
	
	
}

.checkboxFour label {
	display: block;
	width: 26px;
	height: 26px;
	border-radius: 100px;

	transition: all .5s ease;
	cursor: pointer;
	position: absolute;
	top: 2px;
	left:2px;
	

	background: #333;
	box-shadow:inset 0px 1px 3px rgba(0,0,0,0.5);
}

.checkboxFour input[type=checkbox]:checked + label {
	background: #26ca28;
}
.checkboxFour input[type=radio]:checked + label {
	background: #26ca28;
}	
		
 </style>			
  <script>
      function auto_load(){
        $.ajax({
			
            type: "GET",
            url: 'ajaxDataStatus.php',
            data: "id=" + <?php echo $_SESSION['user']; ?>, 
            cache: false,
          success: function(data){
             $("#status").html(data);
          } 
        });
      }

      $(document).ready(function(){

        auto_load(); //Call auto_load() function when DOM is Ready
		$(".kat").show();

      });

      //Refresh auto_load() function after 10000 milliseconds
      setInterval(auto_load,1000);
   </script>
	   <script>
      function auto_load2(){
        $.ajax({
			
            type: "GET",
            url: 'ajaxDataPoslato.php',
            data: "id=" + <?php echo $_SESSION['user']; ?>, 
            cache: false,
          success: function(data){
             $("#prihvacen").html(data);
          } 
        });
      }

      $(document).ready(function(){

        auto_load2(); //Call auto_load() function when DOM is Ready
		$(".kat").show();

      });

      //Refresh auto_load() function after 10000 milliseconds
      setInterval(auto_load2,1000);
   </script>
	   <script>
      function auto_load3(){
        $.ajax({
			
            type: "GET",
            url: 'ajaxDataBlokUser.php',
            data: "id=" + <?php echo $_SESSION['user']; ?>, 
            cache: false,
          success: function(data){
             $("#blokiran").html(data);
          } 
        });
      }

      $(document).ready(function(){

        auto_load3(); //Call auto_load() function when DOM is Ready
		$(".kat").show();

      });

      //Refresh auto_load() function after 10000 milliseconds
      setInterval(auto_load3,1000);
   </script>
	   <script>
      function auto_load4(){
        $.ajax({
			
            type: "GET",
            url: 'ajaxDataPoslataNarudzbina.php',
            data: "id=" + <?php echo $_SESSION['user']; ?>, 
            cache: false,
          success: function(data){
             $("#poslato").html(data);
          } 
        });
      }

      $(document).ready(function(){

        auto_load4(); //Call auto_load() function when DOM is Ready
		$(".kat").show();

      });

      //Refresh auto_load() function after 10000 milliseconds
      setInterval(auto_load4,1000);
   </script>    
	   
</head>
<body>

<div id="o-wrapper" class="o-wrapper">
<div style="width:100%;position:fixed;z-index:1;" >
   <header class="o-header" style="padding:10px;padding-left:0px;padding-right:0px;" >
    <nav class="o-header-nav" style="background:transparent;height:50px;" >
    <button id="c-button--slide-left" class="" style="position:absolute;top:5px;left:0px;background:#00a64f;font-size:35px;box-shadow: 1px 1px 5px #212121;text-align:center;font-weight:bold;padding-left:7px;padding-right:15px;border-radius:100px;outline:none;border-top-left-radius:0px;border-bottom-left-radius:0px;color:white;border:none;padding-top:3px;">
	≡
	</button>
	
	   <?php
		   
		    $user_id = $_SESSION['user'];
		   
		
			

		   

  $query = $mysqli->query("SELECT * FROM privremena_narudzbina WHERE user_id='$user_id' ");

            $num = $query->num_rows;
            if($num)
				  
			  
			  {

				echo "<a href='korpa.php' class='' style='position:absolute;top:5px;right:0px;background:#00a64f;font-size:35px;box-shadow: 1px 1px 5px #212121;text-align:center;font-weight:bold;padding-left:20px;padding-right:12px;border-radius:100px;outline:none;border-top-right-radius:0px;border-bottom-right-radius:0px;color:white;border:none;padding-top:0px;padding-bottom:3px;' ><img class='animated flipInX' src='slike/korpa_green.png' style='width:25px;height:25px;' />"."<div class='animated flipInX' style='width:25px;height:25px;padding:2px;background:red;color:white;border-radius:100%;font-size:14px;position:absolute;top:0px;font-weight:bold;font-family:Arial;text-align:center;padding-top:3px;right:25px;top:0px;'>".$num."</div>"."</a>";	
 
				  
			  }else 
							
							{
								
							  echo "<a href='home2.php' class='' style='position:absolute;top:5px;right:0px;background:#00a64f;font-size:35px;box-shadow: 1px 1px 5px #212121;text-align:center;font-weight:bold;padding-left:20px;padding-right:12px;border-radius:100px;outline:none;border-top-right-radius:0px;border-bottom-right-radius:0px;color:white;border:none;padding-top:0px;padding-bottom:3px;' ><img class='animated flipInX' src='slike/korpa_green.png' style='width:25px;height:25px;' /></a>";	
								
							}
				
		
		   
		   
		  ?> 
		   
    </nav>
 
  </header>
</div>  
  <!-- /o-header -->
  
<div style="text-align:center;width:100%;position:fixed;top:0px;z-index:1;height:1px;padding-left:25%;padding-right:25%;"><div style="border-radius:3px;width:100%;height:auto;background:#02a651;color:#f5f5f5;text-align:center;box-shadow: -1px 1px 7px black;font-size:25px;margin-top:5px;line-height: 25px;padding:15px;"><?php  echo $_GET['podkategorija']; ?></div></div>

  
  
  
  <main class="o-content">
    <div>
      
<div style="width:100%;margin-top:0px;" class="animated bounceInLeft" >


<div id="status"></div>
<div id="prihvacen"></div>
<div id="blokiran"></div>
<div id="poslato"></div>


















<?php
echo "<div  style='width:100%;height:auto;background:transparent;padding:55px;float:left;text-align:center;padding-bottom:0px;margin-bottom:0px;'></div>";
$podkategorija = $_GET['podkategorija'];

		$res=mysql_query("SELECT *  FROM arena_produkti  WHERE pr_podkategorija ='$podkategorija'");


			while($row=mysql_fetch_array($res))
				
			
			
			{
				
				echo "<div   style='width:100%;height:auto;background:transparent;padding:0px;float:left;text-align:left;padding-bottom:0px;margin-bottom:10px;'>
				
	<div class='kat'>
	
	<div style='width:100%;height:auto;padding:3px;text-align:center;'>";
	
	
	echo '<img style="max-width:100%;max-height:100%;border:2px solid white;" class="effect7"   src="data:image/jpeg;base64,'.base64_encode( $row['pr_podkategorija_photo'] ).'"/>';
	
	
	echo "</div>";
	
	echo "<div style='line-height:20px;height:auto;color:#212121;text-align:center;padding:6px;font-size:18px;box-shadow:inset 0px 11px 8px -10px #CCC;line-height: 25px;white-space: pre-wrap;      /* CSS3 */   
   white-space: -moz-pre-wrap; /* Firefox */    
   white-space: -pre-wrap;     /* Opera <7 */   
   white-space: -o-pre-wrap;   /* Opera 7 */ 
   
   word-wrap: break-word;'>".$row['kat_opis']."</div>";
	


		
		
	echo "<form action='u_korpu.php' method='POST'>";	
		
		
		?>
		
			<div style="height:auto;color:#212121;padding:5px;text-align:center;font-size:25px;box-shadow:inset 1px 11px 8px -10px #CCC;padding-bottom:0px;">	  
	
	<?php
	
	 			
				if(empty($row['velicina2']) && empty($row['velicina3']) )  {
					 
			
				 echo "	<div style='height:auto;color:#212121;padding:5px;text-align:center;font-size:23px;box-shadow:inset 1px 11px 8px -10px #CCC;padding-bottom:0px;'>";	 
			     echo "</div>";
                      echo "<div style='width:100%;height:auto;padding:5px;'>";
				 echo  $row['velicina1_cena'].",00 rsd ";
				  
      			   echo "</div>";
	 
				 }
				
				if(!empty($row['velicina2']) && empty($row['velicina3']) )  {
					
					
				 echo "<div style='height:auto;color:#212121;padding-top:25px;text-align:center;font-size:23px;box-shadow:inset 1px 11px 8px -10px #CCC;padding-bottom:0px;'>Veličina</div>";	
				 

                 echo "<div style='height:auto;color:#212121;text-align:center;font-size:25px;'>";
 
			     echo "<div class='checkboxFour'><input type='radio' id='checkboxFourInputV1' checked name='velicina'  value='".$row['velicina1']."'><label for='checkboxFourInputV1'></label></div>";	

				 echo "<div class='prilozi'>".$row['velicina1']." ( ".$row['velicina1_cena'].",00 rsd )"."</div>";
				  
                 echo "</div>";					 
			
				 echo "<div style='height:auto;color:#212121;text-align:center;font-size:25px;'>";
 
			     echo "<div class='checkboxFour'><input type='radio' id='checkboxFourInputV2' name='velicina'  value='".$row['velicina2']."'><label for='checkboxFourInputV2'></label></div>";	

				 echo "<div class='prilozi'>".$row['velicina2']." ( ".$row['velicina2_cena'].",00 rsd )"."</div>";
				  
                 echo "</div>";	

		         echo "<div style='width:100%;height:auto;padding:15px;'></div>";				 
	
				 }
				 
				 if(!empty($row['velicina3']))  {
					 
			    	 echo "<div style='height:auto;color:#212121;padding:15px;text-align:center;font-size:23px;box-shadow:inset 1px 11px 8px -10px #CCC;padding-bottom:0px;'>Veličina</div>";	
				 

                 echo "<div style='height:auto;color:#212121;text-align:center;font-size:25px;'>";
 
			     echo "<div class='checkboxFour'><input type='radio' id='checkboxFourInputV1' checked name='velicina'  value='".$row['velicina1']."'><label for='checkboxFourInputV1'></label></div>";	

				 echo "<div class='prilozi'>".$row['velicina1']." ( ".$row['velicina1_cena'].",00 rsd )"."</div>";
				  
                 echo "</div>";					 
			
				 echo "<div style='height:auto;color:#212121;text-align:center;font-size:25px;'>";
 
			     echo "<div class='checkboxFour'><input type='radio' id='checkboxFourInputV2' name='velicina'  value='".$row['velicina2']."'><label for='checkboxFourInputV2'></label></div>";	

				 echo "<div class='prilozi'>".$row['velicina2']." ( ".$row['velicina2_cena'].",00 rsd )"."</div>";
				  
                 echo "</div>";	
				 echo "<div style='height:auto;color:#212121;text-align:center;font-size:25px;'>";
 
			     echo "<div class='checkboxFour'><input type='radio' id='checkboxFourInputV3' name='velicina'  value='".$row['velicina3']."'><label for='checkboxFourInputV3'></label></div>";	

				 echo "<div class='prilozi'>".$row['velicina3']." ( ".$row['velicina3_cena'].",00 rsd )"."</div>";
				  
                 echo "</div>";				 
	             echo "<div style='width:100%;height:auto;padding:15px;'></div>";
				 }
					
	
			
	
	
	?>
	
	</div>	
		
	<div style='height:auto;color:#212121;padding:5px;text-align:center;font-size:28px;box-shadow:inset 1px 11px 8px -10px #CCC;padding-bottom:0px;'></div>	  
<div style='height:auto;color:#212121;padding-top:7px;text-align:center;font-size:23px;box-shadow:inset 1px 11px 8px -10px #CCC;padding-bottom:0px;'>Količina</div>	
	<div style="width:100%;height:auto;padding-left:20px;padding-right:20px;background:#f5f5f5;text-align:center;color:#212121;padding-bottom:10px;font-size:23px;">		

 
        <input name="kolicina" style="width:100%;height:auto;" id="ex19" type="text"
              data-provide="slider"
              data-slider-ticks="[1, 2, 3, 4, 5, 6, 7, 8, 9, 10]"
              data-slider-ticks-labels='[" 1", "2", "3","4", "5", "6","7", "8", "9","10"]'
              data-slider-min="1"
              data-slider-max="10"
              data-slider-step="1"
              data-slider-value="1"
              data-slider-tooltip="hide" />	
			  
</div>  
		
		<?php
		
	
		  
		           // Besplatni prilozi
		  
				 if(!empty($row['prilog1']))  {
					 
				 echo "<div style='height:auto;color:#212121;padding:5px;text-align:center;font-size:28px;box-shadow:inset 1px 11px 8px -10px #CCC;padding-bottom:0px;'></div>";		 
	 
				 echo "<div style='height:auto;color:#212121;padding:15px;text-align:center;font-size:23px;box-shadow:inset 1px 11px 8px -10px #CCC;padding-bottom:0px;font-size:23px;line-height: 25px;'>Prilozi</div>";	
								 
					 
				 echo "<div style='height:auto;color:#212121;text-align:center;font-size:25px;'>";
 
			     echo "<div class='checkboxFour'><input type='checkbox' id='checkboxFourInput1' name='prilog1'  value='".$row['prilog1']."'><label for='checkboxFourInput1'></label></div>";	

				 echo "<div class='prilozi'>".$row['prilog1']."</div>";
				  
                 echo "</div>";				 
	
				 }
				 
				  if(!empty($row['prilog2']))  {
					 
					 echo "<div style='height:auto;color:#212121;text-align:center;font-size:25px;'>";

					 echo "<div class='checkboxFour'><input type='checkbox' id='checkboxFourInput2' name='prilog2'  value='".$row['prilog2']."'><label for='checkboxFourInput2'></label></div>";	
                 
				     echo "<div class='prilozi'>".$row['prilog2']."</div>";
				 
                     echo "</div>";					 
				 }
				 
				  if(!empty($row['prilog3']))  {
					 
				 echo "<div style='height:auto;color:#212121;text-align:center;font-size:25px;'>";
	 
				 echo "<div class='checkboxFour'><input type='checkbox' id='checkboxFourInput3' name='prilog3'  value='".$row['prilog3']."'><label for='checkboxFourInput3'></label></div>";				
			
			      echo "<div class='prilozi'>".$row['prilog3']."</div>";
			
			     echo "</div>";
				 }
				 
				  if(!empty($row['prilog4']))  {
					 
				 echo "<div style='height:auto;color:#212121;text-align:center;font-size:25px;'>";
	 
				 echo "<div class='checkboxFour'><input type='checkbox' id='checkboxFourInput4' name='prilog4'  value='".$row['prilog4']."'><label for='checkboxFourInput4'></label></div>";

				 echo "<div class='prilozi'>".$row['prilog4']."</div>";
				 
                 echo "</div>";					 
				 }
				 if(!empty($row['prilog5']))  {
					 
				echo "<div style='height:auto;color:#212121;text-align:center;font-size:25px;'>";
	 
			    echo "<div class='checkboxFour'><input type='checkbox' id='checkboxFourInput5' name='prilog5'  value='".$row['prilog5']."'><label for='checkboxFourInput5'></label></div>";				
			
			    echo "<div class='prilozi'>".$row['prilog5']."</div>";
			
			    echo "</div>";	
				 }
				 if(!empty($row['prilog6']))  {
					 
				echo "<div style='height:auto;color:#212121;text-align:center;font-size:25px;'>";
	 
			    echo "<div class='checkboxFour'><input type='checkbox' id='checkboxFourInput6' name='prilog6'  value='".$row['prilog6']."'><label for='checkboxFourInput6'></label></div>";				
			
			    echo "<div class='prilozi'>".$row['prilog6']."</div>";
			
			    echo "</div>";	
				 }
				 if(!empty($row['prilog7']))  {
					 
				echo "<div style='height:auto;color:#212121;text-align:center;font-size:25px;'>";
	 
				echo "<div class='checkboxFour'><input type='checkbox' id='checkboxFourInput7' name='prilog7'  value='".$row['prilog7']."'><label for='checkboxFourInput7'></label></div>";				
		
		        echo "<div class='prilozi'>".$row['prilog7']."</div>";
		
		        echo "</div>";	
				 }
				 if(!empty($row['prilog8']))  {
					 
			   echo "<div style='height:auto;color:#212121;text-align:center;font-size:25px;'>";
	 
			   echo "<div class='checkboxFour'><input type='checkbox' id='checkboxFourInput8' name='prilog8'  value='".$row['prilog8']."'><label for='checkboxFourInput8'></label></div>";				
		     
			   echo "<div class='prilozi'>".$row['prilog8']."</div>";
			 
			   echo "</div>";	
				 }
				 if(!empty($row['prilog9']))  {
					 
			  echo "<div style='height:auto;color:#212121;text-align:center;font-size:25px;'>";
		 
			  echo "<div class='checkboxFour'><input type='checkbox' id='checkboxFourInput9' name='prilog9'  value='".$row['prilog9']."'><label for='checkboxFourInput9'></label></div>";				
			
			  echo "<div class='prilozi'>".$row['prilog9']."</div>";
			
			  echo "</div>";	
				 }
				  if(!empty($row['prilog10']))  {
					 
			  echo "<div style='height:auto;color:#212121;text-align:center;font-size:25px;'>";
	 
			  echo "<div class='checkboxFour'><input type='checkbox' id='checkboxFourInput10' name='prilog10'  value='".$row['prilog10']."'><label for='checkboxFourInput10'></label></div>";				
			
			  echo "<div class='prilozi'>".$row['prilog10']."</div>";
			
			  echo "</div>";	
				 }
		
		       echo "<div style='width:100%;height:auto;padding:25px;'></div>";
		
		
		
		
		// Prilozi sa cenom
		
		
		
		
		
				if(!empty($row['dodatni_prilog1']))  {
					 
				 echo "<div style='height:auto;color:#212121;padding:5px;text-align:center;font-size:28px;box-shadow:inset 1px 11px 8px -10px #CCC;padding-bottom:0px;'></div>";		 
				 echo "<div style='height:auto;color:#212121;padding:15px;text-align:center;font-size:23px;box-shadow:inset 1px 11px 8px -10px #CCC;padding-bottom:0px;line-height: 25px;'>Dodatni Prilozi</div>";	
							 
					 
				 echo "<div style='height:auto;color:#212121;text-align:center;font-size:25px;'>";
 
			     echo "<div class='checkboxFour'><input type='checkbox' id='checkboxFourInputD1' name='dodatni_prilog1'  value='".$row['dodatni_prilog1_cena']."'><label for='checkboxFourInputD1'></label></div>";	

				 echo "<div class='prilozi'>".$row['dodatni_prilog1']." ( + ".$row['dodatni_prilog1_cena'].",00 rsd )"."</div>";
				  
                 echo "</div>";	

				 echo "<input type='hidden' name='dodatni_prilog1_name' value='".$row['dodatni_prilog1']."' />";
	
				 }
		
		
		
				 if(!empty($row['dodatni_prilog2']))  {
					 
				 echo "<div style='height:auto;color:#212121;text-align:center;font-size:25px;'>";
 
			     echo "<div class='checkboxFour'><input type='checkbox' id='checkboxFourInputD2' name='dodatni_prilog2'  value='".$row['dodatni_prilog2_cena']."'><label for='checkboxFourInputD2'></label></div>";	

				 echo "<div class='prilozi'>".$row['dodatni_prilog2']." ( + ".$row['dodatni_prilog2_cena'].",00 rsd )"."</div>";
				  
                 echo "</div>";	

                 echo "<input type='hidden' name='dodatni_prilog2_name' value='".$row['dodatni_prilog2']."' />";				 
	
				 }
		
		
				 if(!empty($row['dodatni_prilog3']))  {
					 
				 echo "<div style='height:auto;color:#212121;text-align:center;font-size:25px;'>";
 
			     echo "<div class='checkboxFour'><input type='checkbox' id='checkboxFourInputD3' name='dodatni_prilog3'  value='".$row['dodatni_prilog3_cena']."'><label for='checkboxFourInputD3'></label></div>";	

				 echo "<div class='prilozi'>".$row['dodatni_prilog3']." ( + ".$row['dodatni_prilog3_cena'].",00 rsd )"."</div>";
				  
                 echo "</div>";	

                 echo "<input type='hidden' name='dodatni_prilog3_name' value='".$row['dodatni_prilog3']."' />";				 
	
				 }
				 
				 
				 if(!empty($row['dodatni_prilog4']))  {
					 
				 echo "<div style='height:auto;color:#212121;text-align:center;font-size:25px;'>";
 
			     echo "<div class='checkboxFour'><input type='checkbox' id='checkboxFourInputD4' name='dodatni_prilog4'  value='".$row['dodatni_prilog4_cena']."'><label for='checkboxFourInputD4'></label></div>";	

				 echo "<div class='prilozi'>".$row['dodatni_prilog4']." ( + ".$row['dodatni_prilog4_cena'].",00 rsd )"."</div>";
				  
                 echo "</div>";	

                 echo "<input type='hidden' name='dodatni_prilog4_name' value='".$row['dodatni_prilog4']."' />";				 
	
				 }
				 
				 
				  if(!empty($row['dodatni_prilog5']))  {
					 
				 echo "<div style='height:auto;color:#212121;text-align:center;font-size:25px;'>";
 
			     echo "<div class='checkboxFour'><input type='checkbox' id='checkboxFourInputD5' name='dodatni_prilog5'  value='".$row['dodatni_prilog5_cena']."'><label for='checkboxFourInputD5'></label></div>";	

				 echo "<div class='prilozi'>".$row['dodatni_prilog5']." ( + ".$row['dodatni_prilog5_cena'].",00 rsd )"."</div>";
				  
                 echo "</div>";	

                 echo "<input type='hidden' name='dodatni_prilog5_name' value='".$row['dodatni_prilog5']."' />";				 
	
				 }
		
		        echo "<div style='width:100%;height:auto;padding:15px;'></div>";
				
				
				// Velicina
				
         
			
				
				
				
			
				
			
			   
			   // Reference za korpu
		
		
		     
				
				
				echo "<input type='hidden' name='podkategorija' value='".$_GET['podkategorija']."' />";
				echo "<input type='hidden' name='cena' value='".$row['velicina1_cena']."' />";
				echo "<input type='hidden' name='user_id' value='".$_SESSION['user']."' />";
				
				
				echo "<input type='hidden' name='velicina1' value='".$row['velicina1']."' />";
				echo "<input type='hidden' name='velicina2' value='".$row['velicina2']."' />";
				echo "<input type='hidden' name='velicina3' value='".$row['velicina3']."' />";
				
				echo "<input type='hidden' name='velicina1_cena' value='".$row['velicina1_cena']."' />";
				echo "<input type='hidden' name='velicina2_cena' value='".$row['velicina2_cena']."' />";
				echo "<input type='hidden' name='velicina3_cena' value='".$row['velicina3_cena']."' />";
			
				echo "<input type='hidden' name='dodatni_prilog1_cena' value='".$row['dodatni_prilog1_cena']."' />";
                echo "<input type='hidden' name='dodatni_prilog2_cena' value='".$row['dodatni_prilog2_cena']."' />";
				echo "<input type='hidden' name='dodatni_prilog3_cena' value='".$row['dodatni_prilog3_cena']."' />";
				echo "<input type='hidden' name='dodatni_prilog4_cena' value='".$row['dodatni_prilog4_cena']."' />";
				echo "<input type='hidden' name='dodatni_prilog5_cena' value='".$row['dodatni_prilog5_cena']."' />";
		
		     // Dodatni opis
		          
		      echo "<div style='height:auto;color:#212121;padding:5px;text-align:center;font-size:28px;box-shadow:inset 1px 11px 8px -10px #CCC;padding-bottom:0px;'></div>";
		      echo "<div style='height:auto;color:#212121;padding:5px;text-align:center;font-size:28px;box-shadow:inset 1px 11px 8px -10px #CCC;padding-bottom:0px;'></div>";

		     echo   "<div style='width:100%;height:auto;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px;'  class='form-group'>";
		
		     echo "<textarea name='opis' style='resize:none;font-size:22px;height:100px;box-shadow:inset 1px 11px 8px -10px #CCC;width:100%;border-radius:5px;padding:5px;font-family: BenchNine;' placeholder='Dodatno uputstvo (nije obavezno)' class='form-control' ></textarea>";
		
		     echo   "</div>";
		
		
		  
		
		
		
		
		 echo "<button type='submit' name='sub' class='btn btn-block btn-success' style='border-radius:0px;font-size:32px;width:100%;padding:10px;color:white;background:#02a651;'><img class='animated flipInX' src='slike/korpa_green.png' style='width:25px;height:25px;' /></button>";
		
		
		
		echo "</form>";	
		
		
		

	
	
	
	
	echo "</div>";
		
    echo "</div>";
				
				
				
			}


 
echo "<div  style='width:100%;height:auto;background:transparent;padding:0px;float:left;text-align:center;padding-bottom:0px;margin-bottom:0px;'></div>";



?>



















</div>
    

    </div><!-- /o-container -->
  </main><!-- /o-content -->

  <footer class="o-footer">
    <div class="o-container">
    
    </div>
  </footer><!-- /o-footer -->

</div><!-- /o-wrapper -->

<nav id="c-menu--slide-left"  style="background:#f5f5f5;overflow:hidden;" class="c-menu c-menu--slide-left">
  <button class="c-menu__close" style="font-size:25px;padding-bottom:20px;background:#00a64f;" ><img src="slike/icon1.png" style="height:25px;width:25px;" /><br/><?php echo $userRow['userName']."<br/>"; ?></button>
  <ul class="c-menu__items "  style="color:#212121;" >
    <li class="c-menu__item"><a href="mojaAdresa.php" style="color:#212121;text-decoration:none;" class="c-menu__link m">Moja Adresa</a></li>
    <li class="c-menu__item"><a href="logout.php?logout" style="color:#212121;text-decoration:none;" class="c-menu__link m">&nbsp; Odjava</a></li>
	 <li class="c-menu__item"><a href="#" class="c-menu__link"></a></li>
 
  </ul>
</nav><!-- /c-menu slide-left -->





<div id="c-mask" class="c-mask"></div><!-- /c-mask -->

<!-- menus script -->
<script src="js/dist/menu.js"></script>
<script>
  
  /**
   * Slide left instantiation and action.
   */
  var slideLeft = new Menu({
    wrapper: '#o-wrapper',
    type: 'slide-left',
    menuOpenerClass: '.c-button',
    maskId: '#c-mask'
  });

  var slideLeftBtn = document.querySelector('#c-button--slide-left');
  
  slideLeftBtn.addEventListener('click', function(e) {
    e.preventDefault;
    slideLeft.open();
  });



</script>

<!-- EXTERNAL SCRIPTS FOR CALLMENICK.COM, PLEASE DO NOT INCLUDE -->


<!-- /EXTERNAL SCRIPTS -->

</body>
</html>
<?php ob_end_flush(); ?>