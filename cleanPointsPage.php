<?php
    include '_connectDB.php';
            
        $queryLog   = "SELECT id, username, firstname, lastname FROM users;";
        $query      = mysqli_query($conn, $queryLog);

        if(mysqli_num_rows($query) == 0){
            $_SESSION['error_msg'] = 'Nejsou žádní uživatelé';
        }

        if($_SESSION['error_msg'] == ''){
            $_SESSION['availableUsernames'] = array();
            $_SESSION['availableUserFirstnames'] = array();
            $_SESSION['availableUserLastnames'] = array();
	    

            while($row = mysqli_fetch_assoc($query)) {
                array_push($_SESSION['availableUsernames'],$row['username']);
                array_push($_SESSION['availableUserFirstnames'],$row['firstname']);
                array_push($_SESSION['availableUserLastnames'],$row['lastname']);
            }
        }
?>        

<div class="formAuthorisedDiv">
    <form id="addCleanPointsMajorForm" method="POST">
        <fieldset>
            <legend id="legendGeneralDescription" align="center">Úklidový manažer</legend>
        
        <?php
            include '_divErrorMsg.php';
        ?>
            Pozor, jedná je o peníze, tzn 1bod = 1HRD!

            <div class = "formRow" id ="birthdateLikeRow">
                <label for = "numberPoints">Počet peněz</label>
                <br><br>
                <input type="number"
                       class ="pictureChoose"
                       id = "numberPoints" 
                       name="numberPoints"
                       min="-100"
                       max="100"
                       required
                    >
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

                                echo '<option value = ' . $temp[$i] . '>';
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
            </div>
            
            <div class = "formRow">
                <label for = "addPic" hidden>Zadat</label>
                <input class="submit" 
                       type = "submit"
                       id = "cleanPoints" 
                       name = "cleanPoints" 
                       value = "Zadat">
            </div>
            
        </fieldset>
    </form>
    <br><br>
</div>
