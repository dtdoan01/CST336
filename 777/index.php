<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <div id="main">
            <?php
                include 'inc/functions.php';
                
                play();
                echo '<embed name="cash_payout_with_arpeggio" src="sound/cash_payout_with_arpeggio.wav" loop="true" hidden="true" autostart="true" />';
            ?>
            <form>
                <input type="submit" value = "Spin!" />
            </form>
        </div>        
    </body>
</html>