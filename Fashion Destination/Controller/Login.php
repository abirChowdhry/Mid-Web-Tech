<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>

<h2> Login </h2>

	<form  action="../model/Loginaction.php" method= "post" novalidate>


    <label for="username">Username :</label>
    <input type="text" id="username" name="username" maxlength="5">

    <br><br>

    <label for="pass">Password :</label>
    <input type="password" id="pass" name="pass">

    <br><br>

   <input type="submit" name="Login" value="Login">

</form>

<br>

<a href="../Views/Registration.html"> Registration</a> 
<a href="../Controller/HomePage.php">Home</a>



</body>
</html>
