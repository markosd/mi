<?php

	require_once 'dbconnect.php';
	require_once 'connect.php';


	     $user_id = $_GET['id'];
		 

	
		$res=mysql_query("SELECT *  FROM korpa1  WHERE naruceno='poslato'  ORDER BY vreme    ");


			while($row=mysql_fetch_array($res))
				
			
			
			{ 
			
		
				  echo "<div class='zahtev'   style='width:100%;margin-top:10px;padding:10px;font-size:18px;font-family:Arial;border-top-left-radius:3px;' >";

                  ?>
				  

		<?php 



		$id = $row['user_id'];  

          		$res2=mysql_query("SELECT *  FROM users  WHERE userId='$id' && blok='' ");


			while($row2=mysql_fetch_array($res2))
				
			
			
			{ 
			
			
			  ?>
			  
			<div id="main" style='width:100%;height:auto;background:#f5f5f5;text-align:center;box-shadow: 1px 1px 5px #212121;border-top-left-radius:3px;border-top-right-radius:3px;'> 
		    <div  style='width:100%;text-align:center;padding:3px;'><img src="slike/logo.png" style="width:65px;height:60px;" /></div>
         
       	    <div  style='margin-bottom:2px;width:100%;text-align:center;padding:2px;color:#212121;border-top:1px solid #212121;border-bottom:1px solid #212121;'>Porudzbenica  <?php echo " br. ".$row['korpa1id'];     ?></div>
          
		    <div   style='width:100%;height:auto;background:#f5f5f5;text-align:left;padding-left:10px;font-size:15px;padding-bottom:10px;'>
		
<div  style='width:100%;height:auto;background:#f5f5f5;text-align:left;padding:5px;font-weight:bold;font-size:18px;padding-left:0px;padding-bottom:1px;'>Informacije o naruciocu</div>


			    <div style='width:100%;float:left;' class="input-group">
			    <span>Broj telefona : </span>
            	<?php echo $row2['userPhone']; ?>
                </div>
				<div style='width:100%;float:left;' class="input-group">
			  	<span>Korisnicko ime : </span>
            	<?php echo  $row2['userName']; ?>
                </div>
				<div style='width:100%;' class="input-group">
			  	<span>Email : </span>
            	<?php echo  $row2['userEmail']; ?>
                </div>
				<div style='width:100%;' class="input-group">
			  	<span>Lokacija : </span>
            	<?php echo  $row['user_grad']." - ".$row['user_lokacija']; ?>
                </div>
			    <div style='width:100%;' class="input-group">
			    <span>Vreme : </span>
            	<?php echo  $row['vreme']; ?>
			    </div>
			  
	
		
		</div>
  <div  style='width:100%;height:auto;background:#f5f5f5;text-align:center;padding:1px;color:#212121;border-top:1px solid #212121;border-bottom:1px solid #212121;font-size:15px;'><i>Narudzbina</i></div>

			
			<div  style="font-size:13px;">
			
			<?php
			
			
			
			
			echo $row['user_narudzbina'];
			
			
			
			
			?>
			
			</div>
			
			
			
			
			</div>
       	    <div  style='width:100%;height:auto;background:#f5f5f5;height:auto;text-align:left;5px;box-shadow: 1px 1px 5px #212121;padding:3px;'>
			
	 <script language="javascript">
	 
	 
            function testId3(id){
				
             var c = id;			
			
           $.ajax({
              type:'GET',
              url:'ajaxDataZavrsenaDostava.php',
              data: {
                  "id": c
               
              },
              success: function(){

              
              }
          });
        }
		
	

    
		
		
		</script>
			

		
            <div style='width:100%;padding:2px;' class="input-group">			 
			<button class="btn btn-block btn-danger" style="" onclick="javascript:testId3(this.id);" id="<?php echo $row['korpa1id']; ?>">Zavrsena narudzbina</button>
            </div>
			
			</div>			
	  
				  <?php

         


				 echo "</div>"; 
				  
				  
			
			
			
			
			
			
			}

}









?>
