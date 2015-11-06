<?php require_once('../Includes/session.php');?>
<?php require_once('../Includes/layout/header.php');?>
<?php require_once('../Includes/db.php');?>
<?php require_once('../Includes/functions.php');?>


	<div class="container">
	<form method="POST" action="subject.php"><input type="submit" class="btn btn-lg btn-danger btn-block btn-sm" name="back" value="Back"></form>
<?php 
if(isset($_POST["back"])){
	redirect_to("settings.php");
}
?>
<center><h3 class="form-signin-heading">CRUD FOR SUBJECT</h3></center><br>
		<?php include('addsub.php');?>
		<?php include('update.php') ;?>
	</div>
		