<?php 
    if(isset($cur_dep) && !isset($cur_sem))
    {
      $dep = select_all_department();
?> <!--PHP-->      
            <?php
               while($depar = mysqli_fetch_assoc($dep))
                {
            ?>
         <h3><!--which department u r in-->
            <?php
                 if($cur_dep == $depar["Did"])
                  { 
                    echo "You're now in <b>".$depar["D_name"] . "</b> Branch" ;
                  }
            ?>
         </h3>
 <!--PHP-->
          <?php
                }
          ?>
           
           <h3>
           	  <p>In this section you're allowed to view,</p>
              <p>The Attendance status of students,</p>
              <p>From the Navigation Bar in the left side, Select the required semister and subject</p>
              <p>Based on the subject choosen,you can see the attendance status table.</p>
           </h3>

              <?php 
    }
  ?>
  <?php 
        if(isset($cur_dep) && isset($cur_sem) && !isset($cur_sub))
        {
           $ss = select_all_sem($cur_dep);?>
           
                  <?php
                        while($sem = mysqli_fetch_assoc($ss))
                          {
                  ?>
					         <h3>
					                <?php
					                     if($cur_sem == $sem["Sid"])
					                      {
					                        echo "You're now in <b>".$sem["S_name"] . " Semester</b>" ;
					                      }
					                ?>
					         </h3>
<!--PHP-->
					      <?php
					       }
					     ?>
           <h3>
           	  <p>In this section you're allowed to view,</p>
              <p>The Attendance status of students,</p>
              <p>From the Navigation Bar in the left side, Select the required subject.</p>
              <p>Based on the subject choosen,you can see the attendance status table.</p>
           </h3>
<!--PHP-->
    <?php
     } 
    ?>
    <hr>

    <?php
	    if(isset($cur_dep) && isset($cur_sem) && isset($cur_sub))
	    {
	          $subje = select_all_sub($cur_dep,$cur_sem);
	          $hap = retrive_happned($cur_dep,$cur_sem,$cur_sub);
	          while($totalclasses= mysqli_fetch_assoc($hap))
	            {
	?>
      <button type="button" class="btn btn-warning"> <?php echo "HELD ".$totalclasses["count(DISTINCT t)"]; ?> </button>       
 <!--PHP-->
       <?php
        		}
          $st = select_all_student($cur_dep,$cur_sem);
       ?>
          <h2 class="page-header">Attendance status are as follows...</h2>
                      <table  class="table table-bordered">
                        <tr>
                            <th> USN </th>
                            <th> Name </th>
                            <th> Classes Attended </th> 
                        </tr>
      <!--PHP-->

      <?php 
          while($stude = mysqli_fetch_assoc($st))
          { 
              $cur_usn = $stude["USN"];
              $att = retrive_attend($cur_usn,$cur_sem,$cur_sub);
              $d = mysqli_fetch_assoc($att);
      ?>  
                       <tr>
                            <td><?php echo $stude["USN"];?></td>
                            <td><?php echo $stude["name"]?></td>
                            <td><?php echo $d["count(t)"];?></td>
                         </tr>
<!--PHP-->

<?php
 }
?>
  </table>

<!--PHP-->

  <?php
      }
  ?><!--PHP-->
<hr>
<?php include('../Includes/processes/indchkatt.php');?>
