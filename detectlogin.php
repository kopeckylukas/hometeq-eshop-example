<?php

if (isset($_SESSION['userid'])){
	if($_SESSION['userType']=='Administrator'){
		echo "<div align=right>".$_SESSION['fname']." ".$_SESSION['sname']." | Administrator No: ".$_SESSION['userid']."</div>";
	}else{
		echo "<div align=right>".$_SESSION['fname']." ".$_SESSION['sname']." | Customer No: ".$_SESSION['userid']."</div>";
	}
}

?>
