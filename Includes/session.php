<?php 
	session_start();
	function message(){
		if(isset($_SESSION["message"])){
			$opt = "<div class= \"col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main\">";
			$opt.=$_SESSION["message"];
			$opt.="</div>";
			return $opt;
		}
	}
?>