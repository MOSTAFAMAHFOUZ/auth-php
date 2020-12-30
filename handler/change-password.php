<?php 
session_start();
require_once('../inc/db.php');
$error = [];

if(isset($_POST['submit']))
{
    
    $old_password = filter_var($_POST['old_password'], FILTER_SANITIZE_STRING);
    $new_password = filter_var($_POST['new_password'], FILTER_SANITIZE_STRING);
    $confirm_password = filter_var($_POST['confirm_password'], FILTER_SANITIZE_STRING);


    $sql = "SELECT * FROM users WHERE email=? ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_SESSION['user_email']]);
    $data = $stmt->fetchObject();
    if($data)
    {
        $check = password_verify($old_password,$data->password);
        if($check)
        {
            if($new_password===$confirm_password)
            {
                $change_password = password_hash(filter_var($new_password, FILTER_SANITIZE_STRING), PASSWORD_DEFAULT );
                $sql = "UPDATE users SET password=? WHERE email=? ";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$change_password,$_SESSION['user_email']]);
                header("Location:../show-data.php");
            }
            else 
            {
                echo "Passwords Not The Same";
            }
        }
        else 
        {
            echo "Data Not Correct";
        }
    }
    else 
    {
        echo "Not Exist";
    }

}


