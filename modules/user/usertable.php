<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container   mt-2">
        <div class="row mt-2">
            <div class="col">
                <table class="table table-striped table-hover text-center mt-5 border" id="userstable">
                    <tr>
                        <th>UserId</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th colspan=2>Action</th>
                    </tr>
                    <?php

                        require_once    "database/dbconnect.php";
                        include_once    "userclass.php";

                        $user   =   new USER();
                        $result =   $user->getusers();

                        foreach($result as  $key=>$res){

                            $result2    =   $user->getroles($res['userid']);

                            foreach($result2    as  $key=>$res2){

                                echo    "<tr>";
                                echo    "<td>"  .   $res['userid']      .   "</td>";
                                echo    "<td>"  .   $res['username']    .   "</td>";
                                echo    "<td>"  .   $res['password']    .   "</td>";

                                if($res2['usertypeid'] == 5){
                                    echo    "<td><strong>"  .   $res2['usertype']   .   "</strong></td>";
                                }else{
                                    echo    "<td>"  .   $res2['usertype']   .   "</td>";
                                }


                                if($_SESSION['usertypeid'] == 5){
                                    echo    "<td><a href='' value='".$res['userid']."' class='btn btn-block btn-danger text-white deleteuser'>Delete</a></td>";
                                    echo    "<td><a href='modules/user/edituserform.php?id=".$res['userid']."' class='btn btn-block btn-primary text-white'>Edit</a></td>";
                                }else{
                                    echo    "<td>-</td>";
                                }
                                
                                echo    "</tr>";

                            }

                        }

                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>