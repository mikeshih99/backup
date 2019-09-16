var playing = false;
var score;
var action;
var timeremaining;
var correctAnswer;

document.getElementById("startreset").onclick = function(){
    //if we are playing
    if (playing == true){
        location.reload(); //reload page
    }else{//if we are not playing
        playing = true;
        
        //set score to 0
        score = 0;
        document.getElementById("scorevalue").innerHTML = score;
        
        //show countdown box
        show("timeremaining");
        timeremaining = 60;
        document.getElementById("timeremainingvalue").innerHTML = timeremaining;
        
        //hide game over box
        hide("gameOver");
        
        //change button to reset
        document.getElementById("startreset").innerHTML="Reset Game";
        
        //start countdown
        startCountdown();
        
        //generate Q&A
        generateQA();
    }
};

//click on answer box
for (i=1; i<5; i++){
    document.getElementById("box"+i).onclick = function(){
    //playing or not?
    if(playing == true){
        if(this.innerHTML == correctAnswer){
           //is correct answer? update score
            score++;
            document.getElementById("scorevalue").innerHTML = score;
            
            //hide wrong box and show correct box
            hide("wrong");
            show("correct");
            setTimeout(function(){
                hide("correct");
            }, 1000);
            
            //generate new Q&A
            generateQA();
        }else {
            //wrong answer-> show try again box
            hide("correct");
            show("wrong");
            setTimeout(function(){
                hide("wrong");
            }, 1000);
        }
    }
}
}

// if we click on answer box
    //if we are playing
         //correct?
            //yes
                //increase score
                //show correct box for 1s
                //generate new Q&A
            //no
                //show try again box for 1s

//functions
//start counter
function startCountdown(){
    action = setInterval(function(){
        timeremaining -= 1;
        document.getElementById("timeremainingvalue").innerHTML = timeremaining;
        if (timeremaining == 0) {//game over
            stopCountdown(); //stop countdown
            show("gameOver");
            document.getElementById("gameOver").innerHTML="<p>Game over!</p><p>Your score is " + score +".</p>";
            hide("timeremaining");
            hide("correct");
            hide("wrong");
            playing = false;
            document.getElementById("startreset").innerHTML="Start Game";
        }
}, 1000);
}

//stop counter
function stopCountdown(){
    clearInterval(action);
}

//hide element
function hide(Id){
    document.getElementById(Id).style.display = "none";
}

//show element
function show(Id){
    document.getElementById(Id).style.display = "block";
}

//generate question and answers
function generateQA(){
    var x = 1 + Math.round(9*Math.random());
    var y = 1 + Math.round(9*Math.random());
    correctAnswer = x*y;
    document.getElementById("question").innerHTML=x + "x" + y;
    var correctPosition = 1 + Math.round(3*Math.random()); 
    document.getElementById("box"+correctPosition).innerHTML=correctAnswer; //fill one random box with correct answer
    
    //fill others with wrong answers
    
    var answers = [correctAnswer];
    
    for(i=1; i<5; i++)
        if(i !== correctPosition){
            var wrongAnswer;
            do{
              wrongAnswer = (1 + Math.round(9*Math.random()))*(1 + Math.round(9*Math.random())); //random wrong answer  
            }while(answers.indexOf(wrongAnswer)>-1) 
            document.getElementById("box"+i).innerHTML=wrongAnswer;
            
            answers.push(wrongAnswer);
        }
}