<?php


include("connect.php");

$id = $_GET['id'];

 							 $sql = "DELETE FROM privremena_narudzbina WHERE pn_id='$id'";

                                       if ($conn->query($sql) === TRUE) {


                      


									     echo "<script>window.location = 'home2.php';</script>";




									   }
								










?>