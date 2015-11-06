<form method="POST" action="subject.php" class="form-signin">
				
				<?php if(isset($_POST["submit"]) && isset($_POST["myInputs"]) && ($_POST["myInput"]))
					{
						echo message();
					}
				?>
				
				<table  id="dynamicInput">
		     		<tr><h4 class="text-muted" >Add Subjects</h4></tr>
		     		
		     		<tr>
			     		<select name="currentdep"  autofocus="on"  class="form-control">
	     				<?php 
	     					$dept=select_all_department();
	     					while($dp = mysqli_fetch_assoc($dept))
	     					{
	     				?>
							<option  value="<?php echo $dp["Did"];?>"><?php echo $dp["D_name"];?></option>
	     				<?php
	     					}
	     				?>
	     				</select>
	     			</tr>
	     			
	     			<tr>
	     				<select name="currenttime"  class="form-control">
	     				<?php 
	     					$i = 1;
	     					while($i < 9)
	     					{
	     				?>
	     					<option  value="<?php echo $i;?>"><?php echo $i;?></option>
	     				<?php
	     					 $i = $i + 1;
	     					}
	     			    ?>
	     				</select>
	     			</tr>
	     
		          	<tr>
		          		<input  type="text" placeholder="Subject Code" class="form-control" name="myInputs[]">
		          	</tr>
		          	
		          	<tr>
		          		<input  type="text" placeholder="Subject Name" class="form-control" name="myInput[]">
		          	</tr>
		          	
		          	<tr>
		          		<input type="button" class="btn btn-lg btn-info btn-block btn-sm" value="+ADD " onClick="addInput('dynamicInput');">
		          	</tr>
		          	<br>
		     	</table><input type="submit" class="btn btn-lg btn-primary btn-block btn-sm" name="submit" />
</form>
			<br/>
			<pre>Select the department and Semester and Enter the respective fields.For multiple input   fields click then press submit. <em><u>+ADD</u></em>.</pre>
		</div>




		<?php
			global $db;
			if(isset($_POST["submit"]) && isset($_POST["myInputs"]) && ($_POST["myInput"]))
			{	
				$flag = 1;
				$sub_str = $_POST["myInputs"];
				$sub_code = $_POST["myInput"];
				$dep = $_POST["currentdep"];
				$sem = $dep.$_POST["currenttime"];				
				foreach (array_combine($sub_code, $sub_str) as $str => $code)
				 {				 	 
						$query = "INSERT INTO subject(Did, SID, Suid, Su_name) VALUES ({$dep}, {$sem},'{$code}', '{$str}') ";
						$result = mysqli_query($db,$query);
						if($result)
							{
								;
							}
						else
						{
							$flag = 0;
							$_SESSION["message"] = "Error in entering subject.";
						}
				}
						if ($flag)
						{
							$_SESSION["message"] = "Record Insertion was successfully completed.";
						}
			}				
		?>

		<script>
				  	function addInput(divName)
				  		{
    				    	var newdiv = document.createElement('td');
    				    	var newdi = document.createElement('tr');
					    	newdiv.innerHTML ="<input type='text' class='form-control'  placeholder='subject code' name='myInputs[]'>";
					    	newdi.innerHTML ="<input type='text' class='form-control'  placeholder='subject name' name='myInput[]'><br>";
					    	document.getElementById(divName).appendChild(newdiv);
					    	document.getElementById(divName).appendChild(newdi);
     					}			
		</script>	