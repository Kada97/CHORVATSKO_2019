<?php
    if (isSet($_POST['forgUsernameGet'])) {

        $firstname      = null;
        $lastname       = null;
        $birthdate      = null;

        foreach ($_POST as $key => $value) {
            switch ($key) {
                case 'firstname':
                    $firstname                              = $value; 
                    $_SESSION['forgotUsernameFirstname']    = $value; break;
                                
                case 'lastname':
                    $lastname                               = $value; 
                    $_SESSION['forgotUsernameLastname']     = $value; break;
                                
                case 'birthdate':
                    $birthdate                              = $value; 
                    $_SESSION['forgotUsernameBirthdate']    = $value; break;
            }
        }
        
        if ($firstname == null) {
            $_SESSION['error_msg'] = 'Jméno nebylo zadáno!';
        }
        if ($lastname == null) {
            $_SESSION['error_msg'] = 'Příjmení nebylo zadáno!';
        }
        if ($birthdate == null) {
            $_SESSION['error_msg'] = 'Datum narození nebylo zadáno!';
        }
        
        if ($_SESSION['error_msg'] == '') {
            include '_connectDB.php';
            $firstname = removeDangerFromString($firstname);
            $lastname = removeDangerFromString($lastname);
            
            $firstnameCheck = mysqli_query($conn, "SELECT firstname FROM users WHERE firstname ='$firstname';");
            $lastnameCheck = mysqli_query($conn, "SELECT lastname FROM users WHERE lastname ='$lastname';");
            $birthdateCheck = mysqli_query($conn, "SELECT birthdate FROM users WHERE birthdate ='$birthdate';");
            
            sendLog('forgotUsernamePage', 'Někdo se snaží obnovit uživatelské jméno', '1');

            if (mysqli_num_rows($firstnameCheck) == 0) {
                $_SESSION['error_msg'] = 'Toto jméno není vůbec v databázi!';
            }
            if (mysqli_num_rows($lastnameCheck) == 0) {
                $_SESSION['error_msg'] = 'Toto příjmení není vůbec v databázi!';
            }
            if (mysqli_num_rows($birthdateCheck) == 0) {
                $_SESSION['error_msg'] = 'V tenhle datum se nikdo z uživatelů nenarodil!';
            }
            
            if ($_SESSION['error_msg'] == ''){
                $queryLog   = "SELECT * FROM users WHERE "
                            . "firstname = '$firstname' AND "
                            . "lastname = '$lastname' AND "
                            . "birthdate = '$birthdate';";
                $query      = mysqli_query($conn, $queryLog);
            
                if(mysqli_num_rows($query) == 0){
                    $_SESSION['error_msg'] = 'Uživatel s touto kombinací dat neexistuje!';
                    sendLog('forgotUsernamePage', 'Pokus o obnovení s kombinací: [Jméno: ' . $firstname . ' Příjmení: ' . $lastname . 'Datum narození: ' . $birthdate . ']' , '1');
                }

                if($_SESSION['error_msg'] == ''){
                    $row = mysqli_fetch_assoc($query);
                    $accountUsername = $row['username'];
                    include 'resultForgotUsername.php';     
                }
            }
        }
    }
    if($_SESSION['error_msg'] != null){
        include 'forgotUsernamePage.php';
        $_SESSION['error_location'] = 'forgotUsernamePage';
    }
?>
