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
    <form id="addPictureMajorForm" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend id="legendGeneralDescription" align="center">Přidat obrázek</legend>
        
        <?php
            include '_divErrorMsg.php';
            if (isset($_POST['addNewPic'])) {
                echo '<h2>Správné obrázky byly úspěšně nahrány. Ty ostatní soubory jsem nenahrál. Nahráno bylo celkem ' . $_SESSION['numbUploadedPictures'] . ' obrázků.</h2>';
            }
        ?>

            <div class = "formRow" id ="birthdateLikeRow">
                <label for = "file">Obrázek</label>
                <br><br>
                <input type="file" 
                       multiple="multiple"
                       class ="pictureChoose"
                       id = "file" 
                       name="file[]" 
                       required
                    >
                <hr>
                <label>
                    <h3>Povolené formáty obrázků:</h3>
                <ul>
                    <li>.jpg</li>
                    <li>.jpeg</li>
                    <li>.png</li>
                    <li>.gif</li>
                    <li>.bmp</li>
                </ul>
                </label>
            </div>

            <div class = "formRow" id ="birthdateLikeRow">
                <label for = "picrights">Práva</label>
                <select id = "picrights" name = "picrights" class="picturesSelects" onchange="pictureRightsSelect(this.value)">
                    <option value="msg" disabled hidden>
                        Zvol práva
                    </option>
                    <option value = "all" selected>
                        Pro všechny
                    </option>
                    <option value = "user">
                        Pro konkrétního uživatele
                    </option>
                    <option value = "other">
                        Jiné, soutěže, apod.
                    </option>
                </select>
            </div>
            
            <div id="ifTouser" class="hiding">
                <div class = "formRow" id ="birthdateLikeRow">
                    <label for = "chooseUserTo">Pro konkrétního uživatele</label>
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
            
            <div id="choosePurpose" class="hiding">
                <div class = "formRow" id ="birthdateLikeRow">
                    <label for = "purpose">Výběr soutěže</label>
                    <select id = "purpose" name = "choosePurposeTo" class="picturesSelects">
                        <option value="msg"
                                <?php echo (isset($_SESSION['choosePurposeTo']) ? ' ' : 'selected')?>
                                >
                            Označ soutěž:
                        </option>

                        <?php
                          
                            $path = 'C:/xampp/htdocs/CHORVATSKO_2019/upload/other/';
                            $dirs = array();
                            // directory handle
                            $dir = dir($path);

                            while (false !== ($entry = $dir->read())) {
                                if ($entry != '.' && $entry != '..') {
                                   if (is_dir($path . '/' .$entry)) {
                                        $dirs[] = $entry; 
                                   }
                                }
                            }

                        $dirCount = count($dirs);
                        if($dirCount != 0){    
                            for ($i = 0; $i < $dirCount; $i++) {

                                echo '<option value = ' . $dirs[$i] . ' ' . (isset($_SESSION['choosePurposeTo']) && $_SESSION['choosePurposeTo'] == $dirs[$i] ? 'selected' : ' ') . '>';
                                echo $dirs[$i];
                                echo '</option>';
                            }
                            
                            
                        }else{
                            echo '<option value="msg" disabled>';
                            echo 'Není žádná soutěž k dispozici. Jestli tu měla být, kontaktuj administrátora.';
                            echo '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
                
            <div class = "formRow" id ="birthdateLikeRow">
                <label for = "comment">Komentář (bude pro všechny fotky stejný, max 50 znaků !)</label>
                <input id = "comment" 
                       type="text"
                       class="txtField"
                       name="image_text"
                       maxlength="50"
                       placeholder="Komentář"/>
            </div>

            <div class = "formRow">
                <label for = "addPic" hidden>Přidat obrázek:</label>
                <input class="submit" 
                       type = "submit"
                       id = "addPic" 
                       name = "addNewPic" 
                       value = "Přidat obrázek ">
            </div>
            
        </fieldset>
    </form>
    <br><br>
</div>