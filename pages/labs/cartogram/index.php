<?php
	$path = LABS_ADDR."/".$GLOBALS['selectedLab'];
?>
<div class="cartogram">

    <div class="alert fade in">
        This demo features the D3 library and a cartogram library made for it. Therefore:
        <ul>
            <li>
                <strong>It's best rendered</strong> by modern browsers, supporting SVG. In particular, IE6,7 and 8 won't work.
            </li>
            <li>
                This can be CPU-heavy. The <strong>best performances</strong> are under Opera 10+ and Chrome 20+.
            </li>
        </ul>
        
    </div>

    <div>
        <div>
			<h2>Cartogram Demo</h2>
			<div>
				<form>
					<fieldset>
						<legend>Controls</legend>
						<label class="control-label" for="field">Indicator</label>
						<select id="field"></select>
						<label class="control-label" for="year">Controls</label>
						<a href="javascript:void(0)" onclick="play()">
							<img id="imgPlay" src="<?php echo $path; ?>/cartogram/img/play.png" style="height:20px"/></a>
						&nbsp;
						<a href="javascript:void(0)" onclick="stop()">
							<img id="imgPause" src="<?php echo $path; ?>/cartogram/img/pause_a.png" style="height:20px"/></a>
						&nbsp;
						<a href="javascript:void(0)" onclick="previous()">
							<img src="<?php echo $path; ?>/cartogram/img/previous.png" style="height:20px"/></a>
						<select style="font-weight: bold;" class="input-small" id="year"></select>
						<a href="javascript:void(0)" onclick="next()">
							<img src="<?php echo $path; ?>/cartogram/img/next.png" style="height:20px"/></a>
						<em><span class="help-block" id="status"></span></em>
					</fieldset>
				</form>
            </div>
        </div>
        <div>

            <div id="map-container">
                <svg id="map"></svg><br/>
            </div>
            <div id="valuesInfos" style="visibility:hidden;text-align: right;">


                [ <span id="lowestLabel">Lowest : </span> <span id="lowestValue"></span>]
                &nbsp;&nbsp;
                <svg id="legend"></svg>
                &nbsp;&nbsp;
                [ <span id="highestValue"></span> <span id="highestLabel"> : Highest</span> ]
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                [ <span id="meanLabel"> Mean : </span> <span id="mean"></span> ]
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">

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
            file : "<?php echo $path; ?>/cartogram/data/gdpgrowthrate.csv",
            name:"Europe GDP Growth Rate",
            id:"GDPGR",
            key:"GDPGR%d",
            availableDates : ["2004","2005","2006","2007","2008","2009","2010","2011","2012","2013","2014"]
            },
            {
            file : "<?php echo $path; ?>/cartogram/data/tourism.csv",
            name : "Tourism",
            id:"TOUR",
            key : "TOUR%d",
            availableDates : ["2004","2005","2006","2007","2008","2009","2010","2011"]
            },
            {
            file : "<?php echo $path; ?>/cartogram/data/unemploymentRate.csv",
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
        mapJson : "<?php echo $path; ?>/cartogram/data/europe.json"
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

        document.getElementById("imgPlay").src = "<?php echo $path; ?>/cartogram/img/play_a.png";
        document.getElementById("imgPause").src = "<?php echo $path; ?>/cartogram/img/pause.png";
    }

    function stop() {
        clearTimeout(playTimeout);
        playTimeout = null;

        document.getElementById("imgPlay").src = "<?php echo $path; ?>/cartogram/img/play.png";
        document.getElementById("imgPause").src = "<?php echo $path; ?>/cartogram/img/pause_a.png";
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
</script>
<script type="text/javascript" src="<?php echo $path; ?>/cartogram/packed.js"></script>