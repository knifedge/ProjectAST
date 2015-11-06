<?php 
//if department,subject and semester are then assign them the get values-------------------------
//if only department and semester are set then assign dep and sem values and set sub to null-----
//if only department is set,set other val to null------------------------------------------------
//if nothing is selected then set all values to null---------------------------------------------
		if(isset($_GET["dept"]) && isset($_GET["semist"]) && isset($_GET["sub"]) )
			{
				$cur_dep = $_GET["dept"];
				$cur_sem = $_GET["semist"];
				$cur_sub = $_GET["sub"];
			}
		elseif(isset($_GET["dept"]) && isset($_GET["semist"]))
			{
				$cur_dep = $_GET["dept"];
				$cur_sem = $_GET["semist"];
				$cur_sub = null;
			}
		elseif(isset($_GET["dept"]))
			{
				$cur_dep = $_GET["dept"];
				$cur_sem = null;
				$cur_sub = null;
			}
		else{
				$cur_sem = null;
				$cur_dep = null;
				$cur_sub = null;
			}
?>
