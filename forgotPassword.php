<?php

    if (isSet($_POST['forgPassword'])) {
 
        $username   = null;
        $birthdate  = null;
        
        foreach ($_POST as $key => $value) {
            switch ($key) {
                case 'username':
                    $username                           = $value; 
                    $_SESSION['forgotPasswordUsername'] = $value; break;
                                
                case 'birthdate':
                    $birthdate                           = $value; 
                    $_SESSION['forgotPasswordBirthdate'] = $value; break;
            }
        }
        
        if ($username == null) {
            $_SESSION['error_msg'] = 'Uživatelské jméno nezadáno!';
        }
        if ($birthdate == null) {
            $_SESSION['error_msg'] = 'Datum narození nezadáno!';
        }
        
        if ($_SESSION['error_msg'] == "") {
            include "_connectDB.php";
            mysqli_query($conn, "SET NAMES utf8");
            
            $username   = removeDangerFromString($username);
            
            $usernameCheck  = mysqli_query($conn, "SELECT username FROM users WHERE username ='$username';");
            $birthdateCheck  = mysqli_query($conn, "SELECT birthdate FROM users WHERE birthdate ='$birthdate';");

            sendLog('forgotPasswordPage', 'Někdo žádá nebo zneužil o pomoc či reset hesla.');
            
            if (mysqli_num_rows($usernameCheck) == 0) {
                $_SESSION['error_msg'] = 'Toto uživatelské jméno zatím neexistuje!';
            }
            if (mysqli_num_rows($birthdateCheck) == 0) {
                $_SESSION['error_msg'] = 'S tímto datem narození zde nikdo není!';
            }
            if ($_SESSION['error_msg'] == ''){
                
                $queryLog   = "SELECT * FROM users WHERE "
                            . "username = '$username' AND "
                            . "birthdate = '$birthdate';";
                        
                $query      = mysqli_query($conn, $queryLog);
            
                if(mysqli_num_rows($query) == 0){
                    $_SESSION['error_msg'] = 'Uživatel s těmito daty neexistuje!';
                }

                if($_SESSION['error_msg'] == ""){
                    $row = mysqli_fetch_assoc($query);
                    $id = $row['id'];
                    $sql = "UPDATE users SET needhelp ='PLEASE HELP' WHERE id='".$id."';";
                    $query = mysqli_query($conn, $sql);
                    
                    if ($query) {
                        session_destroy();
                        session_start();
                        header("Location: .");
                    } else {
                        $_SESSION['error_msg'] = "Chyba při vyplňování žádosti";
                    } 
                }
            }
        }
    }
    if($_SESSION['error_msg'] != ''){
        include 'forgotPasswordPage.php';
        $_SESSION['error_location'] = 'forgotPasswordPage';
    }
?>
