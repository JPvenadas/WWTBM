<!--this is a component that contains the question and the options. the below script also contains functions that will make the lifelines work-->

<form class="question-panel" action="" method="post">
    <div class="question text">
        <!-- Question -->
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

//************************************************************** */
//all the radio buttons
var radioButtons = document.querySelectorAll('input[type="radio"]');
//all the labels of each radio-button
var labels = document.querySelectorAll('label.option');
// the final answer button
var final = document.querySelector('.submit-button');
// the form containing the question and the options
var form = document.querySelector('.question-panel');
//get all the options by using the name
const allOptions = document.querySelectorAll('input[name="answer"]');
// the correct answer for the current question
const correctAnswer = '<?php echo $question['correctAnswer']?>'
//the timer used when the "call a friend" lifeline is used
let timer

//************************************************************** */


// a function used to change the color of the selected option. if an option is clicked it will have a class "selected", then turn yellow
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


// if the final answer button is clicked
final.addEventListener('click', () => {

    //get the needed data
    const body = document.querySelector('body');
    const selectedOption = document.querySelector('input[name="answer"]:checked');

    //waiting animation
    body.classList.add('inner-shadow');
    body.classList.add('active');

    // Disable all unselected radio buttons
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

            //if the answer is correct reflect a green and stop a timer if there is
            if (option.value == correctAnswer) {
                label.style.background = 'green';
                clearInterval(timer);
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
                if (level == '15') {
                    notif.innerHTML = "Congratulations! You have won a million Dollar!!"
                } else {
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

// 50:50 lifeline
fiftyLifeline.addEventListener('click', () => {

    //show the notif
    let notif = document.querySelector('#fifty');
    notif.style.display = 'block';

    localStorage.setItem('fifty', 'false');

    //disable the button
    fiftyLifeline.disabled = true;
    fiftyLifeline.style.background = 'gray';

    // after 2 sec, 2 options will be disabled
    setTimeout(() => {
        let count = 0;
        allOptions.forEach((option) => {

            if (count == 2) {
                return
            }
            const label = option.nextElementSibling;

            //if the answer is correct reflect a green
            if (option.value != correctAnswer) {
                label.style.background = 'gray';
                option.disabled = true;
                count++
            }
        });
    }, 2000);

})

// call a friend lifeline
callLifeline.addEventListener('click', () => {
    //timer text
    const timerElement = document.querySelector('.call-timer');
    //disable the button
    callLifeline.disabled = true;
    callLifeline.style.background = 'gray';
    //save the usage of the lifeline, so you cant use it even in refresh
    localStorage.setItem('call', 'false');
    //show the notif
    let notif = document.querySelector('#call');
    notif.style.display = 'block';
    //seconds in a minute
    let secondsRemaining = 60;

    timer = setInterval(() => {
        if(secondsRemaining >= 0){
            timerElement.innerHTML = `(00:${secondsRemaining})`
            secondsRemaining--
        }else{
            clearInterval(timer);
            timerElement.innerHTML = `Time is up`
        }        
    }, 1000);
})

// switch lifeline
switchLifeline.addEventListener('click', ()=>{
     //disable the button
    switchLifeline.disabled = true;
    switchLifeline.style.background = 'gray';

    //save the usage of the lifeline, so you cant use it even in refresh
    localStorage.setItem('switch', 'false');

    //show the notif
    let notif = document.querySelector('#switch');
    notif.style.display = 'block';

    //move to the new url
    setTimeout(() => {
        // Get the current URL
        var currentUrl = window.location.href;
        // Add a query parameter to the URL
        var newUrl = currentUrl + (currentUrl.includes('?') ? '&' : '?') + 'substitute=1';
        // Navigate to the updated URL
        window.location.href = newUrl;
    }, 2500);

})

</script>