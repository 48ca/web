<html>
	<head>
	</head>
	<body>
		<ol>
		<?php
			$dir = scandir('.');
			foreach($dir as $w) {
				if($w[0] != '0') continue;
				echo '<li><a href="'.$w.'">Lab '.$w.'</a></li>';
			}
		?>
		</ol>
	</body>
</html>
