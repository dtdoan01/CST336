(function() {
  function buildQuiz() {
    // we'll need a place to store the HTML output
    const output = [];

    // for each question...
    myQuestions.forEach((currentQuestion, questionNumber) => {
      // we'll want to store the list of answer choices
      const answers = [];

      // and for each available answer...
      if (`${currentQuestion.crtType}` == "radio" || `${currentQuestion.crtType}` == "checkbox")
        {
          for (letter in currentQuestion.answers) {
            // ...add an HTML radio and checkbox button
                answers.push(
                  `<label>
                    <input type="${currentQuestion.crtType}" name="question${questionNumber}" value="${letter}">
                    ${letter} :
                    ${currentQuestion.answers[letter]}
                  </label>`
                );
            } 
        }


    if (`${currentQuestion.crtType}` == "select") {
            answers.push(`<select name="question${questionNumber}" id="question${questionNumber}">`);
            // ...add an HTML selection list
            for (letter in currentQuestion.answers) {
                answers.push(
                    `<option value = "${letter}">${currentQuestion.answers[letter]} </option>`
                );
            }
            answers.push(`</select>`)
        }
        
        
      // add this question and its answers to the output
      output.push(
        `<div class="question"> ${currentQuestion.question} </div>
        <div class="answers"> ${answers.join("")} </div>`
      );
    });

    // finally combine our output list into one string of HTML and put it on the page
    quizContainer.innerHTML = output.join("");
  }

  function showResults() {
    // gather answer containers from our quiz
    const answerContainers = quizContainer.querySelectorAll(".answers");

    // keep track of user's answers
    let numCorrect = 0;

    // for each question...
    myQuestions.forEach((currentQuestion, questionNumber) => {
      // find selected answer
      const answerContainer = answerContainers[questionNumber];
      var selector = "";
      var userAnswer = "";
    if (`${currentQuestion.crtType}` == "select") {
      selector = document.getElementById(`question${questionNumber}`);
      var value = selector[selector.selectedIndex].value;
      userAnswer = value;
    } else {
      selector = `input[name=question${questionNumber}]:checked`;
      userAnswer = (answerContainer.querySelector(selector) || {}).value;
    }

      // if answer is correct
      if (userAnswer === currentQuestion.correctAnswer) {
        // add to the number of correct answers
        numCorrect++;

        // color the answers green
        answerContainers[questionNumber].style.color = "lightgreen";
      } else {
        // if answer is wrong or blank
        // color the answers red
        answerContainers[questionNumber].style.color = "red";
      }
    });

    // show number of correct answers out of total
    //resultsContainer.innerHTML =`${numCorrect} out of ${myQuestions.length}`;
    var firstName = document.getElementById("fname").value;//by id    

    resultsContainer.innerHTML = "<h2>Thanks! " + firstName + ", you have </h2>";
    
    resultsContainer.innerHTML += "<div id='results'>" + numCorrect + " / " + myQuestions.length + " correct</div>";

    
    if (numCorrect <= 3) {
        resultsContainer.innerHTML += "<h2> Result: Fail, the score is " + (numCorrect / Number(myQuestions.length)) * 100 + "%. Please try again </h2>";
    } else {
        resultsContainer.innerHTML += "<h2> Result: Pass, the score is " + (numCorrect / Number(myQuestions.length)) * 100 + "%. Good Job! </h2>";
    }
    
  }

  const quizContainer = document.getElementById("quiz");
  const resultsContainer = document.getElementById("results");
  const submitButton = document.getElementById("submit");

  const myQuestions = [
    {
      crtType : "checkbox",
      question: "Who is a data scientist?",
      answers: {
        A: "Mathematician",
        B: "Statistician",
        C: "Software programmer",
        D: "All of the above"
      },
      correctAnswer: "D"
    },
    {
      crtType : "radio",
      question: "Why Machine Learning in Data Science?",
      answers: {
        A: "For Visualization",
        B: "For Prediction",
        C: "For Cleaning",
        D: "All the above"
      },
      correctAnswer: "B"
    },
    {
      crtType : "radio",
      question: "Which of the following is performed by Data Scientist?",
      answers: {
        A: "Define the question",
        B: "Create reproducible code",
        C: "Challenge results",
        D: "All of the Mentioned"
      },
      correctAnswer: "C"
    },
    {
      crtType : "select",
      question: "Which of the following diagram is used to view correlation?",
      answers: {
        X: "Select One",
        A: "Triangle",
        B: "Boxplot",
        C: "Corrgram",
        D: "Histogram"
      },
      correctAnswer: "C"
    },
    {
      crtType : "select",
      question: "__________ is the standard deviation of a sampling distribution.",
      answers: {
        X: "Select One",
        A: "Sample error",
        B: "Sampling error",
        C: "Simple error",
        D: "Standard error"
      },
      correctAnswer: "A"
    }
  ];

  // display quiz right away
  buildQuiz();

  // on submit, show results
  submitButton.addEventListener("click", showResults);
})();


