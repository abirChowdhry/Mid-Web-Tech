<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
</head>
<body>
	
<?php	
    
if ($_SERVER["REQUEST_METHOD"] == "POST") 
		
{

		function test($data) {
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$fname = test($_POST['fname']);
		$lname = test($_POST['lname']);
		$username = test($_POST['username']);
		$pass = test($_POST['pass']);
		$conpass = test($_POST['conpass']);


	$fnameerr = $lnameerr = $usernameerr = $passerr = $conpasserr = $matcherr = "";


	if (empty($_POST["fname"])) 
	{
	$fnameerr = "First Name Required!";
	echo $fnameerr;
	}

	else if (empty($_POST["lname"]))
		{
	$lnameerr = "Last Name Required!";
	echo $lnameerr;
	}

	else if(empty($_POST["username"]))
	{
	$usernameerr = "Username Required!";
	echo $usernameerr;
	}

	else if(empty($_POST["pass"]))
	{
	$passerr = "Password Required!";
	echo $passerr;
	}

	else if(empty($_POST["conpass"]))
	{
	$conpasserr = "Confirm Password Required!";
	echo $conpasserr;
	}

	else if(($_POST["conpass"]) !== ($_POST["pass"]))
	{
	$matcherr = "Password & Confirm Password Doesn't Match!";
	echo $matcherr;
	}
}
else 
	{
		echo "No valid request";
	}
	$handle = fopen("customer.json", "r");
	$fr = fread($handle, filesize("customer.json"));
	$arr1 = json_decode($fr);
	$lastIndex = count($arr1);
	$fc = fclose($handle);
	

	$handle = fopen("customer.json", "w");
	$data = array('id' => $lastIndex + 1, 'fname' => $fname, 'lname' => $lname, 'username' => $username, 'pass' => $pass);
	
	if ($arr1 == NULL) {
		$data = array($data);
		$data = json_encode($data);
	}
	else
		{
		$arr1[] = $data;
		$data = json_encode($arr1);
	}

		$fw = fwrite($handle, $data);
		$fc = fclose($handle);

		if ($fw)
		{
			echo "Successfully Registered";
		}

    ?>

    <br><br>
	<a href="../Views/Registration.html">Go Back</a>
	<br><br>


</body>
</html>