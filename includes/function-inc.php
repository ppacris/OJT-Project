<?php

    function emptyInputSignup($name, $email, $usernameid, $pwd, $pwdRepeat){
        $result;
        
        if(empty($name) || empty($email) || empty($usernameid) || empty($pwd) || empty($pwdRepeat)){ // checking for empty input
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }


    function InvalidUid($usernameid){
        $result;
        
        if(!preg_match('/^[a-zA-Z0-9]*$/', $usernameid)){ // search algorithm
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function InvalidEmail($email){
        $result;
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ // checking for correct format of email
             $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function pwdMatch($pwd, $pwdRepeat){
        $result;
        
        if($pwd !== $pwdRepeat){ // checking for password if match
             $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function uidExists($iconn, $usernameid, $email){
        $sql = "SELECT * FROM users WHERE usersUsername = ? OR usersEmail = ?;"; // sql statement, ? = placeholder
        $stmt = mysqli_stmt_init($iconn); // prepared statement
        
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../admin_signup.php?error=stmtfieled");
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "ss", $usernameid, $email); // ss = number of string
        mysqli_stmt_execute($stmt);
        
        $resultData = mysqli_stmt_get_result($stmt);
        
        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else{
            $result = false;
            return $result;
        }
        
        mysqli_stmt_close($stmt);
    }

    function createUser($iconn, $name, $email, $usernameid, $pwd, $usersType){
        $sql = "INSERT INTO users(usersName, usersEmail, usersUsername, usersPassword, usersType) VALUES (?, ?, ?, ?, ?);"; // using prepared statement
        $stmt = mysqli_stmt_init($iconn); // prepared statement
        
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../admin_signup.php?error=stmtfailed");
            exit();
        }
        
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); // hashed password

        
        mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $usernameid, $hashedPwd, $usersType); // sssss = number of string
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../admin_signup.php?error=none");
        exit();
    }

    function emptyInputLogin($usernameid, $pwd){
        $result;
        
        if(empty($usernameid) || empty($pwd)){ // checking for empty input
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }
           
    function loginUser($iconn, $usernameid, $pwd){
        $uidExists = uidExists($iconn, $usernameid, $usernameid);
            
        if($uidExists == false){
            header("location: ../login.php?error=wronglogin");
            exit();
        }
    
        $Pwdhashed = $uidExists["usersPassword"];
        $checkPwd = password_verify($pwd, $Pwdhashed);
        
        if($checkPwd == false){
            header("location: ../login.php?error=wronglogin");
            exit();
        }
        else if($checkPwd == true){
            
            session_start();
            $_SESSION["userid"] = $uidExists["usersID"];
            $_SESSION["useruid"] = $uidExists["usersUsername"];
            $_SESSION["username"] = $uidExists["usersName"];
            
            if($uidExists['usersType'] == 'admin'){
                header('location: ../admin_header.php');
                exit();
            }
            elseif($uidExists['usersType'] == 'staff'){
                header('location: ../staff_page.php');
                exit();
            }
            else{
                header('location: ../SystemUpdate3/login.php');
                exit();
            }
        }
    }
