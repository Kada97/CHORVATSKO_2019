<?php
    if (isSet($_POST['addNewTeam'])) {
        $name           = null;
        $numbMembers    = null;
        $color          = null;

        foreach ($_POST as $key => $value) {
            switch ($key) {
                case 'name':            $name                               = $value; 
                                        $_SESSION['addTeamName']            = $value;   break;
                                    
                case 'color':           $color                              = $value; 
                                        $_SESSION['addTeamColor']           = $value;   break;
                                    
                case 'numbMembers':     $numbMembers                        = $value; 
                                        $_SESSION['addTeamNumbMembers']     = $value;   break;
            }
        }
        
        if ($name == null) {
            $_SESSION['error_msg'] = 'Jméno týmu nezadáno!';
        }
        if ($color == null) {
            $_SESSION['error_msg'] = 'Barva nezadána!';
        }
        if ($numbMembers == null) {
            $_SESSION['error_msg'] = 'Počet členů nezadán!';
        }
        if ($_SESSION['error_msg'] == '') {

            include '_connectDB.php';
            mysqli_query($conn, "SET NAMES utf8");

            $name   = removeDangerFromString($name);
            $color  = removeDangerFromString($color);
            
            $nameCheck  = mysqli_query($conn, "SELECT name FROM teams WHERE name='$name'");
            $colorCheck = mysqli_query($conn, "SELECT color FROM teams WHERE color ='$color'");

            if (mysqli_num_rows($nameCheck) != 0) {
                $_SESSION['error_msg'] = 'Tento tým již existuje. Zvol jiný název!';
            }
            if (mysqli_num_rows($colorCheck) != 0) {
                $_SESSION['error_msg'] = 'Tuto barvu již někdo využívá, zvol prosím jinou!';
            }
            
            if ($_SESSION['error_msg'] == '') {
                $createThread = mysqli_query($conn, "INSERT INTO teams(color,name,numb_members)
                                                 VALUES('$color','$name','$numbMembers');") or die(mysqli_error($conn));
                if ($createThread) {
                    $_SESSION['addTeamName']            = '';
                    $_SESSION['addTeamColor']           = '';
                    $_SESSION['addTeamNumbMembers']     = '';
                    
                    $teamData = mysqli_query($conn, "INSERT INTO teamdata() VALUES();") or die(mysqli_error($conn));
                    $teamData = mysqli_query($conn, "INSERT INTO data_team_kolik(team) VALUES('$name');") or die(mysqli_error($conn));
                    
//                    $numberRowCheckQuery  = mysqli_query($conn, "SELECT id FROM teams;");
//                    $teamNumber = mysqli_num_rows($numberRowCheckQuery);
//                    $teamNumber++;
//                    
//                    $columnName = 'team_';
//                    $columnName.=$teamNumber;
                    $addColumnTeam = mysqli_query($conn, "ALTER TABLE data_team_games ADD `$name` DECIMAL(20,2) NOT NULL;") or die(mysqli_error($conn));
                    
                    
                    
                    echo("<meta http-equiv='refresh' content='0'>");
                } else {
                    $_SESSION['error_msg'] = 'Chyba při vytváření!';
                }
            }
        }
    }
    if($_SESSION['error_msg'] != null){
        include 'addNewTeamPage.php';
        $_SESSION['error_location'] = 'addNewTeamPage';
    }
?>

