$(function(){
    //variables
    var mode = 0;
    var timeCounter = 0;
    var lapCounter = 0;
    var action;
    var lapNumber = 0;
    var timeMinutes, timeSeconds, timeCentiseconds, lapMinute, lapSeconds, lapCentiseconds;
    
    //app load show start and lap buttons
    hideshowButtons("#startButton", "#lapButton");
    
    //click start button
    $("#startButton").click(function(){
        //mode on
        mode = 1;
        //show stop and lap buttons
        hideshowButtons("#stopButton", "#lapButton");
        //start counter
        startAction();
    });
        

    //click stop button
    $("#stopButton").click(function(){
        //show resume and reset buttons
        hideshowButtons("#resumeButton", "#resetButton");
        //stop counter
        clearInterval(action);
    });

    //click resume button
    $("#resumeButton").click(function(){
        //show stop and lap buttons
        hideshowButtons("#stopButton", "#lapButton");
        //start action
        startAction();
    });


    //click reset button
    $("#resetButton").click(function(){
        //reload page
        location.reload();
    });
      

    //click lap button
    $("#lapButton").click(function(){
    //mode on? 
        if(mode){
            //stop action
            clearInterval(action);
            //reset lap and print lap details
            lapCounter = 0;
            addLap();
            //start action
            startAction();
        }

    });
      


    //functions
    function hideshowButtons(x, y){
        $(".control").hide();
        $(x).show();
        $(y).show();
    }
    
    //start the counter
    function startAction(){
        action = setInterval(function(){
            timeCounter++;
            if(timeCounter == 100*60*100){
                timeCounter = 0;
            }
            lapCounter++;
            if(lapCounter == 100*60*100){
                lapCounter = 0;
            }
            updateTime();
        }, 10)
    }
    
    //convert counter to min, sec, centisec
    function updateTime(){
        //1min=60*100centiseconds=6000centiseconds
        timeMinutes = Math.floor(timeCounter/6000);
        timeSeconds = Math.floor((timeCounter%6000)/100);
        timeCentiseconds = (timeCounter%6000)%100;
        $("#timeminute").text(format(timeMinutes));
        $("#timesecond").text(format(timeSeconds));
        $("#timecentisecond").text(format(timeCentiseconds));
        
         //1min=60*100centiseconds=6000centiseconds
        lapMinutes = Math.floor(lapCounter/6000);
        lapSeconds = Math.floor((lapCounter%6000)/100);
        lapCentiseconds = (lapCounter%6000)%100;
        $("#lapminute").text(format(lapMinutes));
        $("#lapsecond").text(format(lapSeconds));
        $("#lapcentisecond").text(format(lapCentiseconds));
    }
    
    //format numbers
    function format(number){
        if(number<10){
            return '0'+number;
        }else{
            return number;
        }
    }
    
    //print lap details in lap box
    function addLap(){
        lapNumber++;
        var myLapDetails = 
        '<div class="lap">' +
            '<div class="laptimetitle">' +
                'Lap'+lapNumber+
            '</div>'+
            '<div class="laptime">'+
                '<span>'+format(lapMinutes)+'</span>'+
                ':<span>'+format(lapSeconds)+'</span>'+
                ':<span>'+format(lapCentiseconds)+'</span>'+
            '</div>'+
        '</div>';
        $(myLapDetails).prependTo("#laps");
    }
});