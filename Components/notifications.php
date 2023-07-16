<div class="notif-space">
    <div class="notif">
        A question for $<?php echo $_SESSION['prices'][$level]?>
        <br>
        <span class="difficulty">(<?php 
        if(isset($_GET['substitute'])){
            echo "substitute";
        }else{
            echo $question['difficulty'];
        } ?>)</span>
    </div>
    <div class="result-correct">
        Your Answer is Correct!
    </div>
    <div class="result-incorrect">
        Incorrect Answer!
    </div>
    <div id="fifty" class="notif-lifeline">
        Two options will be removed from the choices
    </div>
    <div id='call' class="notif-lifeline minute-animation">
        You have a minute to call and ask a friend for a help <span class="call-timer"></span>
    </div>
    <div id='switch' class="notif-lifeline">
       The Question will be changed
    </div>
</div>
