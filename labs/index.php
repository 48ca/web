<html>
	<head>
		<style>
		.wrap { width: 600px; height: 390px; padding: 0; overflow: hidden; display:inline-block; float:left; }
		iframe { width: 800px; height: 520px; border: 1px solid black; }
		iframe {
			-ms-zoom: 0.75;
			-moz-transform: scale(0.75);
			-moz-transform-origin: 0 0;
			-o-transform: scale(0.75);
			-o-transform-origin: 0 0;
			-webkit-transform: scale(0.75);
			-webkit-transform-origin: 0 0;
		}
		.list {
			position:relative;
		}
		</style>
	</head>
	<body>
		<div class="list">
		<?php
			$dir = scandir('.');
			foreach($dir as $w) {
				if($w[0] != '0') continue;
				echo '<a href="'.$w.'">Lab '.$w.'</a>';
				echo '<div class="wrap"><iframe src="'.$w.'"></iframe></div>';
			}
		?>
		</div>
	</body>
</html>
