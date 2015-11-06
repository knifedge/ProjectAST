<?php
 require_once('../Includes/layout/header.php');
 require_once('../Includes/functions.php');?>
 <div class="container">
 <form method="POST" action="settings.php"><input type="submit" name="okay" class="btn btn-sm btn-danger btn-block" value="Logout"></form> 
 <?php if(isset($_POST["okay"])){
 	redirect_to("index.php");
 	} ?>
       <center><h2 class="form-signin-heading">Select your choice...</h2></center>
       <br>
        <a href="subject.php">
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="submit">Subject CRUD</button>
        </a>

        <br/>
        
        <a href="stuupdate.php">
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="register" value="submit">Student CRUD</button>
        </a>
    </div> 