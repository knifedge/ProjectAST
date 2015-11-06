<?php 

//-----------------function that takes input of the date and each element of date is passed as a array-------------------------------------
//-----------------then converted into the unix timestamp----------------------------------------------------------------------------------
	
	function unixtimegen($dstring)
	{
			//$timestamp = $cur_dep . $cur_sem;
            $hour = $dstring[12].$dstring[13]; $hour = (int)$hour;
            $minute = $dstring[15].$dstring[16]; $minute =(int)$minute;
            $seconds = 0; 
            $day = $dstring[0].$dstring[1]; $day = (int)$day;
            $month = $dstring[3].$dstring[4]; $month = (int)$month;
            $year = $dstring[6].$dstring[7].$dstring[8].$dstring[9]; $year = (int)$year;
            $timestamp2 = mktime($hour,$minute,$seconds,$month,$day,$year);
            //$timestamp = $timestamp.$timestamp2;
            return $timestamp2;
	}

//-----------function to check the query made in a function--------------------------------------------------------------------------------
	
	function check_query($result)
	{
		if(!$result)
		{
			die("Sorry the query was Unsuccessful");
		}
	}

//--------------------------select a student by usn----------------------------------------------------------------------------------------
	
	function select_a_stud($usn){
		global $db;
		$safeusn = mysqli_real_escape_string($db,$usn);
		$query = "SELECT * FROM students WHERE USN = '{$safeusn}'";
		$value = mysqli_query($db,$query);
		check_query($value);
		return $value;
	}

//----------------selects all the list of departments in the database----------------------------------------------------------------------
	
	function select_all_department()
	{
		global $db;
		$query = "SELECT * FROM department";
		$dept = mysqli_query($db,$query);
		check_query($dept);
		return $dept;
	}

//---------------------------------------used to redirect to the new location--------------------------------------------------------------
	
	function redirect_to($new_location){
		header("Location: " . $new_location);
		exit;
	}

//--------------------------select all the semester based on the the current department selected-------------------------------------------
	
	function select_all_sem($dept_id)
	{
		global $db;
		$safe_id = mysqli_real_escape_string($db,$dept_id);
		$query = "SELECT * FROM semister";
		$query.= " WHERE Did = {$safe_id}";
		$sem = mysqli_query($db,$query);
		check_query($sem);
		return $sem;
	}

//-------------select all the subject based on the current semester and the department-----------------------------------------------------
	
	function select_all_sub($dep,$seme)
	{
		global $db;
		$query = "SELECT * FROM subject ";
		$query.= "WHERE Did = $dep AND SID = $seme";
		$sub = mysqli_query($db,$query);
		return $sub; 
	}

//------------select all the electives subject based on the current semester and department------------------------------------------------

	function select_all_ele($dep,$seme)
	{
		global $db;
		$query = "SELECT * FROM ellectives ";
		$query.= "WHERE Did = $dep AND Sid = $seme";
		$sub = mysqli_query($db,$query);
		return $sub; 
	}

//----------------select all the student base on the semester and department choosen-------------------------------------------------------
	
	function select_all_student($dept,$sem)
	{
		global $db;
		$query = "SELECT * FROM students";
		$query.= " WHERE Did = $dept AND Sid = $sem";
		$result = mysqli_query($db,$query);
		check_query($result);
		return $result;
	}

//------------------------------------select_student by emailid----------------------------------------------------------------------------
	
	function select_student($email)
	{
		global $db;
		$safeemail = mysqli_real_escape_string($db,$email);
		$query = "SELECT * FROM users";
		$query.= " WHERE email = '{$safeemail}' ";
		$result = mysqli_query($db,$query);
		check_query($result);
		return $result;
	}

//--------------------------------------------------------select all the admins int the admin table----------------------------------------
	
	function find_all_admin()
	{
		global $db;
		$query = "SELECT * FROM admin";
		$result = mysqli_query($db,$query);
		check_query($result);
		return $result;
	}

//-------------------------------------------------------------------find the admin based on the id passed---------------------------------
	
	function find_admin_by_id($id)
	{
		$query = "SELECT * FROM admin";
		$query.=" WHERE id = $id";
		$result = mysqli_query($db,$query);
		check_query($result);
		if($admin = mysqli_fetch_assoc($result))
		{
			return $admin;
		}else
		{
			return null;
		}
	}

//-------------------------------function is used to retrive the total class based----------------------------------------------------------
//------------------------------- on the department,semester and subject that is selected---------------------------------------------------
	
	function retrive_happned($dep,$sem,$sub){
		global $db;
		$ssafe = mysqli_real_escape_string($db,$sub);
		$query = "SELECT count(DISTINCT t) FROM ";
		$query.= "attend WHERE Suid = '{$ssafe}'";
		$result = mysqli_query($db,$query);
		check_query($result);
		return $result;
	}

//-------------------------------function use to retrive attended class--------------------------------------------------------------------- 
//-------------------------------by the student based on the department and semester--------------------------------------------------------
	
	function retrive_attend($usn,$sem,$sub)
	{
		global $db;
		$usafe = mysqli_real_escape_string($db,$usn);
		$ssafe = mysqli_real_escape_string($db,$sub);
		$query = "SELECT count(t) FROM attend ";
		$query.= "where attend = 1 AND USN = '{$usafe}' AND Suid = '{$ssafe}'";
		$result = mysqli_query($db,$query);
		check_query($result);
		return $result;
	}

//-------------------------based on the specific date---retrive the happend date------------------------------------------------------------
	
	function retrive_happned_date($cur_dep,$cur_sem,$cur_sub,$date1,$date2)
	{
		global $db;
		$ssafe = mysqli_real_escape_string($db,$cur_sub);
		$query = "SELECT count(DISTINCT t) FROM attend";
		$query.= " WHERE Suid = '{$ssafe}' AND t > $date1 AND t < $date2";
		$result = mysqli_query($db,$query);
		check_query($result);
		return $result;	
	}

//-------------------based on the dates provoided..used to check the attended date----------------------------------------------------------
	
	function retrive_attended_date($date1,$date2,$subjs,$usns)
	{
		global $db;
		$usafe = mysqli_real_escape_string($db,$usns);
		$ssafe = mysqli_real_escape_string($db,$subjs);
		$query = "SELECT count(t) FROM attend ";
		$query.= "where attend = 1 AND USN = '{$usafe}' AND Suid = '{$ssafe}' AND t > $date1 AND t < $date2";
		$result = mysqli_query($db,$query);
		check_query($result);
		return $result;		
	}

//--------------------------Select a student based on the department------------------------------------------------------------------------
	
	function select_stu_dep($dep){
		global $db;
		$query = "SELECT * FROM department Where Did = {$dep}";
		$result = mysqli_query($db,$query);
		check_query($result);
		return $result;	
	}

//-------------------------------------select the student based on the semister-------------------------------------------------------------
	
	function select_stu_sem($sem){
		global $db;
		$query = "SELECT * FROM semister Where Sid = {$sem}";
		$result = mysqli_query($db,$query);
		check_query($result);
		return $result;	
	}

//------------------------------------select login user,conform if logged in----------------------------------------------------------------
	
	function select_login_user($email,$hash){
		global $db;
		$query = "SELECT * from users WHERE email = '{$email}' AND hash = '{$hash}'";
        $result = mysqli_query($db,$query);
        check_query($result);
		return $result;	
	}

//-----------------------------login confrim------------------------------------------------------------------------------------------------
	
	function logedin(){
		return isset($_SESSION['USE']);
	}
	function conform_login()
	{
		if(!logedin()){
			redirect_to("index.php");
		}
	}

//--------------------------------------------------SELECT THE USERS OF DIFFERENT KIND-----------------------------------------------------
	
	function select_users()
	{
		global $db;
		$query = "SELECT * from users";
		$result = mysqli_query($db,$query);
		check_query($result);
		return $result;
	}

//--------------------------------------Functions for validation----------------------------------------------------------------------------
	
?>