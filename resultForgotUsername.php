<div id="forgotUsernameFormDiv">
    <fieldset>
        <legend id="legendForgotUsername">Výsledek hledání</legend>

        <div class = "formRow" id="birthdateLikeRow">
            <label for = "resultUsername">Hledané uživatelské jméno je: </label>
            <input class = "txtFieldBirthdayLikeResult" 
                   type = "text" 
                   id = "resultUsername" 
                   name = "resultUsername" 
                   value = "<?php echo htmlspecialchars($accountUsername); ?>" 
                   readonly>
        </div>

    </fieldset>
    
    <hr>

    <form method="POST">
        <div class = "formRow">
            <label for = "butB" hidden>Zpět</label>
            <button id= "butB" class="button" name = "loginPage">Zpět</button>
        </div>
    </form>
            
</div>
