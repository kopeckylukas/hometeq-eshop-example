<?php
//Version 2.0
include("db.php"); //Inclue only if SQL needed
$pagename="Sign Up";
session_start(); //Creates  New session

//Head Of the Page
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pagename."</title>";
echo "<body>";
include ("headfile.html");	     //Calls HTML file that displays header
echo "<h4>".$pagename."</h4>";
//----------------------- WEBPAGE CODE STARTS HERE -----------------------------
echo '<style>
table, th, td{
  border: 0px;
}
</style>';

echo "<table style='border: 0px'>";

echo "<form action=signup_process.php method=post>";
echo "<tr>";
echo '<td>Forename:</td> <td><input type="text" name="forename"></td>';
echo "</tr>";
echo "<tr>";
echo '<td>Surname:</td> <td><input type="text" name="surname"></td>';
echo "</tr>";
echo "<tr>";
echo '<td>Address:</td> <td><input type="text" name="address"></td>';
echo "</tr>";
echo "<tr>";
echo '<td>Postocode:</td> <td><input type="text" name="postcode"></td>';
echo "</tr>";
echo "<tr>";
echo '<td>Telephone Number:</td> <td><input type="text" name="t_num"></td>';
echo "</tr>";
echo "<tr>";
echo '<td>Email:</td> <td><input type="text" name="email"></td>';
echo "</tr>";
echo "<tr>";
echo '<td>Password:</td> <td><input type="password" name="password"></td>';
echo "</tr>";
echo "<tr>";
echo '<td>Confirm Password:</td> <td><input type="password" name="c_password"></td>';
echo "</tr>";
echo "<tr>";
echo "<td><input type=submit value='Sign Up'></td>
      <td><input type=reset value='Empty Form'></td>";
echo "</tr>";
echo "</form>";
echo '</table>';

//----------------------- WEBPAGE CODE STARTS HERE -----------------------------
include("footfile.html");					  //Calls HTML File that displays footer
echo "</body>";
?>
