<?php

	session_start();
	
	if (!isset($_SESSION['loged']))
	{
		header('Location: index.php');
		exit();
	}
	

    $connect= mysqli_connect('localhost', 'root', '', 'clicker');

if ($connect->connect_errno!=0)
	{
		echo "Error: ".$connect->connect_errno;
	}
	else
	{
        $user=($_SESSION['user']);
        if (isset($_POST['getpoint']))
        { 
        $queryaboutpoints="SELECT points,perclick FROM data WHERE user='$user';";
        $resultpoint=mysqli_query($connect, $queryaboutpoints);
        $tab=mysqli_fetch_row($resultpoint);
        $perclick = $tab[1];
        $points = $tab[0] + $perclick;
        $query="UPDATE data SET points=$points WHERE user='$user';";
        $results=mysqli_query($connect, $query);
        mysqli_close($connect);
        header('Location: game.php');
        }else if (isset($_POST['Upgrade1']))
        {
            $queryaboutpoints="SELECT points,perclick FROM data WHERE user='$user';";
            $resultpoint=mysqli_query($connect, $queryaboutpoints);
            $tab=mysqli_fetch_row($resultpoint);
            $perclick = $tab[1] + 1;
            $points = $tab[0] - 50;
            if ($points >= 0)
            {
            $query="UPDATE data SET points=$points, perclick= $perclick WHERE user='$user';";
            $results=mysqli_query($connect, $query);
            mysqli_close($connect);
            header('Location: game.php');
            }
        }







        header('Location: index.php');
    }
?>