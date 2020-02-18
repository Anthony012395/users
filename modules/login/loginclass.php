<?php
    require_once    "../../database/dbconnect.php";

    class LOGIN extends DATABASE_CONNECT {

        // function    checkuser($username,    $password){

            // $sql    =   "select * from users where username='$username' && password='$password'";
            // $result =   $this->connection->query($sql);

            // return  $result;

        // }

        // function    checkrole($userid){

            // $sql    =   "select * from roles where userid=$userid";
            // $result =   $this->connection->query($sql);

            // return  $result;

        // }

        // function    checklogin($username,   $password){

            // $result =   $this->checkuser($username, $password);

            // if(mysqli_num_rows($result) > 0){

                // return  1;

            // }else{

                // return  2;

            // }

        // }

        function    checkuser($username){

            //$sql    =   "select * from users where username='$username'";
            //$result =   $this->connection->query($sql);
            $stmt   =   $this->connection->prepare("select * from users where username=?");
            $stmt->bind_param("s",$username);
            $stmt->execute();

            $result =   $stmt->get_result();

            return  $result;

            $stmt->close();

        }

        function    checkrole($userid){

            //$sql    =   "select * from roles where userid=$userid";
            //$result =   $this->connection->query($sql);
            $stmt   =   $this->connection->prepare("select * from roles where userid=?");
            $stmt->bind_param("i",$userid);
            $stmt->execute();

            $result =   $stmt->get_result();

            return  $result;

            $stmt->close();

        }

        function    checklogin($username,   $password){

            $result =   $this->checkuser($username);

            if(mysqli_num_rows($result) > 0){

                foreach($result as $key=>$res){

                    $_password   =   $res['password'];

                    if(password_verify($password, $_password) == 1){
                        return  1;
                    }else{
                        return  2;
                    }

                }

            }else{

                return  3;

            }

        }

    }

?>