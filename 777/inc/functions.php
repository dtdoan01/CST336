<?php

        function displaySymbol($randomValue, $pos){
            /*if ($randomValue == 0) {
                echo '<img src="img/seven.png" alt="charry" title="Cherry" width="70" />';
            } else if ($randomValue == 1) {
                echo '<img src="img/cherry.png" alt="charry" title="Cherry" width="70" />';
            } else {
                echo '<img src="img/lemon.png" alt="charry" title="Cherry" width="70" />';
            }*/
            switch($randomValue){
                case 0: $symbol = "seven"; // echo '<img src="img/seven.png" alt="charry" title="Cherry" width="70" />';
                    break;
                case 1: $symbol = "cherry"; // echo '<img src="img/cherry.png" alt="charry" title="Cherry" width="70" />';
                    break;
                case 2: $symbol = "lemon"; // echo '<img src="img/lemon.png" alt="charry" title="Cherry" width="70" />';
                    break;
                case 3: $symbol = "bar"; // echo '<img src="img/lemon.png" alt="charry" title="Cherry" width="70" />';
                    break;
                case 4: $symbol = "orange"; // echo '<img src="img/lemon.png" alt="charry" title="Cherry" width="70" />';
                    break;
                case 5: $symbol = "grapes"; // echo '<img src="img/lemon.png" alt="charry" title="Cherry" width="70" />';
                    break;
            }
            
            echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='".ucfirst($symbol). "' width='70' />";
        }
        
        function displayPoints($randomValue1, $randomValue2, $randomValue3){
            echo "<div id='output'>";
            if ($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3){
                switch ($randomValue1){
                    case 0: $totalPoints = 1000;
                        echo "<h1>Jackpot</h1>";
                        echo( "<embed name='slot_machine_beep_buzz' src='sound/slot_machine_beep_buzz.wav' loop='true' hidden='true' autostart='true'/>");
                        break;
                    case 1: $totalPoints = 500;
                        echo( "<embed name='slot_machine_beep_buzz' src='sound/slot_machine_beep_buzz.wav' loop='true' hidden='true' autostart='true'/>");
                        break;
                    case 2: $totalPoints = 250;
                        echo( "<embed name='slot_machine_beep_buzz' src='sound/slot_machine_beep_buzz.wav' loop='true' hidden='true' autostart='true'/>");
                        break;
                    case 3: $totalPoints = 200;
                        echo( "<embed name='slot_machine_beep_buzz' src='sound/slot_machine_beep_buzz.wav' loop='true' hidden='true' autostart='true'/>");
                        break;
                    case 4: $totalPoints = 100;
                        echo( "<embed name='slot_machine_beep_buzz' src='sound/slot_machine_beep_buzz.wav' loop='true' hidden='true' autostart='true'/>");
                        break;
                    case 5: $totalPoints = 50;
                        echo( "<embed name='slot_machine_beep_buzz' src='sound/slot_machine_beep_buzz.wav' loop='true' hidden='true' autostart='true'/>");
                        break;
                }
                echo "<h2>You won $totalPoints points!</h2>";
            } else {
                echo "<h3> Try Again! </h3>";
            }
            echo "</div>";
        }
        
        function play() {
            for ($i=1; $i<4; $i++){
            ${"randomValue" .$i } = rand(0,5);
                displaySymbol(${"randomValue" . $i }, $i);
            }
            displayPoints($randomValue1, $randomValue2, $randomValue3);
        }
?>