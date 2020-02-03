<?php

//version 1.2
  session_start();
//Tut 04: pseudo code and snippets of code for basket.php

//Header and procedures
include("db.php");
$pagename="Smart Basket";
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pagename."</title>";
echo "<body>";
include ("headfile.html");
echo "<h4>".$pagename."</h4>";

unset($_SESSION['basket']);

echo "Your Baskted has been cleared";

include("footfile.html");					//include head layout
echo "</body>";

?>
