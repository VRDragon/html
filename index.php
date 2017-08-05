<!DOCTYPE html>
<!--TheFreeElectron 2015, http://www.instructables.com/member/TheFreeElectron/ -->

<html>
    <head>
        <meta charset="utf-8" />
        <title>FORLED PANEL</title>
    </head>
 
    <body style="background-color: black;">
    <!-- On/Off button's picture -->
	<?php
	$page = $_SERVER['PHP_SELF'];
	$sec = "10";
	header("Refresh: $sec; url=$page");
	$val_array = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
	//this php script generate the first page in function of the file
	for ( $i= 0; $i<24; $i++) {
		$d = $i;
	if ($i > 16) $d=$i+4;
		//set the pin's mode to output and read them
		system("gpio mode ".$d." out");
		exec ("gpio read ".$d, $val_array[$d], $return );
	}
	//for loop to read the value
	$i =0;
	for ($i = 0; $i < 24; $i++) {
		$d =$i;
		if ($i > 16) $d=$i+4;
		if ($val_array[$d][0] == 0 ) {
			echo ("<img id='button_".$d."' src='data/img/red/red_".$d.".jpg' onclick='change_pin (".$d.");'/>");
		}
		//if on
		if ($val_array[$d][0] == 1 ) {
			echo ("<img id='button_".$d."' src='data/img/green/green_".$d.".jpg' onclick='change_pin (".$d.");'/>");
		}	 
	}
	?>
	 
	<!-- javascript -->
	<script src="script.js"></script>
    </body>
</html>