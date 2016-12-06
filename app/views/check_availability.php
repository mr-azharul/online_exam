<?php
	$host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "exam";

    $conn = new mysqli($host, $user, $pass, $db);

	if(!empty($_POST["em"])) {
		$sel = "SELECT * FROM teacher_sign WHERE teacher_email='".$_POST["em"]."'";
		$result = $conn->query($sel);
		if($result->num_rows > 0) {
			echo "<span class='status-not-available' style='color: red;'>Email Not Available</span>";
		}
		else {
			echo "<span class='status-available' style='color: green;'>Email Available</span>";
		}
	}

	if(!empty($_POST["si"])) {
		$sel = "SELECT * FROM std_sign WHERE std_id='".$_POST["si"]."'";
		$result = $conn->query($sel);
		if($result->num_rows > 0) {
			echo "<span class='status-not-available' style='color: red;'>Student ID Not Available</span>";
		}
		else {
			echo "<span class='status-available' style='color: green;'>Student ID Available</span>";
		}
	}
?>