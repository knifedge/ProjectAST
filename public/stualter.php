<?php 
if(isset($_POST["update"])){
			$depts = $_POST["department"];
			$sems = $depts.$_POST["semester"];
			$sem2 = $depts.$_POST["semester2"];
			if(isset($depts) && isset($sems) && isset($sem2)){
				$query = "UPDATE students SET Sid = {$sem2} where Did = {$depts} and Sid = {$sems} ";
				$update = mysqli_query($db,$query);
				if($update){
					echo "Record updated";	
				}else{
					echo "error";
				}
			}
		}
?>