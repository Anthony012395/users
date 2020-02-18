<?php

session_start();

if(!isset($_SESSION['username']) || !isset($_SESSION['userid']) || !isset($_SESSION['usertypeid'])){

    header('Location: ../../../users/index.php');
    exit;

}else{
    if($_SESSION['usertypeid']  ==  5){

        if(isset($_POST['userid'])){

            $userid =   $_POST['userid'];

            require_once    "../../database/dbconnect.php";
            include_once    "userclass.php";
            
            $delete =   new USER();
            $result =   $delete->deleteusers($userid);

            $_SESSION['alerts'] =   $result;
            
            echo    $userid;
            
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