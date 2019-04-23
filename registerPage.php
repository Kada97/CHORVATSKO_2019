<?php
    include '_connectDB.php';
    sendLog('registerPage', 'Přístup na registerPage.')
?>

<div id="registerFormDiv">
    <form id="registerMajorForm" method="POST">
        <fieldset>
            <legend id="legendRegister" align="center">Registrace - Všechna pole musí být vyplněna</legend>
            
            <?php
                include '_divErrorMsg.php';
            ?>

            <div class = "formRow">
                <label for = "nick" hidden>Uživatelské jméno: </label>
                <input type = "text" 
                       class = "txtField"
                       id = "username" 
                       name = "username" 
                       pattern="<?php echo $_SESSION['pattern']?>" 
                       value = "<?php echo (isset($_SESSION['registerUsername']) ? htmlspecialchars($_SESSION['registerUsername']) : '')?>" 
                       placeholder = "Uživatelské jméno" 
                       onkeyup="checkDB(this.value, this.name)" 
                       required autofocus
                       >
            </div>

            <div class = "formRow">
                <label for = "pswO" hidden>Heslo: </label>
                <input type = "password"
                       class = "txtField" 
                       id = "pswO" 
                       name = "password" 
                       value = "" 
                       placeholder = "Heslo" 
                       onkeyup="checkDB(this.value, this.name)" 
                       required
                       >
            </div>

            <div class = "formRow">
                <label for = "pswC" hidden>Kontrola hesla: </label>
                <input type = "password"
                       class = "txtField" 
                       id = "pswC" 
                       name = "passwordCheck" 
                       value = "" 
                       placeholder = "Heslo - kontrola" 
                       onkeyup="checkDB(this.value, this.name)" 
                       required
                       >

                <hr>
            </div>

            <div class = "formRow">
                <label for = "fnam" hidden>Jméno: </label>
                <input type = "text" 
                       class = "txtField" 
                       id = "firstname" 
                       name = "firstname" 
                       pattern="<?php echo $_SESSION['pattern']?>" 
                       value = "<?php echo (isset($_SESSION['registerFirstname']) ? htmlspecialchars($_SESSION['registerFirstname']) : '')?>" 
                       placeholder = "Jméno" 
                       required
                       >
            </div>

            <div class = "formRow">
                <label for = "lnam" hidden>Příjmení: </label>
                <input type = "text" 
                       accept=""class = "txtField" 
                       id = "lastname" 
                       name = "lastname" 
                       pattern="<?php echo $_SESSION['pattern']?>"  
                       value = "<?php echo (isset($_SESSION['registerLastname']) ? htmlspecialchars($_SESSION['registerLastname']) : '')?>" 
                       placeholder = "Příjmení" 
                       required
                       >
            </div>

            <div class = "formRow" id ="birthdateLikeRow">
                <label for = "bday">Datum narození: </label>
                <input type = "date"
                       class = "txtFieldBirthdayLike" 
                       id = "birthdate" 
                       name = "birthdate"
                       value = "<?php echo (isset($_SESSION['registerBirthday']) ? $_SESSION['registerBirthday'] : '')?>"
                       required
                       >
            </div>

            <div class = "formRow" id ="birthdateLikeRow">
                <input type = "radio" 
                       id = "sexMale" 
                       name = "sex" 
                       value = "Male" 
                       required 
                       <?php echo (isset($_SESSION['registerSex']) && $_SESSION['registerSex'] == 'Male' ? 'checked' : '')?>
                       >
                <label for = "sexM" class ="radioTextRegister" id = "sexMale">Muž</label>
            </div>

            <div class = "formRow" id ="birthdateLikeRow">
                <input type = "radio" 
                       id="sexFemale" 
                       name = "sex" 
                       value = "Female" 
                       <?php echo (isset($_SESSION['registerSex']) && $_SESSION['registerSex'] == 'Female' ? 'checked' : '') ?>
                       >
                <label for = "sexF" class ="radioTextRegister" id = "sexFemale">Žena</label>
            </div>

            <div class = "formRow" id ="birthdateLikeRow">
                <input type = "checkbox" 
                       id = "chB1" 
                       name = "agree1" 
                       value = "ON"
                       <?php echo (isset($_SESSION['registerAgree1']) ? 'checked' : '') ?>
                       checked
                       >
                <label for = "chB1" class ="checkboxTextRegister">Udělení souhlasu k uložení dat na server Dominika Kadečky k tomuto webu. Data budou využita pro správu a pomoc ve spojitosti konání táborových her.</label>
            </div>

            <div class = "formRow" id ="birthdateLikeRow">
                <input type = "checkbox" 
                       id = "chB2" 
                       name = "agree2" 
                       value = "ON" 
                       <?php echo (isset($_SESSION['registerAgree2']) ? 'checked' : '') ?> 
                       checked
                       >
                <label for = "chB2" class ="checkboxTextRegister">Udělení souhlasu k využívání zadaných dat (kromě hesla) a vypočítaných dat pro reprezentativní účely na webu a vedení statistik.</label>
            </div>

            <div class = "formRow">
                <label for = "regB" hidden>Dokončit registraci: </label>
                <input class = "submit" 
                       type = "submit" 
                       id = "regB" 
                       name = "register" 
                       value = "Dokončit registraci"
                       >
            </div>

        </fieldset>
    </form>

    <hr>

    <form class="registerMinorForm" method="POST">
        <div class = "formRow">
            <label for = "butl" hidden>Přihlásit se</label>
            <button id= "butl" class="button" name = "loginPage">Přihlásit se</button>
        </div>
    </form>

</div>
