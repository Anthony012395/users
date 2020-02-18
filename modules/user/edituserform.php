<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <?php

    session_start();

    if(!isset($_SESSION['username']) || !isset($_SESSION['userid']) || !isset($_SESSION['usertypeid'])){

        header('Location: ../../../users/index.php');
        exit;

    }else{

        if($_SESSION['usertypeid']  ==  5){

            if(isset($_GET['id'])){

                $userid =   $_GET['id'];

                require_once    "../../../users/database/dbconnect.php";
                include_once    "userclass.php";

                $edit   =   new USER();
                $result =   $edit->loaduser($userid);

                foreach($result as  $key=>$res){

                    $result2    =   $edit->loadrole($userid);

                    foreach($result2    as  $key=>$res2){

    ?>

    <div class="container mt-5 shadow">
            <div class="row mt-5"></div>
            <div class="page-header display-4">EDIT USER</div>
            <hr />
            <form action="edituser.php" method="POST">
                <div class="row mt-2">
                    <div class="col">
                        <input type="text" name="username" id="username" class="form-control" autocomplete="off" value="<?php   echo $res['username'];   ?>">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <input type="password" name="password" id="password" class="form-control" autocomplete="off" value="<?php   echo $res['password'];   ?>">
                        <input type="text" name="oldpassword" id="oldpassword" class="form-control" autocomplete="off" value="<?php   echo $res['password'];   ?>" hidden>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <input type="text" name="userid" id="userid" class="form-control" autocomplete="off" value="<?php   echo $res['userid'];   ?>" readonly>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                    <select name="usertypeid" id="usertypeid" class="btn btn-block btn-primary" data-toggle="dropdown">
                        <?php      

                            if($res2['usertypeid'] == 1){

                        ?>
                        <option value="1">User</option>
                        <option value="5">Admin</option>
                        <?php
                            }elseif($res2['usertypeid'] == 5){
                        ?>
                        <option value="5">Admin</option>
                        <option value="1">User</option>                        
                        <?php
                            }
                        ?>
                    </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                            <input type="submit" id="submit" name="submit" class="btn btn-block btn-success" value="DONE">
                    </div>
                </div>

            </form>
            <div class="row mt-3">
            </div>
    </div>
    <div class="container">
        <div class="row mt-3 float-right">
            <a href="../../../users/index.php" class="btn btn-block btn-warning text-white">BACK TO HOMEPAGE</a>
        </div>
    </div>

    <?php
                    }
                }
            }

        }else{
            
            header('Location: ../../../users/homepage.php');
            exit;

        }
    }

    ?>
</body>
</html>