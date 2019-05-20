<div class="formAuthorisedDiv">
    <form id="editUserMajorForm" method = "POST">
        <fieldset>
            <legend id="legendGeneralDescription" align="center">
                <?php echo 'Úprava uživatele: '.$_SESSION["editUserFirstname"].' '.$_SESSION["editUserLastname"].' - '.$_SESSION["editUserUsername"];?>
            </legend>

            <?php
                include '_divErrorMsg.php';
            ?>

            <div class = "formRow" id="birthdateLikeRow">
                <label for = "edUsername">Uživatelské jméno:</label>
                <input class = "txtField" 
                         type = "text" 
                         id = "edUsername" 
                         name = "editUsername" 
                         value = "<?php echo (isset($_SESSION['editUserUsernameNew']) ? htmlspecialchars($_SESSION['editUserUsernameNew']) : htmlspecialchars($_SESSION['editUserUsername']));?>" 
                         disabled
                         >
            </div>

            <div class = "formRow" id="birthdateLikeRow">
                <label for = "edFirstname">Jméno:</label>
                <input class = "txtField" 
                       type = "text" 
                       id = "edFirstname" 
                       name = "editFirstname" 
                       value = "<?php echo (isset($_SESSION['editUserFirstnameNew']) ? htmlspecialchars($_SESSION['editUserFirstnameNew']) : htmlspecialchars($_SESSION['editUserFirstname']));?>" 
                       required>
            </div>

            <div class = "formRow" id="birthdateLikeRow">
                <label for = "edLastname">Příjmení:</label>
                <input class = "txtField" 
                       type = "text" 
                       id = "edLastname" 
                       name = "editLastname" 
                       value = "<?php echo (isset($_SESSION['editUserLastnameNew']) ? htmlspecialchars($_SESSION['editUserLastnameNew']) : htmlspecialchars($_SESSION['editUserLastname']));?>" 
                       required>
            </div>

            <div class = "formRow" id="birthdateLikeRow">
                <label for = "edPassword">Heslo:</label>
                <input class = "txtField" 
                       type = "text" 
                       id = "edPassword" 
                       name = "editPassword" 
                       value = "<?php echo (isset($_SESSION['editUserPasswordNew']) ? htmlspecialchars($_SESSION['editUserPasswordNew']) : htmlspecialchars($_SESSION['editUserPassword']));?>" 
                       required>
            </div>

            <div class = "formRow" id="birthdateLikeRow">
                <label for = "edVerification">Verifikace: </label>
                <input class = "txtField" 
                       type = "text" 
                       id = "edVerification" 
                       name = "editVerification" 
                       value = "<?php echo (isset($_SESSION['editUserVerificationNew']) ? htmlspecialchars($_SESSION['editUserVerificationNew']) : htmlspecialchars($_SESSION['editUserVerification']));?>" 
                       required>
            </div>

            <div class = "formRow" id="birthdateLikeRow">
                <label for = "edAge">Věk:</label>
                <input class = "txtField" 
                       type = "text" 
                       id = "edAge" 
                       name = "editAge" 
                       value = "<?php echo (isset($_SESSION['editUserAgeNew']) ? htmlspecialchars($_SESSION['editUserAgeNew']) : htmlspecialchars($_SESSION['editUserAge']));?>" 
                       required>
            </div>

            <div class = "formRow" id="birthdateLikeRow">
                <label for = "edBirthdate">Datum narození: </label>
                <input class = "txtField" 
                       type = "date" 
                       id = "edBirthdate" 
                       name = "editBirthdate" 
                       value = "<?php echo (isset($_SESSION['editUserBirthdateNew']) ? $_SESSION['editUserBirthdateNew'] : $_SESSION['editUserBirthdate']);?>" 
                       required>
            </div>

            <div class = "formRow" id="birthdateLikeRow">
                <label for = "edSexMale" class ="radioTextRegister" id = "sexMale">Muž: </label>
                <input type = "radio" 
                       id = "edSexMale" 
                       name = "editSex" 
                       value = "Male" 
                       required
                       <?php echo (isset($_SESSION['editUserSex']) && $_SESSION['editUserSex'] == 'Male' ? 'checked' : '');?> > 
            </div>

            <div class = "formRow" id="birthdateLikeRow">    
                <label for = "edSexFemale" class ="radioTextRegister" id = "sexFemale">Žena: </label>
                <input type = "radio" 
                       id="edSexFemale" 
                       name = "editSex" 
                       value = "Female" 
                       <?php echo (isset($_SESSION['editUserSex']) && $_SESSION['editUserSex'] == 'Female' ? 'checked' : '');?> >
            </div>

            <div class = "formRow" id="birthdateLikeRow">
                <label for = "edNeedhelp">Potřebuje pomoci: (default: OK)</label>
                <input class = "txtField" 
                       type = "text" 
                       id = "edNeedhelp" 
                       name = "editNeedhelp" 
                       value = "<?php echo (isset($_SESSION['editUserNeedhelpNew']) ? htmlspecialchars($_SESSION['editUserNeedhelpNew']) : htmlspecialchars($_SESSION['editUserNeedhelp']));?>" 
                       required>
            </div>

            <div class = "formRow" id="birthdateLikeRow">
                <label for = "edTeam">Je členem týmu: (ID)</label>
                <input type="number" 
                       name="editTeam" 
                       class = "txtField"
                       min="1" 
                       max="7" 
                       value = "<?php echo (isset($_SESSION['editUserTeam']) ? htmlspecialchars($_SESSION['editUserTeam']) : '');?>" 
                       required>
            </div>

            <div class = "formRow">
                <label for = "editQu" hidden>Potvrdit změny</label>
                <input class="submit" 
                       type = "submit" 
                       id = "editUser" 
                       name = "editUser" 
                       value = "Potvrdit změny">
            </div>

        </fieldset>
    </form>
</div>