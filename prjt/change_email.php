<?php
    session_start();

    require_once 'config.php';


    if(!isset($_SESSION['user']))
    {
        header('Location:index.php');
        die();
    }

    if(!empty($_POST['current_email']) && !empty($_POST['new_email']) && !empty($_POST['new_email_retype'])){

        $current_email = htmlspecialchars($_POST['current_email']);
        $new_email = htmlspecialchars($_POST['new_email']);
        $new_email_retype = htmlspecialchars($_POST['new_email_retype']);


        $check_email  = $bdd->prepare('SELECT email FROM utilisateurs WHERE token = :token');
        $check_email->execute(array(
            "token" => $_SESSION['user']
        ));
        $data_email = $check_email->fetch();


        if(email_verify($current_email, $check_email))
        {

            if($new_email === $new_email_retype){


                $cost = ['cost' => 12];
                $new_email = email_hash($new_email, email_BCRYPT, $cost);

                $update = $bdd->prepare('UPDATE utilisateurs SET email = :email WHERE token = :token');
                $update->execute(array(
                    "email" => $new_email,
                    "token" => $_SESSION['user']
                ));
                
                header('Location: landing.php?err=success_email');
                die();
            }
        }
        else{
            header('Location: landing.php?err=current_email');
            die();
        }

    }
    else{
        header('Location: <landing.php');
        die();
    }

