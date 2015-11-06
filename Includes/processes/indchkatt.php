
<!--============================View attendance of the people you choose to ==================================================-->

<?php
    if(isset($cur_dep)&&isset($cur_sem)&&isset($cur_sub))
    {
?>
<h2 class="page-header">Check the attendance</h2><br>
 <form method="POST" action="attend_status.php?dept=<?php echo $cur_dep; ?>
 <?php echo htmlentities('&semist=');?><?php echo $cur_sem;?><?php echo htmlentities('&sub=');?><?php echo $cur_sub; ?>" > 
<!-- <div class="form-group">-->
              <label>From</label>
                <input type="text" class="form-control"  name="date1" value="<?php echo date('Y-m-d'); echo "  "; echo date('h:m');?>">
        <!-- </div>
          <!--<div class="form-group">-->
              <label>To</label>
                <input type="text"  class="form-control" name="date2" value="<?php echo date('Y-m-d'); echo "  "; echo date('h:m');?>">
          <!--</div>
          <!--<div class="form-group">-->
              <label>Subject</label>
                <select name="subject" class="form-control">

                <!--PHP-->

                  <?php 
                        if(isset($cur_dep)&&isset($cur_sem))
                        {
                          $subjc=select_all_sub($cur_dep,$cur_sem);
                          while($subjs = mysqli_fetch_assoc($subjc))
                          {
                  ?>
                              <option  value="<?php echo $subjs["Suid"];?>"><?php echo $subjs["Su_name"];?></option>

                  <!--PHP-->

                  <?php
                          }
                        }
                  ?>
             </select>
    <!--     </div>
          <div class="form-group">
 --><label>Name</label>
 <select name="student" class="form-control">
         <!--PHP-->
 
                  <?php 
                      if(isset($cur_dep)&&isset($cur_sem))
                      {
                        $studs=select_all_student($cur_dep,$cur_sem);
                        while($sts = mysqli_fetch_assoc($studs))
                          {
                  ?>
                            <option  value="<?php echo $sts["USN"];?>"><?php echo $sts["name"];?></option>                        
 
                   <!--PHP-->
 
                  <?php
                         }
                      }
                  ?>
             </select>
          <!--</div>-->
    <input type="submit" name="compare" class="btn btn-primary" class="form-control" value="submit" />
    </form>
    <!--</div>-->

<?php
    if(isset($_POST["compare"]))
      {
        $ssafe = mysqli_real_escape_string($db,$cur_sub);
        $date1 =strtotime($_POST["date1"]) ;
        $date2 = strtotime($_POST["date2"]);
        $subj = $_POST["subject"];
        $usns = $_POST["student"];
        $attended = retrive_attended_date($date1,$date2,$subj,$usns);
        $happned= retrive_happned_date($cur_dep,$cur_sem,$subj,$date1,$date2);
        while($atts = mysqli_fetch_assoc($attended)){?>
       <button type="button" class="btn btn-warning"> <?php echo "ATTENDED  ".$atts["count(t)"]; ?></button>
        <?php while($happs = mysqli_fetch_assoc($happned)){?>
        <button type="button" class="btn btn-warning"> <?php echo "HELD  ".$happs["count(DISTINCT t)"];?> </button>
        <?php } ?>
    <?php 
      }
  }
}
?>