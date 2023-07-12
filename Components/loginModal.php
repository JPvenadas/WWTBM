<div class="background-blur">
    <form class="login-form" action="Functions/login.php" method="POST">
        <div class="login-header">
            <h2>Login</h2>
            <div id="back">
                <ion-icon name="close-outline"></ion-icon>
            </div>
        </div>
        <input class="login-input" required name="uname" placeholder="Username" type="text">
        <input class="login-input" required name="password" placeholder="Password" type="password">
        <div class="login-button-container">
            <button class="login-button" name="login">Login</button>
            <button class="login-button" name="new_player">New Player</button>
        </div>
    </form>
</div>

<script>
    let play = document.getElementById('play');
    let loginModal = document.querySelector('.background-blur');
    let back = document.getElementById('back');

    play.addEventListener('click', () => {
        loginModal.style.display = "flex";
    })
    back.addEventListener('click', () => {
        loginModal.style.display = "none";
    })
</script>