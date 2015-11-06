<?php if(isset($_POST["Delete"])){
			$de = $_POST["department"];
			$se = $de.$_POST["semester3"];
			$delz = "DELETE FROM students where Sid = {$se}";
			$delstudents = mysqli_query($db,$delz);
			if($delstudents){
				echo "Students removed";
			}
			else{
				echo "Error";
			}
			}
	?>
			</table>
			