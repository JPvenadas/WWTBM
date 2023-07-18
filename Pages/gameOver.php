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
    <?php
   
   //include the leaderboard modal
   include "../Components/leaderboardModal.php";

   // include the profile on top
   include "../Components/profile.php";
   attachProfile($_SESSION['userName']);
   ?>

    <div class="result-panel">
        <h3>
            <?php
         //if the player wins the grand price input "congratulations", else "game over"
         if($price == "1000000"){
            echo "Congratulations!";
         }else{
            echo "Game Over!";
         }
         ?>
        </h3>
        <h4>You have won</h4>
        <!-- the price won -->
        <h5>$ <?php echo number_format($price)?></h5>
        <img class="dollar-image" src="../Images/Dollar.png" alt="">
        <div class="button-container">

            <!-- exit game -->
            <form action="../Functions/logout.php" method="POST">
                <button class="button">Exit Game</button>
            </form>
            <!-- see the leaderboard -->
            <button class="button leaderboard-button">
                Leaderboard
            </button>
        </div>
    </div>
</body>

   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</html>
   <script>
   //********************************************* */
   //leaderboard button
   let leaderboardButton = document.querySelector('.leaderboard-button');
   //leaderboard modal
   let leaderboardModal = document.querySelector('.leaderboard-modal');
   // close modal button
   let closebutton = document.querySelector('.close-button');
   //********************************************* */

   //show the modal if the button is clicked
   leaderboardButton.addEventListener('click', () => {
      leaderboardModal.style.display = "flex";
   })
   //close the modal if the close button is clicked
   closebutton.addEventListener('click', () => {
      leaderboardModal.style.display = "none";
   })
</script>
<?php
     }else{
        header("Location: ../index.php");
        exit();
     }
?>