<?php

    if (isSet($_POST['addIndividualGameResult'])) {
        $whichGame           = null;
        $chooseUserTo        = null;
        $moneyBet            = null;
        $moneyWon            = null;
        $moneyLost           = null;
        $numberGamesWon      = null;
        $numberGamesLost     = null;
        $numberGamesDraw     = null;

        foreach ($_POST as $key => $value) {
            switch ($key) {
                case 'whichGame':          $whichGame          = $value; break;
                case 'chooseUserTo':       $chooseUserTo       = $value; break;
                case 'moneyBet':           $moneyBet           = $value; break;
                case 'moneyWon':           $moneyWon           = $value; break;
                case 'moneyLost':          $moneyLost          = $value; break;
                case 'numberGamesWon':     $numberGamesWon     = $value; break;
                case 'numberGamesLost':    $numberGamesLost    = $value; break;
                case 'numberGamesDraw':    $numberGamesDraw    = $value; break;
            }
        }

        if ($whichGame == null) {
            $_SESSION['error_msg'] = 'Není vybrána hra!';
        }
        if ($chooseUserTo == null) {
            $_SESSION['error_msg'] = 'Nebyl vybrán uživatel!';
        }
        if ($moneyBet == null) {
            $_SESSION['error_msg'] = 'Je potřeba zadat - alespoň i nulu.';
        }
        if ($moneyWon == null) {
            $_SESSION['error_msg'] = 'Je potřeba zadat - alespoň i nulu.';
        }
        if ($moneyLost == null) {
            $_SESSION['error_msg'] = 'Je potřeba zadat - alespoň i nulu.';
        }
        if ($numberGamesWon == null) {
            $_SESSION['error_msg'] = 'Je potřeba zadat - alespoň i nulu.';
        }
        if ($numberGamesLost == null) {
            $_SESSION['error_msg'] = 'Je potřeba zadat - alespoň i nulu.';
        }
        if ($numberGamesDraw == null) {
            $_SESSION['error_msg'] = 'Je potřeba zadat - alespoň i nulu.';
        }
        
        if ($_SESSION['error_msg'] == '') {
            include '_connectDB.php';

            $tablename = 'ig_data_'.$whichGame;
            $totalGames = $numberGamesWon + $numberGamesLost + $numberGamesDraw;
            $moneyLost += $moneyBet;
            $moneyBalance = $moneyWon - $moneyLost;

            $sqlUpdateDataGames = "UPDATE data_user_games SET number_games = number_games+'$totalGames' WHERE name = '$whichGame';";
            $queryUpdateDataGames = mysqli_query($conn, $sqlUpdateDataGames);

            $sqlScore = "SELECT score FROM data_game_best_score WHERE gamename = '$whichGame';";
            $queryScore = mysqli_query($conn, $sqlScore);
            $resultScore = mysqli_fetch_assoc($queryScore);
            $scoreValue = $resultScore['score'];

            if ($scoreValue == null || $scoreValue < $moneyWon) {
                $sqlUsernameIndividual = "SELECT username FROM users WHERE id = '$chooseUserTo';";
                $queryUsernameIndividual = mysqli_query($conn,$sqlUsernameIndividual);
                $resultUsernameIndividual = mysqli_fetch_assoc($queryUsernameIndividual);
                $usernameIndividual = $resultUsernameIndividual['username'];

                $sqlUpdateScore = "UPDATE data_game_best_score SET gametype = 1, score = '$moneyWon', number_overcomes = number_overcomes+1, username = '$usernameIndividual', userId = '$chooseUserTo' WHERE gamename = '$whichGame'";
                $queryUpdateScore = mysqli_query($conn, $sqlUpdateScore);
            }

            $sqlOldGameData = "SELECT * FROM $tablename WHERE idUser = '$chooseUserTo';";
            $queryOldGameData = mysqli_query($conn, $sqlOldGameData);
            $resultOldGameData = mysqli_fetch_assoc($queryOldGameData);

            $newMoneyBalance = $resultOldGameData['money_balance'] + $moneyBalance;
            $newMoneyWon = $resultOldGameData['money_won'] + $moneyWon;
            $newMoneyLost = $resultOldGameData['money_lost'] + $moneyLost;
            $newMoneyBet = $resultOldGameData['money_bet'] + $moneyBet;
            $newTotalGames = $resultOldGameData['games_total'] + $totalGames;
            $newGamesWon = $resultOldGameData['games_won'] + $numberGamesWon;
            $newGamesLost = $resultOldGameData['games_lost'] + $numberGamesLost;
            $newGamesDraw = $resultOldGameData['games_draw'] + $numberGamesDraw;

            $sqlUpdateIgData = "UPDATE $tablename SET money_balance = '$newMoneyBalance', money_won = '$newMoneyWon', money_lost = '$newMoneyLost', money_bet = '$newMoneyBet', games_total = '$newTotalGames', games_won = '$newGamesWon', games_lost = '$newGamesLost', games_draw = '$newGamesDraw' WHERE idUser = '$chooseUserTo';";
            $queryUpdateIgData = mysqli_query($conn, $sqlUpdateIgData);

            $sqlRatingSelect = "SELECT idUser FROM $tablename WHERE last_played IS NOT NULL ORDER BY money_balance DESC";
            $queryRatingSelect = mysqli_query($conn, $sqlRatingSelect);

            $ratingNum = 1;
            while($result = mysqli_fetch_assoc($queryRatingSelect)){
                $id = $result['idUser'];
                $updSql = "UPDATE $tablename SET rating = '$ratingNum' WHERE idUser = '$id';";
                $upd = mysqli_query($conn, $updSql);
                $ratingNum++;
            }

            $sqlOldUserdata = "SELECT ig_numb_played_won, ig_numb_played_lost, ig_numb_played_draw FROM userdata WHERE id = '$chooseUserTo';";
            $queryOldUserdata = mysqli_query($conn, $sqlOldUserdata);
            $resultOldUserdata = mysqli_fetch_assoc($queryOldUserdata);
            
            $newGameWon = $resultOldUserdata['ig_numb_played_won'] + $numberGamesWon;
            $newGameLost = $resultOldUserdata['ig_numb_played_lost'] + $numberGamesLost;
            $newGameDraw = $resultOldUserdata['ig_numb_played_draw'] + $numberGamesDraw;
            
            $sqlUpdUserdata = "UPDATE userdata SET ig_numb_played_won = '$newGameWon', ig_numb_played_lost = '$newGameLost', ig_numb_played_draw = '$newGameDraw' WHERE id = '$chooseUserTo';";
            $updUserdata = mysqli_query($conn, $sqlUpdUserdata);
            
            
            
            $sqlOldMoneyRecords = "SELECT money_ig_won, money_ig_lost, money_ig_bet FROM money_records WHERE id = '$chooseUserTo';";
            $queryOldMoneyRecords = mysqli_query($conn, $sqlOldMoneyRecords);
            $resultOldMoneyRecords = mysqli_fetch_assoc($queryOldMoneyRecords);
            
            $newRecordsWon = $resultOldMoneyRecords['money_ig_won'] + $moneyWon;
            $newRecordsLost = $resultOldMoneyRecords['money_ig_lost'] + $moneyLost;
            $newRecordsBet = $resultOldMoneyRecords['money_ig_bet'] + $moneyBet;
            
            $sqlUpdMoneyRecords = "UPDATE money_records SET money_ig_won = '$newRecordsWon', money_ig_lost = '$newRecordsLost', money_ig_bet = '$newRecordsBet' WHERE id = '$chooseUserTo';";
            $updMoneyRecords = mysqli_query($conn, $sqlUpdMoneyRecords); 
            
        }
    }
    if($_SESSION['error_msg'] != null){
        include 'addIndividualGameResultPage.php';
    }
?>
