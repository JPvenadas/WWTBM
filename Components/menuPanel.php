<div class="menu-panel">
    <div class="primary-button-container">
        <?php if($usernameExist){?>
        <form action="../Functions/Resume.php" method="POST">
            <button class="menu-button" type="submit" name="resume">Resume</button>
        </form>
        <?php } ?>
        <?php if(!$usernameExist){?>
            <form action="../Functions/newGame.php" method="POST">
            <button class="menu-button" type="submit" name="newGame">Start game</button>
            </form>
        <?php } ?>
        <button class="menu-button leaderboard-button">Leaderboard</button>
    </div>
    <form action="../Functions/logout.php" method="POST">
        <button class="menu-button">Logout</button>
    </form>
</div>
<script>
<?php if(!$usernameExist){?>
    localStorage.clear();
<?php } ?>
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
closebutton.addEventListener('click', ()=>{
    leaderboardModal.style.display = "none";
})
</script>