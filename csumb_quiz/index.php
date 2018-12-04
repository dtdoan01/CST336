<?php
session_start();

function displayQuiz(){
    //displays Quiz if session is active
    if (isset($_SESSION['username'])) {
        include 'quiz.php';
    } else {
        header('Location: index.php');
    }

}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CSUMB Online Quiz</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body>
        <!--Display user and logout button-->
        <div class="user-menu">
            <?php echo "Welcome ".$_SESSION['username']."! ";?> 
            <input type="button" id="logoutBtn" value="Logout" />    
        </div>
        
        <div class="content-wrapper">
            <!--Display Quiz Content-->
            <div id="quiz">
                <?=displayQuiz()?>
                <div id="feedBack">
                    <h2>Your final score is <span id="score"> score </span></h2>
                    You've taken this quiz <strong id="times"> time(s).</strong><br /><br />
                    Your average score was <strong id="average"></strong>
                </div>
            </div>
            <div id="mascot">
                <img src="img/mascot.png" alt="CSUMB Mascot" width="350" />
            </div>
        </div>
        
        <!--Javascript files-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/gradeQuiz.js"></script>
    </body>
</html>