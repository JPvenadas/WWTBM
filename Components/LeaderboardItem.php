<?php function displayItem($score){?>
<div class="item">
    <div class="left">
        <div class="rank"><?php echo $score['rank']?></div>
        <h6><?php echo $score['userName']?></h6>
    </div>
    <div class="right">
        <div>$ <?php echo number_format($score['price'])?></div>
    </div>
</div>
<?php }?>