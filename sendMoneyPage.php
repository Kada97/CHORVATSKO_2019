<?php

    include '_connectDB.php';
            
        $queryLog   = "SELECT id, username, firstname, lastname FROM users;";
        $query      = mysqli_query($conn, $queryLog);
	
	$accSql	    = "SELECT money_actual_total FROM money_records WHERE username = '".$_SESSION['username']."';";
        $accQ	    = mysqli_query($conn, $accSql);
	$accRes	    = mysqli_fetch_assoc($accQ);


        if(mysqli_num_rows($query) == 0){
            $_SESSION['error_msg'] = 'Vytvoř uživatele nejdříve!';
        }

        if($_SESSION['error_msg'] == ''){
            $_SESSION['availableUsers'] = array();
            $_SESSION['availableUsernames'] = array();
            $_SESSION['availableUserFirstnames'] = array();
            $_SESSION['availableUserLastnames'] = array();

            while($row = mysqli_fetch_assoc($query)) {
                array_push($_SESSION['availableUsers'],$row['id']);
                array_push($_SESSION['availableUsernames'],$row['username']);
                array_push($_SESSION['availableUserFirstnames'],$row['firstname']);
                array_push($_SESSION['availableUserLastnames'],$row['lastname']);
            }
        }
        
    $accMon = 0;
    $accMon += $accRes['money_actual_total'];
    $_SESSION['actMon'] = $accMon;
    
?>    
    
        <div class="formAuthorisedDiv">
            <form id="sendMoneyMajorForm" method = "POST">
                <fieldset>
                    <legend id="legendGeneralDescription" align="center">Poslat peníze</legend>
                    
                    <?php
                        include '_divErrorMsg.php';
                    ?>
                    
			<div class = "formRow" id ="birthdateLikeRow">
                            <label for = "chooseUser">Vyber uživatele</label>
                            <select id = "chooseUser" name = "chooseUser" class="sendMoneyUserSelect">
                                <option value="msg" disabled <?php echo (isset($_SESSION['sendChooseUser']) ? ' ' : 'selected')?> hidden>
                                    Vyber uživatele
                                </option>
                                <?php
                                    if(count($_SESSION['availableUsers']) != 0){
                                        for ($i = 0; $i < count($_SESSION['availableUsers']); $i++) {
                                            if($i+1 == $_SESSION['userID']){continue;}
                                            
                                            $temp = $_SESSION['availableUsernames'];
                                            $temp1 = $_SESSION['availableUsers'];
                                            $temp2 = $_SESSION['availableUserFirstnames'];
                                            $temp3 = $_SESSION['availableUserLastnames'];

                                            echo '<option value = ' . $temp1[$i] . '>';
                                            echo htmlspecialchars($temp[$i] . ' - ' . $temp2[$i] . ' ' . $temp3[$i]);
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


                    <div class = "formRow" id ="birthdateLikeRow">
                        <label for = "actZustat">Aktuální zůstatek:</label>
                        <input id="actZustat" 
                               class="txtField" 
                               type="text" 
                               name="actMon" 
                               value = "<?php echo $accMon; ?>" 
                               disabled>
                    
		    </div>
                    <?php 
                    if ($accMon>0) {
                        echo '
                        <div class = "formRow" id ="birthdateLikeRow">
                        <label for = "sendHowMany">Poslat kolik:</label>
                        <input id="sendHowMany" 
                               class="txtField" 
                               type="number" 
                               name="sendMon" 
                               min = "1" 
                               value = "'.(isset($_SESSION['sendMon']) ?  htmlspecialchars($_SESSION['sendMon']) : '').'">
                        </div>
                        ';       
                    }
                    ?>
		    <div class = "formRow">
                        <label for = "confirm" hidden>Poslat</label>
                        <input class="submit" 
                               type = "submit" 
                               id = "confirm" 
                               name = "confirmSendMoney" 
                               value = "Potvrdit">
                    </div>
                    
                </fieldset>
            </form>
            <br><br>
        </div>
