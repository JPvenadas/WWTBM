<?php
function openCon(){

    $sname= "localhost";
    $uname= "root";
    $password = "";
    
    $db_name = "db_wwtbm";
    
    $conn = mysqli_connect($sname, $uname, $password, $db_name);
    
    if (!$conn) {
        echo "Connection failed!";
    }
    return $conn;
    }
    
    
    // function to validate user input
    function validate($data){
        $data = str_replace("'", "", $data);
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>