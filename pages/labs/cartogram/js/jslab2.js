// Map configuration

var configuration = {
	indicateurs : [
		{
		file : null,
		name : "(Select an indicator)",
		id : "none",
		key : "none"
		},
		{
		file : path + "/cartogram/data/gdpgrowthrate.csv",
		name:"Europe GDP Growth Rate",
		id:"GDPGR",
		key:"GDPGR%d",
		availableDates : ["2004","2005","2006","2007","2008","2009","2010","2011","2012","2013","2014"]
		},
		{
		file : path + "/cartogram/data/tourism.csv",
		name : "Tourism",
		id:"TOUR",
		key : "TOUR%d",
		availableDates : ["2004","2005","2006","2007","2008","2009","2010","2011"]
		},
		{
		file : path + "/cartogram/data/unemploymentRate.csv",
		name : "Unemployment Rate",
		id:"UNEMPL",
		key : "UNEMPL%d",
		availableDates : ["2004","2005","2006","2007","2008","2009","2010","2011"]

		}

	],
	mapScale : 4.5,  // Zooming
	mapTranslate : [-2200, -450],   // Centering
	transitionDuration : 1000,
	scale : {
	type : "linear",            // With no consequences for now.
	range : [10, 1000]          // This has a consequence on the linear interpolation
	},
	legend : {
	width:200,
	height:15
	},
	mapJson : path + "/cartogram/data/europe.json"
};

var playTimeout = false;

function play() {

	if( isNaN( +$("#year").val() ) ){
	return;
	}

	if(playTimeout){
	clearTimeout(playTimeout);
	}else{
	var yeard = +$("#year").val();
	var minYear = +$("#year :first-child").attr("value");
	var maxYear = +$("#year :last").attr("value");

	if(yeard === maxYear){
	$("#year").val(minYear);
	}
	}
	playTimeout = setTimeout(playNextStep, configuration.transitionDuration);

	document.getElementById("imgPlay").src = path + "/cartogram/img/play_a.png";
	document.getElementById("imgPause").src = path + "/cartogram/img/pause.png";
}

function stop() {
	clearTimeout(playTimeout);
	playTimeout = null;

	document.getElementById("imgPlay").src = path + "/cartogram/img/play.png";
	document.getElementById("imgPause").src = path + "/cartogram/img/pause_a.png";
}

function next(){
	if(playTimeout){
		return;
	}
	if( isNaN( +$("#year").val() ) ){
		return;
	}
	playNextStep();
}

function previous(){
	if(playTimeout){
		return;
	}
	if( isNaN( +$("#year").val() ) ){
		return;
	}

	var yeard = +$("#year").val();
	var minYear = +$("#year :first-child").attr("value");

	if(yeard > minYear){
		yeard -= 1;
		$("#year").val(yeard);

		year = years[$("#year").get(0).selectedIndex];
		location.hash = "#" + [field.id, year].join("/");
	}
}

function playNextStep(){
	var yeard = +$("#year").val();
	var minYear = +$("#year :first-child").attr("value");
	var maxYear = +$("#year :last").attr("value");

	if(yeard < maxYear){
		yeard += 1;
		$("#year").val(yeard);

		year = years[$("#year").get(0).selectedIndex];
		location.hash = "#" + [field.id, year].join("/");
	}else{
		clearTimeout(playTimeout);
		playTimeout = null;
	}
}