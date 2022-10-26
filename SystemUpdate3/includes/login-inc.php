<?php

    if(isset($_POST["submit"])){
        
        // variables
        $usernameid = $_POST["uid"];
        $pwd = $_POST["pwd"];
        
        require_once '../dBconn/connect.php';
        require_once 'function-inc.php';
        
        // error handler
        if(emptyInputLogin($usernameid, $pwd) !== false){
            header("location: ../login.php?error=emptyinput");
            exit();
        }
        
        loginUser($iconn, $usernameid, $pwd);
        
    }else{
        header("location: ../login.php");
        exit();
    }
