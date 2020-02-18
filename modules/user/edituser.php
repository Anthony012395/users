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
            $oldpassword = $_POST['oldpassword'];

            if($usertypeid  ==  5){
                $usertype   =   "admin";
            }else{
                $usertype   =   "user";
            }

            if($password    ==   $oldpassword){
                $password   =   $password;
            }else{
                $password   =   password_hash($password,    PASSWORD_DEFAULT);
            }

            require_once    "../../../users/database/dbconnect.php";
            include_once    "userclass.php";

            $edit   =   new USER();
            $result =   $edit->edituser($userid, $username, $password, $usertypeid, $usertype);

            $_SESSION['alerts'] =   $result;

            header('Location: ../../../users/homepage.php');
            
        }else{

            header('Location: ../../../users/index.php');
            exit;

        }

    }else{

        header('Location: ../../../users/homepage.php');
        exit;

    }
}

?>