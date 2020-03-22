<?php
//Version 2.0
include("db.php"); //Inclue only if SQL needed
$pagename="Your Sign up Results";
session_start(); //Creates  New session

//Head Of the Page
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pagename."</title>";
echo "<body>";
include ("headfile.html");	     //Calls HTML file that displays header
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>";
//----------------------- WEBPAGE CODE STARTS HERE -----------------------------

$userFName = $_POST['forename'];
$userSName = $_POST['surname'];
$userAddress = $_POST['address'];
$userPostcode = $_POST['postcode'];
$userTelNo = $_POST['t_num'];
$userEmail = $_POST['email'];
$userPassword = $_POST['password'];
$confirmPassword = $_POST['c_password'];

if (empty($userFName) || empty($userSName) || empty($userAddress) ||
    empty($userPostcode) || empty($userTelNo) || empty($userEmail) ||
    empty($userPassword) || empty($confirmPassword)){
      // Error Message

      echo "<p><b>Sign-up failed</b></p>";
      echo "<p>Your sign up form is incoplete<br>
            Make sure you provide all the required details";
      echo "<p> Go back to <a href = 'signup.php'>sign up</a></p>";

    }elseif($userPassword != $confirmPassword){
      echo "<p><b>Sign-up failed</b></p>";
      echo "<p>Your passwords do not match<br>
            Make sure your Password is same as Confirsm Password";
      echo "<p> Go back to <a href = 'signup.php'>sign up</a></p>";
    }elseif(!preg_match('/^[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,3})$/', $userEmail)){
      echo "<p><b>Sign-up failed</b></p>";
      echo "<p>Email is not valid<br>
            Make sure you enter correct email address";
      echo "<p> Go back to <a href = 'signup.php'>sign up</a></p>";
    }elseif(!preg_match('/((\+44(\s\(0\)\s|\s0\s|\s)?)|0)7\d{3}(\s)?\d{6}/', $userTelNo)){
      echo "<p><b>Sign-up failed</b></p>";
      echo "<p>Phone number is not in valid format</p>";
      echo "<p> Go back to <a href = 'signup.php'>sign up</a></p>";
    }else{
      $SQL = "INSERT INTO Users (userType, userFName, userSName, userAddress,
                                  userPostCode, userTelNo, userEmail, userPassword)
              VALUES ('c', '$userFName', '$userSName', '$userAddress',
                      '$userPostcode', '$userTelNo', '$userEmail', '$userPassword')";
      $exeSQL=mysqli_query($conn, $SQL);
      if(mysqli_errno($conn)==1062){
        echo "<p><b>Sign-up failed</b><br></p>";
        echo "<p>This Email address is already in use<br>
             You may be alredy registered or try another email address</p>";
        echo "<p> Go back to <a href = 'signup.php'>sign up</a></p>";
      }elseif(mysqli_errno($conn)==1064){
        echo "<p><b>Sign-up failed</b><br></p>";
        echo "<p>Invalid charecters in the form<br>
             Make sure you avoid the following characters: ', \</p>";
        echo "<p> Go back to <a href = 'signup.php'>sign up</a></p>";
      }else{
        echo "<p><b>Sign-up successful</b><br></p>";
        echo "<p>Welcome <b>".$userFName." ".$userSName."</b><br>
              Your new user name is <b>".$userEmail."</b><br>
              Continue to <a href='login.php'><b>Login page</b></a></p>";

      }

}


//----------------------- WEBPAGE CODE STARTS HERE -----------------------------
include("footfile.html");					  //Calls HTML File that displays footer
echo "</body>";
?>
