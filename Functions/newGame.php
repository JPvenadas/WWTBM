<?php
    session_start();
    include "db_conn.php";


    //set the prices
    $_SESSION['prices'] = [0, 100, 200, 300, 500, 1000, 2000, 4000, 8000, 16000, 32000, 64000, 125000, 250000, 500000, 1000000];

    //open the connection
    $conn = openCon();
    // the sql command that will get random questions, 5 for each difficulty
    $sql = "SELECT *, ROW_NUMBER() OVER (ORDER BY CASE difficulty 
                WHEN 'easy' THEN 1
                WHEN 'normal' THEN 2
                WHEN 'hard' THEN 3
            END, RAND()) AS number
            FROM (
            (
            SELECT * 
            FROM tbl_questions
            WHERE difficulty = 'easy'
            ORDER BY RAND()
            LIMIT 5
            )
            UNION
            (
            SELECT * 
            FROM tbl_questions
            WHERE difficulty = 'normal'
            ORDER BY RAND()
            LIMIT 5
            )
            UNION
            (
            SELECT * 
            FROM tbl_questions
            WHERE difficulty = 'hard'
            ORDER BY RAND()
            LIMIT 5
            )
            ) AS subquery;";
    $result = mysqli_query($conn, $sql);
    $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //store the questions into session
    $_SESSION['questions'] = $questions;


    //get the username 
    $uname = $_SESSION['userName'];

    //Delete the previous saved game
    $sql = "DELETE FROM `tbl_sessions` WHERE userName = '$uname'";
    mysqli_query($conn, $sql);

    //register a new game session

    $serializedArray = serialize($questions);
    $sql = "INSERT INTO `tbl_sessions`(`userName`, `level`, `questions`) VALUES ('$uname','1', '$serializedArray')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);

    header("Location: ../Pages/gameplay.php");
    exit();
?>