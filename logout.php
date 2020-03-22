<?php
//Version 2.0
//include("db.php"); //Inclue only if SQL needed
$pagename="Make your home smart";
session_start();
//Head Of the Page
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pagename."</title>";
echo "<body>";
include ("headfile.html");	     //Calls HTML file that displays header
echo "<h4>".$pagename."</h4>";
//----------------------- WEBPAGE CODE STARTS HERE -----------------------------

echo "<p><h3>Thank you ".$_SESSION['fname']."".$_SESSION['sname']."</h3>";
echo "<p><h3>Your are now logged out.</h3>";

unset($_SESSION['basket']);
unset($_SESSION['fname']);
unset($_SESSION['sname']);
session_destroy();

//----------------------- WEBPAGE CODE STARTS HERE -----------------------------
include("footfile.html");					  //Calls HTML File that displays footer
echo "</body>";
?>
