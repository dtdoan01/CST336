<?php 
    session_start() ;

    if (isset($_POST["human"])) {
        if ($_SESSION["array"] != "") {
            $_SESSION["array"] .= ", " ;
        }

        $_SESSION["array"] .= $_POST["human"] ;
    }
    else {
        $_SESSION["array"] = "" ;
        $_SESSION['humanWin'] = 0;
    }
    
    if (isset($_POST["comp"])) {
        if ($_SESSION["arraycomp"] != "") {
            $_SESSION["arraycomp"] .= ", " ;
        }

        $_SESSION["arraycomp"] .= $_POST["comp"] ;
    }
    else {
        $_SESSION["arraycomp"] = "" ;
        $_SESSION['computerWin'] = 0;
    }
    
    $demo   = $_SESSION["array"] == "" ? "0" : $_SESSION["array"] ;
    $arrComp   = $_SESSION["arraycomp"] == "" ? "0" : $_SESSION["arraycomp"] ;
    $humanWin = $_SESSION['humanWin'];
    $computerWin = $_SESSION['computerWin'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Dice </title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <header>
            <h1>Dice Game</h1>
        </header>    
        <div id="main">
            <?php 
                include 'inc/functions.php';

                play();
                echo "<h2>Your Score history: $demo</h2>";
                echo "<h3>You won: $humanWin</h3>";
                echo "<h2>Computer Score history: $arrComp</h2>";
                echo "<h3>Computer won: $computerWin</h3>";
            ?>

            <form action="" method="post">
                <input id="human" type="hidden" name="human" value= <?php echo $_SESSION['human'] ?> />
                <input id="comp" type="hidden" name="comp" value= <?php echo $_SESSION['comp'] ?> />
                <br>
                <br>
                <div class="wrapper">
                    <button class="button">Roll</button>
                </div>    
            </form>
            
        
        </div>   
        
        <!-- This is the footer -->
        <!-- The footer goes inside the body but not always -->
        <footer>
            CST 336 Internet Programming. 2018&copy; Dinh <br />
            <strong>Disclaimer;</strong> The information in this webpage is fictious. <br />
            It is used for academic purpose only.
            <br />
            <img src="img/csumb.png" alt="CSUMB logo">            
        </footer>
        
    </body>
</html>