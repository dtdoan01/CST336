<?php session_start();

        function displayDice($humanRoll1, $humanRoll2, $compRoll1, $compRoll2){
            $dice1 = array ( 1 => "<img src='img/dice1.png'>","<img src='img/dice2.png'>","<img src='img/dice3.png'>","<img src='img/dice4.png'>","<img src='img/dice5.png'>","<img src='img/dice6.png'>"  ); 
            $dice2 = array ( 1 => "<img src='img/dice1.png'>","<img src='img/dice2.png'>","<img src='img/dice3.png'>","<img src='img/dice4.png'>","<img src='img/dice5.png'>","<img src='img/dice6.png'>"  ); 

            echo "<h3>You rolled a $humanRoll1 and a $humanRoll2</h3>";
            echo "$dice1[$humanRoll1]";
            echo "  $dice1[$humanRoll2]";
            
            echo "<h3>The computer rolled a $compRoll1 and a $compRoll2</h3>";
            echo "$dice2[$compRoll1]";
            echo "  $dice2[$compRoll2]";
            

        }
        
        function calculatePoints($humanSum, $compSum){

            echo "<div id='output'>";

            if($humanSum > $compSum){
                echo "Congratulations. You have won! Scored $humanSum to $compSum";
                echo( "<embed name='slot_machine_beep_buzz' src='sound/Ta_Da.wav' loop='true' hidden='true' autostart='true'/>");
                $_SESSION['humanWin']++;
            }else if($compSum > $humanSum){
                echo "Sorry! The computer won. Scored $compSum to $humanSum" ;
                $_SESSION['computerWin']++;
    		}else if($compSum == $humanSum){
                echo "It was a tie! Both are scored $compSum";
    		}
            echo "</div>";
        }
        
        function play() {
            
            $humanRoll1 = rand(1,6);
            $humanRoll2 = rand(1,6);
            
            $compRoll1 = rand(1,6);
            $compRoll2 = rand(1,6);
            
            $humanSum = $humanRoll1 + $humanRoll2;
            $compSum = $compRoll1 + $compRoll2;

            calculatePoints($humanSum, $compSum);
            displayDice($humanRoll1, $humanRoll2, $compRoll1, $compRoll2);

            $_SESSION['human'] = $humanSum;
            $_SESSION['comp'] = $compSum;
            /*
            for ($i=1; $i<7; $i++){
                ${"randomValue" .$i } = rand(1,6);
                    displaySymbol(${"randomValue" . $i }, $i);
                }
            displayPoints($randomValue1, $randomValue2, $randomValue3);
            */
        }
?>