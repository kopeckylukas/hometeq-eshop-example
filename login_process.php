<?php
//Version 2.1
include("db.php"); //Inclue only if SQL needed
$pagename="Your Login Results";
session_start(); //Creates  New session
//Head Of the Page
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pagename."</title>";
echo "<body>";
include ("headfile.html");	     //Calls HTML file that displays header
echo "<h4>".$pagename."</h4>";
//----------------------- WEBPAGE CODE STARTS HERE -----------------------------

//get variables transfered by POSOT METHOD
$logEmail = $_POST['log_email'];
$logPassword = $_POST['log_password'];

//Checking if any field is not left empty
if (empty($logEmail) || empty($logPassword)){
  echo "<p><b>Log-in failed</b></p>";
  echo "<p>Your sign up form is incoplete<br>
        Make sure you provide all the required details";
  echo "<p> Go back to <a href = 'login.php'>log in</a></p>";
}elseif(!preg_match('/^[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,3})$/', $logEmail)){
  echo "<p><b>Log-in failed</b></p>";
  echo "<p>Email is not valid<br>
        Make sure you enter correct email address";
  echo "<p> Go back to <a href = 'login.php'>log in</a></p>";
}else{
  $SQL="SELECT userId, userType, userEmail, userPassword, userFName, userSName
  FROM Users
  WHERE userEmail LIKE '$logEmail'";
  $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());
  $arrayp=mysqli_fetch_array($exeSQL);
  if($logPassword!=$arrayp['userPassword']){
    echo "<p><b>Log-in failed</b></p>";
    echo "<p>Email or password has not been recognised <br>
          Make sure you enter correct email address and password";
    echo "<p> Go back to <a href = 'login.php'>log in</a></p>";
  }else{
    echo "<p><b>Log-in success</b></p>";
    $_SESSION['userid']=$arrayp['userId'];
    $_SESSION['userType']=$arrayp['userType'];
    $_SESSION['fname']=$arrayp['userFName'];
    $_SESSION['sname']=$arrayp['userSName'];
    echo "<p>Hello ".$_SESSION['fname']."".$_SESSION['sname']."</p>";
    echo "<p>Continue shopping for <a href='index.php'>Home Tech</a></p>";
    echo "<p>View your <a href='basket.php'>Smart Basket</a></p>";
  }

}

//----------------------- WEBPAGE CODE STARTS HERE -----------------------------
include("footfile.html");					  //Calls HTML File that displays footer
echo "</body>";
?>
