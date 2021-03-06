<?php
    if (isSet($_POST['login'])) {

        $username = null;
        $password = null;
        
        foreach ($_POST as $key => $value) {
            switch ($key) {
                case 'username':
                    $username                   = $value;
                    $_SESSION['loginUsername']  = $value;
                    break;

                case 'password':
                    $password                   = $value;
                    break;
            }
        }
        
        if ($username != '#sys#' && $username != 'host') {
            if ($username == null) {$_SESSION['error_msg'] = 'Uživatelské jméno nevyplněno!';}
            if ($password == null) {$_SESSION['error_msg'] = 'Heslo nevyplněno!';}
            
            if ($_SESSION['error_msg'] == '') {
                include '_connectDB.php';
                $username   = removeDangerFromString($username);
                $password   = removeDangerFromString($password);
                $queryLog   = "SELECT * FROM users WHERE username = '$username';";
                $query      = mysqli_query($conn, $queryLog);

                if (mysqli_num_rows($query) == 0) {
                    $_SESSION['error_msg'] = 'Uživatelské jméno < ' . $username . ' > nebylo registrováno.';
                    sendLog('loginPage', 'Pokus o přihlášení na účet: ' . $username . '.', '1');
                }

                if ($_SESSION['error_msg'] == '') {
                    $row = mysqli_fetch_assoc($query);
                    
                    if ($password == $row['password']) {
                        $id = $row['id'];
                        $queryLog2  = "SELECT teamId FROM userdata WHERE id = '$id';";
                        $query2     = mysqli_query($conn, $queryLog2);
                        $row2       = mysqli_fetch_assoc($query2);
                        
                        $_SESSION['user']       = $row;
                        $_SESSION['username']   = $username;
			$_SESSION['userID']	= $id;
			$_SESSION['userTeamID']	= $row2['teamId'];
                        $_SESSION['loggedin']   = 1;

                        $get = mysqli_query($conn, "SELECT * FROM userdata WHERE username = '$username';");
                        $numbRes = mysqli_fetch_assoc($get);

                        $_SESSION['userdata'] = $numbRes;

                        $numbWrg = $numbRes['weblogins'];
                        $nL = $numbWrg + 1;
                        
                        $nR = checkRank($nL);
                        $nB = getRankPrice($nR);
                        
                        $upd = "UPDATE userdata SET weblogins = '$nL', rank = '$nR', rank_percent_bonus = '$nB' WHERE username = '$username';";
                        $query = mysqli_query($conn, $upd);
                        
                        sendLog('loginPage', 'Uživatel: ' . $username . ' se úspěšně přihlásil.');

                        header('Location: .');
                    }
                    else {
                        $_SESSION['error_msg'] = 'Špatné heslo!';
                        sendLog('loginPage', 'Pokus o přihlášení na účet: ' . $username . ' s heslem: <' . $password . '>.', '1');
                    }
                }
            }
        }
        else {
            if ($username == '#sys#') {
                $_SESSION['loggedin']   = 1;
                $_SESSION['admin']      = 1;
                $_SESSION['username']   = 'Admin';
                
                sendLog('loginPage', 'Přihlášení na admina.', '1');
            }
            if ($username == 'host') {
                $_SESSION['loggedin']   = 1;
                $_SESSION['username']   = 'Host';
                
                sendLog('loginPage', 'Přihlášení na hosta.');
            }
            header('Location: .');
        }
    }
    if ($_SESSION['error_msg'] != null) {
        include 'loginPage.php';
        $_SESSION['error_location'] = 'loginPage';
    }
