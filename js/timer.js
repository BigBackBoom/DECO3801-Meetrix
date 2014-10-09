var count = setInterval(function(){countDown()}, 995);

function countDown(){
	time = document.getElementById("timeleft").innerHTML;
	time = time.split(" ");
	time = time[2];
	time = time.split(":");
	
	sec = parseInt(time[0])*3600 + parseInt(time[1])*60 + parseInt(time[2]) - 1;
	
	var hour = Math.floor(sec/3600);
	if(10 > hour){
		hour = "0"+ hour;
	}
	sec = sec%3600;
	var min = Math.floor(sec/60);
	
	if(10 > min ){
		min = "0"+ min;
	}
	sec = sec%60;
	
	if(10 > sec ){
		sec = "0"+ sec;
	}
	time = hour + ":" + min + ":" + sec;
	document.getElementById("timeleft").innerHTML= "Time Left: " + time;
	
	if(time == "00:00:00"){
		window.location="finishedVoting.php";
	}
}

function timer(currentTime, endTime){
	originalEnd = endTime;
	endTime = endTime.split(" ");
	endTime = endTime[1].split(":");
	currentTime = currentTime.split(" ");
	currentDate = currentTime[0];
	currentTime = currentTime[1].split(":");
	
	currentTime = parseInt(currentTime[0])*3600 + parseInt(currentTime[1])*60 + parseInt(currentTime[2]);
	endTime = parseInt(endTime[0])*3600 + parseInt(endTime[1])*60 + parseInt(endTime[2]);
	
	var left = endTime - (currentTime++);
	originalH =  Math.floor(currentTime/3600);
	hour = Math.floor(left/3600);
	if(10 > hour){
		hour = "0"+hour;
	}
	
	if(10 > originalH){
		originalH = "0" + originalH;
	}
	currentTime = currentTime%3600;
	left = left%3600;
	
	originalM = Math.floor(currentTime/60);
	min = Math.floor(left/60);
	if(10 > min ){
		min = "0"+ min;
	}
	
	if(10 > originalM){
		originalM = "0"+ originalM;
	}
	currentTime = currentTime%60
	left = left%60;
	if(10 > left ){
		left = "0"+left;
	}
	
	if(10 > currentTime){
		currentTime = "0"+ currentTime;
	}
	time = hour + ":" + min + ":" + left;
	original = originalH + ":" + originalM + ":" + currentTime;
	document.getElementById("timeleft").innerHTML= "Time Left: " + time;
	
	//setInterval(function(){timer(currentDate + " " + original, originalEnd)}, 1000);
}
