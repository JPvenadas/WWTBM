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

        $question = $_SESSION['questions'][$level - 1];
    ?>

    <div class="notif-space">
        <div class="notif">
            A question for <?php echo $_SESSION['prices'][$level]?>$
            <br>
            <span class="difficulty">(<?php echo $question['difficulty']?>)</span>
        </div>
        <div class="result-correct">
            Your Answer is Correct!
        </div >
        <div class="result-incorrect">
            Incorrect Answer!
        </div >
    </div>

    <?php include "../Components/prices.php"?>
    <?php include "../Components/profile.php"?>
    <?php include "../Components/question.php"?>


</body>
</html>
<?php
     }else{
        header("Location: ../index.php");
        exit();
     }
?>