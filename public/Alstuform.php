<form method = "POST" action = "stuupdate.php" class="form-signin">
 
	  			<select name="department" class="form-control">
	        	        <!--PHP-->
	        	          <?php $departm = select_all_department();
	        	                while($depts = mysqli_fetch_assoc($departm)){
	        	                	 
	        	                  ?>
	        	                  <option value="<?php echo $depts["Did"];?>"><?php echo $depts["D_name"];?></option>
	        	        <!--PHP-->
	        	        <?php
	        	      }
	           	     ?>
	           	</select>
	           	<table class="table table-striped">
	           	<tr>
	           		<td>
					   <select name="semester"  class="form-control">
			    	        <!--PHP-->
			    	        <?php 
			    	             $i = 1;
			    	             while($i < 9)
			    	             {
			   	 	        ?>
			    	          <option  value="<?php echo $i;?>"><?php echo $i; ?></option>
			    	        <!--PHP-->
			    	        <?php
			    	        	 $i = $i + 1;
			    	        	 }
			    	        ?>
			    	   </select>
			    	</td>
	    	   		<td>
	    	   			<select name="semester2"  class="form-control">
			    	        <!--PHP-->
			    	        <?php 
			    	             $i = 1;
			    	             while($i < 9)
			    	             {
			   	 	        ?>
			    	          <option  value="<?php echo $i;?>"><?php echo $i; ?></option>
			    	        <!--PHP-->
			    	        <?php
			    	        	 $i = $i + 1;
			    	        	 }
			    	        ?>
			    	   </select>
			       </td>
			       <td>
			    	   	<select name="semester3"  class="form-control">
			    	        <!--PHP-->
			    	        <?php 
			    	             $i = 1;
			    	             while($i < 9)
			    	             {
			   	 	        ?>
			    	          <option  value="<?php echo $i;?>"><?php echo $i; ?></option>
			    	        <!--PHP-->
			    	        <?php
			    	        	 $i = $i + 1;
			    	        	 }
			    	        ?>
			    	   </select>
			       </td>
			    </tr>
		<tr>
			<td><button class="btn btn-lg btn-success btn-block btn-sm" type="submit" name="retrive" value="submit">Retrive</button></td>
			<td><button class="btn btn-lg btn-info btn-block btn-sm" type="submit" name="update" value="submit">update</button></td>
			<td><button class="btn btn-lg btn-success btn-danger btn-block btn-sm" type="submit" name="Delete" value="submit">Delete</button></td>
		</tr>
	  </table>			

	</form>
	<pre><ul>
	  <b>
	To Retrive data  : Set Department and Semester click <em><u>retrive</u></em>.
	To Update  data  : Set Department and both Semester click <em><u>update</u></em>.
	To Delete  data  : Set Department and Semester click <em><u>Delete</u></em>.
	</b>
	</ul></pre>
	</div>