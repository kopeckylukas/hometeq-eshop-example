<?php
//version 1.4
include("db.php");
$pagename="Make Your Home Smart";
session_start(); //Creates  New session

//Head Of the Page
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pagename."</title>";
echo "<body>";
include ("headfile.html");	     //Calls HTML file that displays header
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>";
//----------------------- WEBPAGE CODE STARTS HERE -----------------------------
if ($_POST['changeProdId'] != null){

	if ($_POST['changePrice'] != null){
			//echo $_POST['changePrice'];
		$SQLi = "update Product set prodPrice = ".$_POST['changePrice']." where prodId = ".$_POST['changeProdId'];
	  $exeSQLi = mysqli_query($conn, $SQLi);

	 	if(mysqli_errno($conn)==0){

			echo "Price for Product No ".$_POST['changeProdId']." has been updated";

		}
	}

	if ($_POST['changeQuantity'] != null){

		$SQLt = "update Product set prodQuantity = prodQuantity + ".$_POST['changeQuantity']." where prodId = ".$_POST['changeProdId'];
		$exeSQLt = mysqli_query($conn, $SQLt);


		if(mysqli_errno($conn)==0){
			echo "<p>Quantity of Product No ".$_POST['changeProdId']." has been updated";
		}

 	}

}

$SQL="select prodId, prodPrice, prodName, prodPicNameSmall, prodDescripShort,
			prodPrice, prodQuantity from Product";
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
    echo "<form action=editproduct.php method=post>";
    echo "<p><b>Current Price £".$arrayp['prodPrice']." || New Price: <input type='text' name='changePrice'></b></p>";
    echo "<p>Current Stock: ".$arrayp['prodQuantity']." || Number to be purchased: ";
    echo "<select name='changeQuantity'>";
    for ($i=0; $i <= 100 ; $i++) {
            echo "<option value=".$i.">".$i."</option>";
    }
    echo "<input type=hidden name=changeProdId value='".$arrayp['prodId']."'>";
    echo "<p> <input type=submit value='Update'>";
    echo "</form>";
    echo "</td>";


}
echo "</table>";

//----------------------- WEBPAGE CODE STARTS HERE -----------------------------
include("footfile.html");					  //Calls HTML File that displays footer
echo "</body>";
?>
