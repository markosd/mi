<?php
ob_start();
	session_start();
	require_once 'dbconnect.php';
	require_once 'connect.php';


	     $user_id = $_GET['id'];
		 

	
		$res=mysql_query("SELECT *  FROM korpa1  WHERE user_id ='$user_id' && naruceno !='' ");


			while($row=mysql_fetch_array($res))
				
			
			
			{ 
			
			
			  if($row['naruceno']==="ok")
				  
			  
			  {
			
				  echo "<div   style='width:100%;background: #f5f5f5;height:100vh;text-align:center;5px;box-shadow: 1px 1px 5px #212121;z-index:1;position:fixed;top:0px;padding-top:100px;' >";

                  ?>
	  
     
			
			<img src="slike/loader.gif" /><br/>
			<div class="col-xs-12 col-sm-6 col-md-12" style='height:auto;text-align:center;color:green;font-size:22px;'>Vaša narudžbina je poslata operateru.<br/>Molimo Vas sačekajte...</div>  
			
			
			</div> 
				  
				  
				  <?php

         


				 echo "</div>"; 
				  
				  
			  }			
			
			
			
			
			
			
			}











?>
<?php ob_end_flush(); ?>