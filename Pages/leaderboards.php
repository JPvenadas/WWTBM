<?php 
     session_start();
     if(isset($_SESSION["userName"])){
        include "../Functions/db_conn.php";
        $conn = openCon(); 
        $sql = "SELECT userName, MAX(price) AS price
                FROM tbl_scores
                GROUP BY userName
                ORDER BY price DESC";
        $result = mysqli_query($conn, $sql);
        $scores = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
?>

<!DOCTYPE html>
<html>

<head>
    <title>Leaderboards</title>
    <link rel="shortcut icon" href="Images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="Images/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Styles/login.css">
</head>

<body>
    <table>
        <tr>
            <th>Username</th>
            <th>Price Won</th>
        </tr>
    
   <?php foreach($scores as $score){?>
        <tr>
            <td><?php echo $score['userName']?></td>
            <td><?php echo $score['price']?></td>
        </tr>
   <?php }?>
   </table>
   <a href="menu.php">
        <button>back</button>
    </a>
</body>

</html>
<?php
     }else{
        header("Location: ../index.php");
        exit();
     }
?>