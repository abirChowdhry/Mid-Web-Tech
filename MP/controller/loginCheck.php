<?php
	session_start();

	if(isset($_POST['submit']))
	{
		$myfile = fopen('../model/userData.json','r');
		$userinfo =fread($myfile, filesize('../model/userData.json'));
		$jsonDocode = json_decode($userinfo,true);

		//for($i=0;$i<count($jsonDocode);$i++)
		//	{$in=print_r("$jsonDocode[$i]");} 
		//$username = $jsonDocode[$in]['username'];
		//$password = $jsonDocode[$in]['password'];

		$username = $jsonDocode[3]['username'];
		$password = $jsonDocode[3]['password'];

		if($username=="" || $password=="")
		{
			echo ("<h2>Username or Password Wrong</h2>");
		}
		else
		{
			//$user =$_SESSION['userinfo'];

			if($username == $_POST['username'] && $password == $_POST['password'])
			{
				$_SESSION['status'] = true;
				header('location: ../view/home.php');
			}
			else{echo ("<h1> Invalid user.</h1>");}
		}
	}
?>