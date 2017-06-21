<?php

$host="db20.cpanelhosting.rs";
$username="marcossd_marco";
$password="105163705";
$baza="marcossd_arena";



$conn = mysqli_connect("$host","$username","$password","$baza");
 
 $mysqli = new mysqli($host, $username, $password, $baza);

/*
 * This is the "official" OO way to do it,
 * BUT $connect_error was broken until PHP 5.2.9 and 5.3.0.
 */
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
 else {}
 

?>