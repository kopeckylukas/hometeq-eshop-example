<?php
//Version 2.0
include("db.php"); //Inclue only if SQL needed
$pagename="Adding to Catalogue";
session_start(); //Creates  New session

//Head Of the Page
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pagename."</title>";
echo "<body>";
include ("headfile.html");	     //Calls HTML file that displays header
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>";
//----------------------- WEBPAGE CODE STARTS HERE -----------------------------

$newName = $_POST['newName'];
$smallPic = $_POST['smallPic'];
$largePic = $_POST['largePic'];
$shortDesc = $_POST['shortDesc'];
$longDesc = $_POST['longDesc'];
$newProdPrice = $_POST['newProdPrice'];
$newProdQuantity = $_POST['newProdQuantity'];


if (empty($newName) || empty($smallPic) || empty($largePic) ||empty($shortDesc)
  || empty($longDesc) || empty($newProdPrice) || empty($newProdQuantity)){

  echo "<p><b>Adding process has failed</b></p>";
  echo "<p>Form is not completed<br>
        Make sure you provide all the required details";
  echo "<p> Go back to <a href = 'addproduct.php'>Add New Product</a></p>";

}else{

  $SQL = "INSERT INTO Product (prodName, prodPicNameSmall, prodPicNameLarge,
          prodDescripShort, prodDescripLong, prodPrice, prodQuantity)
          VALUES ('$newName','$smallPic', '$largePic', '$shortDesc',
          '$longDesc', '$newProdPrice', '$newProdQuantity')";
  $exeSQL = mysqli_query($conn, $SQL);

  if(mysqli_errno($conn)==1062){
    echo "<p><b>Adding Process has failed </b><br></p>";
    echo "<p>This Product Name is already in use<br>
         This product is already in catalogue. If you want to update current
         prouduct continue to <a href = 'editproduct.php'>Edit Product</a></p>";
    echo "<p> If you want to add this product with diferrent name conitnue to
         <a href = 'addproduct.php'>Add Product</a></p>";
  }elseif(mysqli_errno($conn)==1064){
    echo "<p><b>Adding Process has failed</b><br></p>";
    echo "<p>Invalid charecters in the form<br>
          Make sure you avoid the following characters: ', \</p>";
    echo "<p> Go back to <a href = 'addproduct.php'>Add Product</a></p>";
  }elseif(mysqli_errno($conn)==1364){
    echo "<p><b>Adding Process has failed</b><br></p>";
    echo "<p>Invalid charecters in the form<br>
          Make sure Price and Quantity contaion numeric values only!</p>";
    echo "<p> Go back to <a href = 'addproduct.php'>Add Product</a></p>";
  }elseif(mysqli_errno($conn)==0){
    echo "<p><b>Product ".$newName." has been added to the Catalogue</b><br></p>";
    echo "<p>Name of the small image: ".$smallPic."</p>";
    echo "<p>Name of the large image: ".$largePic."</p>";
    echo "<p>Short description:<br>".$shortDesc."</p>";
    echo "<p>Long description:<br>".$longDesc."</p>";
    echo "<p>Price: &pound;".number_format($newProdPrice,2)."</p>";
    echo "<p>Quantity: ".$newProdQuantity."</p>";
  }else{
    echo "<p><b>Adding Process has failed</b><br></p>";
    echo "<p>Error: ".mysqli_errno($conn)." <br>
          Pleaes check <a href='https://dev.mysql.com/doc/refman/5.7/en/server-error-reference.html'>MySQL Manual</a>
          or contact your local IT Support.</p>";
    echo "<p> Go back to <a href = 'addproduct.php'>Add Product</a></p>";
  }

}


//----------------------- WEBPAGE CODE STARTS HERE -----------------------------
include("footfile.html");					  //Calls HTML File that displays footer
echo "</body>";
?>
