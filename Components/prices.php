<?php
    $level;
    //determine the current level
    if(isset($_GET['level'])){
        $level = $_GET['level'];
    }else{
        $level = 1;
    }
?>
<div class="price-panel">
    <div class="lifelines">
        <button class="lifeline"></button>
        <button class="lifeline"></button>
        <button class="lifeline"></button>
    </div>
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
    <a href="menu.php">
        <button class="button">Save and Exit</button>
    </a>
</div>
<script>
    //get the current level that is in the get param
    const urlParams = new URLSearchParams(window.location.search);
    let level = urlParams.get('level');

    if(level == null){
        level = 1;
    }
    

    let Highlightedprice = document.querySelector("#price" + level)

    Highlightedprice.classList.add('highlight')
</script>