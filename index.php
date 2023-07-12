<?php 
    session_start();
    if(isset($_SESSION["userName"])){
        header("Location: Pages/menu.php");
        exit();
    }else{
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
    <?php include "Components/errorAlert.php"?>
    <div class="container">
        <img class="logo" src="Images/logo.png" alt="">
        <button id="play" class="button">Play</button>
    </div>
    <?php include "Components/loginModal.php";?>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
<?php
    }
?>