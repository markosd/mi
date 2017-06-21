<?php

	require_once 'dbconnect.php';
	require_once 'connect.php';


	     $user_id = $_GET['id'];
		 

	
		$res=mysql_query("SELECT *  FROM korpa1  WHERE naruceno='ok' ORDER BY vreme  ");


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
			  
			<div  style='width:100%;height:auto;background:#f5f5f5;height:auto;text-align:center;5px;box-shadow: 1px 1px 5px #212121;border-top-left-radius:3px;border-top-right-radius:3px;'> 
       	    <div  style='width:100%;height:auto;background:#008080;height:auto;text-align:center;5px;box-shadow: 1px 1px 5px #212121;border-top-left-radius:3px;border-top-right-radius:3px;color:#f5f5f5;'>Zahtev <?php echo " # ".$row['korpa1id'];    ?></div>

		    <div   style='width:100%;height:auto;background:#f5f5f5;height:auto;text-align:center;5px;box-shadow: 1px 1px 5px #212121;padding:2px;'>
			
			
		

			    <div style='width:100%;float:left;' class="input-group">
			    <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
            	<input type="text" readonly name="name1"  class="form-control" placeholder="Broj telefona" maxlength="50" value="<?php echo $row2['userPhone']; ?>" />
                </div>
				<div style='width:100%;float:left;' class="input-group">
			  	<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" readonly  name="name2" class="form-control" placeholder="Korisnicko ime" maxlength="50" value="<?php echo  $row2['userName']; ?>" />
                </div>
				<div style='width:100%;' class="input-group">
			  	<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="text" readonly  name="name3" class="form-control" placeholder="email" maxlength="50" value="<?php echo  $row2['userEmail']; ?>" />
                </div>
				<div style='width:100%;' class="input-group">
			  	<span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
            	<input type="text" readonly  name="name4" class="form-control" placeholder="lokacija"  value="<?php echo  $row['user_grad']." - ".$row['user_lokacija']; ?>" />
                </div>
			    <div style='width:100%;' class="input-group">
			    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            	<input type="text" readonly  name="name5" class="form-control" placeholder="vreme"  value="<?php echo  $row['vreme']; ?>" />
			    </div>
			  
	
		
		</div>
	    <div  style='width:100%;height:auto;background:#f5f5f5;text-align:center;box-shadow: 1px 1px 5px #212121;padding:2px;font-size:15px;'><i>Narudzbina</i></div>
			
			<div  style="font-size:13px;">
			
			<?php
			
			
			
			
			echo $row['user_narudzbina'];
			
			
			
			
			?>
			
			</div>
			
			
			
			
			</div>
       	    <div  style='width:100%;height:auto;background:#f5f5f5;height:auto;text-align:left;5px;box-shadow: 1px 1px 5px #212121;padding:3px;'>
			
	 <script language="javascript">
	 
	 
            function testId(id){
				
             var a = id;			
			
           $.ajax({
              type:'GET',
              url:'ajaxDataPosalji.php',
              data: {
                  "id": a
               
              },
              success: function(){

              
              }
          });
        }
		
	

            function testIdOtkazi(id){
				
             var a2 = id;			
			
           $.ajax({
              type:'GET',
              url:'ajaxDataOtkazi.php',
              data: {
                  "id": a2
               
              },
              success: function(){

              
              }
          });
        }
			
	            function testIdBlokiraj(id){
				
             var a3 = id;			
			
           $.ajax({
              type:'GET',
              url:'ajaxDataBlokiraj.php',
              data: {
                  "id": a3
               
              },
              success: function(){

              
              }
          });
        }	
			
		</script>
			
			<div style='width:25%;float:left;padding:2px;' class="input-group">
			<button class="btn btn-block btn-default active" style="" onclick='javascript:testIdBlokiraj(this.id);' id="<?php echo $row['user_id']; ?>">Blokiraj</button>
            </div>	
			<div style='width:25%;float:left;padding:2px;' class="input-group">
			<button class="btn btn-block btn-default active" style="" onclick='javascript:testIdOtkazi(this.id);' id="<?php echo $row['korpa1id']; ?>">Otkazi</button>
            </div>
            <div style='width:50%;padding:2px;' class="input-group">			 
			<button class="btn btn-block btn-success active" style="" onclick='javascript:testId(this.id);' id="<?php echo $row['korpa1id']; ?>">Prihvati</button>
            </div>
			
			</div>			
				  
				  
				  <?php

         


				 echo "</div>"; 
				  
				  
			
			
			
			
			
			
			}

}









?>
