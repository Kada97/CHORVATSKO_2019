<?php
    $_SESSION['error_msg'] = '';
    
    include "_connectDB.php";
    
    $sqlGetDataUserGames = "SELECT id,name,number_games,total_time FROM data_user_games;";
    $queryGetDataUserGames = mysqli_query($conn, $sqlGetDataUserGames);

    $dataUserGamesId = array();
    $dataUserGamesName = array();
    $dataUserGamesNumberGames = array();
    $dataUserGamesTotaltime = array();
    
    while($result = mysqli_fetch_array($queryGetDataUserGames)){
        $dataUserGamesId[] = $result['id'];
        $dataUserGamesName[] = $result['name'];
        $dataUserGamesNumberGames[] = $result['number_games'];
        $dataUserGamesTotaltime[] = $result['total_time'];
    }

    
    echo 
            '<fieldset id="fieldsetGameResults">    
                <div class="calendarDay">
                    <h1>Hry pro jednotlivce</h1>';
    
    
    
    for ($i=0;$i<count($dataUserGamesName);$i++) {
        
        $tablename = 'ig_data_' . $dataUserGamesName[$i];
        $sqlGetGame = "SELECT * FROM $tablename WHERE last_played IS NOT NULL ORDER BY money_balance DESC;";
        $queryGetGame = mysqli_query($conn, $sqlGetGame);
        
        $gameID = $dataUserGamesId[$i];
        $gameName = $dataUserGamesName[$i];
        $gameTime = $dataUserGamesTotaltime[$i];
        $gameTotalNumber = $dataUserGamesNumberGames[$i];
        
        echo
                '<div class="calendarDayDetail">
                    <h2>#'.$gameID.' - '.$gameName.'</h2>
                    <h2>Celkový počet odehraných her: '.$gameTotalNumber.'</h2>
                    <h2>Doba otevření stanoviště (je-li zadaná): '.$gameTime.'</h2>
                    <div class="calendarDayDetailRow">
                        <ol>';
        
        while($result = mysqli_fetch_assoc($queryGetGame)){
            $tempTime = $result['last_played'];
            $tempHour = date("G", strtotime($tempTime));
            $tempTime2 = date("j. n. Y", strtotime($tempTime));
            $dayPart = '';

            if ($tempHour < 4) {
                $dayPart = 'noc';
            }
            elseif ($tempHour < 10) {
                $dayPart = 'ráno';
            }
            elseif ($tempHour < 12) {
                $dayPart = 'dopoledne';
            }
            elseif ($tempHour < 13) {
                $dayPart = 'poledne';
            }
            elseif ($tempHour < 17) {
                $dayPart = 'odpoledne';
            }
            elseif ($tempHour < 19) {
                $dayPart = 'podvečer';
            }
            elseif ($tempHour < 22) {
                $dayPart = 'večer';
            }
            else {
                $dayPart = 'noc';
            }
            $time = $tempTime2 . ' ' . $dayPart;
            
            $idUser         = $result['idUser'];
            $username       = $result['username'];
            $idUserTeam     = $result['idUserTeam'];
            $money_balance  = $result['money_balance'];
            $money_won      = $result['money_won'];
            $money_lost     = $result['money_lost'];
            $money_bet      = $result['money_bet'];
            $games_total    = $result['games_total'];
            $games_won      = $result['games_won'];
            $games_lost     = $result['games_lost'];
            $games_draw     = $result['games_draw'];
            $last_played    = $time;
            
            
            echo
                '<li>#'.$idUser.' ' . $username . ' (tým ID: ' . $idUserTeam . ')</li>
                    <ul>
                        <li>Záznam poslední hry: '. $last_played .'</li>
                        <li>Peněžní bilance: '. $money_balance .'</li>
                        <li>Hodnota výher: '. $money_won .'</li>
                        <li>Hodnota proher: '. $money_lost .'</li>
                        <li>Hodnota sázek: '. $money_bet .'</li>
                        <li>Celkem odehráno her: '. $games_total .'</li>
                        <li>Z toho vyhraných: '. $games_won .'</li>
                        <li>Z toho prohraných: '. $games_lost .'</li>
                        <li>Z toho remizovaných: '. $games_draw .'</li>
                    </ul><br>';
                            
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