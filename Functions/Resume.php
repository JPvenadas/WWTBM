<?php
    session_start();
    include "db_conn.php";

     //set the prices
     $_SESSION['prices'] = [0, 100, 200, 300, 500, 1000, 2000, 4000, 8000, 16000, 32000, 64000, 125000, 250000, 500000, 1000000];

     //open the connection
     $conn = openCon();
     $uname = $_SESSION['userName'];

     //retrieve the game that has been left off
     $sql = "SELECT * FROM `tbl_sessions` WHERE userName = '$uname'";
     $result = mysqli_query($conn, $sql);
     $savedSession = mysqli_fetch_all($result, MYSQLI_ASSOC);

     //this serialized array contains the questions of the saved game
     $serializedArray = $savedSession[0]['questions'];
     $questions = unserialize($serializedArray);

     //current level
     $level = $savedSession[0]['level'];
     
     $_SESSION['questions'] = $questions;

    header("Location: ../Pages/gameplay.php?level=$level");
    exit();
?>