<form>
    <!--Question 1-->
    What year was CSUMB founded? 
    <input type="text" name="question1" size="5" /><br />
    <div id="question1-feedback" class="answer"></div><br />

    <!--Question 2-->
    What is the name of CSUMB's mascot?<br />
    <input type="radio" name="question2" id="q2-1"  value="A"/><label for='q2-1'>Otto <br />
    <input type="radio" name="question2" id="q2-2"  value="B"/><label for='q2-2'>Albus <br />
    <input type="radio" name="question2" id="q2-3"  Value="C"/><label for='q2-3'>Monte Rey <br />
    <div id="question2-feedback" class="answer"></div><br />

    <!--Question 3-->
    What is CST336?<br />
    <!--input type="radio" name="question3" id="q3-1"  value="A"/><label for='q3-1'>Multimedia Design and Programming <br />
    <input type="radio" name="question3" id="q3-2"  value="B"/><label for='q3-2'>Internet Programming <br />
    <input type="radio" name="question3" id="q3-3"  Value="C"/><label for='q3-3'>Graphics Programming <br />
    <div id="question3-feedback" class="answer"></div><br /-->


    <select name="question3" id="question3">
      <option value="">Select One</option>
      <option value="A">Multimedia Design and Programming</option>
      <option value="B">Internet Programming</option>
      <option value="C">Graphics Programming</option>
      <option value="D">Software Engineering</option>
    </select>
    <div id="question3-feedback" class="answer"></div><br />                        
                        
    <!--Question 4-->
    What is CST336 focusing on?<br />
    <input type="checkbox" name="question4" id="q4-1"  value="A"/><label for='q4-1'>PHP <br />
    <input type="checkbox" name="question4" id="q4-2"  value="B"/><label for='q4-2'>MySQL <br />
    <input type="checkbox" name="question4" id="q4-3"  Value="C"/><label for='q4-3'>JavaScript <br />
    <input type="checkbox" name="question4" id="q4-4"  Value="D"/><label for='q4-4'>All of the Mentioned <br />
    <div id="question4-feedback" class="answer"></div><br />


    <input type="submit" value="Submit" />
    
    <!--Will display the "loading" or "spinning" animated gif-->
    <div id="waiting"></div>
</form>

<!--Will display the quiz score-->
<div id="scores"></div>