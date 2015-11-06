<?php
 require_once('../Includes/layout/header.php');
 require_once('../Includes/db.php');
 require_once('../Includes/session.php');
 require_once('../Includes/functions.php');
 if(isset($_POST["register"]))
	{
?>	
		  <div class="container">
       <center><h2 class="form-signin-heading">Select your choice...</h2></center>
       <br>
        <a href="sturegister.php"><button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="submit">Student Registration</button> </a><br/>
        <a href="facregister.php"> <button class="btn btn-lg btn-primary btn-block" type="submit" name="register" value="submit">Faculty Registration</button> </a>
    </div> 
	<?php } ?>	
	<?php 
      if(isset($_POST["submit"]))
      {
      	global $db;
        $str1 = $_POST["emailid"]; 
        $str2 = $_POST["password"];
        $hash = md5($str2); 
        $result = select_login_user($str1,$hash);
        $d = mysqli_fetch_assoc($result);
           if($d["type"] == 1)
        	 {
        		  redirect_to("settings.php");
        		  exit;
            } 
          	else if($d["type"] == 2)
          	{
              $user = "SELECT * from users where email='{$str1}'";
              $resfac = mysqli_query($db,$user);
              if($resfac){ 
                $info0 = mysqli_fetch_assoc($resfac);
                $email = $info0["email"];


//pending------pending------pending-------pending------pending------pending-----pending------pending------pending


                header("Location: manage.php?email=<?php echo $email;?>");
          		  //include('manage.php');
          	   	exit;
            }
            else
              {
                 $_SESSION["message"] ="Error Encountered";
              }
          	}
          	else if($d["type"] == 3)
          	{
              $stud = "SELECT * from students WHERE email = '{$str1}' ";
              $res = mysqli_query($db,$stud);
              if($res){
                            $info = mysqli_fetch_assoc($res);
                                $dep = $info["Did"];
                                $sem = $info["Sid"];
                                $usn = $info["USN"];        
                                include('stulogin.php');
                                exit;
                      }
                      else
                      {
                        $_SESSION["message"] ="Error Encountered";
                      }
          	}
            else if($d["type"] != 1 && $d["type"] != 2 && $d["type"] != 3 ){
              $_SESSION["message"] = "E-mail or Password Incorrect";
             redirect_to("index.php");
              exit;
            }        
      }
?>

