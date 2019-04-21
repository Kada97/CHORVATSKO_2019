<div id="form">
    <form method="POST">
        <fieldset>
            <legend>Přihlášení</legend>

            <div class = "formRow">
                <label for = "nick">Uživatelské jméno: </label>
                <input class = "txtField" type = "text" id = "username" name = "username" value = "<?php (isset($_SESSION['loginUsername']) ? htmlspecialchars($_SESSION['loginUsername']) : '')?>" placeholder = "Uživatelské jméno" required autofocus autocomplete="off">
            </div>

            <div class = "formRow">
                <label for = "pswd">Heslo: </label>
                <input class = "txtField" type = "password" id = "password" name = "password" value = "">
            </div>

            <div class = "formRow">
                <input class="subm" type = "submit" id = "login" name = "login" value = "Přihlásit" >
                <label for = "Lgin" hidden>Přihlásit</label>
            </div>

            <?php
                include '_divErrorMsg.php';
            ?>
        </fieldset>
    </form>
            
    <hr>
            
    <form method="POST">
        <div class = "formRow">
            <label for = "butr" hidden>Registrace</label>
            <button id= "butr" class="butt" name = "registerPage">Registrace</button>
        </div>

        <div class = "formRow">
            <label for = "butu" hidden>Zapomenuté uživatelské jméno</label>
            <button id= "butu" class="butt" name = "forgUsernamePage">Zapomenuté uživatelské jméno</button>
        </div>

        <div class = "formRow">
            <label for = "butp" hidden>Zapomenuté heslo nebo potřebuji pomoc</label>
            <button id = "butp" class="butt" name = "forgPasswordPage">Zapomenuté heslo nebo potřebuji pomoc</button>
        </div>

        <div class = "formRow">
            <label for = "butm" hidden>Manuál</label>
            <button id = "butm" class="butt" name = "readManual">Manuál</button>
        </div>
    </form>
            
</div>

<div id="welcomeLogo"></div>