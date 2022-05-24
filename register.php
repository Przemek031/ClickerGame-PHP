<?php

	session_start();
	if ((!isset($_POST['loginr'])) || (!isset($_POST['pass1'])) || (!isset($_POST['pass2'])) || (!isset($_POST['email'])) )
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
            if ((isset($_POST['loginr'])) && (isset($_POST['pass1'])) && (isset($_POST['pass2'])) && (isset($_POST['email'])))
        {
            $login = $_POST['loginr'];
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];
            $email = $_POST['email'];
            if ((strlen($login)<3) || (strlen($login)>20))
            {
                $_SESSION['e_login']="Login must be 3 to 20 characters long";
                header('Location: index.php');
            }else
            {
            $querylogin="SELECT id FROM data WHERE user='$login';";
            $result=mysqli_query($connect,$querylogin);
            $tablog=mysqli_fetch_row($result);
            if (!empty($tablog[0]))
            {
                $_SESSION['e_login']="This login is already taken";
                header('Location: index.php');
            }else
            {
                unset($_SESSION['e_login']);
                $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
                if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
                {
                $_SESSION['e_email']="Enter valid E-mail";
                header('Location: index.php');
                }else{
                    unset($_SESSION['e_email']);
                    if ((strlen($pass1)<8) || (strlen($pass1)>20))
                    {$_SESSION['e_pass']="Password must be 8 to 20 characters long";
                        header('Location: index.php');
                    }else{
                        if ($pass1!=$pass2){
                            $_SESSION['e_pass']="Password don't match";
                            header('Location: index.php');
                        }else
                        {
                            unset($_SESSION['e_pass']);
                            $queryregister="INSERT INTO data (user,mail,pass,points,perclick) VALUES ('$login','$email','$pass1','0','1')";
                            $resultregister=mysqli_query($connect,$queryregister);
                            if(!$resultregister)
                            {
                            $_SESSION['e_pass']="Account creation ERROR";
                            }
                            else
                            {
                            $_SESSION['e_pass']="Successful account creation";
                            header('Location: index.php');
                            }
                        }	
                    }
                    

            
                }
            }
        }
        }

            mysqli_close($connect);
        }