<!DOCTYPE html>
<html>
<head>
	<title>Data Science Quiz</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>

	<div id="page-wrap">

		<h1>Final Quiz for Data Science</h1>
		
		<form action="grade.php" method="post" id="quiz">
		
            <ol>
            
                <li>
                
                    <h3>Who is a data scientist?</h3>
                    
                    <div>
                        <input type="checkbox" name="question-1-answers" value="A"> <label for="question-1-answers-A"> Mathematician </label><br>
                        <input type="checkbox" name="question-1-answers" value="B"> <label for="question-1-answers-B"> Statistician </label><br> 
                        <input type="checkbox" name="question-1-answers" value="C"> <label for="question-1-answers-C"> Software programmer </label><br> 
                        <input type="checkbox" name="question-1-answers" value="D"> <label for="question-1-answers-D"> All of the above </label>
                    </div>
                </li>
                
                <li>
                
                    <h3>Why Machine Learning in Data Science?</h3>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-A" value="A" />
                        <label for="question-2-answers-A">A) For Visualization</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-B" value="B" />
                        <label for="question-2-answers-B">B) For Prediction</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-C" value="C" />
                        <label for="question-2-answers-C">C) For Cleaning</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-D" value="D" />
                        <label for="question-2-answers-D">D) All the above</label>
                    </div>
                
                </li>
                
                <li>
                
                    <h3>Which of the following is performed by Data Scientist?</h3>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-A" value="A" />
                        <label for="question-3-answers-A">A) Define the question</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-B" value="B" />
                        <label for="question-3-answers-B">B) Create reproducible code</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-C" value="C" />
                        <label for="question-3-answers-C">C) Challenge results</label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-D" value="D" />
                        <label for="question-3-answers-D">D) All of the Mentioned</label>
                    </div>
                
                </li>
                
                <li>
                
                    <h3>Which of the following diagram is used to view correlation?</h3>
                    <div>
                        <select name="question-4-answers" id="question-4-answers">
                          <option value="">Select One</option>
                          <option value="A">Triangle</option>
                          <option value="B">Boxplot</option>
                          <option value="C">Corrgram</option>
                          <option value="D">Histogram</option>
                        </select>
                    </div>
                </li>
                <li>
                    <h3>__________ is the standard deviation of a sampling distribution.</h3>
                    
                    <div>
                        <select name="anslist" form="ansform">
                          <option value="">Select One</option>
                          <option value="A">Sample error</option>
                          <option value="B">Sampling error</option>
                          <option value="C">Simple error</option>
                          <option value="D">Standard error</option>
                        </select>
                        
                    </div>
                </li>
            </ol>
            
            Firstname:<input type="text" name="fname">
            <input type="submit" value="Submit Quiz" />
		
		</form>
	
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