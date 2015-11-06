<?php 
		if(isset($_POST["retrive"])){
			$dept = $_POST["department"];
			$sem = $dept.$_POST["semester"];
			$studentlsit = select_all_student($dept,$sem);
			if(isset($dept) && isset($sem)){?>
			<div class="container">
						<table class="table table-striped">
							<thead>
								<tr>
									<th><center>USN</center></th>
									<th><center>Name</center></th>
									<th><center>Semister</center></th>
								</tr>
							</thead>
						<?php while($stinfo = mysqli_fetch_assoc($studentlsit)){ ?>
							<tbody>
								<tr>
									<td><input type="text" class="form-control" disabled value="<?php echo $stinfo["USN"]; ?>" /></td>
									<td><input type="text" class="form-control" disabled value="<?php echo $stinfo["name"]; ?>" /></td>
									<td><input type="text" class="form-control" disabled value="<?php echo $stinfo["Sid"]; ?>"/></td>
								</tr>
							</tbody>
		<?php }}	
	}