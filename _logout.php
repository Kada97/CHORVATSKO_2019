<?php
    //if(isset($_POST["LOGOUT"])){
        logOut();
    //}
    function logOut() {
        sendLog('', 'Uživatel se odhlašuje.');
        unset($_REQUEST);
        unset($_POST);
        unset($_GET);
        unset($_SESSION);
        session_destroy();
        echo("<meta http-equiv='refresh' content='0'>");
    }
 
?>
    <form class="registerMinorForm" method="POST">
        <div class = "formRow">
            <label for = "butl" hidden>Přihlásit se</label>
            <button id= "butl" class="button" name = "loginPage">Přihlásit se</button>
        </div>
    </form>
    
