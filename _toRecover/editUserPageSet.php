<?php

    echo'
        <div class="formAuthorised">
            <form method = "POST">
                <fieldset>
                    <legend>Úprava uživatele: '.$_SESSION["editUserFirstname"].' '.$_SESSION["editUserLastname"].' - '.$_SESSION["editUserUsername"].'</legend>
                    ';
//                    <div class = "formRow">
//                        <label for = "edUsername">Uživatelské jméno:</label>
//                    </div>
//                    <div class = "formRow">
//                        <input class = "txtFieldAuthorised" type = "text" id = "edUsername" name = "editUsername" value = "'.(isset($_SESSION['editUserUsernameNew']) ? htmlspecialchars($_SESSION['editUserUsernameNew']) : htmlspecialchars($_SESSION['editUserUsername'])).'" autofocus required>
//                    </div>
                    
    echo'           <div class = "formRow">
                        <label for = "edFirstname">Jméno:</label>
                    </div>
                    <div class = "formRow">
                        <input class = "txtFieldAuthorised" type = "text" id = "edFirstname" name = "editFirstname" value = "'.(isset($_SESSION['editUserFirstnameNew']) ? htmlspecialchars($_SESSION['editUserFirstnameNew']) : htmlspecialchars($_SESSION['editUserFirstname'])).'" required>
                    </div>
                    
                    <div class = "formRow">
                        <label for = "edLastname">Příjmení:</label>
                    </div>
                    <div class = "formRow">
                        <input class = "txtFieldAuthorised" type = "text" id = "edLastname" name = "editLastname" value = "'.(isset($_SESSION['editUserLastnameNew']) ? htmlspecialchars($_SESSION['editUserLastnameNew']) : htmlspecialchars($_SESSION['editUserLastname'])).'" required>
                    </div>
                    
                    <div class = "formRow">
                        <label for = "edPassword">Heslo:</label>
                    </div>
                    <div class = "formRow">
                        <input class = "txtFieldAuthorised" type = "text" id = "edPassword" name = "editPassword" value = "'.(isset($_SESSION['editUserPasswordNew']) ? htmlspecialchars($_SESSION['editUserPasswordNew']) : htmlspecialchars($_SESSION['editUserPassword'])).'" required>
                    </div>
                    
                    <div class = "formRow">
                        <label for = "edVerification">Verifikace: </label>
                    </div>
                    <div class = "formRow">
                        <input class = "txtFieldAuthorised" type = "text" id = "edVerification" name = "editVerification" value = "'.(isset($_SESSION['editUserVerificationNew']) ? htmlspecialchars($_SESSION['editUserVerificationNew']) : htmlspecialchars($_SESSION['editUserVerification'])).'" required>
                    </div>

                    <div class = "formRow">
                        <label for = "edAge">Věk:</label>
                    </div>
                    <div class = "formRow">
                        <input class = "txtFieldAuthorised" type = "text" id = "edAge" name = "editAge" value = "'.(isset($_SESSION['editUserAgeNew']) ? htmlspecialchars($_SESSION['editUserAgeNew']) : htmlspecialchars($_SESSION['editUserAge'])).'" required>
                    </div>

                    <div class = "formRow">
                        <label for = "edBirthdate">Datum narození: </label>
                        <input class = "txtField" type = "date" id = "edBirthdate" name = "editBirthdate" value = "'.(isset($_SESSION['editUserBirthdateNew']) ? $_SESSION['editUserBirthdateNew'] : $_SESSION['editUserBirthdate']).'" required>
                    </div>

                    <div class = "formRow">
                        <label for = "edSexMale" class ="radioText" id = "sexMale">Muž: </label>
                        <input type = "radio" id = "edSexMale" name = "editSex" value = "Male" required '.(isset($_SESSION['editUserSex']) && $_SESSION['editUserSex'] == "Male" ? "checked" : "").'>
                    </div>

                    <div class = "formRow">    
                        <label for = "edSexFemale" class ="radioText" id = "sexFemale">Žena: </label>
                        <input type = "radio" id="edSexFemale" name = "editSex" value = "Female" '.(isset($_SESSION['editUserSex']) && $_SESSION['editUserSex'] == "Female" ? "checked" : "").'>
                    </div>
                    
                    <div class = "formRow">
                        <label for = "edNeedhelp">Potřebuje pomoci: (default: OK)</label>
                    </div>
                    <div class = "formRow">
                        <input class = "txtFieldAuthorised" type = "text" id = "edNeedhelp" name = "editNeedhelp" value = "'.(isset($_SESSION['editUserNeedhelpNew']) ? htmlspecialchars($_SESSION['editUserNeedhelpNew']) : htmlspecialchars($_SESSION['editUserNeedhelp'])).'" required>
                    </div>
                    
                    <div class = "formRow">
                        <label for = "edTeam">Je členem týmu: (ID)</label>
                    </div>
                    <div class = "formRow">
                        <input type="number" name="editTeam" min="1" max="7" value = "'.(isset($_SESSION['editUserTeam']) ? htmlspecialchars($_SESSION['editUserTeam']) : "7").'">
                    </div>

                    <div class = "formRow">
                        <input class="submAuthorised" type = "submit" id = "editUser" name = "editUser" value = "Potvrdit změny">
                        
                    </div>
                    <div class = "formRow">
                    <label for = "editQu" hidden>Potvrdit změny</label>
                    </div>
                    
                    '; 
                    include '_divErrorMsg.php'; 
                    echo'
                </fieldset>
            </form>
            <br>
        <br>
        <br><br>
        </div>
        
    ';
?>