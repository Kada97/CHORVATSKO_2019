<?php

    include "_connectDB.php";
            
        $queryLog   = "SELECT id, username, firstname, lastname FROM users;";
        $query      = mysqli_query($conn, $queryLog);


        if(mysqli_num_rows($query) == 0){
            $_SESSION['error_msg'] = "Nejsou žádní uživatelé";
        }

        if($_SESSION['error_msg'] == ""){
            $_SESSION["availableUsernames"] = array();
            $_SESSION["availableUserFirstnames"] = array();
            $_SESSION["availableUserLastnames"] = array();
	    

            while($row = mysqli_fetch_assoc($query)) {
                array_push($_SESSION["availableUsernames"],$row["username"]);
                array_push($_SESSION["availableUserFirstnames"],$row["firstname"]);
                array_push($_SESSION["availableUserLastnames"],$row["lastname"]);
            }
        }

    echo'
        <div class="formAuthorised">
            <form method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend>Přidat obrázek</legend>
                    
                    <div class = "formRow">
                        <label for = "file">Obrázek</label>
                    </div>
                    <div class = "formRow">
                        <input type="file" multiple="multiple" id = "file" name="file[]" required>
                    </div>

                    <div class = "formRow">
		    <br><br>
                        <label for = "image_text">Komentář (bude pro všechny fotky stejný !)</label>
                    </div>
                    <div class = "formRow">
                        <input id = "comment" type="text" name="image_text" id="image_text" placeholder="Komentář"/>
                    </div>
		    
		    ';/*<div class = "formRow">
		    <br><br>
                        <label for = "image_text">Pro konkrétního uživatele</label>
                    </div>
                    <div class = "formRow">
                            <select id = "chooseUserTo" name = "chooseUserTo">
                                <option value="msg" disabled '.(isset($_SESSION['chooseUserTo']) ? " " : "selected").' hidden>
                                    V případě nastavení práva na neveřejné, vyber uživatele.
                                </option>';
                                if(count($_SESSION["availableUsernames"]) != 0){
                                    for ($i = 0; $i < count($_SESSION["availableUsernames"]); $i++) {
					
                                        $temp0 = $_SESSION["availableUserIds"];
                                        $temp = $_SESSION["availableUsernames"];
                                        $temp2 = $_SESSION["availableUserFirstnames"];
                                        $temp3 = $_SESSION["availableUserLastnames"];
					
                                        echo '<option value = '.$temp[$i].' '.(isset($_SESSION['addQuestionChooseThread']) && $_SESSION['addQuestionChooseThread'] == $temp[$i] ? "selected" : " ").'>';
                                        echo htmlspecialchars($temp[$i].' - '.$temp2[$i].' '.$temp3[$i]);
                                        echo '</option>';
                                    }
                                }else{
                                    echo '<option value="msg" disabled>';
                                    echo 'Nekde je chyba, kontaktuj administrátora.';
                                    echo '</option>';
                                }
                                echo '</select>
                    </div>*/;echo'
                    
		    <div class = "formRow">
		    <br><br>
                        <label for = "picrights">Práva</label>
                    </div>
                    <div class = "formRow">
		    
                        <label for = "picrights" hidden>Práva pro fotku</label>
                            <select id = "picrights" name = "picrights" >
                                ';/*<option value="msg" disabled hidden>
                                    Zvol práva
                                </option>*/echo'
                                <option value = "all" selected>
                                    Pro všechny
                                </option>';/*
                                <option value = "user">
                                    Pro konkrétního uživatele
                                </option>
                                <option value = "other">
                                    Jiné
                                </option>*/echo'
                            </select>
		    </div>
                    
                    <div class = "formRow">
                        <label for = "addPic" hidden>Přidat obrázek:</label>
                        <input class="submAuthorised" type = "submit" id = "addPic" name = "addNewPic" value = "Přidat obrázek ">
                    </div>
                    '; 
                    include '_divErrorMsg.php'; 
                    echo'
                </fieldset>
            </form>
            <br><br>
        </div>
        
    ';