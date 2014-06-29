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
	var path = "<?php echo $path; ?>";
</script>