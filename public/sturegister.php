<?php require_once('../Includes/layout/header.php');?>
<?php require_once('../Includes/db.php');?>
<?php require_once('../Includes/functions.php');?>
  <body>
    <div class="container">
  <form method = "POST" action = "sturegister.php" class="form-signin">
   <input type ="submit" name="back" class="btn btn-lg btn-primary btn-block" value="Home"/>
        <?php 
        if(isset($_POST["back"])){
          redirect_to("index.php");
        }
      ?></form>
    
      <form method = "POST" action = "sturegister.php" class="form-signin">
        <center><h2 class="form-signin-heading">Please Sign In ...</h2></center>
        
        
        <input type="text" class="form-control" placeholder="Complete name" name="name" required autofocus>
        <div></div>
       
        <input type="text" class="form-control" placeholder="USN" name="usn"  required>
        <div></div>

         <select name="department" class="form-control">
                <!--PHP-->
                  <?php 
                        $departm = select_all_department();
                        while($depts = mysqli_fetch_assoc($departm)){
                          ?>
                          <option value="<?php echo $depts["Did"];?>"><?php echo $depts["D_name"];?></option>
                <!--PHP-->
                <?php
              }
                ?></select>

         <select name="semester"  class="form-control">
            <!--PHP-->
            <?php 
                 $i = 1;
                 while($i < 9)
                 {
            ?>
              <option  value="<?php echo $i;?>"><?php echo $i;?></option>
            <!--PHP-->
            <?php
            	 $i = $i + 1;
            	 }
            ?>
          </select>

       <select name="section" class="form-control">
         <option value="1">A</option>
         <option value="2">B</option>
       </select>
       

        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="emailid" required>
        <div></div>

        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
        <div></div>
        
        <input type="password" id="inputPassword" class="form-control" placeholder="Confirm Password" name="cpassword" required>
        <div></div>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"><b>Remember me</b>
          </label>
        </div>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="register" value="submit">Submit</button>
      </form>
   <!--PHP-->
      <?php 
        if(isset($_POST["register"]))
        {
          global $db;
          $name = $_POST["name"];
          $usn = $_POST["usn"];
          $department = $_POST["department"];
          $semester = $department.$_POST["semester"];
          $section = $_POST["section"]; 
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
            $query1 = "INSERT into users(email,hash,type) VALUES('{$str1}','{$str4}',3)";
            $query2 = "INSERT into students(USN,Did,Sid,name,section,email) VALUES('{$usn}',{$department},{$semester},'{$name}','{$section}','{$str1}')";
            $result1 = mysqli_query($db,$query1);
            $result2 = mysqli_query($db,$query2);
            if($result1 && $result2)
            {
              echo "Signup Complete.";
            }
            else
            {
              echo "Error in Sign In process. Please try again.";
            }
          }
        }
      ?>
    <!--PHP-->
    </div> 
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>

