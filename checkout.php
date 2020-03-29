<?php
//Version 2.0
include("db.php"); //Inclue only if SQL needed
$pagename="Make your home smart";
session_start();
//Head Of the Page
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pagename."</title>";
echo "<body>";
include ("headfile.html");	     //Calls HTML file that displays header
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>";
/**
//----------------------- WEBPAGE CODE STARTS HERE -----------------------------
*/
$currentdatetime = date('Y-m-d H:i:s');

$SQL = "INSERT INTO Orders (userId, orderDateTime, orderTotal)
        VALUES (".$_SESSION['userid'].",'".$currentdatetime."', ".$_SESSION['orderTotal'].")";
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));

$error = mysqli_error($conn);
if($error == 0){
   $SQLSelect="SELECT orderNo as MaxOrderNo FROM Orders WHERE userId = ".$_SESSION['userid']." AND orderDateTime = '".$currentdatetime."'";
   $exeSQL2=mysqli_query($conn, $SQLSelect) or die (mysqli_error($conn));
   $error2 = mysqli_error($conn);

   $orderNumeber = mysqli_fetch_array($exeSQL2);
   echo "<p>Your order has been placed succesfully<p>";
   echo "Your Order Number is :".$orderNumeber['MaxOrderNo'];

//Table of Ceheckout Pruducts
  echo "<table style='border: 0px'>";
  echo "<tr>";
  echo "<th>Product Name</th>";
  echo "<th>Price</th>";
  echo "<th>Quantity</th>";
  echo "<th>Subtotal</th>";
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
   			echo "</tr>";
   			$total+=$subtotal;
   			$_SESSION['orderTotal']=$total;
        $SQL4 = "insert into Order_Line (orderNo, prodId, quantityOrdered, subTotal)
                values (".$orderNumeber['MaxOrderNo'].",".$ID.",".$quantity.",".$subtotal.")";
                //  values(".$orderNumeber.",".$ID.",".$quantity.",".$subtotal.") ";
        $exeSQL4 = mysqli_query ($conn, $SQL4);
   			}
   		}
   	}
   	echo "<tr>";
   	echo "<th colspan='3'>TOTAL</th>";
   	echo "<th>&pound;".$total."</th>";
   	echo "</tr>";
   	echo "</table>";

    echo "<p> To Log out and leave the system please <a href='logout.php'>Logout</a>";
}else{
  echo "There is an Error".$error;
}


//----------------------- WEBPAGE CODE STARTS HERE -----------------------------
include("footfile.html");					  //Calls HTML File that displays footer
echo "</body>";
?>
