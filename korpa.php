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
.narudzbenica {
	
	font-size:22px;
		    opacity: 1;
    -webkit-transition: opacity 1000ms linear;
    transition: opacity 1000ms linear;
	
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

    </nav>
 
  </header>
</div>  
  <!-- /o-header -->
  
<div id="total">

<?php



			$res=mysql_query("SELECT SUM(pn_total) AS total  FROM privremena_narudzbina  WHERE user_id ='$user_id'");
         
				
				

			while($row=mysql_fetch_array($res))
				
				{
			    
				
					
				
                     echo "<div style='text-align:center;width:100%;position:fixed;top:0px;z-index:1;height:1px;padding-left:25%;padding-right:25%;line-height: 25px;'><div style='border-radius:3px;width:100%;height:auto;background:#02a651;color:#f5f5f5;text-align:center;padding:5px;box-shadow: -1px 1px 7px black;font-size:25px;margin-top:5px;'>";
					 echo "<div style='border-bottom:1px solid #f5f5f5;padding:5px;margin-bottom:5px;'>Ukupno</div>";
					 echo $row['total'].",00 rsd";
					 
					  echo "</div>";
					 echo "</div>";
				

					


			
			}	



	








?>

</div>
  
  
  
  <main class="o-content">
    <div>
      
<div style="position:absolute;width:100%;margin-top:100px;padding-left:0px;padding-right:0px;" class="animated bounceInLeft" >



<?php

	$res2=mysql_query("SELECT * FROM privremena_narudzbina WHERE user_id=".$_SESSION['user']);
	
	
				while($row=mysql_fetch_array($res2))
				
			
			
			{ 
                      $user_id = $_SESSION['user'];
                     $sad = time();
					$expire = $row['expire'];
					  
					  
					  if($expire < $sad)
             
			                {
								
										 $sql = "DELETE FROM privremena_narudzbina WHERE user_id='$user_id'";

                                       if ($conn->query($sql) === TRUE) {  header("Location: home2.php"); }
								
							}else {}

			}	
	
	
	
	
	?>
	
	<form action="test.php" method="POST">


	
	
		    <?php

	     $user_id = $_SESSION['user'];
		 

	
		$res=mysql_query("SELECT *  FROM privremena_narudzbina  WHERE user_id ='$user_id'");


			while($row=mysql_fetch_array($res))
				
			
			
			{ 
			
			
                  
			echo "<div  class='narudzbenica' style='height:auto;padding:5px;margin-bottom:2px;background:#f5f5f5;box-shadow: 5px 1px 5px black;margin-top:5px;font-size:18px;'>";
			 
			 
			 
			  ?>
			  
			  <script language="javascript">
            function testId(id){
			
		
			
			
             var a = id;			
				

				
           $.ajax({
              type:'GET',
              url:'ajaxData1.php',
              data: {
                  "id": a
               
              },
              success: function(){

            $('#total').html(data);
			
			
              
              }
          });
        }
		
		
				 function getSummary()
{
   $.ajax({

     type: "GET",
     url: 'ajaxData.php',
     data: "id=" + <?php echo $user_id; ?>, // appears as $_GET['id'] @ your backend side
     success: function(data) {
           // data is ur summary
          $('#total').html(data);
     }

   });

}
		

    </script>

  
			  
			  
			  <?php
			 
			 
			 
			   echo "<div class='closee' onclick='javascript:testId(this.id);getSummary();parentNode.remove();' id='".$row['pn_id']."' style='float:right;background:transparent;color:white;padding:2px;width:auto;height:100%;text-align:center;'><img src='slike/close2.png' style='width:30px;height:30px;'/></div>";
			
                echo "<font style='color:#212121;font-weight:bold;'>".$row['pn']."</font>"."<br/>";
				echo "<font style='color:#212121;font-weight:bold;'>Prilog : </font>".$row['pn_prilog']."<br/>";
				
				echo "<font style='color:#212121;font-weight:bold;'>Dodatni prilozi : </font>".$row['pn_dodatni_prilozi']."<br/>";
				echo "<font style='color:#212121;font-weight:bold;'>Dodatna uputstva : </font>".$row['pn_opis']."<br/>";
			
			
				echo "<font style='color:#212121;font-weight:bold;'>Vrednost narudžbine : </font>"."<font style='font-family:Arial;color:red;font-weight:bold;font-size:18px;'>".$row['pn_total'].",00 rsd</font>"."<br/>";

				echo "</div>";
				
			

			}		
	
	





?>
<div style="padding:32px;"></div>
 </div>
 
   

	<input type="submit" class='btn btn-block btn-success animated flipInX' style="width:100%;padding:10px;position:fixed;bottom:0px;font-size:23px;border-radius:0px;box-shadow: 5px 1px 5px black;color:white;background:#02a651;" name="sub" value="Naruči" />
	</form>
	




















</div>
    

    </div><!-- /o-container -->
  </main><!-- /o-content -->

  <footer class="o-footer">
    <div class="o-container">
    
    </div>
  </footer><!-- /o-footer -->

</div><!-- /o-wrapper -->

<nav id="c-menu--slide-left"  style="background:#f5f5f5;overflow:hidden;" class="c-menu c-menu--slide-left">
  <button class="c-menu__close" style="font-size:25px;padding-bottom:20px;background:#00a64f;"><img src="slike/icon1.png" style="height:25px;width:25px;" /><br/><?php echo $userRow['userName']."<br/>"; ?></button>
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