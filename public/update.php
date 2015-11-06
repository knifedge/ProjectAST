<form method="POST" action="subject.php" class="form-signin">
				<table  id="dynamicInput">
			     		<tr><h4 class="text-muted">Update Subject</h4></tr>
			     		<tr>
			     			<input type="text" placeholder="Enter Subject Code" name="code" class="form-control"/>
						</tr>
			          	<tr><input type="submit" class="btn btn-lg btn-primary btn-block btn-sm" name="enter" /></tr>
		   		</table>
</form>
<?php 
if(isset($_POST["enter"])){
	global $db;
	if(isset($_POST["code"]))
	$subcode = mysqli_real_escape_string($db,$_POST["code"]);
	$select = "SELECT * FROM subject where Suid = '{$subcode}'";
	$sequery = mysqli_query($db,$select);
	while($fetch = mysqli_fetch_assoc($sequery)){?>
			<form action="subject.php" method="POST" class="form-signin">
				<input type="text" class="form-control" name="scode" value="<?php echo $fetch["Suid"];?>"/>
				<input type="text" class="form-control"  name="sname"   value="<?php echo $fetch["Su_name"];?>"  />
				<input type="text" class="form-control"  name="sdep"  value="<?php echo $fetch["Did"];?>"  />
				<input type="text" class="form-control"  name="sdem"  value="<?php echo $fetch["SID"]; ?>"  /> 
				<button class="btn btn-lg btn-warning btn-block btn-sm" type="submit" name="enterinto">Update</button>
			</form>
	<?php }
}
?>
	
<?php 
if(isset($_POST["enterinto"])){
	global $db;
	
	$valname = mysqli_real_escape_string($db,$_POST["sname"]);
	$calcode = mysqli_real_escape_string($db,$_POST["scode"]);
	$valdid = $_POST["sdep"];
	$valsid = $_POST["sdem"];
	$valupd = "UPDATE subject SET Su_name = '{$valname}',SID = {$valsid},Did = {$valdid} where Suid='{$calcode}' ";
	$valquery = mysqli_query($db,$valupd);
	if($valquery){
		echo "success";
	}
}
?>