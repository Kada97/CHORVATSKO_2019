<?php
    include '_connectDB.php';
    sendLog('forgotUsernamePage', 'Přístup na forgotUsernamePage.')
?>

<div id="forgotUsernameFormDiv">
        
            <form id="forgotUsernameMajorForm" method = "POST">
                <fieldset>
                    <legend id="legendForgotUsername" align="center">Zapomenuté uživatelské jméno</legend>
                    
                    <?php include '_divErrorMsg.php'; ?>
                    
                    <div class = "formRow">
                        <label for = "fnam" hidden>Jméno: </label>
                        <input class = "txtField" 
                               type = "text" 
                               id = "fnam" 
                               name = "firstname" 
                               pattern="<?php echo $_SESSION['pattern']?>" 
                               value = "<?php echo (isset($_SESSION['forgotUsernameFirstname']) ? htmlspecialchars($_SESSION['forgotUsernameFirstname']) : '')?>"  
                               placeholder = "Jméno" 
                               required>
                    </div>

                    <div class = "formRow">
                        <label for = "lnam" hidden>Příjmení: </label>
                        <input class = "txtField" 
                               type = "text" 
                               id = "lnam" 
                               name = "lastname" 
                               pattern="<?php echo $_SESSION['pattern']?>" 
                               value = "<?php echo (isset($_SESSION['forgotUsernameLastname']) ? htmlspecialchars($_SESSION['forgotUsernameLastname']) : '')?>" 
                               placeholder = "Příjmení" 
                               required>
                    </div>
                    
                    <div class = "formRow" id="birthdateLikeRow">
                        <label for = "bday">Datum narození: </label>
                        <input class = "txtFieldBirthdayLike" 
                               type = "date" 
                               id = "bday" 
                               name = "birthdate" 
                               value = "<?php echo (isset($_SESSION['forgotUsernameBirthdate']) ? htmlspecialchars($_SESSION['forgotUsernameBirthdate']) : '')?>" 
                               required>
                    </div>
                    
                    <div class = "formRow">
                        <input class="submit" 
                               type = "submit" 
                               id = "getN" 
                               name = "forgUsernameGet" 
                               value = "Získat">
                        <label for = "getN" hidden>Získat</label>
                    </div>
                      
                </fieldset>
            </form>
            
            <hr>
            
            <form id="forgotUsernameMinorForm" method="POST">
                <div class = "formRow">
                    <label for = "butB" hidden>Zpět</label>
                    <button id= "butB" class="button" name = "loginPage">Zpět</button>
                </div>
            </form>
            
        </div>
        
