<?php 
    $conn = openCon(); 
    $sql = "SELECT userName, MAX(price) AS price, RANK() OVER (ORDER BY MAX(price) DESC) AS rank
            FROM tbl_scores
            GROUP BY userName
            ORDER BY price DESC;";
    $result = mysqli_query($conn, $sql);
    $scores = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<div class="background-blur leaderboard-modal">
    <div class="leaderboard-panel">
        <div class="leaderboard-header">
            <img src="../Images/Leaderboard.png" alt="">
            <p>Leaderboard</p>
            <button class="close-button">
                <ion-icon name="close"></ion-icon>
            </button>
        </div>
        <div class="leaderboard-body">
            <?php
                    include "LeaderboardItem.php";
                    foreach($scores as $score){
                        displayItem($score);
                    }
                ?>
        </div>
    </div>
</div>
<script>
    
</script>