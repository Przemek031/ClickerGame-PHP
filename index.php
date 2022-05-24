<?php

	session_start();
	
	if ((isset($_SESSION['loged'])) && ($_SESSION['loged']==true))
	{
		header('Location: game.php');
		exit();
	}

?>
<html>
<head>
<meta charset="utf-8" />
<title>Clicker Game</title>
</head>
<body>
<h1>Login</h1>
<form action="login.php" method="post">
    Login:<input type="text" name="login" /></br>
    Password:<input type="password" name="pass" /></br>
    <input type="submit" value="Login in" name="loginin">
    <?php
    if(isset($_SESSION['error']))	echo $_SESSION['error'];
    ?>
</form>
<h1>Register</h1>
<form action="register.php" method="post">
    Login:<input type="text" name="loginr" /></br>
    <?php
    if(isset($_SESSION['e_login'])){	
    echo $_SESSION['e_login'];echo"</br>";}
    ?>
    Email:<input type="text" name="email" /></br>
    <?php
    if(isset($_SESSION['e_email'])){	
    echo $_SESSION['e_email'];echo"</br>";}
    ?>
    Password:<input type="password" name="pass1" /></br>
    Password again:<input type="password" name="pass2" /></br>
    <?php
    if(isset($_SESSION['e_pass'])){	
    echo $_SESSION['e_pass'];echo"</br>";}
    ?>
    <input type="submit" value="Register" name="register">
</form>
</body>
</html>
