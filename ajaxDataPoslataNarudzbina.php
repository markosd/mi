<?php

	require_once 'dbconnect.php';
	require_once 'connect.php';


	     $user_id = $_GET['id'];
		 

	
		$res=mysql_query("SELECT *  FROM korpa1  WHERE user_id ='$user_id' && naruceno !='' ");


			while($row=mysql_fetch_array($res))
				
			
			
			{ 
			
			
			  if($row['naruceno']==="poslato")
				  
			  
			  {
			
				  echo "<div   style='width:100%;color:#f5f5f5; background: #12c06a;height:100vh;text-align:center;box-shadow: 1px 1px 5px #212121;padding-top:100px;z-index:1;position:fixed;padding-left:0px;padding-right:0px;top:0px;' >";

                  ?>
				  
        
			<div class="col-xs-12 col-sm-6 col-md-12" style='height:auto;text-align:center;padding:0px;'>
			

			

			
			
				<?php 
			
			
			if(empty($row['komentar']))
				
				{
								echo "<div style='margin-top:20px;width:100%;color:white;background:#12c06a;padding:5px;height:auto;white-space: pre-wrap;      /* CSS3 */   
   white-space: -moz-pre-wrap; /* Firefox */    
   white-space: -pre-wrap;     /* Opera <7 */   
   white-space: -o-pre-wrap;   /* Opera 7 */ 
   
   word-wrap: break-word;font-size:22px;'><img src='slike/success.gif' style='width:200px;height:150px;' /><br/>Vaša narudžbina je poslata.<br/><br/></div>";
					
				}else {
			
			

								echo "<div style='margin-top:20px;width:100%;color:white;background:#12c06a;padding:5px;height:auto;padding:2px;white-space: pre-wrap;      /* CSS3 */   
   white-space: -moz-pre-wrap; /* Firefox */    
   white-space: -pre-wrap;     /* Opera <7 */   
   white-space: -o-pre-wrap;   /* Opera 7 */ 
   
   word-wrap: break-word;'><img src='slike/success.gif' style='width:200px;height:150px;' /><br/><font style='color:#212121;font-weight:bold;'>OPERATER : </font>"."  ".$row['komentar']."<br/><br/></div>";
		
			
			}
			
		
         


				
				  
			  }			
			
			
			
			
			
			
			}











?>
