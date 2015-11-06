 <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <?php 
                 $depart = select_all_department();
                 while($dep = mysqli_fetch_assoc($depart)){
              ?>
          <ul class="list-group">
           <!--======================Select department===============================-->
              <?php
                    echo "<li ";
                         if($dep["Did"] == $cur_dep)
                         {
                           echo "class=\"active\"";
                         }
                         else{ echo "class=\"subactive\""; }  
                    echo ">";
              ?>
            <a class="list-group-item" href="manage.php?dept=<?php echo $dep["Did"];?>"><?php echo $dep["D_name"]; ?><span class="sr-only">(current)</span></a>
         <!--========================Select Semester=====================================-->
          <?php
                      $semi = select_all_sem($dep["Did"]);
                      if(($dep["Did"] == $cur_dep)){
                        while($sem = mysqli_fetch_assoc($semi)){
                ?>
                <ul class="list-group">
                    <?php echo "<li ";
                            if($sem["Sid"] == $cur_sem){
                            echo "class=\"subactive\"";
                            }else{ echo "class=\"native\""; }
                           echo ">";  
                ?>
                <a class="list-group-item" href="manage.php?dept=<?php echo $dep["Did"];?>&semist=<?php echo $sem["Sid"];?>"><?php echo $sem["S_name"];?><span class="sr-only">(current)</span></a>
        <!==============================select subject========================================-->
        <?php
                           if($sem["Sid"] == $cur_sem){
                              if(isset($cur_dep) && isset($cur_sem))
                               {
                                 $subj = select_all_sub($cur_dep,$cur_sem);
                                 $elec = select_all_ele($cur_dep,$cur_sem);
                                 while($sub = mysqli_fetch_assoc($subj))
                                  {
                        ?>
                        <ul class="list-group">
                          <?php echo "<li ";
                                                       if($sub["SID"] == $cur_sub)
                                                       {
                                                         echo "class=\"subactive\"";
                                                         }
                                                         else
                                                          {
                                                           echo "class=\"subnative\""; 
                                                          }
                                            echo ">";  
                                      ?>
                                      <!--PHP-->
              <a class="list-group-item" href="manage.php?dept=<?php echo $dep["Did"];?>&semist=<?php echo $sem["Sid"];?>&sub=<?php echo $sub["Suid"];?>"><?php echo $sub["Su_name"];?></a>
                                    </li>
                        </ul>
                        <?php
                                  }
                        ?>
                         <!--=====================Electives only now=======================-->
                        <?php
                           while($elz = mysqli_fetch_assoc($elec))
                            { 
                        ?>
                        <ul class="list-group">
                         <?php echo "<li ";
                                                       if($elz["Sid"] == $cur_sub)
                                                       {
                                                          echo "class=\"subactive\"";
                                                       }
                                                       else
                                                       {
                                                         echo "class=\"subnative\"";
                                                       }
                                            echo ">";  
                                      ?>
                                      <!--PHP-->
              <a class="list-group-item" href="manage.php?dept=<?php echo $dep["Did"];?>&semist=<?php echo $sem["Sid"];?>&sub=<?php echo $elz["Eid"];?>"><?php echo $elz["E_name"];?></a>
                                    </li>
                        </ul>
                        <?php
                            }
                        ?><br>
                         <?php
                       mysqli_free_result($subj);
                      mysqli_free_result($elec);
                          }
                      }
                      ?></li>
                  </ul>  <?php  }
              mysqli_free_result($semi);
              }
            ?>
            <!--PHP-->
    </li>
  </ul>
<?php
     }
     mysqli_free_result($depart);?>
  <!--PHP-->

          </ul>


        </div><!--/.sidebar-offcanvas-->
