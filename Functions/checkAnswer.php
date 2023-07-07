<?php
include "db_conn.php";
    if(isset($_POST["finalAnswer"])){
        $answer = $_POST['answer'];
        $id = $_POST['questionID'];

        $conn = openCon();
        $sql = "SELECT `correctAnswer` FROM `tbl_questions` WHERE ID = '$id'";
        $result = mysqli_query($conn, $sql);
        $question = mysqli_fetch_assoc($result);
        $correctAnswer = $question['correctAnswer'];


        $level;
        //determine the current level
        if(isset($_GET['level'])){
            $level = $_GET['level'];
        }else{
            $level = 1;
        }
        $nextlevel = $level + 1;
    
        if($answer == $correctAnswer){
            header("Location: ../Pages/gameplay.php?level=$nextlevel");
            exit();
        }else{
            header("Location: ../Pages/gameOver.php");
            exit();
        }
    }
?>