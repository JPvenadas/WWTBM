<?php 
     session_start();
     if(isset($_SESSION["userName"])){

        include "../Functions/db_conn.php";
        $conn = openCon();
        $uname = $_SESSION['userName'];
        $sql = "SELECT EXISTS(SELECT 1 FROM tbl_sessions WHERE userName = '$uname') AS username_exists;";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        $usernameExist = $data['username_exists'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Menu</title>
    <link rel="shortcut icon" href="Images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="Images/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Styles/login.css">
</head>

<body>
    <?php if($usernameExist){?>
        <form action="../Functions/Resume.php" method="POST">
            <button type="submit" name="newGame">Resume</button>
        </form>
    <?php } ?>
    <form action="../Functions/newGame.php" method="POST">
        <button type="submit" name="newGame">New game</button>
    </form>
    <button>Leaderboards</button>
    <form action="../Functions/logout.php" method="POST">
        <button>Logout</button>
    </form>
</body>

</html>
<?php
     }else{
        header("Location: ../index.php");
        exit();
     }
?>