<?php

class   DATABASE_CONNECT    { 

    private    $_servername =   "localhost";
    private    $_username   =   "root";
    private    $_password   =   "";
    private    $_database   =   "login";

    protected  $connection;

    function    __construct(){

        if(!isset($this->connection)){

            $this->connection   =   new mysqli($this->_servername,   $this->_username,    $this->_password,    $this->_database);

            if(!$this->connection){

                echo    "Cannot connect to the database!";
                exit;

            }
        }

        return  $this->connection;

    }

}

?>