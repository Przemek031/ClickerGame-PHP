<?php

$connect= mysqli_connect('localhost', 'root', '', 'clicker');
if ($connect->connect_errno!=0)
	{
		echo "Error: ".$connect->connect_errno;
	}
	else
	{
        if (isset($_POST['getpoint']))
        {
        $queryaboutpoints="SELECT points,perclick FROM data WHERE user='admin';";
        $resultpoint=mysqli_query($connect, $queryaboutpoints);
        $tab=mysqli_fetch_row($resultpoint);
        $perclick = $tab[1];
        $points = $tab[0] + $perclick;
        $query="UPDATE data SET points=$points WHERE user='admin';";
        $results=mysqli_query($connect, $query);
        mysqli_close($connect);
        header('Location: index.php');
        }else if (isset($_POST['Upgrade1']))
        {
            $queryaboutpoints="SELECT points,perclick FROM data WHERE user='admin';";
            $resultpoint=mysqli_query($connect, $queryaboutpoints);
            $tab=mysqli_fetch_row($resultpoint);
            $perclick = $tab[1] + 1;
            $points = $tab[0] - 50;
            $query="UPDATE data SET points=$points, perclick= $perclick WHERE user='admin';";
            $results=mysqli_query($connect, $query);
            mysqli_close($connect);
            header('Location: index.php');
        }else if (isset($_POST['Upgrade2']))
        {
            $queryaboutpoints="SELECT points,perclick FROM data WHERE user='admin';";
            $resultpoint=mysqli_query($connect, $queryaboutpoints);
            $tab=mysqli_fetch_row($resultpoint);
            $perclick = $tab[1] + 5;
            $points = $tab[0] - 150;
            $query="UPDATE data SET points=$points, perclick= $perclick WHERE user='admin';";
            $results=mysqli_query($connect, $query);
            mysqli_close($connect);
            header('Location: index.php');
        }else if (isset($_POST['Upgrade3']))
        {
            $queryaboutpoints="SELECT points,perclick FROM data WHERE user='admin';";
            $resultpoint=mysqli_query($connect, $queryaboutpoints);
            $tab=mysqli_fetch_row($resultpoint);
            $perclick = $tab[1] + 10;
            $points = $tab[0] - 500;
            $query="UPDATE data SET points=$points, perclick= $perclick WHERE user='admin';";
            $results=mysqli_query($connect, $query);
            mysqli_close($connect);
            header('Location: index.php');
        }
        header('Location: index.php');
    }
?>