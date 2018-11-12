<!DOCTYPE html>
<head>
	<title>Data Science Quiz</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>

	<div id="page-wrap">

		<h1>Final Quiz for Data Science</h1>
		
        <?php
            
            $answer1 = $_POST['question-1-answers'];
            $answer2 = $_POST['question-2-answers'];
            $answer3 = $_POST['question-3-answers'];
            $answer4 = $_POST['question-4-answers'];
            $answer5 = $_POST['question-5-answers'];
        
            $totalCorrect = 0;
            
            if ($answer1 == "D") { $totalCorrect++; }
            if ($answer2 == "B") { $totalCorrect++; }
            if ($answer3 == "C") { $totalCorrect++; }
            if ($answer4 == "C") { $totalCorrect++; }
            if ($answer5 == "A") { $totalCorrect++; }
            
            echo "<h2>Thanks! " . $_POST['fname'] . ", you have </h2>";
            echo "<div id='results'>$totalCorrect / 5 correct</div>";
            if ($totalCorrect <= 3) {
                echo "<h2> Result: Fail, the score is " . ($totalCorrect / 5) * 100 . "%. Please try again </h2>";
            } else {
                echo "<h2> Result: Pass, the score is " . ($totalCorrect / 5) * 100 . "%. Good Job! </h2>";
            }
        ?>
	
	</div>
    <!-- This is the footer -->
    <!-- The footer goes inside the body but not always -->
    <footer>
        <hr>
        CST 336 Internet Programming. 2018&copy; Dinh <br />
        <strong>Disclaimer:</strong> The information in this webpage is fictious. <br />
        It is used for academic purpose only.
        <br />
        <img src="img/csumb.png" alt="CSUMB logo">            
    </footer>
	
</body>

</html>