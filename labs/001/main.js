var playing = false;
$(document).ready(function() {
	var states = {
		"Alabama":"AL","Alaska":"AK","Arizona":"AZ","Arkansas":"AR","California":"CA","Colorado":"CO","Connecticut":"CT","Delaware":"DE",
		"Florida":"FL","Georgia":"GA","Hawaii":"HI","Idaho":"ID","Illinois":"IL","Indiana":"IN","Iowa":"IA","Kansas":"KS","Kentucky":"KY",
		"Louisiana":"LA","Maine":"ME","Maryland":"MD","Massachusetts":"MA","Michigan":"MI","Minnesota":"MN","Mississippi":"MS","Missouri":"MO",
		"Montana":"MT","Nebraska":"NE","Nevada":"NV","New Hampshire":"NH","New Jersey":"NJ","New Mexico":"NM","New York":"NY","North Carolina":"NC",
		"North Dakota":"ND","Ohio":"OH","Oklahoma":"OK","Oregon":"OR","Pennsylvania":"PA","Rhode Island":"RI","South Carolina":"SC","South Dakota":"SD",
		"Tennessee":"TN","Texas":"TX","Utah":"UT","Vermont":"VT","Virginia":"VA","Washington":"WA","West Virginia":"WV","Wisconsin":"WI","Wyoming":"WY"
	};
	var lower = {};
	var gscore = 0;
	$.each(states, function(k,v){
		lower[k.toLowerCase()] = v;
	});
	var reset = false;
	function timeup() {
		$("#play").click();
		$("p#timer").css('color','red');
		alert("Score: " + gscore);
		reset = true;
	}
	function creTime(str) {
		var wasd = str.split(":");
		var time = parseInt(wasd[0]) * 60 + parseInt(wasd[1]) - 1;
		if(time == 0) timeup();
		return ("" + Math.floor(time/60)).slice(-2) + ":" + ("0" + (time%60)).slice(-2);
	}
	function dec() {
		$("#timer").html(
			creTime($("p#timer").html())
		);
	}
	function updateScore(sup) {
		var score = $(".found").size() + sup;
		$("#score").html("Score: " + score);
		gscore = score;
		if(score > 49) {
			// timeup();
			alert("Score: " + gscore);
			$("#play").click();
			$("p#timer").css('color','green');
			reset = true;
		}
	}
	function resetScore() {
		gscore = 0;
		$("#score").html("Score: 0");
	}
	var interval = null;
	$("#timer")
	$("#play").click(function() {
		if(playing) {
			$("#play").removeClass("glyphicon-pause").addClass("glyphicon-play");
			clearInterval(interval);
			$("#state").prop('disabled',true);
			playing = false;
		} else {
			$("#play").addClass("glyphicon-pause").removeClass("glyphicon-play");
			if(reset) {
				$("p#timer").html("3:00").css('color','inherit');
				$("path").css('fill','inherit');
				$(".found").removeClass('found');
				resetScore();
				reset = false;
			}
			$("#state").prop('disabled',false);
			interval = setInterval(dec,1000);
			playing = true;
		}
	});
	$("#map").usmap({stateHoverStyles:{}, showLabels:true, stateSpecficStyles:{'DC':{fill:'yellow'}}}); // Initialize map
	$("tspan").html("") // Clear extra state abbreviations
	$("#state").keydown(function(event) {
		if(event.keyCode == 13) {
			if(lower[$("#state").val().toLowerCase()] != undefined) {
				var str = $("#state").val().toLowerCase();
				$("#state").val("");
				if($("#"+lower[str]).hasClass('found')) { return; }
				$("#"+lower[str]).attr(
					{"fill":"yellow","opacity":1}
				);
				setTimeout(function() {
					$("#"+lower[str]).addClass('found');
				}, 150);
				updateScore(1);
			} else {
				$("#state").css('background-color','#FF7777');
				setTimeout(function() {
					$("#state").css('background-color','white');
				},200);
				// console.log($("#state").val() + " not found");
			}
		}
	});
});
