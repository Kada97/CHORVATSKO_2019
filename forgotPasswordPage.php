<?php
    include '_connectDB.php';
    sendLog('forgotPasswordPage', 'Přístup na forgotPasswordPage.')
?>
<div id="forgotPasswordFormDiv">
        
    <form id="forgotPasswordMajorForm" method = "POST">
        <fieldset>
            <legend id="legendForgotPassword" align="center">Zapomenuté heslo nebo žádost o pomoc (po odeslání dojde k návratu na hlavní stránku)</legend>

            <?php include '_divErrorMsg.php'; ?>

            <div class = "formRow">
                <label for = "username" hidden>Uživatelské jméno: </label>
                <input class = "txtField" 
                       type = "text" 
                       id = "username" 
                       name = "username" 
                       value = "<?php echo (isset($_SESSION['forgotPasswordUsername']) ? htmlspecialchars($_SESSION['forgotPasswordUsername']) : '')?>" 
                       placeholder = "Uživatelské jméno" 
                       required autofocus>
            </div>

            <div class = "formRow" id="birthdateLikeRow">
                <label for = "bday">Narozeniny: </label>
                <input class = "txtFieldBirthdayLike" 
                       type = "date" 
                       id = "bday" 
                       name = "birthdate" 
                       value = "<?php echo (isset($_SESSION['forgotPasswordBirthdate']) ? htmlspecialchars($_SESSION['forgotPasswordBirthdate']) : '')?>" 
                       required>
            </div>

            <div class = "formRow">
                <input class="submit" type = "submit" id = "nextStepRes" name = "forgPassword" value = "Zažádat">
                <label for = "nextStepRes" hidden>Zažádat</label>
            </div>

        </fieldset>
    </form>

    <hr>

    <form id="forgotPasswordMinorForm" method="POST">
        <div class = "formRow">
            <label for = "butB" hidden>Zpět</label>
            <button id= "butB" class="button" name = "loginPage">Zpět</button>
        </div>
    </form>

</div>
