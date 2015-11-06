<?php
   require_once('../Includes/session.php');
   require_once('../Includes/layout/header.php');
?>

  <body>

    <div class="container">

      <form method = "POST" action="data.php" class="form-signin">

       <center><h2 class="form-signin-heading">Please Sign In ...</h2></center> 
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="emailid" autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" >
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"><b>Remember me</b>
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="submit">Sign in</button>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="register" value="submit">Register</button><br/>
       <center> <font color="red">
       <?php
             if(isset($_SESSION["message"]))
              {
                echo $_SESSION['message'];
              }
              unset($_SESSION['message']);
       ?></center></font>
      </form>
    </div>

    </body>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</html>
