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
        <style type="text/css">
            
            * {
                margin: 0;
                padding: 0;
            }
            
            body {
                  font-family: Arial;font-size:20px;
                overflow-x: hidden;
				background: url("slike/fixed.jpg");
				
            }	
	.kat {
		
		
		width:100%;height:auto;background:#f5f5f5;box-shadow: -1px 1px 7px black;border-radius:3px;
		
		
	}
.kat:hover {   


opacity:0.7;

}	

.m:hover {
	
	
	opacity:0.7;
	
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
  
<div style="text-align:center;width:100%;position:fixed;top:0px;z-index:1;height:1px;padding-left:25%;padding-right:25%;"><div style="border-radius:3px;width:100%;height:auto;background:#02a651;color:#f5f5f5;text-align:center;box-shadow: -1px 1px 7px black;font-size:25px;margin-top:5px;line-height: 25px;padding:15px;"><?php  echo $_GET['kategorija']; ?></div></div>

  
  
  
  <main class="o-content">
    <div>
      
<div style="width:100%;margin-top:0px;" class="animated bounceInLeft" >


<div id="status"></div>
<div id="prihvacen"></div>
<div id="blokiran"></div>
<div id="poslato"></div>


















<?php
echo "<div  style='width:100%;height:auto;background:transparent;padding:55px;float:left;text-align:center;padding-bottom:0px;margin-bottom:0px;'></div>";
$kategorija = $_GET['kategorija'];

$res=mysql_query("SELECT DISTINCT *  FROM arena_produkti  WHERE pr_kategorija ='$kategorija'");


			while($row=mysql_fetch_array($res))
				
			
			
			{
				
				echo "<div  style='width:100%;height:auto;background:transparent;padding:10px;float:left;text-align:left;padding-bottom:0px;margin-bottom:10px;'>
				
	<a href='produkt.php?podkategorija=" . $row['pr_podkategorija'] . "' style='text-decoration:none;'><div class='kat'>
	
	<div style='width:100%;height:120px;padding-bottom:3px;padding-top:7px;padding-left:3px;text-align:center;'>";
	
	
	echo '<img style="max-width:100%;max-height:100%;border:2px solid white;" class="effect7"   src="data:image/jpeg;base64,'.base64_encode( $row['pr_podkategorija_photo'] ).'"/>';
	
	
	echo "</div>";
	
	echo "<div style='line-height:20px;height:auto;color:#212121;text-align:center;padding:6px;font-size:15px;box-shadow:inset 0px 11px 8px -10px #CCC;margin-top:5px;white-space: pre-wrap;      /* CSS3 */   
   white-space: -moz-pre-wrap; /* Firefox */    
   white-space: -pre-wrap;     /* Opera <7 */   
   white-space: -o-pre-wrap;   /* Opera 7 */ 
   
   word-wrap: break-word;'>".$row['kat_opis']."</div>";
	    echo "<div style='height:auto;color:red;text-align:center;padding:2px;font-size:25px;font-family:Arial;box-shadow:inset 0px 11px 8px -10px #CCC;'>".$row['velicina1_cena'].",00 rsd"."</div>";

	
	echo "<div style='width:100%;height:auto;background:#00a64f;color:#f5f5f5;text-align:center;'>".$row['pr_podkategorija']."</div>
	
	
	</div></a>	
		
</div>";
				
				
				
			}

 
echo "<div  style='width:100%;height:auto;background:transparent;padding:55px;float:left;text-align:center;padding-bottom:0px;margin-bottom:30px;'></div>";



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