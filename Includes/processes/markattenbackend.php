<!--=========================BACKEND==========================================-->
 <?php   
    global $db;
    if(isset($_POST["submit"]))
    {             
      if(isset($cur_dep) && isset($cur_sem))
      {
        $stud2=select_all_student($cur_dep,$cur_sem); 
        $vi = $_POST["checkval"];
        $cur_sub = $_GET["sub"];
        $count = mysqli_num_rows($stud2);
        for ($i = 0; $i < $count; $i++)
        { 
          if($stu2 = mysqli_fetch_assoc($stud2))
          {
            $did = $stu2["Did"];
            $sem = $stu2["Sid"];
            $usn = $stu2["USN"];
            $atten = $vi[$i];
            $dstring = $_POST["date"];
            $timestamp = strtotime($dstring);
            $query = "INSERT into attend(Did,Sid,USN,Suid,attend,t)";
            $query.=" VALUES ({$did},{$sem},'{$usn}','{$cur_sub}',{$atten},'{$timestamp}')";
            $result = mysqli_query($db,$query);
          }
        }
        if($result)    
              $_SESSION["message"] = "Attendance Marked"; 
            else
              $_SESSION["message"] = "Something Went Wrong."; 
      } 
     }                   
  ?>    
<!--PHP code to delete table content .... used only in the development s-->
  <?php 
    global $db;
    if(isset($_POST["delete"]))
    {
      $query = "DELETE FROM attend WHERE Did=1";
      $del = mysqli_query($db,$query);
      if($del)
          $_SESSION["message"] = "Attendance Cleared";
        else
           $_SESSION["message"] = "error";
    }        
  ?>