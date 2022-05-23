<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Clicker game PHP</title>
</head>
<body>
<?php
$connect= mysqli_connect('localhost', 'root', '', 'clicker');
$query="SELECT user,points,perclick FROM data;";
$results=mysqli_query($connect, $query);
$tab=mysqli_fetch_row($results);
$points = $tab[1];
echo "Player: $tab[0], Have $tab[1] Points and $tab[2] per click";
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
if ($points < 150) 
{
 echo ' <input type="submit" name="Upgrade2" value="Upgrade 2 (150 Points)" disabled/>';
}else 
{
 echo '<input type="submit" name="Upgrade2" value="Upgrade 2 (150 Points)"/>';
}
if ($points < 500) 
{
 echo ' <input type="submit" name="Upgrade3" value="Upgrade 3 (500 Points)" disabled/>';
}else 
{
 echo '<input type="submit" name="Upgrade3" value="Upgrade 3 (500 Points)"/>';
}
?>


</form>

<?php
mysqli_close($connect);
?>
</body>
</html>