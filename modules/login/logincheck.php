<?php

    if(isset($_POST['submit'])){

        if(isset($_POST['username']) && isset($_POST['password'])){

            include_once    "loginclass.php";

            $username   =   $_POST['username'];
            $password   =   $_POST['password'];

            $login      =   new LOGIN();
            $result     =   $login->checklogin($username,   $password);

            if($result  ==  1){

                $users  =   $login->checkuser($username);

                foreach($users  as  $key=>$res){

                    $users2 =   $login->checkrole($res['userid']);

                    foreach($users2 as $key=>$res2){

                        session_start();

                        $_SESSION['username']   =   $res['username'];
                        $_SESSION['userid']     =   $res['userid'];
                        $_SESSION['usertype']   =   $res2['usertype'];
                        $_SESSION['usertypeid'] =   $res2['usertypeid'];

                        header('Location: ../../homepage.php');
                    }

                }

            }else{

                header  ('Location: ../../index.php');
                exit;

            }

        }
    }

?>