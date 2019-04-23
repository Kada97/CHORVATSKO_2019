<?php
    include '_connectDB.php';
    sendLog('loginPage', 'Přístup na loginPage.')
?>

<div id="loginFormDiv">
    <form id="loginMajorForm" method="POST">
        <fieldset>
            <legend id="legendLogin" align="center">Přihlášení</legend>
            
            <?php
                include '_divErrorMsg.php';
            ?>

            <div class = "formRow">
                <label for = "username" hidden>Uživatelské jméno: </label>
                <input class = "txtField" type = "text" id = "username" name = "username" value = "<?php echo (isset($_SESSION['loginUsername']) ? htmlspecialchars($_SESSION['loginUsername']) : '')?>" placeholder = "Uživatelské jméno" required autofocus autocomplete="off">
            </div>

            <div class = "formRow">
                <label for = "password" hidden>Heslo: </label>
                <input class = "txtField" type = "password" id = "password" name = "password" placeholder = "Heslo" value = "">
            </div>
            
            <div class = "formRow">
                <label for = "login" hidden>Přihlásit</label>
                <input class="submit" type = "submit" id = "login" name = "login" value = "Přihlásit" >
            </div>  

        </fieldset>
    </form>
            
    <hr>
            
    <form id="loginMinorForm" method="POST">
        <div class = "formRow">
            <label for = "buttonR" hidden>Registrace</label>
            <button id= "buttonR" class="button" name = "registerPage">Registrace</button>
        </div>

        <div class = "formRow">
            <label for = "buttonU" hidden>Zapomenuté uživatelské jméno</label>
            <button id= "buttonU" class="button" name = "forgUsernamePage">Zapomenuté uživatelské jméno</button>
        </div>

        <div class = "formRow">
            <label for = "buttonP" hidden>Zapomenuté heslo nebo potřebuji pomoc</label>
            <button id = "buttonP" class="button" name = "forgPasswordPage">Zapomenuté heslo nebo potřebuji pomoc</button>
        </div>

        <div class = "formRow">
            <label for = "buttonM" hidden>Manuál</label>
            <button id = "buttonM" class="button" name = "readManual">Manuál</button>
        </div>
    </form>
            
</div>
