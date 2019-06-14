<?php
    include '_connectDB.php';
            
        $queryBest   = "SELECT * FROM data_game_best_score;";
        $query      = mysqli_query($conn, $queryBest);

        if(mysqli_num_rows($query) == 0){
            $_SESSION['error_msg'] = 'Nejsou žádné rekordy k dispozici!';
        }

        if($_SESSION['error_msg'] == ''){
            $availableGameIds = array();
            $availableGamenames = array();
            $availableScores = array();
            $availableUnits = array();
            $availableNumberOvercomes = array();
            $availableUsernames = array();
            $availableUpdatetimes = array();
	    

            while($row = mysqli_fetch_assoc($query)) {
                array_push($availableGameIds,$row['id']);
                array_push($availableGamenames,$row['gamename']);
                array_push($availableScores,$row['score']);
                array_push($availableUnits,$row['unit']);
                array_push($availableNumberOvercomes,$row['number_overcomes']);
                array_push($availableUsernames,$row['username']);
                array_push($availableUpdatetimes,$row['updatetime']);
            }
        }
?>    


<fieldset id="fieldsetAchievements">    
    <div class="calendarDay">
        <h1>Hry pro jednotlivce</h1>
        <div class="calendarDayDetail">
            
            <?php
            
            for ($i = 0; $i<count($availableGameIds); $i++) {
                
                $tempTime = $availableUpdatetimes[$i];
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
             
                echo 
                '<h2>#' . $availableGameIds[$i] . ' ' . $availableGamenames[$i] . '</h2>
                    <div class="calendarDayDetailRow">
                        <ul>
                            <li>Hráč: '. $availableUsernames[$i] .'</li>
                            <li>Čas: '. $time .'</li>
                            <li>Rekord: '. $availableScores[$i] .'</li>
                            <li>Měrná jednotka soutěže: ' . $availableUnits[$i] . '</li>    
                            <li>Rekord překonal - '. $availableNumberOvercomes[$i] .' - předchozích rekordů</li>
                        </ul>
                    </div>';
            }
            
            ?>
            
        </div>
    </div>

    <hr>
    
<!--    <div class="calendarDay">
        <h1>Hry na webu</h1>
        <div class="calendarDayDetail">
            <h2>Hra K</h2>
            <div class="calendarDayDetailRow">
                <ul>
                    <li>Rekord: výhra 662 HRD</li>
                    <li>Hráč: rrhggf</li>
                </ul>
            </div>
            <h2>Hra L</h2>
            <div class="calendarDayDetailRow">
                <ul>
                    <li>Rekord: 37%</li>
                    <li>Hráč: asdffd</li>
                </ul>
            </div>
        </div>
    </div>-->
    
</fieldset>