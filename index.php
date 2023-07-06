<?php 

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
    <form action="Sql-commands/login.php" method="POST">
        <input required name="uname" placeholder="Username" type="text">
        <input required name="password" placeholder="Password" type="password">
        <button name="login">Login</button>
        <button name="new_player">New Player</button>
    </form>
</body>
</html>
<?php
?>