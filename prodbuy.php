
<?php
//version 1.4
include("db.php");
$pagename="A smart buy for smart home";
//session_start(); //Creates  New session

//Head Of the Page
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pagename."</title>";
echo "<body>";
include ("headfile.html");	     //Calls HTML file that displays header
echo "<h4>".$pagename."</h4>";
//----------------------- WEBPAGE CODE STARTS HERE -----------------------------

$prodid=$_GET['u_prod_id'];

$SQL="SELECT * FROM Product";
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());

echo "<table style='border: 0px'>";
while($arrayp=mysqli_fetch_array($exeSQL)){
  if ($arrayp['prodId'] == $prodid){
  	echo "<tr>";
  	echo "<td style='border: 0px'>";
  	echo "<img src=images/".$arrayp['prodPicNameLarge']." height=400 width=400>";
  	echo "</td>";
  	echo "<td style='border: 0px'>";
  	echo "<p><h5>".$arrayp['prodName']."</h5>";
  	echo "<p>".$arrayp['prodDescripLong']."</p>";
  	echo "<p><b>£".$arrayp['prodPrice']."</b></p>";
    echo "<p>Left in stock: ".$arrayp['prodQuantity']."</p>";
    echo "<p>Number to be purchased: ";
    echo "<form action=basket.php method=post>";
    echo "<select name='p_quantity'>";
    for ($i=1; $i <= $arrayp['prodQuantity'] ; $i++) {
        echo "<option value=".$i.">".$i."</option>";
    }
    echo "</select>";
    echo "<input type=submit value='ADD TO BASKET'>";
    echo "<input type=hidden name=h_prodid value=".$prodid.">";
    echo "</form>";
  	echo "</td>";
  }
}
echo "</table>";

//----------------------- WEBPAGE CODE STARTS HERE -----------------------------
include("footfile.html");					  //Calls HTML File that displays footer
echo "</body>";
?>
