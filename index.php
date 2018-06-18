<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Youtube Rating</title>
	<link rel="stylesheet" href="src/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</head>
<body>
<div id="top"></div>
<div id="header"><h1><a href="index.php">YOUTUBE RATİNG</a></h1></div>
<div class="clearfix"></div>
<div id="content">
<?php 
include("function.php");
$halktv = curl_connect("https://www.youtube.com/live_stats?v=P9ycOH30mGA");
$haberturk = curl_connect("https://www.youtube.com/live_stats?v=iYY4F4EbWLc");
$cnn = curl_connect("https://www.youtube.com/live_stats?v=-NL7pzKDxPU");
$star = curl_connect("https://www.youtube.com/live_stats?v=jWP3ntl64I4");
$tgrt = curl_connect("https://www.youtube.com/live_stats?v=lA7_Dmm64M4");
$ntv = curl_connect("https://www.youtube.com/live_stats?v=JZ8QhI0pz1A");
$trthaber = curl_connect("https://www.youtube.com/live_stats?v=J71x3jhnK-U");
?>
<div class="left">
	<ul>
		<li><img src="src/img/cnn.png" alt="cnn"></li>
		<li><img src="src/img/haberturk.png" alt="haberturk"></li>
		<li><img src="src/img/halktv.png" alt="halktv"></li>
		<li><img src="src/img/ntv.png" alt="ntv"></li>
		<li><img src="src/img/startv.png" alt="startv"></li>
		<li><img src="src/img/trt-haber.png" alt="trt haber"></li>
		<li><img src="src/img/tgrt-haber.png" alt="tgrt-haber"></li>
	</ul>
</div>
<div class="right">
	<div id="chartContainer" style="height: 100%; width: 100%;"></div>
</div>

</div>
<div id="footer"> <a href="www.mehmetalidemiroglu.com">Demiroğlu</a></div>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script>
window.onload = function () {
var options = {
theme:"light1",	
animationEnabled: true,
animationDuration: 2000,
backgroundColor: "#eee",
	data: [{
		type: "column",
		yValueFormatString: "#,###",
        indexLabel: "{y}",
      	color: "#cc181e",
		dataPoints: [
			{ label: "CNN",  y: <?php echo $cnn;?>  },
			{ label: "HABERTÜRK", y: <?php echo $haberturk;?>  },
			{ label: "HALKTV", y: <?php echo $halktv;?>  },
			{ label: "NTV",  y: <?php echo $ntv;?>  },
			{ label: "STARTV",  y: <?php echo $star;?>  },
			{ label: "TRT HABER",  y: <?php echo $trthaber;?>  },
			{ label: "TGRT HABER",  y: <?php echo $tgrt;?>  }
		]
	}]
};
$("#chartContainer").CanvasJSChart(options);

function updateChart() {
	var performance, deltaY, yVal;
	var dps = options.data[0].dataPoints;
	for (var i = 0; i < dps.length; i++) {
		deltaY = Math.round(2 + Math.random() * (-2 - 2));
		yVal = deltaY + dps[i].y > 0 ? dps[i].y + deltaY : 0;
		dps[i].y = yVal;
	}
	options.data[0].dataPoints = dps;
	$("#chartContainer").CanvasJSChart().render();
};
updateChart();
setInterval(function () { 
	updateChart() 
}, 500);
}
</script>
</body>
</html>