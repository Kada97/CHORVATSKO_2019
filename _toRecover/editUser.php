<?php
if (isSet($_POST["editUser"])) {
    
    //$username       = null;
    $password       = null;
    $verification   = null;
    $firstname      = null;
    $lastname       = null;
    $birthdate      = null;
    $sex            = null;
    $age            = null;
    $needhelp       = null;
    $team           = null;
    
    //$_SESSION['editUserUsernameNew']       = null;
    $_SESSION['editUserPasswordNew']       = null;
    $_SESSION['editUserVerificationNew']   = null;
    $_SESSION['editUserFirstnameNew']      = null;
    $_SESSION['editUserLastnameNew']       = null;
    $_SESSION['editUserBirthdateNew']      = null;
    $_SESSION['editUserSexNew']            = null;
    $_SESSION['editUserAgeNew']            = null;
    $_SESSION['editUserNeedhelpNew']       = null;
    $_SESSION['editUserTeamNew']           = null;

    foreach ($_POST as $key => $value) {
        switch ($key) {
            
//            case 'editUsername':    $username                           = $value;
//                                        $_SESSION['editUserUsernameNew']    = $value; break;
                                    
            case 'editPassword':    $password                           = $value;
                                        $_SESSION['editUserPasswordNew']    = $value; break;
                                    
            case 'editVerification':$verification                       = $value;
                                        $_SESSION['editUserVerificationNew']= $value; break;
            
            case 'editFirstname':   $firstname                          = $value;
                                        $_SESSION['editUserFirstnameNew']   = $value; break;
            
            case 'editLastname':    $lastname                           = $value;
                                        $_SESSION['editUserLastnameNew']    = $value; break;
            
            case 'editBirthdate':   $birthdate                          = $value;
                                        $_SESSION['editUserBirthdateNew']   = $value; break;
            
            case 'editSex':         $sex                                = $value;
                                        $_SESSION['editUserSexNew']         = $value; break;
            
            case 'editAge':         $age                                = $value;
                                        $_SESSION['editUserAgeNew']         = $value; break;
            
            case 'editNeedhelp':    $needhelp                           = $value;
                                        $_SESSION['editUserNeedhelpNew']    = $value; break;
            
            case 'editTeam':    $team                           = $value;
                                        $_SESSION['editUserTeamNew']    = $value; break;
        }
    }

//    if ($username == null) {
//        $_SESSION['error_msg'] = "Nové uživatelské jméno není vyplněno";
//    }
    if ($password == null) {
        $_SESSION['error_msg'] = "Nové heslo není vyplněno";
    }
    if ($verification == null) {
        $_SESSION['error_msg'] = "Nový ověřovací kód není vyplněn";
    }
    if ($firstname == null) {
        $_SESSION['error_msg'] = "Nové jméno není vyplněno";
    }
    if ($lastname == null) {
        $_SESSION['error_msg'] = "Nové příjmení není vyplněno";
    }
    if ($birthdate == null) {
        $_SESSION['error_msg'] = "Nový datum narození není vyplněno";
    }
    if ($sex == null) {
        $_SESSION['error_msg'] = "Nové pohlaví není vyplněno";
    }
    if ($age == null) {
        $_SESSION['error_msg'] = "Nový věk není vyplněn";
    }
    if ($needhelp == null) {
        $_SESSION['error_msg'] = "Nové informace o pomoci není vyplněna";
    }
    
    
    if ($_SESSION['error_msg'] == "") {
//        $control = 0;
//        if($username == $_SESSION['editUserUsername']){
//            $control = 1;
//        }
        
        //$_SESSION['editUserUsername']       = $username;
        $_SESSION['editUserPassword']       = $password;
        $_SESSION['editUserVerification']   = $verification;
        $_SESSION['editUserFirstname']      = $firstname;
        $_SESSION['editUserLastname']       = $lastname;
        $_SESSION['editUserBirthdate']      = $birthdate;
        $_SESSION['editUserSexNew']         = $sex;
        $_SESSION['editUserAge']            = $age;
        $_SESSION['editUserNeedhelp']       = $needhelp;
        $_SESSION['editUserTeam']           = $team;

        include "_connectDB.php";
        
        //$username = removeDangerFromString($username);
        $password = removeDangerFromString($password);
        $verification = removeDangerFromString($verification);
        $firstname = removeDangerFromString($firstname);
        $lastname = removeDangerFromString($lastname);
        $age = removeDangerFromString($age);
        $needhelp = removeDangerFromString($needhelp);
        

        //$usernameCheck = mysqli_query($conn, "SELECT username FROM users WHERE username='" . $username . "'");
        $teamCheck = mysqli_query($conn, "SELECT * FROM teams WHERE id='".$team."';");
        $resTeam = mysqli_fetch_assoc($teamCheck);
        $nV = $resTeam['numb_registered']+1;
        
//        if (mysqli_num_rows($usernameCheck) > $control) {
//            $_SESSION['error_msg'] = "Toto uživatelské jméno není možné použít!";
//        }
        $teamCheck = mysqli_query($conn, "SELECT * FROM teams;");
        if (mysqli_num_rows($teamCheck) < $team) {
            $_SESSION['error_msg'] = "Tolik týmů ani není!";
        }
        
        if ($_SESSION['error_msg'] == "") {
         
            $upd = "UPDATE users SET "
                    //. "username = '" . $username. "',"
                    . "password = '" . $password. "',"
                    . "firstname = '" . $firstname. "',"
                    . "lastname = '" . $lastname. "',"
                    . "verification = '" . $verification. "',"
                    . "birthdate = '" . $birthdate. "',"
                    . "sex = '" . $sex. "',"
                    . "age = '" . $age. "',"
                    . "needhelp = '" . $needhelp. "'"
                    . " WHERE id='" . $_SESSION['editUserId'] . "';";
            
            $query = mysqli_query($conn, $upd);
            
            $upd = "UPDATE userdata SET team_id = '".$team."' WHERE id='" . $_SESSION['editUserId'] . "';";
            $query = mysqli_query($conn, $upd);
            
            $upd = "UPDATE teams SET numb_registered = '".$nV."' WHERE id='".$team."';";
            $query = mysqli_query($conn, $upd);
            
            
            $_SESSION['editUserId']             = null;
            //$_SESSION['editUserUsername']       = null;
            $_SESSION['editUserPassword']       = null;
            $_SESSION['editUserVerification']   = null;
            $_SESSION['editUserFirstname']      = null;
            $_SESSION['editUserLastname']       = null;
            $_SESSION['editUserBirthdate']      = null;
            $_SESSION['editUserSex']            = null;
            $_SESSION['editUserAge']            = null;
            $_SESSION['editUserNeedhelp']       = null;
            $_SESSION['editUserTeam']           = null;
            //$_SESSION['editUserUsernameNew']       = null;
            $_SESSION['editUserPasswordNew']       = null;
            $_SESSION['editUserVerificationNew']   = null;
            $_SESSION['editUserFirstnameNew']      = null;
            $_SESSION['editUserLastnameNew']       = null;
            $_SESSION['editUserBirthdateNew']      = null;
            $_SESSION['editUserSexNew']            = null;
            $_SESSION['editUserAgeNew']            = null;
            $_SESSION['editUserNeedhelpNew']       = null;
            $_SESSION['editUserTeamNew']           = null;
            
            header("Location: .");
        } else {
            $_SESSION['error_msg'] = "Chyba při změně!";
        }
    }
}



if ($_SESSION['error_msg'] != null) {
    
    include 'editUserPageSet.php';
}
?>

