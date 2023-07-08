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
    <link rel="stylesheet" type="text/css" href="Styles/login.css">

   
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

    $question = $_SESSION['questions'][$level];
    ?>
    <form action="" method="post">
        <p><?php echo $level . ". " . $question['question']?></p>
        <input type="hidden" name="questionID" value="<?php echo $question["ID"]?>">
        <input value="<?php echo $question['optionA']?>" required type="radio" name="answer" id="A">
        <label for="A"><?php echo $question['optionA']?></label>
        <input value="<?php echo $question['optionB']?>" required type="radio" name="answer" id="B">
        <label for="B"><?php echo $question['optionB']?></label>
        <input value="<?php echo $question['optionC']?>" required type="radio" name="answer" id="C">
        <label for="C"><?php echo $question['optionC']?></label>
        <input value="<?php echo $question['optionD']?>" required type="radio" name="answer" id="D">
        <label for="D"><?php echo $question['optionD']?></label>
        <button name="finalAnswer" type="submit">final answer</button>
    </form>
    
    <div>
        <p>Question for: <b>
            <?php echo $_SESSION['prices'][$level] ?>$
        </b></p>
    </div>
</body>
</html>
<?php
     }else{
        header("Location: ../index.php");
        exit();
     }
?>