<?php 
     session_start();
     if(isset($_SESSION["userName"])){
        
        include "../Functions/db_conn.php";
        $conn = openCon();
        $id = $_GET['id'];
        $sql = "select * from tbl_scores where ID = '$id'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        $price = $data['price']
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
    <link rel="stylesheet" type="text/css" href="../Styles/result.css">
</head>
<body>
   <?php include "../Components/profile.php"?>
   <div class="result-panel">
      <h3>Game Over!</h3>
      <h4>You have won</h4>
      <h5>$ <?php echo number_format($price)?></h5>
      <img class="dollar-image" src="../Images/Dollar.png" alt="">
      <div class="button-container">
         <a href="menu.php">
            <button class="button">Exit</button>      
         </a>
         <button class="button">
            Leaderboard
         </button>
      </div>
   </div>
</body>
</html>
<?php
     }else{
        header("Location: ../index.php");
        exit();
     }
?>