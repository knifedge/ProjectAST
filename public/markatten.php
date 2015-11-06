
              <?php 
                  if(isset($cur_dep) && !isset($cur_sem))
                  {
                    $dep = select_all_department();
              ?>
                   <?php
                        while($depar = mysqli_fetch_assoc($dep)){
                    ?>
                      <h3>
                         <?php
                              if($cur_dep == $depar["Did"])
                              {
                                  echo "You're now in <b>".$depar["D_name"] . " Branch</b>" ;
                              }
                         ?>
                      </h3>
          <!--PHP-->
                    <?php 
                          }
                    ?>
                     
                          <h3>
                          <p>Now that you are in the opted branch,</p>
                          <p>From the Navigation Bar in the left side, Select the required semister and subject</p>
                          <p>Based on the subject,start marking the attendance.</p>
                          </h3>
                    
                <!--PHP-->
                  <?php 
                    }
                  ?>


        <!--==================MArk attendance ==============================-->
                  <?php    
                        date_default_timezone_set('Asia/Kolkata');
                        $i=0;
                        $valarray = array();
                        if(isset($cur_dep) && isset($cur_sem) && !isset($cur_sub))
                        {
                          $sems = select_all_sem($cur_dep);
                          $depts = select_all_department();
                   ?>
                   <?php
                        while($semester = mysqli_fetch_assoc($sems))
                        {
                   ?>
                    <h3>
                    <!--PHP-->
                      <?php
                           if(($cur_sem == $semester["Sid"]))
                              {
                                echo "You're now in <b>".$semester["S_name"] . " Semister</b>";
                              }
                      ?>
                    </h3>
                <!--PHP-->
                    <?php
                        }
                    ?>
                    <h3><p>Now that have opted one of the semister,</p><p>From the Navigation Bar in the left side, Select the required subject</p>
                    <p>Based on the subject,start marking the attendance.</p></h3>
                    <?php
                        }
                    ?>

                    <?php
//if the department,semister and any subj is selected from the nav bar then show the corresponding attendance mar form
                         if(isset($cur_dep) && isset($cur_sem) && isset($cur_sub))
                          {
                             $stud=select_all_student($cur_dep,$cur_sem);
                             $cur_subjects = select_all_sub($cur_dep,$cur_sem);
                             $cur_elective = select_all_ele($cur_dep,$cur_sem);
                             while($css = mysqli_fetch_assoc($cur_subjects))
                              { 
                    ?>
                                 <h3>
                                          <?php
                                               if(($cur_sub == $css["Suid"]))
                                                  { 
                                                    echo "Current subject is <b>".$css["Su_name"] ;
                                                  }
                                          ?>
                                </h3>
                  <!--PHP-->
                          <?php
                                }
                           
//------------------------------------------------------------------------------------------------------
                              while($ss = mysqli_fetch_assoc($cur_elective))
                                { 
                          ?>
                                  <h3>
                                      <?php 
                                          if(($cur_sub == $ss["Eid"]))
                                            {
                                              echo "Current subject is <b>".$ss["E_name"] ;
                                            }
                                      ?>
                                  </h3>
                                <?php
                                }
                                ?>
<form class="form-group" method="POST" onSubmit="return replaceIt()" action="manage.php?dept=<?php echo $cur_dep;?><?php echo htmlentities('&semist='); ?><?php echo $cur_sem;?><?php echo htmlentities('&sub=');?><?php echo $cur_sub;?>">
                  <?php if(isset($_POST["submit"])){ echo message(); } ?>
            <input type="text" class="form-control" name="date" value="<?php echo date('Y-m-d'); echo "  "; echo date('h:m');?>">
              <table class="table table-striped">
                      <thead>
                        <tr>
                          <th><center>USN</center></th>
                          <th><center>Student Name</center></th>
                          <th><center>Mark Attendance</center></th>
                        </tr>
                      </thead>
                      <tbody>
                      <!--PHP-->
                      <?php
                            while($stu = mysqli_fetch_assoc($stud))
                              { 
                      ?>
                          <tr>
                            <td><center><?php echo $stu["USN"];?></center></td>
                            <td><center><?php echo $stu["name"];?></center></td>
                            <td><input type="text" class="form-control" name="checkval[]" value="1" checked></td>
                          </tr>     
                        </tbody>
                         
                      <?php
                       }
                      ?> 
              </table> 
                <input type="submit" class="btn btn-primary" id="cl" name="submit" value="Mark" />
                <input type = "submit" class="btn btn-danger" name="delete" value="Delete"/> 
                <script src="js/jquery.min.js"></script>
        <script>
            $("#cl").click(function(){
              if(window.confirm("Are you sure?"))
               alert('Marked');
                $('#cl').val('wait');
            });
        </script>
       
        <?php
         }
        ?>
          </div>
