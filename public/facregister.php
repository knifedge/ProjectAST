<?php require_once('../Includes/layout/header.php');?>
<?php require_once('../Includes/db.php');?>

  <body>
    <div class="container">
    <form method = "POST" action = "sturegister.php" class="form-signin">
   <input type ="submit" name="back" class="btn btn-lg btn-primary btn-block" value="Home"/>
        <?php 
        if(isset($_POST["back"])){
          redirect_to("index.php");
        }
      ?></form>
      <form method = "POST" action = "facregister.php" class="form-signin">
          <center><h2 class="form-signin-heading">Please Sign In ...</h2></center>
          <label for="inputEmail" class="sr-only">Name</label>
          <input type="text" id="inputName" class="form-control" placeholder="Complete name" name="fname" required autofocus>
          <div class="fillfname"></div>

          <label for="inputEmail" class="sr-only">Contact</label>
          <input type="text" id="inputNumber" class="form-control" placeholder="Contact number" name="phn" required>
          <div class="fillfname"></div>

          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="emailid" required >
          <div class="fillfname"></div>

          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
          <div class="fillfname"></div>

          <label for="inputPassword" class="sr-only">Confirm Password</label>
          <input type="password" id="inputPassword" class="form-control" placeholder="Confirm Password" name="cpassword" required>
          <div class="fillfname"></div>

          <label for="inputPassword" class="sr-only">Admin Password</label>
          <input type="password" id="inputPassword" class="form-control" placeholder="Administrator Password" name="apassword" required>
          <div class="fillfname"></div>
          
          <div class="checkbox">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>          
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="register" value="submit">Submit</button>
      </form>
      <!--PHP-->
      <?php 
        if(isset($_POST["register"]))
        {
          global $db;
          $apassword = $_POST["apassword"]; 
          $ahash = md5($apassword); 
          $aquery = "SELECT * from admin where hash = '{$ahash}'";
          $aresult = mysqli_query($db,$aquery);
          if($aresult)
          {          
            $str1 = $_POST["emailid"];
            $str2 = $_POST["password"]; 
            $str3 = $_POST["cpassword"]; 
            if (strcmp($str2,$str3)!=0)
            {
              echo "Your Passwords did not match. Please try again.";
            }
          else
          {
            $str4 =  md5($str2);
            $query = "INSERT into users(email,hash,type) VALUES('{$str1}','{$str4}',2)";
            $result = mysqli_query($db,$query);
            if($result)
            {
              echo "Signup Complete.";
            }
            else
            {
              echo "Error in Sign In process. Please try again.";
            }
          }
        } else echo "Admin Password Incorrect.";  
      }
        ?>
    </div> 
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
