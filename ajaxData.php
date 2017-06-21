<?php  

	require_once 'dbconnect.php';
	require_once 'connect.php';

$user_id = $_GET['id'];


    			$res=mysql_query("SELECT SUM(pn_total) AS total  FROM privremena_narudzbina  WHERE user_id ='$user_id'");


				
			while($row=mysql_fetch_array($res))
				
				{
			    
														 if(!empty($row['total'])) { 
					 
                     echo "<div style='text-align:center;width:100%;position:fixed;top:0px;z-index:1;height:1px;padding-left:25%;padding-right:25%;line-height: 25px;'><div style='border-radius:3px;width:100%;height:auto;background:#02a651;color:#f5f5f5;text-align:center;padding:5px;box-shadow: -1px 1px 7px black;font-size:25px;margin-top:5px;'>";
					 echo "<div style='border-bottom:1px solid #f5f5f5;padding:5px;margin-bottom:5px;'>Ukupno</div>";
					 echo $row['total'].",00 rsd";
					 
					  echo "</div>";
					 echo "</div>";
				
					
				
				
		              }else {
					
				
                            echo "<script>window.location = 'home2.php';</script>";
				

					 }


			
			}	








 ?>