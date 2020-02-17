<?php
//version 1.4
include("db.php");
$pagename="Smart Basket";
session_start(); //Creates  New session

//Head Of the Page
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pagename."</title>";
echo "<body>";
include ("headfile.html");	     //Calls HTML file that displays header
echo "<h4>".$pagename."</h4>";
//----------------------- WEBPAGE CODE STARTS HERE -----------------------------

//Function which deletes single record from  basket
$value = $_POST['removal'];
if($value != null){
	unset($_SESSION['basket'][$value]);
}

//function which checks if user is adding new item into the basket
if (isset($_POST['h_prodid'])){
		//captures value from PRODBUY page
		$newprodid=$_POST['h_prodid'];
		$prodquantity = $_POST['p_quantity'];
	  //updating season array
		$_SESSION['basket'][$newprodid]=$prodquantity;
    //displays statemtne that one iten has been added in the basket
		echo "<p> 1 item added to the basket</p>";
}else{
    //displays statement that basket has been uncanged
		echo "<p> Current basket unchanged</p>";
}

//-----This section reads from the session array and dosplays the content of the basket ------



//if array is set, it's contetnt will be displayed
if (isset($_SESSION['basket'])){
  //creates table
	echo "<table style='border: 0px'>";
		echo "<tr>";
			echo "<th>Product Name</th>";
			echo "<th>Price</th>";
			echo "<th>Quantity</th>";
			echo "<th>Subtotal</th>";
			echo "<th>&nbsp;</th>";
		echo "</tr>";

	$SQL="SELECT * FROM Product";
	$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());

$total=0;
	while($arrayp=mysqli_fetch_array($exeSQL)){
		foreach($_SESSION['basket'] as $ID => $quantity) {
			if ($arrayp['prodId'] == $ID){
				$subtotal=$quantity*$arrayp['prodPrice'];
				echo "<tr>";
					echo "<td>".$arrayp['prodName']."</td>";
					echo "<td>&pound;".$arrayp['prodPrice']."</td>";
					echo "<td>".$quantity."</td>";
					echo "<td>&pound;".number_format($subtotal,2)."</td>";

					echo "<form action=basket.php method=post>";

					echo "<input type=hidden name=removal value=".$ID.">";
					echo "<td><input type=submit value='Remove'></td>";

					echo "</form>";
				echo "</tr>";
				$total+=$subtotal;
			}
		}
	}
	echo "<tr>";
		echo "<th colspan='3'>TOTAL</th>";
		echo "<th>&pound;".$total."</th>";
		echo "<th>&nbsp;</th>";
	echo "</tr>";
	echo "</table>";

	echo "<p><h3><a href='clearbasket.php'>Delete basket</a></h3>";

	echo "<p><h3>New homteq customer: <a href='signup.php'>Sing-up</a></h3>";
	echo "<p><h3>Returning hometeq customer: <a href='login.php'>Log-in</a></h3>";

}else{
	echo "<p><h1>Your Basket is currently empty</h1>";
}

//----------------------- WEBPAGE CODE STARTS HERE -----------------------------
include("footfile.html");					  //Calls HTML File that displays footer
echo "</body>";
?>
