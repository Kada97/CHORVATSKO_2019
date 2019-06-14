<?php
    $_SESSION['error_msg'] = '';
    
    include "_connectDB.php";
    
    $sqlGetTeamNames = "SELECT name FROM teams;";
    $queryGetTeamNames = mysqli_query($conn, $sqlGetTeamNames);
    $teamForSql = "";

    $teamNames = array();
    $temp = array();
    while($resultTeamNames = mysqli_fetch_array($queryGetTeamNames)){
        $temp[] = $resultTeamNames;
    }

    foreach($temp as $row) {
        $teamForSql .= ','.$row[0];
        $teamNames[] = $row[0];
    }
    
    $columns = "id,game_name,when_played,game_popularity,game_budget,average_result,firstlast_diff{$teamForSql}";
    
    
    $i = 0;
    
    $sqlNum = "SELECT "
            . "id "
            . "FROM data_team_games;";
    
    $queryNum = mysqli_query($conn, $sqlNum);
    $numbGames = mysqli_num_rows($queryNum);
    
    
    
    
    echo 
            '<fieldset id="fieldsetGameResults">    
                <div class="calendarDay">
                    <h1>Hry pro Týmy</h1>';
    
    
    
    
    while($i < $numbGames){
	$i++;
        $sql = "SELECT {$columns} FROM data_team_games WHERE id ='".$i."';";
    
        $allQuery = mysqli_query($conn, $sql);
        $allResult = mysqli_fetch_assoc($allQuery);
        
	$gameID	= $allResult['id'];
	$gameName = $allResult['game_name'];
	$gameTime = $allResult['when_played'];
	$gamePopularity = $allResult['game_popularity'];
	$gameBudget = $allResult['game_budget'];
        $gameAverageResult = $allResult['average_result'];
	$gameFirstlastDiff = $allResult['firstlast_diff'];
        
        $gameResults = array();
        
        for($j = 0; $j < count($teamNames); $j++) {
            $gameResults[] = $allResult[$teamNames[$j]];
        }
        
        echo
            '<div class="calendarDayDetail">
                <h2>#'.$gameID.' - '.$gameName.'</h2>
                <h2>Rozpočet hry: '.$gameBudget.'</h2>
                <h2>Odhadovaná oblíbenost: '.$gamePopularity.'/100</h2>
                <h2>Průměrný výsledek: '.$gameAverageResult.'%</h2>
                <h2>Rozdíl prvního a posledního: &plusmn; '.$gameFirstlastDiff.'</h2>
                <h2>Datum soutěže: '.$gameTime.'</h2>
                <div class="calendarDayDetailRow">
                    <ol>';
                        
                        for ($k = 0; $k < count($teamNames); $k++) {
                            $teamName = $teamNames[$k];
                            $teamResult = $gameResults[$k];
                            $teamWon = $teamResult * $gameBudget / 100;
                            
                            echo
                                '<li>'.$teamName.'<br>
                                    '.$teamResult.' %<br>
                            Získali: '.$teamWon.' HRD</li>';
                            
                        }
            echo        
                    '</ol>
                </div>
            </div>
        ';
        
        
    }
    
    
    echo 
        '</div>
    </fieldset>';