<?php

//version 1.3
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
//-----This section updates the session array and therefore the basket if a product has been selected ------

$value = $_POST['removal'];
if($value != null){
	unset($_SESSION['basket'][$value]);
}



//if the value of the posted id is set
if (isset($_POST['h_prodid'])){
		//
		$newprodid=$_POST['h_prodid'];									//capture the posted id of selected product (hidden field) using $_POST and store it into a local variable $newprodid
		$prodquantity = $_POST['p_quantity'];						//capture the posted quantity of selected product (drop down list) using $_POST and store it into a local variable $prodqu
	  //echo "<p>Selected product Id: ".$newprodid;		//displays ID
		//echo "<p>Product Quantity: ".$prodquantity;		//dispalys Quantity
		//create a new cell in your session array $_SESSION['basket'
		$_SESSION['basket'][$newprodid]=$prodquantity;  //by indexing the cell with the id and storing the quantity inside the cell
		echo "<p> 1 item added to the basket</p>"; 					//Display "1 item added to the basket " message
}else{
		echo "<p> Current basket unchanged</p>";						//Display "Current basket unchanged " message
		//$_SESSION['basket']=null;
}
//----------------------------------------------------------------------------------------
//-----This section reads from the session array and dosplays the content of the basket ------



//if the session array $_SESSION['basket'] is set
if (isset($_SESSION['basket'])){
		echo "<table style='border: 0px'>";	//Create a HTML table with a header to display the content of the shopping basket
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
					echo "<td>&pound;".$subtotal."</td>";

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

	echo "<p><h3>New homteq customer: <a href='singup.php'>Sing-up</a></h3>";
	echo "<p><h3>Returning hometeq customer: <a href='login.php'>Log-in</a></h3>";

}else{
	echo "<p><h1>Your Basket is currently empty</h1>";
}

include("footfile.html");					//include head layout
echo "</body>";

?>
