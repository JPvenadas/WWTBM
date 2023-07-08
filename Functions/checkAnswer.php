<?php


    if(isset($_POST["finalAnswer"])){

        // get the answer, the question, and the player
        $answer = $_POST['answer'];
        $id = $_POST['questionID'];
        $uname = $_SESSION['userName'];

        //get the correct answer for the question
        $conn = openCon();
        $sql = "SELECT `correctAnswer` FROM `tbl_questions` WHERE ID = '$id'";
        $result = mysqli_query($conn, $sql);
        $question = mysqli_fetch_assoc($result);
        $correctAnswer = $question['correctAnswer'];


         //determine the current level
        $level;
        if(isset($_GET['level'])){
            $level = $_GET['level'];
        }else{
            $level = 1;
        }
        $nextlevel = $level + 1;
    
        $currentQuestion = $_SESSION['questions'][$nextlevel]['ID'];

        //update the record in the session
        $sql = "UPDATE `tbl_sessions` SET `level`='$nextlevel' WHERE userName = '$uname'";
        mysqli_query($conn, $sql);

        //check if the answer is the same as the correct answer from the database
        if($answer == $correctAnswer){
            //if correct. proceed to the next round
            header("Location: ../Pages/gameplay.php?level=$nextlevel");
            mysqli_close($conn);
            exit();
        }else{
            
            //if not, its game over

            //Delete the previous saved game
            $sql = "DELETE FROM `tbl_sessions` WHERE userName = '$uname'";
            mysqli_query($conn, $sql);
            mysqli_close($conn);
            header("Location: ../Pages/gameOver.php");
            exit();
        }
    }
    
?>