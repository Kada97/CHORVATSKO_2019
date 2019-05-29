<?php

    include '_connectDB.php';
            
        $queryLog   = "SELECT id,username FROM userdata;";
        $query      = mysqli_query($conn, $queryLog);


        if(mysqli_num_rows($query) == 0){
            $_SESSION['error_msg'] = 'Vytvoř uživatele nejdříve!';
        }

        if($_SESSION['error_msg'] == ''){
            $_SESSION['availableUsernames'] = array();
            $_SESSION['availableUsers'] = array();

            while($row = mysqli_fetch_assoc($query)) {
                array_push($_SESSION['availableUsernames'],$row['username']);
                array_push($_SESSION['availableUsers'],$row['id']);
            }
        }
        
        $queryLog2   = "SELECT id,name FROM teams;";
        $query2      = mysqli_query($conn, $queryLog2);


        if(mysqli_num_rows($query2) == 0){
            $_SESSION['error_msg'] = 'Vytvoř týmy nejdříve!';
        }

        if($_SESSION['error_msg'] == ''){
            $_SESSION['availableTeamnames'] = array();
            $_SESSION['availableTeams'] = array();

            while($row2 = mysqli_fetch_assoc($query2)) {
                array_push($_SESSION['availableTeamnames'],$row2['name']);
                array_push($_SESSION['availableTeams'],$row2['id']);
            }
        }

?>
<div class="formAuthorisedDiv">
    <form id="giftMajorForm" method = "POST">
        <fieldset>
            <legend id="legendGeneralDescription" align="center">Darový manager</legend>
            
            <?php
                include '_divErrorMsg.php';
            ?>
            
            <div class = "formRow" id="giftRow">
                <label for="chooseUser" class="giftUserLabel">Výběr uživatele</label>
                <select id = "chooseUser" 
                        name = "chooseUser"
                        class="giftValueField"
                        >
                    <option value="NULL" <?php echo (isset($_SESSION['giftChooseUser']) ? ' ' : 'selected')?>>
                        Vyber uživatele
                    </option>
                    
                    <?php
                    if(count($_SESSION['availableUsers']) != 0){
                        for ($i = 0; $i < count($_SESSION['availableUsers']); $i++) {
                            $temp = $_SESSION['availableUsers'];
                            $temp2 = $_SESSION['availableUsernames'];
                            echo '<option value = '.$temp[$i].' '.(isset($_SESSION['giftChooseUser']) && $_SESSION['giftChooseUser'] == $temp[$i] ? 'selected' : ' ').'>';
                            echo htmlspecialchars($temp2[$i]);
                            echo '</option>';
                        }
                    }else{
                        echo '<option value="msg" disabled>';
                        echo 'Je potřeba nejdříve vytvořit uživatele.';
                        echo '</option>';
                    }
                    ?>
                </select>
            </div>
            
            <div class = "formRow" id="giftRow">
                <label for="chooseTeam" class="giftUserLabel">Výběr týmu</label>
                <select id = "chooseTeam" 
                        name = "chooseTeam"
                        class="giftValueField"
                        >
                    <option value="NULL" <?php echo (isset($_SESSION['giftChooseUser']) ? ' ' : 'selected')?>>
                        Vyber tým
                    </option>
                    
                    <?php
                    if(count($_SESSION['availableTeams']) != 0){
                        for ($i = 0; $i < count($_SESSION['availableTeams']); $i++) {
                            $temp = $_SESSION['availableTeams'];
                            $temp2 = $_SESSION['availableTeamnames'];
                            echo '<option value = '.$temp[$i].' '.(isset($_SESSION['giftChooseTeam']) && $_SESSION['giftsChooseTeam'] == $temp[$i] ? 'selected' : ' ').'>';
                            echo htmlspecialchars($temp2[$i]);
                            echo '</option>';
                        }
                    }else{
                        echo '<option value="msg" disabled>';
                        echo 'Je potřeba nejdříve vytvořit tým.';
                        echo '</option>';
                    }
                    ?>
                </select>
            </div>
            
            
            <div class = "formRow" id="giftRow">
                <label for = "zadavatel" class="giftUserLabel">Zadavatel</label>
                    <select id = "zadavatel" 
                            name = "zadavatel" 
                            class="giftValueField">
                        <option value="msg" disabled selected hidden>
                            Vyber zadavatele 
                        </option>
                        <option value = "dom">
                            Dominik
                        </option>
                        <option value = "org">
                            Organizátor
                        </option>
                        <option value = "lea">
                            Vedoucí
                        </option>
                        <option value = "sys">
                            Systém
                        </option>
                        <option value = "cpt">
                            Kapitán týmu
                        </option>
                    </select>
            </div>
            
            <div class = "formRow" id="giftRow">
                <label for = "typeGift" class="giftUserLabel">Typ daru</label>
                    <select id = "typeGift" 
                            name = "typeGift" 
                            class="giftValueField">
                        <option value="msg" disabled selected hidden>
                            Vyber typ
                        </option>
                        <option value = "ig">
                            Individual Games
                        </option>
                        <option value = "tg">
                            Team Games
                        </option>
                    </select>
            </div>
            
            <?php 
                    if (isSet($_SESSION['username']) && $_SESSION['username'] == 'Admin') {
                        echo '
                        <div class = "formRow" id ="birthdateLikeRow">
                        <label for = "sendHowMany" class="giftUserLabel">Poslat kolik:</label>
                        <input id="sendHowMany" 
                               class="giftValueField"
                               type="number" 
                               name="giftsValue" 
                               min = "1" 
                               value = "'.(isset($_SESSION['giftsValue']) ?  htmlspecialchars($_SESSION['giftsValue']) : '').'">
                        </div>
                        ';       
                    }
            ?>
            
            <div class = "formRow">
                <label for = "giftDesc" hidden>Popis:</label>
                <input class = "txtField" 
                       type = "text" 
                       id = "giftDesc" 
                       name = "giftDesc"
                       placeholder = "Popis"
                       >
            </div>
            
            
            <div class = "formRow">
                <label for = "confirm" hidden>Poslat</label>
                <input class="submit" 
                       type = "submit" 
                       id = "confirm" 
                       name = "confirmSendGift" 
                       value = "Potvrdit">
            </div>