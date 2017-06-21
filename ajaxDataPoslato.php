<?php

	require_once 'dbconnect.php';
	require_once 'connect.php';


	     $user_id = $_GET['id'];
		 

	
		$res=mysql_query("SELECT *  FROM korpa1  WHERE user_id ='$user_id' && naruceno !='' ");


			while($row=mysql_fetch_array($res))
				
			
			
			{ 
			
			
			  if($row['naruceno']==="prihvacen")
				  
			  
			  {
			
				  echo "<div   style='width:100%;color:#212121; background: #ffffff;height:100vh;text-align:center;box-shadow: 1px 1px 5px #212121;padding-top:100px;z-index:1;position:fixed;top:0px;' >";

                  ?>

			
			<img src="slike/accept.gif" style="width:270px;height:200px;margin-top:1px;" /><br/>
			<div class="col-xs-12 col-sm-6 col-md-12" style='height:auto;text-align:center;color:#212121;font-size:22px;'>Vaša narudžbina je prihvaćena.<br/>Očekivano vreme dostave je do 30 minuta.</div>  
			
			
			</div> 
				  
				  
				  <?php

         


				 echo "</div>"; 
				  
				  
			  }			
			
			
			
			
			
			
			}











?>
