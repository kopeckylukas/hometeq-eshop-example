<?php
//Version 2.0
//include("db.php"); //Inclue only if SQL needed
$pagename="Make your home smart";

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

echo "<form action=login_process.php method=post>";
echo "<tr>";
echo '<td>Email:</td> <td><input type="text" name="log_email"></td>';
echo "</tr>";
echo "<tr>";
echo '<td>Password:</td> <td><input type="password" name="log_password"></td>';
echo "</tr>";
echo "<tr>";
echo "<td><input type=submit value='Log In'></td>
      <td><input type=reset value='Empty Form'></td>";
echo "</tr>";
echo "</form>";
echo '</table>';


//----------------------- WEBPAGE CODE STARTS HERE -----------------------------
include("footfile.html");					  //Calls HTML File that displays footer
echo "</body>";
?>
