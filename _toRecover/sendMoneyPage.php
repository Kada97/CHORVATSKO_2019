<?php

    include "_connectDB.php";
            
        $queryLog   = "SELECT id,username FROM userdata;";
        $query      = mysqli_query($conn, $queryLog);
	
	$accSql	    = "SELECT mon_all_bal, coin_total_value FROM userdata WHERE username = '".$_SESSION["username"]."';";
        $accQ	    = mysqli_query($conn, $accSql);
	$accRes	    = mysqli_fetch_assoc($accQ);


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
	
    $accMon = 0;
    $accMon += $accRes['mon_all_bal'];
    $accMon -= $accRes['coin_total_value'];
    $_SESSION["actMon"] = $accMon;
    echo $accMon;
    echo'
        <div class="formAuthorised">
            <form method = "POST">
                <fieldset>
                    <legend>Poslat peníze</legend>
                    
			<div class = "formRow">
                            <select id = "chooseUser" name = "chooseUser">
                                <option value="msg" disabled '.(isset($_SESSION['sendChooseUser']) ? " " : "selected").' hidden>
                                    Vyber uživatele
                                </option>';
                                if(count($_SESSION["availableUsers"]) != 0){
                                    for ($i = 0; $i < count($_SESSION["availableUsers"]); $i++) {
					if($i+1 == $_SESSION["userID"]){continue;}
                                        $temp = $_SESSION["availableUsers"];
                                        $temp2 = $_SESSION["availableUsernames"];
                                        echo '<option value = '.$temp[$i].' '.(isset($_SESSION['sendChooseUser']) && $_SESSION['sendChooseUser'] == $temp[$i] ? "selected" : " ").'>';
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
                        <label for = "numbMembers">Aktuální zůstatek:</label>
                    </div>
                    <div class = "formRow">
                        <input type="text" name="actMon" value = "'.(($accMon>0) ? $accMon : "Nemáš peníze!").'" disabled>
                    
		    
		    <br>
		    <br>
		    </div>
		    <div class = "formRow">
                        <label for = "numbMembers">Poslat:</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="sendMon" min = "1" value = "'.(isset($_SESSION['sendMon']) ? htmlspecialchars($_SESSION['sendMon']) : "0").'">
                    
		    
		    <br>
		    <br>
		    
		    </div>
		    <div class = "formRow">
                        <label for = "confirm" hidden>Poslat</label>
                        <input class="submAuthorised" type = "submit" id = "confirm" name = "confirmSend" value = "Poslat">
                    </div>
                    '; 
                    include '_divErrorMsg.php'; 
                    echo'
                </fieldset>
            </form>
            <br><br>
        </div>
        
    ';