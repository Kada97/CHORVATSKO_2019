<?php

    if (isSet($_POST['addKolikResult'])) {
        $addKolikResultsUserId      = array();
        $addKolikResultsUserTeamId  = array();
        $addKolikResultsUsername    = array();
        $addKolikResultsUkradeno    = array();
        $addKolikResultsUkradenoOrg = array();
        $addKolikResultsUchraneno   = array();
        $addKolikResultsKolikTeam   = array();
        $addKolikResultsTresty      = array();
        $addKolikResultsIsLost      = array();
        $archEnemy                  = array();

        foreach($_POST['userId'] as $myarray) {
            $addKolikResultsUserId[] = $myarray;
        }
        foreach($_POST['userteam'] as $myarray) {
            $addKolikResultsUserTeamId[] = $myarray;
        }
        foreach($_POST['username'] as $myarray) {
            $addKolikResultsUsername[] = $myarray;
        }
        foreach($_POST['addKolikResultsUkradeno'] as $value) {
            $get = null;
            $get = $value;
            $state = 'false';
            if ($get != 0 || $get != '0') {
                $state = 'true';
            }
            $addKolikResultsUkradeno[] = $state;
        }
        foreach($_POST['addKolikResultsUkradenoOrg'] as $value) {
            $get = null;
            $get = $value;
            $state = 'false';
            if ($get != 0 || $get != '0') {
                $state = 'true';
            }
            $addKolikResultsUkradenoOrg[] = $state;
        }
        foreach($_POST['addKolikResultsUchraneno'] as $key => $value) {
            $get = null;
            $get = $value;
            $state = 'false';
            if ($get != 0 || $get != '0') {
                $state = 'true';
            }
            $addKolikResultsUchraneno[] = $state;
        }
        foreach($_POST['addKolikResultsKolikTeam'] as $key => $value) {
            $get = null;
            $get = $value;
            $state = 'false';
            if ($get != 0 || $get != '0') {
                $state = 'true';
            }
            $addKolikResultsKolikTeam[] = $value;
        }
        foreach($_POST['addKolikResultsTresty'] as $key => $value) {
            $get = null;
            $get = $value;
            $state = 'false';
            if ($get != 0 || $get != '0') {
                $state = 'true';
            }
            $addKolikResultsTresty[] = $state;
        }

        include '_connectDB.php';
        
        $sqlGetArchEnemy = "SELECT arch_enemy_team FROM data_team_kolik;";
        $getArchEnemyQuery = mysqli_query($conn, $sqlGetArchEnemy);

        while($getArchEnemyResult = mysqli_fetch_assoc($getArchEnemyQuery)){
            $archEnemy[] = $getArchEnemyResult['arch_enemy_team'];
        } 
        
        $numberTeams = array_unique($addKolikResultsUserTeamId);
        for ($i=1; $i <=count($numberTeams);$i++){
            $addKolikResultsIsLost[] = $i;
        }
            
        for ($i=0; $i <count($addKolikResultsUserId);$i++){
            $userSqlSetBase     = "UPDATE data_user_kolik SET ";
            $userSqlSetAppend   = "";
            $userUpdate         = false;
            
            if ($addKolikResultsUkradeno[$i] == 'true') {
                $whoStelt = $addKolikResultsUserTeamId[$i];
                $myArchEnemy = $archEnemy[$whoStelt-1];
                $whoLostKolik = $addKolikResultsKolikTeam[$i];
                if ($myArchEnemy == $whoLostKolik){
                    $userSqlSetAppend .= "total_captured_points = total_captured_points+2";
                } else {
                    $userSqlSetAppend .= "total_captured_points = total_captured_points+1";
                }
                $userUpdate = true;
            }
            if ($addKolikResultsUkradenoOrg[$i] == 'true') {
                if ($userUpdate) {$userSqlSetAppend .= ', ';}
                $userSqlSetAppend .= "total_captured_points_org = total_captured_points_org+1";
                $userUpdate = true;
            }
            if ($addKolikResultsUchraneno[$i] == 'true') {
                if ($userUpdate) {$userSqlSetAppend .= ', ';}
                $userSqlSetAppend .= "total_saved_points = total_saved_points+1";
                $userUpdate = true;
            }
            if ($addKolikResultsTresty[$i] == 'true') {
                if ($userUpdate) {$userSqlSetAppend .= ', ';}
                $userSqlSetAppend .= "total_points_penalty = total_points_penalty+1";
                $userUpdate = true;
            }
            if ($userUpdate) {
                $userSqlSetAppend .= " WHERE id = '".$addKolikResultsUserId[$i]."';";
                mysqli_query($conn, $userSqlSetBase . $userSqlSetAppend);
            }
        }      
        
        for ($i=0; $i <count($addKolikResultsUserId);$i++){
            
            if ($addKolikResultsUkradeno[$i] == 'true' || $addKolikResultsUchraneno[$i] == 'true' || $addKolikResultsUkradenoOrg[$i] == 'true') {
                $username = $addKolikResultsUsername[$i];
                $teamId = $addKolikResultsUserTeamId[$i];
                $captured = $addKolikResultsKolikTeam[$i];
                if ($addKolikResultsUkradenoOrg[$i] == 'true') {
                    $captured = 0;
                }
                $logSqlSet = "INSERT INTO log_kolik (username,userteamId,captured_kolik_idTeam) VALUES ('$username','$teamId','$captured');";
            
                $whoStelt = $addKolikResultsUserTeamId[$i];
                $myArchEnemy = $archEnemy[$whoStelt-1];
                $whoLostKolik = $addKolikResultsKolikTeam[$i];
                if ($myArchEnemy == $whoLostKolik){
                    mysqli_query($conn, $logSqlSet);
                }
                mysqli_query($conn, $logSqlSet);
            }
        }
        
        for ($i=0; $i <count($addKolikResultsUserId);$i++){
            $teamSqlSetBase     = "UPDATE data_team_kolik SET ";
            $teamSqlSetAppend   = "";
            $teamUpdate         = false;
            
            if ($addKolikResultsUkradeno[$i] == 'true') {
                $whoStelt = $addKolikResultsUserTeamId[$i];
                $myArchEnemy = $archEnemy[$whoStelt-1];
                $whoLostKolik = $addKolikResultsKolikTeam[$i];
                if ($myArchEnemy == $whoLostKolik){
                    $teamSqlSetAppend .= "total_points_earned = total_points_earned+2";
                } else {
                    $teamSqlSetAppend .= "total_points_earned = total_points_earned+1";
                }
                $teamUpdate = true;
            }
            if ($addKolikResultsUkradenoOrg[$i] == 'true') {
                if ($teamUpdate) {$teamSqlSetAppend .= ', ';}
                $teamSqlSetAppend .= "total_points_earned_org = total_points_earned_org+1";
                $teamUpdate = true;
            }
            if ($addKolikResultsUchraneno[$i] == 'true') {
                $teamId = $addKolikResultsUserTeamId[$i];
                if (in_array($teamId, $addKolikResultsIsLost)) {
                    $addKolikResultsIsLost[$teamId-1] = 0;
                }
                
                if ($teamUpdate) {$teamSqlSetAppend .= ', ';}
                $teamSqlSetAppend .= "total_points_saved = total_points_saved+1";
                $teamUpdate = true;
            }
            if ($addKolikResultsTresty[$i] == 'true') {
                if ($teamUpdate) {$teamSqlSetAppend .= ', ';}
                $teamSqlSetAppend .= "total_points_penalty = total_points_penalty+1";
                $teamUpdate = true;
            }
            if ($teamUpdate) {
                $teamSqlSetAppend .= " WHERE id = '".$addKolikResultsUserTeamId[$i]."';";
                echo $teamSqlSetBase . $teamSqlSetAppend . '<br>';
                mysqli_query($conn, $teamSqlSetBase . $teamSqlSetAppend);
            }
        }
        
        if(count($addKolikResultsIsLost) > 0) {
            for ($i=0; $i <count($addKolikResultsIsLost);$i++){
                if ($addKolikResultsIsLost[$i] != 0) {
                        $lostSql = "UPDATE data_team_kolik SET total_points_lost = total_points_lost+1 WHERE id = '".$addKolikResultsIsLost[$i]."';";
                    mysqli_query($conn, $lostSql);
                }
            }
        }
        
        $numberTeams2 = array_unique($addKolikResultsUserTeamId);
        for ($i=0; $i <count($numberTeams2);$i++){
            $sqlBestProfit = "SELECT username,(total_captured_points+(total_saved_points*2)+(total_captured_points_org*2)-total_points_penalty) as result FROM data_user_kolik WHERE userteamId = '".$numberTeams2[$i]."' ORDER BY result DESC LIMIT 0,1;";
            $queryBestProfitFirstUser   = mysqli_query($conn,$sqlBestProfit);
            $resultBestProfitFirstUser  = mysqli_fetch_array($queryBestProfitFirstUser);
            
            $bestUsername = ($resultBestProfitFirstUser[0] == null ? 'n/a' : $resultBestProfitFirstUser[0]. ' (score: ' . $resultBestProfitFirstUser[1] . ')');
        
            $balanceAndBestSql = "UPDATE data_team_kolik SET total_points_balance = total_points_earned+(total_points_saved*2)+(total_points_earned_org*2)-(total_points_lost*2)-total_points_penalty, best_player = '".$bestUsername."' WHERE id = '".$numberTeams2[$i]."';";
            mysqli_query($conn, $balanceAndBestSql);
        }
        
    }
