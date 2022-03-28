<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>customer Profile</title>
</head>
<body>

	<?php 
		
		$id = "";
		$fname = "";
		$lname = "";
		$username = "";

		
		if (isset($_GET['username'])) {
			$username = $_GET['username'];
			$handle = fopen("customer.json", "r");
			$fr = fread($handle, filesize("customer.json"));
			$arr1 = json_decode($fr);
			$fc = fclose($handle);

			for ($i = 0; $i < count($arr1); $i++) {
				if ($username == $arr1[$i]->username) {
					$fname = $arr1[$i]->fname;
					$lname = $arr1[$i]->lname;
					$username = $arr1[$i]->username;

					echo $fname;
					echo $lname;
					echo $username;
				}
			}
		}
		else {
			die("Invalid Request");
		}
	?>

</body>
</html>