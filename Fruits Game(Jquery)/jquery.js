var playing = false;
var score;
var trialsLeft;
var fruits = ['apple', 'pineapple', 'banana', 'lime', 'mango', 'watermelon', 'peach', 'grapes', 'orange'];
var step;
var action;
$(function(){
//click on start reset button
$("#startreset").click(function(){
    if (playing == true){
        //yes->reload page
        location.reload();
    }else{
        //not playing
        playing = true;
        //set score to 0
        score = 0; 
        $("scorevalue").html(score);

        //show score trials box
        $("#trialsLeft").show();
        trialsLeft = 3;
        addHearts();

        //hide game over box
        $("#gameOver").hide();

        //change button to reset game
        $("#startreset").html("Reset Game");

        //start slicing fruits
        startAction();
    }
});


    //explode the fruit
$("#fruit1").mouseover(function(){
    score++;
    $("#scorevalue").html(score); //update score
    $("#slicesound")[0].play();//play sound
    
    //stop fruit dropping 
    clearInterval(action);
    
    //hide fruit animation
    $("#fruit1").hide("explode", 500); //slice fruit
    
    //send new fruit
    setTimeout(startAction, 500);
});


//functions

function addHearts(){
    $("#trialsLeft").empty();
    for(i = 0; i < trialsLeft; i++){
        $("#trialsLeft").append('<img src="images/heart.png" class="life">');
    };    
}

//start creating fruits
function startAction(){
    //generate fruit
    $("#fruit1").show();
    chooseFruit(); //create src of random fruit
    $("#fruit1").css({'left': Math.round(550*Math.random()), 'top': -50}); // random position
    
    //generate random step
    step = 1 + Math.round(5*Math.random()); //step 1-6
    
    //move fruit one step every 10ms
    action = setInterval(function(){
        $("#fruit1").css('top', $("#fruit1").position().top + step);
        //check fruit too low?
        if($("#fruit1").position().top > $("#fruitsContainer").height()){
            //check any trials left?
            if(trialsLeft > 1){
                //generate fruit
                $("#fruit1").show();
                chooseFruit(); //create src of random fruit
                $("#fruit1").css({'left': Math.round(550*Math.random()), 'top': -50}); // random position
                
                //generate random step
                step = 1 + Math.round(5*Math.random()); 
                
                //reduce trials by one
                trialsLeft --;
                
                //update life
                addHearts();
    //generate random step
    step = 1 + Math.round(5*Math.random()); //step 1-6
        
        }else{
            //game over,button text change to :start game 
            playing = false
            $("#startreset").html("Reset Game");
            $("#gameOver").show();
            $("#gameOver").html('<p>Game Over!</p><p>Your score is ' + score + '</p>');
            $("#trialsLeft").hide();
            stopAction();
                
        }
        }
    }, 10);        
                          
}

//create random fruit
function chooseFruit(){
    $("#fruit1").attr('src','images/' + fruits[Math.round(8*Math.random())] + '.png');
};

//stop generate fruit
function stopAction(){
    clearInterval(action);
    $("#fruit1").hide();
}
});