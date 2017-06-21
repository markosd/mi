<?php

	require_once 'dbconnect.php';
	require_once 'connect.php';


	     $user_id = $_GET['id'];
		 

	
		$res=mysql_query("SELECT *  FROM users  WHERE userId ='$user_id'");


			while($row=mysql_fetch_array($res))
				
			
			
			{ 
			
			
			  if($row['blok']==="da")
				  
			  
			  {
			
				  echo "<div   style='width:100%;background: #ffffff;height:100vh;text-align:center;box-shadow: 1px 1px 5px #212121;padding-top:85px;z-index:1;position:fixed;padding-left:0px;padding-right:0px;' >";

                  ?>
				  
	
        
			<div class="col-xs-12 col-sm-6 col-md-12" style='height:auto;text-align:center;box-shadow:inset 0px 11px 8px -10px #CCC;margin-bottom:45px;'>
			
			<img src="slike/blok.jpg" style="width:270px;height:200px;margin-top:10px;" /><br/>
			<div class="col-xs-12 col-sm-6 col-md-12" style='height:auto;text-align:center;color:#fe0101;font-size:28px; '>Blokirani ste od strane Arene tima.</div>  
			</div> 
			<div class="col-xs-12 col-sm-6 col-md-12" style='height:5px;text-align:center;box-shadow:inset 0px 11px 8px -10px #CCC;'></div>	  
				  
				  <?php

         


				 echo "</div>"; 
				  
				  
			  }			
			
			
			
			
			
			
			}











?>
