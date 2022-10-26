<?php
    if(isset($_POST["submit"])){
        
        // variables
        $name = $_POST["name"];
        $email = $_POST["email"];
        $usernameid = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $pwdRepeat = $_POST["pwdrepeat"];
        $usersType = $_POST["usersType"];
        
        require_once '../dBconn/connect.php';
        require_once 'function-inc.php';
        
        // error handlers
        if(emptyInputSignup($name, $email, $usernameid, $pwd, $pwdRepeat) !== false){
            header("location: ../admin_signup.php?error=emptyinput");
            exit();
        }
        if(InvalidUid($usernameid) !== false){
            header("location: ../admin_signup.php?error=Invaliduid");
            exit();
        }
        if(InvalidEmail($email) !== false){
            header("location: ../admin_signup.php?error=InvalidEmail");
            exit();
        }
        if(pwdMatch($pwd, $pwdRepeat) !== false){
            header("location: ../admin_signup.php?error=Passwordsdontmatch");
            exit();
        }
        if(uidExists($iconn, $usernameid, $email) !== false){
            header("location: ../admin_signup.php?error=usernametaken");
            exit();
        }
        
        // users create
        createUser($iconn, $name, $email, $usernameid, $pwd, $usersType);
        
        
    }else{
        header("location: ../admin_signup.php");
        exit();
        }
