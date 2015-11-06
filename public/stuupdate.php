<?php require_once('../Includes/session.php');?>
<?php require_once('../Includes/layout/header.php');?>
<?php require_once('../Includes/db.php');?>
<?php require_once('../Includes/functions.php');?>


<body>
<?php ?>


	<div class="container">
	<form method="POST" action="stuupdate.php"><input type="submit" class="btn btn-lg btn-danger btn-block btn-sm" name="back" value="Back"></form>
<?php 
if(isset($_POST["back"])){
	redirect_to("settings.php");
}
?>

<center><h3 class="form-signin-heading">CRUD FOR STUDENTS</h3></center><br>
	<!--=======================================================FORM TO RETRIVE=======================================================-->
	 	<?php include('Alstuform.php'); ?>
	<!--========================================================CRUD ON FETCH============================================================-->
		<?php include('sturetrive.php'); ?>
		<?php include('stualter.php'); ?>
		<?php include('studel.php');?>

	<!--=========================================RETRIVE INDIVIDUAL AND ALTER======================================================-->
		<form action="stuupdate.php" method="POST" class="form-signin">

			
			<input type="text" name="usnno" placeholder="USN" class="form-control"></input>
			<button class="btn btn-lg btn-success btn-block btn-sm" type="submit" name="obtain" value="submit">Retrive</button>			
		</form>
<?php 
			if(isset($_POST["obtain"])){
				$usnno = trim($_POST["usnno"]);
				$onestud = select_a_stud($usnno);
				while($extract = mysqli_fetch_assoc($onestud)){
					?>
						<form action="stuupdate.php" method="POST" class="form-signin">
							<input type="text" class="form-control"  name="stnme"   value="<?php echo $extract["name"];?>"  />
							<input type="text" class="form-control"  name="stsn"  value="<?php echo $extract["USN"];?>"  />
							<input type="text" class="form-control"  name="stusm"  value="<?php echo $extract["Sid"]; ?>"  /> 
							<input type="text" class="form-control" name="studp"  value="<?php echo $extract["Did"]; ?>"  />
							<input type="text" class="form-control"  name="stueml" value="<?php echo $extract["email"];?>" />
							<button class="btn btn-lg btn-danger btn-block btn-sm" type="submit" name="btain">Update</button>
							</form>
							
				<?php	 }
				}
//-----------------------to obtain a info and update a single student-------------------------------------------------------------------------
					global $db;
				if(isset($_POST["btain"])){
					$stuusn = trim($_POST["stsn"]);
					$stname = trim($_POST["stnme"]);
					$stusem = $_POST["stusm"];
					$studep = $_POST["studp"];
					$semail = trim($_POST["stueml"]);
					if(!empty($stuusn) && !empty($stusem) && !empty($studep)){
						$stupd = "UPDATE students SET name='{$stname}',Did={$studep},Sid={$stusem},email='{$semail}' where USN='{$stuusn}'";
						$usrup = "UPDATE users SET email='{$semail}' where USN='{$stuusn}'";
						$opst = mysqli_query($db,$stupd);
						$opusr = mysqli_query($db,$usrup);
						if($opst && $opusr){echo "success"; }else{echo "failure";}
					}
				}
		?>
		</div>
</body>