<?php

if (isset($_SESSION['userid'])){
		echo "<div align=right>".$_SESSION['fname']." ".$_SESSION['sname']." Customer No: ".$_SESSION['userid']."</div>";
}

?>
