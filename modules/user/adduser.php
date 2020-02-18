
<?php

    session_start();

    if(!isset($_SESSION['username']) || !isset($_SESSION['userid']) || !isset($_SESSION['usertypeid'])){

        header('Location: ../../../users/index.php');
        exit;

    }else{
        if($_SESSION['usertypeid']  ==  5){

            if(isset($_POST['submit'])){

                $username   =   $_POST['username'];
                $password   =   $_POST['password'];
                $userid     =   $_POST['userid'];
                $usertypeid =   $_POST['usertypeid'];
    
                if($usertypeid == 5){
                    $usertype   =   "admin";
                }else{
                    $usertype   =   "user";
                }
    
                require_once    "../../database/dbconnect.php";
                include_once    "userclass.php";
    
                $add    =   new USER();
                $result =   $add->addusers($username,   $password,  $userid,    $usertypeid,    $usertype);
    
    
                $_SESSION['alerts'] =   $result;
                header('Location: ../../../users/homepage.php');
    
            }else{
                header('Location: ../../../users/index.php');
            }

        }else{

            header('Location: ../../../users/homepage.php');
            exit;

        }
    }

?>