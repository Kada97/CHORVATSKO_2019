<?php

        $id             = null;
        $username       = null;
        $password       = null;
        $verification   = null;
        $firstname      = null;
        $lastname       = null;
        $birthdate      = null;
        $sex            = null;
        $age            = null;
        $needhelp       = null;
        $team           = null;
        
        $_SESSION['editUserId']             = null;
        $_SESSION['editUserUsername']       = null;
        $_SESSION['editUserPassword']       = null;
        $_SESSION['editUserVerification']   = null;
        $_SESSION['editUserFirstname']      = null;
        $_SESSION['editUserLastname']       = null;
        $_SESSION['editUserBirthdate']      = null;
        $_SESSION['editUserSex']            = null;
        $_SESSION['editUserAge']            = null;
        $_SESSION['editUserNeedhelp']       = null;
        $_SESSION['editUserTeam']           = null;
        
        
        foreach ($_POST as $key => $value) {
            switch ($key) {
                case 'IDQuestion': $id = $value;break;
            }
        }
        

        include "_connectDB.php";
        mysqli_query($conn, "SET NAMES utf8");

        $query = mysqli_query($conn, "SELECT * FROM users WHERE id ='" . $id. "';");
        $res = mysqli_fetch_assoc($query);
        
        $username       = $res["username"];
        $password       = $res["password"];
        $verification   = $res["verification"];
        $firstname      = $res["firstname"];
        $lastname       = $res["lastname"];
        $birthdate      = $res["birthdate"];
        $sex            = $res["sex"];
        $age            = $res["age"];
        $needhelp       = $res["needhelp"];
        
        $query = mysqli_query($conn, "SELECT team_id FROM userdata WHERE id ='" . $id. "';");
        $res = mysqli_fetch_assoc($query);
        
        $team = $res["team_id"];
        
        
        $teamCheck = mysqli_query($conn, "SELECT * FROM teams WHERE id='".$team."';");
        $resTeam = mysqli_fetch_assoc($teamCheck);
        $nV = $resTeam['numb_registered']-1;
        $upd = "UPDATE teams SET numb_registered = '".$nV."' WHERE id='".$team."';";
        $query = mysqli_query($conn, $upd);
        
        $_SESSION['editUserId']             = $id;
        $_SESSION['editUserUsername']       = $username;
        $_SESSION['editUserPassword']       = $password;
        $_SESSION['editUserVerification']   = $verification;
        $_SESSION['editUserFirstname']      = $firstname;
        $_SESSION['editUserLastname']       = $lastname;
        $_SESSION['editUserBirthdate']      = $birthdate;
        $_SESSION['editUserSex']            = $sex;
        $_SESSION['editUserAge']            = $age;
        $_SESSION['editUserNeedhelp']       = $needhelp;
        $_SESSION['editUserTeam']           = $team;
        
        include 'editUserPageSet.php';

?>

