<?php
    include '_connectDB.php';
            
        $queryLog   = "SELECT id, username, firstname, lastname FROM users;";
        $query      = mysqli_query($conn, $queryLog);

        if(mysqli_num_rows($query) == 0){
            $_SESSION['error_msg'] = 'Nejsou žádní uživatelé';
        }

        if($_SESSION['error_msg'] == ''){
            $_SESSION['availableUserIds'] = array();
            $_SESSION['availableUsernames'] = array();
            $_SESSION['availableUserFirstnames'] = array();
            $_SESSION['availableUserLastnames'] = array();
	    

            while($row = mysqli_fetch_assoc($query)) {
                array_push($_SESSION['availableUserIds'],$row['id']);
                array_push($_SESSION['availableUsernames'],$row['username']);
                array_push($_SESSION['availableUserFirstnames'],$row['firstname']);
                array_push($_SESSION['availableUserLastnames'],$row['lastname']);
            }
        }
        
        
        $queryLogGames  = "SELECT id, name, unit FROM data_user_games;";
        $queryGames     = mysqli_query($conn, $queryLogGames);

        if(mysqli_num_rows($queryGames) == 0){
            $_SESSION['error_msg'] = 'Nejsou žádné hry k dispozici, vytvoř nějakou';
        }

        if($_SESSION['error_msg'] == ''){
            $_SESSION['availableGameIds'] = array();
            $_SESSION['availableGamenames'] = array();
            $_SESSION['availableGameUnit'] = array();
	    

            while($row = mysqli_fetch_assoc($queryGames)) {
                array_push($_SESSION['availableGameIds'],$row['id']);
                array_push($_SESSION['availableGamenames'],$row['name']);
                array_push($_SESSION['availableGameUnit'],$row['unit']);
            }
        }
        
        
?>    

<form method="POST">

    <div id="whichGame">
                <div class = "formRow" id ="birthdateLikeRow">
                    <label for = "whichGame">Pro</label>
                    <select id = "whichGame" name = "whichGame" class="picturesSelects">
                        <option value="msg"
                                disabled
                                <?php echo (isset($_SESSION['whichGame']) ? ' ' : 'selected')?>
                                >
                            Vyber hru:
                        </option>

                        <?php
                        if(count($_SESSION['availableGameIds']) != 0){
                            for ($i = 0; $i < count($_SESSION['availableGameIds']); $i++) {

                                $temp0 = $_SESSION['availableGameIds'];
                                $temp1 = $_SESSION['availableGameUnit'];
                                $temp = $_SESSION['availableGamenames'];

                                echo '<option id = ' . $temp0[$i] . ' value = ' . $temp[$i] . '>';
                                echo htmlspecialchars('#' . $temp0[$i] . ' - ' . $temp[$i] . '[' . $temp1[$i] . ']');
                                echo '</option>';
                            }
                        }else{
                            echo '<option value="msg" disabled>';
                            echo 'Nekde je chyba, kontaktuj administrátora.';
                            echo '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

    <div id="toUser">
                <div class = "formRow" id ="birthdateLikeRow">
                    <label for = "chooseUserTo">Pro</label>
                    <select id = "chooseUserTo" name = "chooseUserTo" class="picturesSelects">
                        <option value="msg"
                                disabled
                                <?php echo (isset($_SESSION['chooseUserTo']) ? ' ' : 'selected')?>
                                >
                            Označ příjemce:
                        </option>

                        <?php
                        if(count($_SESSION['availableUsernames']) != 0){
                            for ($i = 0; $i < count($_SESSION['availableUsernames']); $i++) {

                                $temp0 = $_SESSION['availableUserIds'];
                                $temp = $_SESSION['availableUsernames'];
                                $temp2 = $_SESSION['availableUserFirstnames'];
                                $temp3 = $_SESSION['availableUserLastnames'];

                                echo '<option value = ' . $temp0[$i] . '>';
                                echo htmlspecialchars('#' . $temp0[$i] . ' ' . $temp[$i] . ' - ' . $temp2[$i] . ' ' . $temp3[$i]);
                                echo '</option>';
                            }
                        }else{
                            echo '<option value="msg" disabled>';
                            echo 'Nekde je chyba, kontaktuj administrátora.';
                            echo '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
    
    <div class = "formRow" id="birthdateLikeRow">
        <label for = "moneyBet">Vsazené peníze:</label>
        <input class = "txtField" 
               type = "number" 
               id = "moneyBet" 
               name = "moneyBet" 
               required>
    </div>
    
    <div class = "formRow" id="birthdateLikeRow">
        <label for = "moneyWon">Vyhrané peníze:</label>
        <input class = "txtField" 
               type = "number" 
               id = "moneyWon" 
               name = "moneyWon" 
               required>
    </div>
    
    <div class = "formRow" id="birthdateLikeRow">
        <label for = "moneyLost">Prohrané peníze:</label>
        <input class = "txtField" 
               type = "number" 
               id = "moneyLost" 
               name = "moneyLost" 
               required>
    </div>
    
    <div class = "formRow" id="birthdateLikeRow">
        <label for = "numberGamesWon">Počet vyhraných her:</label>
        <input class = "txtField" 
               type = "text" 
               id = "numberGamesWon" 
               name = "numberGamesWon" 
               required>
    </div>
    
    <div class = "formRow" id="birthdateLikeRow">
        <label for = "numberGamesLost">Počet prohraných her:</label>
        <input class = "txtField" 
               type = "text" 
               id = "numberGamesLost" 
               name = "numberGamesLost" 
               required>
    </div>
    
    <div class = "formRow" id="birthdateLikeRow">
        <label for = "numberGamesDraw">Počet remizovaných her:</label>
        <input class = "txtField" 
               type = "text" 
               id = "numberGamesDraw" 
               name = "numberGamesDraw" 
               required>
    </div>
    
    <div class = "formRow" id="birthdateLikeRow">
        <input class="submit" 
               type = "submit" 
               id = "addIndividualGameResult" 
               name = "addIndividualGameResult" 
               value = "Přidat výsledky" >
    
    </div>
    
    <br><br><br>
            


