<?php


    class   USER extends DATABASE_CONNECT   {

        function    getusers(){

            $sql    =   "select * from users";
            $rows   =   array();
            $result =   $this->connection->query($sql);

            if(mysqli_num_rows($this->connection->query($sql))  >   0){

                while($row  =   $result->fetch_assoc()){

                    $rows[] =   $row;

                }

            }

            return  $rows;

        }

        function    getroles($userid){

            // $sql    =   "select * from roles where userid=$userid";
            // $rows   =   array();
            // $result =   $this->connection->query($sql);
            $stmt   =   $this->connection->prepare("select * from roles where userid=?");
            $stmt->bind_param("i",$userid);
            $stmt->execute();
            $result =   $stmt->get_result();
            $rows   =   array();

            if(mysqli_num_rows($result)  >   0){

                while($row  =   $result->fetch_assoc()){

                    $rows[] =   $row;

                }

            }

            return  $rows;
            $stmt->close();

        }

        function    validateusers($username, $userid){

            //$sql        =   "select * from users where username='$username' or userid='$userid'";
            $stmt   =   $this->connection->prepare("select * from users where username=? or userid=?");
            $stmt->bind_param("si",$username,$userid);
            $stmt->execute();
            $result =   $stmt->get_result();

            if(mysqli_num_rows($result) > 0){

                return  false;
                $stmt->close();

            }else{

                return  true;
                $stmt->close();

            }

        }

        function    addusers($username, $password,  $userid,    $usertypeid, $usertype){

            if($username == ""  or  $password == "" or $userid == "" or $usertypeid == ""){

                return  "PLEASE FILL OUT ALL FIELDS!";

            }else{
                $password   =   password_hash($password,    PASSWORD_DEFAULT);

                if($this->validateusers($username, $userid) === true){

                    $stmt   =   $this->connection->prepare("insert into users(username, password,  userid)values(?,?,?)");
                    $stmt->bind_param("sss", $username, $password, $userid);
                    $stmt2  =   $this->connection->prepare("insert into roles(userid, usertypeid, usertype)values(?,?,?)");
                    $stmt2->bind_param("sis", $userid, $usertypeid, $usertype);

                    if($stmt->execute() === TRUE && $stmt2->execute() === TRUE){

                        return  "USER ADDED SUCCESSFULLY!";


                    }else{

                        return  "FAILED TO ADD USER!";

                    }

                    $stmt->close();
                    $stmt2->close();

                }elseif($this->validateusers($username, $userid) === false){
    
                    return  "USERNAME / USERID ALREADY EXISTS!";
    
                }
            }

        }

        function    deleteusers($userid){

            // $sql    =   "delete from users where userid=$userid";
            // $sql2   =   "delete from roles where userid=$userid";
            $stmt   =   $this->connection->prepare("delete from users where userid=?");
            $stmt->bind_param("i",$userid);
            $stmt2  =   $this->connection->prepare("delete from roles where userid=?");
            $stmt2->bind_param("i",$userid);

            if($stmt->execute()   === TRUE    &&  $stmt2->execute() === TRUE){

                return  "USER SUCCESSFULLY DELETED!";

            }else{

                return  "FAILED TO DELETE USER!";

            }

            $stmt->close();
            $stmt2->close();

        }

        function    loaduser($userid){

            // $sql    =   "select * from users where userid=$userid";
            // $rows   =   array();
            // $result =   $this->connection->query($sql);
            $stmt   =   $this->connection->prepare("select * from users where userid=?");
            $stmt->bind_param("i",$userid);
            $stmt->execute();
            $result =   $stmt->get_result();
            $rows   =   array();

            if(mysqli_num_rows($result)  >   0){

                while($row  =   $result->fetch_assoc()){

                    $rows[] =   $row;

                }

            }

            return  $rows;
            $stmt->close();

        }

        function    loadrole($userid){

            // $sql    =   "select * from roles where userid=$userid";
            // $rows   =   array();
            // $result =   $this->connection->query($sql);
            $stmt   =   $this->connection->prepare("select * from roles where userid=?");
            $stmt->bind_param("i",$userid);
            $stmt->execute();
            $result =   $stmt->get_result();
            $rows   =   array();

            if(mysqli_num_rows($result)   >   0){

                while($row  =   $result->fetch_assoc()){

                    $rows[] =   $row;

                }

            }

            return  $rows;
            $stmt->close();

        }
        function    validateedit($username, $userid){

            // $sql        =   "select * from users where username='$username' && userid<>$userid";
            $stmt   =   $this->connection->prepare("select * from users where username=? && userid<>?");
            $stmt->bind_param("si",$username,$userid);
            $stmt->execute();
            $result =   $stmt->get_result();

            if(mysqli_num_rows($result) > 0){

                return  false;

            }else{

                return  true;

            }

            $stmt->close();

        }

        function    edituser($userid,   $username,  $password, $usertypeid,    $usertype){

            if($this->validateedit($username,$userid) === TRUE){

                $stmt   =   $this->connection->prepare("update users set username=?, password=? where userid=?");
                $stmt->bind_param("sss",$username,$password,$userid);
                $stmt2  =   $this->connection->prepare("update roles set usertypeid=?, usertype=? where userid=?");
                $stmt2->bind_param("iss",$usertypeid,$usertype,$userid);

                if($stmt->execute() === TRUE    &&  $stmt2->execute()   === TRUE){

                    return  "USER UPDATED SUCCESSFULLY!";

                }else{

                    return  "FAILED TO EDIT USER!";

                }

            }else{

                return  "USERNAME ALREADY TAKEN!";

            }

        }

    }


?>