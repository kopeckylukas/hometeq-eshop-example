<?php
//Version 2.0
include("db.php"); //Inclue only if SQL needed
$pagename="Add a New Product";
session_start(); //Creates  New session

//Head Of the Page
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pagename."</title>";
echo "<body>";
include ("headfile.html");	     //Calls HTML file that displays header
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>";
//----------------------- WEBPAGE CODE STARTS HERE -----------------------------
echo '<style>
table, th, td{
  border: 0px;
}
</style>';

echo "<table style='border: 0px'>";

echo "<form action=addproduct_conf.php method=post>";
echo "<tr>";
echo '<td>*Product Name:</td> <td><input type="text" name="newName"></td>';
echo "</tr>";
echo "<tr>";
echo '<td>*Small Picture Name:</td> <td><input type="text" name="smallPic"></td>';
echo "</tr>";
echo "<tr>";
echo '<td>*Large Picture Name:</td> <td><input type="text" name="largePic"></td>';
echo "</tr>";
echo "<tr>";
echo '<td>*Short Description:</td> <td><input type="text" name="shortDesc"></td>';
echo "</tr>";
echo "<tr>";
echo '<td>*Long Description:</td> <td><input type="text" name="longDesc"></td>';
echo "</tr>";
echo "<tr>";
echo '<td>*Product Price:</td> <td><input type="text" name="newProdPrice"></td>';
echo "</tr>";
echo "<tr>";
echo '<td>*Quantity:</td> <td><input type="text" name="newProdQuantity"></td>';
echo "</tr>";
echo "<tr>";
echo "<td><input type=submit value='Add Product'></td>
      <td><input type=reset value='Empty Form'></td>";
echo "</tr>";
echo "</form>";
echo '</table>';

//----------------------- WEBPAGE CODE STARTS HERE -----------------------------
include("footfile.html");					  //Calls HTML File that displays footer
echo "</body>";
?>
