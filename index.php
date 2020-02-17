<?php
//version 1.4
include("db.php");
$pagename="Make Your Home Smart";
//session_start(); //Creates  New session

//Head Of the Page
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pagename."</title>";
echo "<body>";
include ("headfile.html");	     //Calls HTML file that displays header
echo "<h4>".$pagename."</h4>";
//----------------------- WEBPAGE CODE STARTS HERE -----------------------------

$SQL="select prodId, prodName, prodPicNameSmall, prodDescripShort, prodPrice
			from Product";
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());

echo "<table style='border: 0px'>";
//create an array of records (2 dimensional variable) called $arrayp.
//populate it with the records retrieved by the SQL query previously executed.
//Iterate through the array i.e while the end of the array has not been reached
// run through it
while ($arrayp=mysqli_fetch_array($exeSQL))
{
	echo "<tr>";
	echo "<td style='border: 0px'>";
	echo "<a href=prodbuy.php?u_prod_id=".$arrayp['prodId'].">";
	echo "<img src=images/".$arrayp['prodPicNameSmall']." height=200 width=200>";
	echo "</td>";
	echo "<td style='border: 0px'>";
	echo "<p><h5>".$arrayp['prodName']."</h5>";
	echo "</a>";
	echo "<p>".$arrayp['prodDescripShort']."</p>";	
	echo "<p><b>£".$arrayp['prodPrice']."</b></p>";
	echo "</td>";
}
echo "</table>";

//----------------------- WEBPAGE CODE STARTS HERE -----------------------------
include("footfile.html");					  //Calls HTML File that displays footer
echo "</body>";
?>
