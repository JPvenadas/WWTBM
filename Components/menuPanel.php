<div class="menu-panel">
    <div class="primary-button-container">
        <?php if($usernameExist){?>
        <form action="../Functions/Resume.php" method="POST">
            <button class="menu-button" type="submit" name="newGame">Resume</button>
        </form>
        <?php } ?>
        <form action="../Functions/newGame.php" method="POST">
            <button class="menu-button" type="submit" name="newGame">Start game</button>
        </form>
        <a href="leaderboards.php">
            <button class="menu-button">Leaderboards</button>
        </a>
    </div>
    <form action="../Functions/logout.php" method="POST">
        <button class="menu-button">Logout</button>
    </form>
</div>