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
//----------------------- WEBPAGE CODE STARTS HERE -----------------------------

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

}
 echo "done";



//----------------------- WEBPAGE CODE STARTS HERE -----------------------------
include("footfile.html");					  //Calls HTML File that displays footer
echo "</body>";
?>
