<?php
    if (isSet($_POST['addNewGame'])) {
        $name           = null;
        $unit           = null;
//        $time           = null;

        foreach ($_POST as $key => $value) {
            switch ($key) {
                case 'name':            $name                               = $value; break;
                                    
                case 'nameUnit':        $unit                               = $value; break;
                                    
//                case 'openTime':        $time                               = $value; break;
                                    
            }
        }
        
        if ($name == null) {
            $_SESSION['error_msg'] = 'Jméno týmu nezadáno!';
        }
        if ($unit == null) {
            $_SESSION['error_msg'] = 'Jméno jednotky nezadáno!';
        }
//        if ($time == null) {
//            $_SESSION['error_msg'] = 'Čas nebyl zadán!';
//        }
        if ($_SESSION['error_msg'] == '') {

            include '_connectDB.php';
            $name   = removeDangerFromString($name);
            
            $nameCheck  = mysqli_query($conn, "SELECT name FROM data_user_games WHERE name='$name'");

            if (mysqli_num_rows($nameCheck) != 0) {
                $_SESSION['error_msg'] = 'Tato hra již existuje. Zvol jiný název!';
            }
            
            if ($_SESSION['error_msg'] == '') {
                $createThread = mysqli_query($conn, "INSERT INTO data_user_games(name,unit) VALUES('$name','$unit');") or die(mysqli_error($conn));
                if ($createThread) {
                    $_SESSION['addGameName'] = '';
                    
                    $recordsData = mysqli_query($conn, "INSERT INTO data_game_best_score(gamename,unit) VALUES('$name','$unit');") or die(mysqli_error($conn));
                    
                    
                    $tablename = 'ig_data_'.$name;
                    $sqlDataGame = "CREATE TABLE `$tablename` (
                            id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            idUser INT(11) NOT NULL,
                            idUserTeam INT(11) NOT NULL,
                            username VARCHAR(75) NOT NULL,
                            money_balance DECIMAL(20,2) NOT NULL DEFAULT '0',
                            money_won DECIMAL(20,2) NOT NULL DEFAULT '0',
                            money_lost DECIMAL(20,2) NOT NULL DEFAULT '0',
                            money_bet DECIMAL(20,2) NOT NULL DEFAULT '0',
                            games_total INT(11) NOT NULL DEFAULT '0',
                            games_won INT(11) NOT NULL DEFAULT '0',
                            games_lost INT(11) NOT NULL DEFAULT '0',
                            games_draw INT(11) NOT NULL DEFAULT '0',
                            last_played TIMESTAMP on update CURRENT_TIMESTAMP NULL DEFAULT NULL)";
                    
                    $queryDataDame = mysqli_multi_query($conn,$sqlDataGame);
                    
                    if ($queryDataDame) {
                    
                        $userRows = array();
                        $sqlGetUsers = "SELECT id, username, teamId FROM userdata";
                        $queryGetUsers = mysqli_query($conn, $sqlGetUsers);
                        while ($resultGetUsers = mysqli_fetch_assoc($queryGetUsers)) {
                            $userRows[] = $resultGetUsers;
                        }

                        for ($i = 0; $i <count($userRows); $i++){
                            $temp = $userRows[$i];
                            $username = $temp['username'];
                            $id = $temp['id'];
                            $teamId = $temp['teamId'];

                            $fillDataGame = mysqli_query($conn, "INSERT INTO $tablename (idUser,idUserTeam,username) VALUES('$id','$teamId','$username');") or die(mysqli_error($conn));
                        }

                    }
                    echo mysqli_error($conn);
                                        
                    //echo("<meta http-equiv='refresh' content='0'>");
                } else {
                    $_SESSION['error_msg'] = 'Chyba při vytváření!';
                }
            }
        }
    }
    if($_SESSION['error_msg'] != null){
        include 'addNewIndividualGamePage.php';
        $_SESSION['error_location'] = 'addNewIndividualGame';
    }
?>

