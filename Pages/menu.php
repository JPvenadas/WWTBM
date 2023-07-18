<?php 
     session_start();

     if(isset($_SESSION["userName"])){

        //check if there is a saved game, if not dont show the resume button
        include "../Functions/db_conn.php";
        $conn = openCon();
        $uname = $_SESSION['userName'];
        $sql = "SELECT EXISTS(SELECT 1 FROM tbl_sessions WHERE userName = '$uname') AS username_exists;";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        $usernameExist = $data['username_exists'];


        $sql = "SELECT * FROM `tbl_scores` WHERE userName = '$uname';";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        if($data){
            $id = $data['ID'];
            header("location: gameOver.php?id=$id"); 
        }

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
    <link rel="stylesheet" type="text/css" href="../Styles/menu.css">
</head>

<body>
    <?php 
    include "../Components/leaderboardModal.php";
    include "../Components/profile.php";
    attachProfile('Welcome, ' . $_SESSION['userName']);?>
    <div class="menu-content">
        <div class="logo-container">
            <img class="logo" src="../Images/logo.png" alt="">
        </div>
        <?php include "../Components/menuPanel.php"?>
    </div>

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