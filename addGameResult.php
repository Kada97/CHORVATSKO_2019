<?php


    if (isSet($_POST['addGameResult'])) {
        $addGameName        = null;
        $addGameDatePlayed  = null;
        $addGameTimePlayed  = null;
        $addGamePopularity  = null;
        $addGamePreparation = null;
        $addGameBudget      = null;
        $addGameResults     = array();

        foreach ($_POST as $key => $value) {
            switch ($key) {
                case 'addGameName':         $addGameName        = $value; break;
                case 'addGameDatePlayed':   $addGameDatePlayed  = $value; break;
                case 'addGameTimePlayed':   $addGameTimePlayed  = $value;  break;
                case 'addGamePopularity':   $addGamePopularity  = $value; break;
                case 'addGamePreparation':  $addGamePreparation = $value; break;
                case 'addGameBudget':       $addGameBudget      = $value; break;
                //case 'addGameResults':      $addGameResults[]   = $value; break;
            }
        }

        foreach($_POST['addGameResults'] as $myarray) {
            $addGameResults[] = $myarray;
        }


        if ($_SESSION['error_msg'] == '') {

            include '_connectDB.php';

            $sqlGetTeamNames = "SELECT name FROM teams;";
            $queryGetTeamNames = mysqli_query($conn, $sqlGetTeamNames);


            $teamForSql = "";


            $rows = array();
            while($resultTeamNames = mysqli_fetch_array($queryGetTeamNames)){
                $rows[] = $resultTeamNames;
            }

            foreach($rows as $row) {
                $teamForSql .= ','.$row[0];
            }

            $whenPlayed = $addGameDatePlayed.' '.$addGameTimePlayed.':00';
            $averageResult = 0;
            $iamLastValue = 100;
            $iamFirstValue = 0;
            $iamLastId = 0;
            $iamFirstId = 0;
            $gameResultString = "";
            for ($i = 0; $i < count($addGameResults); $i++){
                
                $id = $i+1;
                
                $averageResult += $addGameResults[$i];
                if ($addGameResults[$i] < $iamLastValue) {
                    $iamLastValue = $addGameResults[$i];
                    $iamLastId = $i+1;
                }
                if ($addGameResults[$i] > $iamFirstValue) {
                    $iamFirstValue = $addGameResults[$i];
                    $iamFirstId = $i+1;
                }
                $gameResultString .= ",'".$addGameResults[$i]."'";
                
                
                $wonMoney = $addGameBudget * $addGameResults[$i] / 100;
                
                $wonMoney10 = $wonMoney / 10;
                $upd = "UPDATE teamdata SET mon_to_div_from_cpt_remains = '".$wonMoney10."' WHERE id='" . $id . "';";
                $query = mysqli_query($conn, $upd);
                
                $selectTeamMoney = "SELECT mon_to_div_from_cg_remains, mon_cg_tot FROM teamdata WHERE id='" . $id . "';";
                $querySelectTeamMoney = mysqli_query($conn, $selectTeamMoney);
                $resultSelectTeamMoney = mysqli_fetch_assoc($querySelectTeamMoney);
                $oldValue = $resultSelectTeamMoney['mon_to_div_from_cg_remains'];
                $cgMoney = $resultSelectTeamMoney['mon_cg_tot'];
                
                $selectTeamSize = "SELECT numb_members FROM teams WHERE id='" . $id . "';";
                $querySelectTeamSize = mysqli_query($conn, $selectTeamSize);
                $resultSelectTeamSize = mysqli_fetch_assoc($querySelectTeamSize);
                
                $teamSize = $resultSelectTeamSize['numb_members'];
                $budgetForUsers = $wonMoney * 0.65 / $teamSize;
                $budgetForDivide = $wonMoney * 0.35;
                
                $newValue = $budgetForDivide + $oldValue;
                $newValueMoney = $cgMoney + $wonMoney;
                $upd = "UPDATE teamdata SET mon_to_div_from_cg_remains = '".$newValue."', mon_cg_tot = '".$newValueMoney."' WHERE id='" . $id . "';";
                $query = mysqli_query($conn, $upd);
                
                
                
                $upd = "UPDATE money_records SET money_tg_received  = money_tg_received + {$budgetForUsers} WHERE teamId='" . $id . "';";
                $query = mysqli_query($conn, $upd);
                
                
                
            }
            $averageResult /= count($addGameResults);
            $firstlastDiff = $iamFirstValue - $iamLastValue;

            $columns = "game_name,when_played,game_popularity,preparation_time_minutes,game_budget,average_result,firstlast_diff{$teamForSql}";
            $values = "('$addGameName','$whenPlayed','$addGamePopularity','$addGamePreparation','$addGameBudget','$averageResult','$firstlastDiff'{$gameResultString})";

            $sqlCreateGameData = "INSERT INTO data_team_games"
                    . "($columns) "
                    . "VALUES "
                    . "$values";
            $createGameData = mysqli_query($conn, $sqlCreateGameData) or die(mysqli_error($conn));

        }
    }
    if($_SESSION['error_msg'] != null){
        include 'addGameResultPage.php';
    }
?>
