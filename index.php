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
<style>
body{background: #202522;margin:0;padding:0;}
.loginpanel
{
    width:17%;
    height:35%;
    color:#608060;
    margin:6%;
    float:left;
    background:#303532;
    box-shadow: 5px 5px 10px 5px #407142;
    border: 1px solid black;
    border-radius:5px;
    padding:2%;
}
h1
{
margin:0 auto;
color:#a0d0a0;
font-family: "Lucida Console", "Courier New", monospace;
}
h3
{
    margin:2% auto;
}
input
{
width:100%;
height:33px;
background:#407142;
}
input[type='submit']
{
    text-transform:uppercase;
    cursor:pointer;
    border-style: solid;
    border-color: #407142;
    border-width: 2px;
    border-radius:5px;
    background: none;
    text-align:center;
    color:#a0d0a0;
}
.registerpanel
{
    width:17%;
    height:53%;
    color:#608060;
    margin:6%;
    float:right;
    background:#303532;
    box-shadow: 5px 5px 10px 5px #407142;
    border: 1px solid black;
    border-radius:5px;
    padding:2%;
}

</style>
</head>
<body>

<div class="Loginpanel">
<h1>LOGIN</h1></br>
<form id="loginform" action="login.php" method="post">
   <center> <h3>Login:</br></h3>
    <input type="text" name="login" /></br>
    <h3>Password:</br></h3>
    <input type="password" name="pass" /></br></br>
    <input type="submit" value="Login in" name="loginin"></br></br>
    <?php
    if(isset($_SESSION['error']))	echo $_SESSION['error'];
    ?></center>
</form>
</div>
<div class="registerpanel">
<h1>REGISTER</h1></br>
<form action="register.php" method="post">
 <center>   <h3>Login:</h3><input type="text" name="loginr" /></br>
    <h3>Email:</h3><input type="text" name="email" /></br>
    <h3>Password:</h3><input type="password" name="pass1" /></br>
    <h3>Password again:</h3><input type="password" name="pass2" /></br>
</br>
    <input type="submit" value="Register" name="register"></br></br>
    <?php
    if(isset($_SESSION['r_error'])){	
    echo $_SESSION['r_error'];}
    ?>
    </center>
</form>
    </div>
</body>
</html>
