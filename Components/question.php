
<form class="question-panel" action="" method="post">
    <div class="question text">
        <p><?php echo $level . ". " . $question['question']?></p>
    </div>
    <div class="options">
        <input type="hidden" name="finalAnswer">
        <input type="hidden" name="questionID" value="<?php echo $question["ID"]?>">
        <!-- option A -->
        <input class="hidden" required type="radio" name="answer" id="A" value="<?php echo $question['optionA']?>">
        <label class="option text" for="A">A. <?php echo $question['optionA']?></label>
        <!-- option B -->
        <input class="hidden" required type="radio" name="answer" id="B" value="<?php echo $question['optionB']?>">
        <label class="option text" for="B">B. <?php echo $question['optionB']?></label>
        <!-- option C -->
        <input class="hidden" required type="radio" name="answer" id="C" value="<?php echo $question['optionC']?>">
        <label class="option text" for="C">C. <?php echo $question['optionC']?></label>
        <!-- option D -->
        <input class="hidden" required type="radio" name="answer" id="D" value="<?php echo $question['optionD']?>">
        <label class="option text" for="D">D. <?php echo $question['optionD']?></label>
    </div>
    <div class="submit-button">
        Final Answer
    </div>
</form>

<script>
var radioButtons = document.querySelectorAll('input[type="radio"]');
var labels = document.querySelectorAll('label.option');
var final = document.querySelector('.submit-button');
var form = document.querySelector('.question-panel');

function handleRadioChange() {
    labels.forEach(function(label) {
        label.classList.remove('selected');
    });

    if (this.checked) {
        var label = this.nextElementSibling;
        label.classList.add('selected');
        final.style.opacity = "1"
        final.style.height = "auto"
    }
}

radioButtons.forEach(function(radioButton) {
    radioButton.addEventListener('change', handleRadioChange);
});

final.addEventListener('click', () => {
    //get the needed data
    const body = document.querySelector('body');
    const selectedOption = document.querySelector('input[name="answer"]:checked');
    const correctAnswer = '<?php echo $question['correctAnswer']?>'


    //waiting animation
    body.classList.add('inner-shadow');
    body.classList.add('active');

    // Disable all unselected radio buttons
    const allOptions = document.querySelectorAll('input[name="answer"]');
    allOptions.forEach((option) => {
        if (option !== selectedOption) {
            option.disabled = true;
        }
    });

    //check wether if the chosen answer is correct or not
    setTimeout(() => {
        body.classList.remove('inner-shadow');

        // change the background of the correct option to green
        allOptions.forEach((option) => {
            const label = option.nextElementSibling;

            //if the answer is correct reflect a green
            if (option.value == correctAnswer) {
                label.style.background = 'green';
            }
        });



        if (correctAnswer == selectedOption.value) {
            // create a green inner shadow
            body.classList.add('inner-shadow-correct');

            //the notif will slide the down ("correct")
            let notif = document.querySelector('.result-correct')
            notif.classList.add('show-up-above');

            //change the text of the notif
            setTimeout(() => {
                if(level == '15'){
                    notif.innerHTML = "Congratulations! You have won a million Dollar!!"
                }else{
                    notif.innerHTML = "Moving up to the next Round"
                }

                //move to the next round
                setTimeout(() => {
                    form.submit();
                }, 1000);

            }, 2000);

        } else {
            //create a red inner shadow
            body.classList.add('inner-shadow-incorrect');

            //the notif will slide the down ("correct")
            let notif = document.querySelector('.result-incorrect')
            notif.classList.add('show-up-above');

            //move to the game over page
            setTimeout(() => {
                form.submit();
            }, 2000);
        }
    }, 2000);
})

// animate the question. makes it look like thyre spawning
window.addEventListener('load', function() {
    const textElements = document.querySelectorAll('.text');

    for (let i = 0; i < textElements.length; i++) {
    textElements[i].style.opacity = '1';
  }
});
</script>