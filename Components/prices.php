<div class="price-panel">

    <!-- the lifelines -->
    <div class="lifelines">

        <!-- 50-50 lifeline -->
        <button id="fiftyLifeline" title="Removes 2 option from the choices" class="lifeline">50:50</button>
        <!-- switch lifeline -->
        <button id="switchLifeline" title="Switch the question with another one" class="lifeline">
            <ion-icon name="sync-circle"></ion-icon>
        </button>
        <!-- call a friend lifeline -->
        <button id="callLifeline" title="You will be given a minute to call a friend" class="lifeline">
            <ion-icon name="call"></ion-icon>
        </button>

    </div>

    <!-- the Prices panel from $100 to million -->
    <div class="prices">
        <div id="price15" class="price white">$ 1,000,000</div>
        <div id="price14" class="price">$ 500,000</div>
        <div id="price13" class="price">$ 250,000</div>
        <div id="price12" class="price">$ 125,000</div>
        <div id="price11" class="price">$ 64,000</div>
        <div id="price10" class="price white">$ 32,000</div>
        <div id="price9" class="price">$ 16,000</div>
        <div id="price8" class="price">$ 8,000</div>
        <div id="price7" class="price">$ 4,000</div>
        <div id="price6" class="price">$ 2,000</div>
        <div id="price5" class="price white">$ 1,000</div>
        <div id="price4" class="price">$ 500</div>
        <div id="price3" class="price">$ 300</div>
        <div id="price2" class="price">$ 200</div>
        <div id="price1" class="price">$ 100</div>
    </div>

    <!-- exit button -->
    <a href="menu.php">
        <button class="button">Save and Exit</button>
    </a>
</div>

<script>
//***************************************************************** */
//50:50 lifeline button
let fiftyLifeline = document.getElementById('fiftyLifeline');
// call a friend lifeline button
let callLifeline = document.getElementById('callLifeline');
// switch lifeline button
let switchLifeline = document.getElementById('switchLifeline');
//******************************************************************* */


//the if statement below will check the local storage, if you have used the lifeline before. if it is, the button will be disabled. so that you can't spam the lifeline

//check if the 50: 50 button is used before
if (localStorage.getItem('fifty') == 'false') {
    //disable the button and turn it to gray
    fiftyLifeline.disabled = true;
    fiftyLifeline.style.background = 'gray';
}
//check if the call a friend button is used before
if (localStorage.getItem('call') == 'false') {
    callLifeline.disabled = true;
    callLifeline.style.background = 'gray';
}
//check if the 50: switch button is used before
if (localStorage.getItem('switch') == 'false') {
    switchLifeline.disabled = true;
    switchLifeline.style.background = 'gray';
}

//get the current level that is in the get param
const urlParams = new URLSearchParams(window.location.search);
let level = urlParams.get('level');

if (level == null) {
    level = 1;
}

let Highlightedprice = document.querySelector("#price" + level)

Highlightedprice.classList.add('highlight')
</script>