<html>
	<head>
		<meta content="width=device-width, initial-scale=.5" name="viewport" />
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<style>
		.wrap { width: 600px; height: 480px; padding: 0; overflow: hidden; display:inline-block; text-align:left; margin-left:10px; margin-right:10px; margin-top:20px; }
		iframe { width: 921px; height: 640px; border: 1px solid black; background-color:white; border-radius: 20px; margin:0; padding:0; }
		iframe {
			-ms-zoom: 0.75;
			-moz-transform: scale(0.65);
			-moz-transform-origin: 0 0;
			-o-transform: scale(0.65);
			-o-transform-origin: 0 0;
			-webkit-transform: scale(0.65);
			-webkit-transform-origin: 0 0;
		}
		.list {
			width:100%;
			margin:0 auto;
			text-align:center;
			position:relative;
		}
		html, body {
			background-color:#212121;
			min-width:620px;
		}
		* {
			font-family:'Open Sans',sans-serif,Helvetica;
		}
		a {
			font-size:45px;
			color:#BBB;
			width:100%;
			padding-left:10px;
			transition:color 200ms;
			transition:padding-left 200ms;
			text-decoration:none;
		}
		a:hover {
			padding-left:40px;
			color:white;
		}
		p {
			color:white;
			width:100%;
			text-align:center;
			font-size:60px;
			margin-bottom:0px;
		}
		</style>
	</head>
	<body>
		<p>
			The Lab Index
		</p>
		<div class="list">
		<?php
			$dir = scandir('.');
			foreach($dir as $w) {
				if($w[0] != '0') continue;
				echo '<div class="wrap"><a href="'.$w.'">Lab '.$w.'</a>';
				echo '<iframe src="'.$w.'"></iframe></div>';
			}
		?>
		</div>
	</body>
</html>
