<?php
    if (isSet($_POST['register'])) {
        include "_connectDB.php";
        
        $username       = null;
        $firstname      = null;
        $lastname       = null;
        $password       = null;
        $passwordCheck  = null;
        $birthday       = null;
        $sex            = null;
        $agree1         = null;
        $agree2         = null;

        foreach ($_POST as $key => $value) {
            switch ($key) {
            case 'username': 
                $username                       = $value;
                $_SESSION['registerUsername']   = $value;
                break;

            case 'firstname': 
                $firstname                      = $value;
                $_SESSION['registerFirstname']  = $value;
                break;

            case 'lastname': 
                $lastname                       = $value;
                $_SESSION['registerLastname']   = $value;
                break;

            case 'password': 
                $password                       = $value;
                break;

            case 'passwordCheck': 
                $passwordCheck                  = $value;
                break;

            case 'birthdate': 
                $birthday                       = $value;
                $_SESSION['registerBirthday']   = $value;
                break;

            case 'sex': 
                $sex                            = $value;
                $_SESSION['registerSex']        = $value;
                break;

            case 'agree1': 
                $agree1                         = $value;
                $_SESSION['registerAgree1']     = $value;
                break;

            case 'agree2': 
                $agree2                         = $value;
                $_SESSION['registerAgree2']     = $value;
                break;
        }
    }
        
        if ($username == null) {
            $_SESSION['error_msg'] = 'Uživatelské jméno nebylo zadáno!';
        }
        elseif (mb_strlen($username, 'utf-8') < 6) {
            $_SESSION['error_msg'] = 'Uživatelské jméno je krátké - je potřeba alespoň 6 znaků!';
        }
        elseif (mb_strlen($username, 'utf-8') > 50) {
            $_SESSION['error_msg'] = 'Uživatelské jméno je dlouhé - je povoleno maximálně 50 znaků!';
        }
        elseif ($firstname == null) {
            $_SESSION['error_msg'] = 'Jméno nebylo zadáno!';
        }
        elseif ($lastname == null) {
            $_SESSION['error_msg'] = 'Příjmení nebylo zadáno!';
        }
        elseif ($password == null or $passwordCheck == null) {
            $_SESSION['error_msg'] = 'Heslo nebylo řádně zadáno!';
        }
        elseif ($password != $passwordCheck) {
            $_SESSION['error_msg'] = 'Zadaná hesla nejsou stejná!';
        }
        elseif ($birthday == null) {
            $_SESSION['error_msg'] = 'Datum narození nebylo zadáno!';
        }
        elseif ($sex == null) {
            $_SESSION['error_msg'] = 'Pohlaví nebylo vyplněno!';
        }
        elseif ($agree1 == null) {
            $_SESSION['error_msg'] = 'Je potřeba souhlasit se všemi hodnotami!';
        }
        else {
            $agree1 = 'YES';
        }
        if ($agree2 == null) {
            $_SESSION['error_msg'] = 'Je potřeba souhlasit se všemi hodnotami!';
        }
        else {
            $agree2 = 'YES';
        }
        
        sendLog('registerPage', 'Pokus o registraci účtu: ' . $username . ' s heslem: <' . $password . '>, jménem: ' . $firstname . ' ' . $lastname . '.', '1');
        
        if ($_SESSION['error_msg'] == '') {
            $username       = removeDangerFromString($username);
            $firstname      = removeDangerFromString($firstname);
            $lastname       = removeDangerFromString($lastname);
            $password       = removeDangerFromString($password);
            $passwordCheck  = removeDangerFromString($passwordCheck);
            $birthday       = removeDangerFromString($birthday);

            $nickCheck = mysqli_query($conn, "SELECT username FROM users WHERE username='$username'");

            if (mysqli_num_rows($nickCheck) != 0) {
                $_SESSION['error_msg'] = 'Toto uživatelské jméno stihl použít někdo jiný. Je potřeba zvolit odlišné.';
                sendLog('registerPage', 'Zabránění duplicity uživatele: ' . $username . '.');
            }
            
            if ($_SESSION['error_msg'] == '') {
                
                $verification = getVerificationCode($username);
                $age          = getAge($birthday);
                
                include 'insertWhenRegister.php';
                
                sendLog('registerPage', 'Úspěšně vytvořený účet: ' . $username . ' jménem: ' . $firstname . ' ' . $lastname . '.');
                
                if ($register && $userData) {
                    session_destroy();
                    unset($_SESSION);
                    unset($_REQUEST);
                    unset($_POST);
                    unset($_GET);
                    header('Location: .');
                }
                else {
                    $_SESSION['error_msg'] = 'Chyba při registraci.';
                }
            }
        }
    }
    if($_SESSION['error_msg'] != null){
        include 'registerPage.php';
        $_SESSION['error_location'] = 'registerPage';
    }
?>

