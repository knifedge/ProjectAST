<?php require_once('../Includes/functions.php');    
if(isset($dep)&&isset($sem)&&isset($usn)){
  $cur_sem = $sem;
  $cur_usn = $usn;
  $cur_dep = $dep;
}else
{
  $cur_sem = null;
  $cur_usn = null;
  $cur_dep = null;
  redirect_to('index.php');
}
?>
<!--=========================================================================================-->
<div class="container">

<form method="POST" action="stulogin.php"><input type = "submit" class="btn btn-danger" name="logof" value="Logout"/></form>

<?php 
  if(isset($_POST["logof"]))
  {
    redirect_to("index.php");
  }
?>

<h1 class="page-header">Hi, <?php $name = select_a_stud($cur_usn);
                  $nmz = mysqli_fetch_assoc($name);
                  echo $nmz["name"];
  ?></h1>
  <h5 class="page-header"><?php $inf = select_stu_dep($cur_dep);
                  $snf = select_stu_sem($cur_sem);
                  $unz = select_a_stud($cur_usn);
                  $dpz = mysqli_fetch_assoc($inf);
                  $dps = mysqli_fetch_assoc($snf);
                  $dpu = mysqli_fetch_assoc($unz);
                  echo "<pre><b>Department : </b>" . $dpz["D_name"] . "<br/>";
                  echo "<b>Semester   : </b>" . $dps["S_name"] ." Semester<br/>";
                  echo "<b>USN        : </b>" . $dpu["USN"] . "</pre>";
                  
  ?></h5>

 <div class="header clearfix"></div>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Subject_code</th>
      <th>Subject_Name</th>
      <th>Classes_Happened</th>
      <th>Classes_Attended</th>
    </tr>
  </thead>

  <tbody>
  <?php $sublist = select_all_sub($cur_dep,$cur_sem);
    while($subj = mysqli_fetch_assoc($sublist)){?>
    <tr>
      <td> <?php echo $subj["Suid"]; ?></td>
      <td><?php echo $subj["Su_name"]; ?></td>
      <td> <?php  $i = retrive_happned($cur_dep,$cur_sem,$subj["Suid"]);
            $j = mysqli_fetch_assoc($i);
            echo $j["count(DISTINCT t)"];
             ?></td>
      <td><?php $i = retrive_attend($cur_usn,$cur_sem,$subj["Suid"]);
            $j = mysqli_fetch_assoc($i);
            echo $j["count(t)"]; ?></td>
    </tr>
    <?php }?>
  </tbody>

</table>
</div>