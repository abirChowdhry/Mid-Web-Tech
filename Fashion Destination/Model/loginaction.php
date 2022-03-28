<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>

	<?php

		function test($data)	
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}		
	
		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{

			$username = test($_POST['username']);
			$password = test($_POST['pass']);

			if (empty($username) || empty($password)) 
			{
					echo "Fill up the form properly";
					echo "<br>";
					echo "Go back to Login Page and Try again with valid username or password";
					?>
					<br><br>
					<a href="../controller/Login.php">Login Page</a>
					<br>
					<?php
					

			}
			else
			{			

				$handle = fopen("customer.json", "r");
				$fr = fread($handle, filesize("customer.json"));
				$arr1 = json_decode($fr);	
					

				for ($i=0; $i < count($arr1) ; $i++) 
				{ 
					if(($username == $arr1[$i]->username) && $password == $arr1[$i]->pass)			
					{
						$_SESSION['username'] = $username;
						echo "Successfull login";
                        header("Location: ../controller/CustomerHomePage.php");
					}
					else
					{ 
						$_SESSION['error_message'] = "Login Failed!";
						
					}
				}		
			}
		}
		else
		{
			echo "Can not process GET REQUEST METHOD";
		}
	?>
</body>
</html>