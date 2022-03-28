<?php
	
	session_start();
	session_unset();
	session_destroy();
	
	header("Location: ../view/login.html");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Logout</title>
</head>
<body>

	<a href="../view/login.html"></a>

</body>
</html>