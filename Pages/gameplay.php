<?php 
     session_start();
     include "../Functions/db_conn.php";
     include "../Functions/checkAnswer.php";
     if(isset($_SESSION["userName"])){
?>

<!DOCTYPE html>
<html>

<head>
    <title>Who wants to be a Millionaire</title>
    <link rel="shortcut icon" href="Images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="Images/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Styles/gameplay.css">

   
</head>
<body>
    
    <?php
        $level;
        //determine the current level
        if(isset($_GET['level'])){
            $level = $_GET['level'];
        }else{
            $level = 1;
        }

        if(isset($_GET['substitute'])){
            $question = $_SESSION['questions'][15];
        }else{
            $question = $_SESSION['questions'][$level - 1];
        }
    ?>

    <?php include "../Components/notifications.php"?>
    <?php include "../Components/prices.php"?>
    <?php include "../Components/profile.php";
    attachProfile($_SESSION['userName']);?>
    <?php include "../Components/question.php"?>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php
     }else{
        header("Location: ../index.php");
        exit();
     }
?>