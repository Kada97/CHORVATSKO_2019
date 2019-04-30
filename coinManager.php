<?php

    include "_connectDB.php";
            
        $queryLog   = "SELECT id,username FROM userdata;";
        $query      = mysqli_query($conn, $queryLog);


        if(mysqli_num_rows($query) == 0){
            $_SESSION['error_msg'] = "Vytvoř uživatele nejdříve!";
        }

        if($_SESSION['error_msg'] == ""){
            $_SESSION["availableUsernames"] = array();
            $_SESSION["availableUsers"] = array();

            while($row = mysqli_fetch_assoc($query)) {
                array_push($_SESSION["availableUsernames"],$row["username"]);
                array_push($_SESSION["availableUsers"],$row["id"]);
            }
        }

    echo'
        <div class="formAuthorised">
            <form method = "POST">
                <fieldset>
                    <legend>Žeton manager</legend>
                    
			<div class = "formRow">
                            <select id = "chooseUser" name = "chooseUser">
                                <option value="msg" disabled '.(isset($_SESSION['coinChooseUser']) ? " " : "selected").' hidden>
                                    Vyber uživatele
                                </option>';
                                if(count($_SESSION["availableUsers"]) != 0){
                                    for ($i = 0; $i < count($_SESSION["availableUsers"]); $i++) {
                                        $temp = $_SESSION["availableUsers"];
                                        $temp2 = $_SESSION["availableUsernames"];
                                        echo '<option value = '.$temp[$i].' '.(isset($_SESSION['coinChooseUser']) && $_SESSION['coinChooseUser'] == $temp[$i] ? "selected" : " ").'>';
                                        echo htmlspecialchars($temp2[$i]);
                                        echo '</option>';
                                    }
                                }else{
                                    echo '<option value="msg" disabled>';
                                    echo 'Potřeba nejdříve vytvořit uživatele';
                                    echo '</option>';
                                }
                                echo '</select>
				    <br>
				    <br>
				    <br>
			</div>


                    <div class = "formRow">
                        <label for = "numbMembers">Coin 1 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin1" value = "'.(isset($_SESSION['coin1']) ? htmlspecialchars($_SESSION['coin1']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>
		    <div class = "formRow">
                        <label for = "numbMembers">Coin 2 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin2" value = "'.(isset($_SESSION['coin2']) ? htmlspecialchars($_SESSION['coin2']) : "0").'">
                    
		    
		    <br>
		    <br>
		    
		    </div>
                    <div class = "formRow">
                        <label for = "numbMembers">Coin 3 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin3" value = "'.(isset($_SESSION['coin3']) ? htmlspecialchars($_SESSION['coin3']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>

                    <div class = "formRow">
                        <label for = "numbMembers">Coin 4 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin4" value = "'.(isset($_SESSION['coin4']) ? htmlspecialchars($_SESSION['coin4']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>

                    <div class = "formRow">
                        <label for = "numbMembers">Coin 5 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin5" value = "'.(isset($_SESSION['coin5']) ? htmlspecialchars($_SESSION['coin5']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>

                    <div class = "formRow">
                        <label for = "numbMembers">Coin 6 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin6" value = "'.(isset($_SESSION['coin6']) ? htmlspecialchars($_SESSION['coin6']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>

                    <div class = "formRow">
                        <label for = "numbMembers">Coin 7 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin7" value = "'.(isset($_SESSION['coin7']) ? htmlspecialchars($_SESSION['coin7']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>

                    <div class = "formRow">
                        <label for = "numbMembers">Coin 8 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin8" value = "'.(isset($_SESSION['coin8']) ? htmlspecialchars($_SESSION['coin8']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>

                    <div class = "formRow">
                        <label for = "numbMembers">Coin 9 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin9" value = "'.(isset($_SESSION['coin9']) ? htmlspecialchars($_SESSION['coin9']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>

                    <div class = "formRow">
                        <label for = "numbMembers">Coin 10 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin10" value = "'.(isset($_SESSION['coin10']) ? htmlspecialchars($_SESSION['coin10']) : "0").'">
                    
		   
		    <br>
		    <br>
		    </div>

                    <div class = "formRow">
                        <label for = "numbMembers">Coin 11 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin11" value = "'.(isset($_SESSION['coin11']) ? htmlspecialchars($_SESSION['coin11']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>

                    <div class = "formRow">
                        <label for = "numbMembers">Coin 12 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin12" value = "'.(isset($_SESSION['coin12']) ? htmlspecialchars($_SESSION['coin12']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>

                    <div class = "formRow">
                        <label for = "numbMembers">Coin 13 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin13" value = "'.(isset($_SESSION['coin13']) ? htmlspecialchars($_SESSION['coin13']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>

                    <div class = "formRow">
                        <label for = "numbMembers">Coin 14 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin14" value = "'.(isset($_SESSION['coin14']) ? htmlspecialchars($_SESSION['coin14']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>

                    <div class = "formRow">
                        <label for = "numbMembers">Coin 15 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin15" value = "'.(isset($_SESSION['coin15']) ? htmlspecialchars($_SESSION['coin15']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>

                    <div class = "formRow">
                        <label for = "numbMembers">Coin 16 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin16" value = "'.(isset($_SESSION['coin16']) ? htmlspecialchars($_SESSION['coin16']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>

                    <div class = "formRow">
                        <label for = "numbMembers">Coin 17 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin17" value = "'.(isset($_SESSION['coin17']) ? htmlspecialchars($_SESSION['coin17']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>

                    <div class = "formRow">
                        <label for = "numbMembers">Coin 18 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin18" value = "'.(isset($_SESSION['coin18']) ? htmlspecialchars($_SESSION['coin18']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>

                    <div class = "formRow">
                        <label for = "numbMembers">Coin 19 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin19" value = "'.(isset($_SESSION['coin19']) ? htmlspecialchars($_SESSION['coin19']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>

                    <div class = "formRow">
                        <label for = "numbMembers">Coin 20 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin20" value = "'.(isset($_SESSION['coin20']) ? htmlspecialchars($_SESSION['coin20']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>

                    <div class = "formRow">
                        <label for = "numbMembers">Coin 21 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin21" value = "'.(isset($_SESSION['coin21']) ? htmlspecialchars($_SESSION['coin21']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>

                    <div class = "formRow">
                        <label for = "numbMembers">Coin 22 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin22" value = "'.(isset($_SESSION['coin22']) ? htmlspecialchars($_SESSION['coin22']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>

                    <div class = "formRow">
                        <label for = "numbMembers">Coin 23 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin23" value = "'.(isset($_SESSION['coin23']) ? htmlspecialchars($_SESSION['coin23']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>

                    <div class = "formRow">
                        <label for = "numbMembers">Coin 24 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin24" value = "'.(isset($_SESSION['coin24']) ? htmlspecialchars($_SESSION['coin24']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>

                    <div class = "formRow">
                        <label for = "numbMembers">Coin 25 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin25" value = "'.(isset($_SESSION['coin25']) ? htmlspecialchars($_SESSION['coin25']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>
		    
		    <div class = "formRow">
                        <label for = "numbMembers">Coin 26 :</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="coin26" value = "'.(isset($_SESSION['coin26']) ? htmlspecialchars($_SESSION['coin26']) : "0").'">
                    
		    
		    <br>
		    <br>
		    </div>
		    


                    <div class = "formRow">
                        <label for = "confirm" hidden>Potvrdit</label>
                        <input class="submAuthorised" type = "submit" id = "confirm" name = "confirmCoins" value = "Potvrdit">
                    </div>
                    '; 
                    include '_divErrorMsg.php'; 
                    echo'
                </fieldset>
            </form>
            <br><br>
        </div>
        
    ';


