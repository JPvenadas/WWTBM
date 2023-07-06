<?php
include "db_conn.php";
$conn = openCon();

if (isset($_POST['uname']) && isset($_POST['password'])) {

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: ../index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: ../index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM `tbl_users` WHERE userName = '$uname'";
	
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			mysqli_close($conn);
			
            if ($row['userName'] == $uname && $row['password'] == $pass) {
            	$_SESSION['username'] = $row['userName'];
            	
				//redirect to menu page
				
					header("Location: ../Pages/menu.php");
		        	exit();

            }else{
				header("Location: ../index.php?error=Incorect password");
		        exit();
			}
		}else{
			header("Location: ../index.php?error=No such Username");
	        exit();
		}
	}
	
}else{
	header("Location: ../index.php");
	exit();
}
?>