<?php

	session_start();
	
	if (!isset($_SESSION['loged']))
	{
		header('Location: index.php');
		exit();
	}
	
?>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Clicker game</title>
</head>
<body>
<?php

$connect= mysqli_connect('localhost', 'root', '', 'clicker');
$user=($_SESSION['user']);
$query="SELECT user,points,perclick FROM data WHERE user='$user';";
$results=mysqli_query($connect, $query);
$tab=mysqli_fetch_row($results);
$points = $tab[1];
echo "Player: $tab[0], Have $tab[1] Points and $tab[2] per click </br>";
echo '<p>[<a href="logout.php">Log out</a> ]</p>';
?>
<form action="point.php" method="post">
</br>Press to get the point</br>
<input type="submit" name="getpoint" value="Get The Point"/></br></br>
<?php
if ($points < 50) 
{
 echo ' <input type="submit" name="Upgrade1" value="Upgrade 1 (50 Points)" disabled/>';
}else 
{
 echo '<input type="submit" name="Upgrade1" value="Upgrade 1 (50 Points)"/>';
}

?>


</form>
<table border="1" >
<tr><td>Nr </td><td>User </td><td>Points </td></tr>

<?php
$queryliderboard="SELECT user,points FROM `data` ORDER BY `data`.`points` DESC ";
$r =mysqli_query($connect,$queryliderboard);
$i=0;
while ($liderboard=mysqli_fetch_array($r))
{
$i = $i + 1;
echo '<tr>';
echo "<td>".$i."</td>";
echo "<td>".$liderboard[0]."</td>";
echo "<td>".$liderboard[1]."</td>";
echo '</tr>';
}
mysqli_close($connect);
?>
</table>
</body>
</html>