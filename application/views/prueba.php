<!DOCTYPE html>
<html>
<head>
	<title>Soy una vista</title>
</head>
<body>
	<h3>Hola mundo 2</h3>

	<?php
		echo "Param1: " . $param1 . "<br/>";
		echo "Param2: " . $param2 . "<br/>";

		echo "Param3: <pre>";
		print_r($param3);
		echo "</pre>";
	?>
</body>
</html>