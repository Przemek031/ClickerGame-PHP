<?php

	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['pass'])))
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
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            $query="SELECT user,pass FROM data WHERE user='$login';";
            $results=mysqli_query($connect, $query);
            $tab=mysqli_fetch_row($results);
            $user = $tab[0];
            if ($user == $login)
            {
                if ($pass == $tab[1])
                {
                    $_SESSION['loged'] = true;
                    $_SESSION['user'] = $tab[0];
                    header('Location: game.php');
                    unset($_SESSION['error']);
                    mysqli_close($connect);
                }else
                {
                    $_SESSION['error'] = '<span style="color:red">Wrong login or password</span>';
                    header('Location: index.php');
                    mysqli_close($connect);
                }
            }else
            {
                $_SESSION['error'] = '<span style="color:red">Wrong login or password</span>';
                header('Location: index.php');
                mysqli_close($connect);
            }

            mysqli_close($connect);
        }