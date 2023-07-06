<?php
session_start();
include "db_conn.php";


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
        //create the connection to the database
        $conn = openCon();

        //login code
		if(isset($_POST['login'])){
            $sql = "SELECT * FROM `tbl_users` WHERE userName = '$uname'";
	
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                mysqli_close($conn);
                
                if ($row['userName'] == $uname && $row['password'] == $pass) {
                    $_SESSION['userName'] = $row['userName'];
                    
                    //redirect to menu page
                    
                        header("Location: ../Pages/menu.php?notif=successfully Logged in");
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

        //registration
        if(isset($_POST['new_player'])){

            //search if the username is available 
            $sql = "SELECT * FROM `tbl_users` WHERE userName = '$uname'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                mysqli_close($conn);

                header("Location: ../index.php?error=Username Already taken");
                exit();

            }else{
                $conn = openCon();
                $sql = "INSERT INTO `tbl_users`(`userName`, `password`) VALUES ('$uname','$pass')";
                mysqli_query($conn, $sql);
                mysqli_close($conn);

                header("Location: ../Pages/menu.php?notif=You created an account");
                exit();
            }            
        }
	}
	
}else{
	header("Location: ../index.php");
	exit();
}
?>