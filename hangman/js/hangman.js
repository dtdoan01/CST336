var selectedWord = "";
var selectedHint = "";
var board = [];
var remainingGuesses = 6;
var words = [{word: "snake", hint: "It's a reptile"}, 
             {word: "monkey", hint: "It's a mammal"}, 
             {word: "beetle", hint: "It's a insect"}];
var alphabet = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
             
//console.log(words[0]);

//listener
window.onload = startGames();

$(".letter").click(function() {
    console.log($(this).attr("id"));
    checkLetter($(this).attr("id"));
    disableButton($(this));
});

$(".hint").click(function() {
    console.log($(this).attr("id"));
    console.log(selectedHint);
    displayHint($(this).attr("id"));
});

function displayHint() {
    $("#hints").text(selectedHint)
    remainingGuesses -= 1;
    updateMan();
}


function startGames() {
    pickWord();
    iniBoard();
    createLetters();
    updateBoard();
}

function pickWord () {
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint    
}

function updateBoard() {
    $("#word").empty();
    
    for (var i=0; i<board.length; i++) {
        $("#word").append(board[i] + " ");
        //document.getElementById("word").innerHTML += letter + " ";
    }
    
    $("#word").append("<br />");
    //$("#word").append("<span class='hint'>Hint: " + selectedHint + "</span>");
    $("#word").append("<button class='hint' id='hint'>Hint</button>");
}

//Fill the board with underscores
function iniBoard () {
    for (var letter in selectedWord) {
        board.push("_");
    }
}


function createLetters () {
    for (var letter of alphabet) {
        $("#letters").append("<button class='letter' id='" + letter + "'>" + letter + "</button>");
    }
}


function checkLetter(letter) {
    var positions = new Array();
    for (var i=0; i< selectedWord.length; i++) {
        console.log(selectedWord);
        if (letter == selectedWord[i]) {
            positions.push(i);
        }
    }
    
    if (positions.length > 0) {
        updateWord(positions, letter);
        
        if (!board.includes('_')) {
            endGame(true);
        }
    } else {
        remainingGuesses -= 1;
        updateMan();
    }
    
    if(remainingGuesses <=0 ) {
        endGame(false);
    }
}


function updateWord (positions, letter) {
    for (var pos of positions) {
        board[pos] = letter;
    }
    
    updateBoard();
}


function endGame (win) {
    $("#letters").hide();
    
    if (win) {
        $("#won").show();
    } else {
        $("#lost").show();
    }
}

function disableButton(btn) {
    btn.prop("disable", true);
    btn.attr("class", "btn btn-danger");
}

function updateMan () {
    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
}


/*
$("#letterBtn").click(function(){
    var boxVal = $("#letterBox").val();
    console.log("You pressed the button and it had the value: " + boxVal)
});
*/

$(".replayBtn").on("click", function() {
    location.reload();
});