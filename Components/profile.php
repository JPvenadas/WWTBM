<!-- This component is for the profile section that is attached on top of the screen. this used a function attachProfile and you just have to pass an argument that will serve as the text (you can pass the username)-->

<?php
    function attachProfile($text){
?>
<div class="profile-container">
    <img class="profile-pic" src="../Images/User.png" alt="">
    <p class="profile-name"><?php echo $text?></p>
</div>
<?php }?>