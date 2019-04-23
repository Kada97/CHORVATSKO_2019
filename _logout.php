<?php
    //if(isset($_POST["LOGOUT"])){
        logOut();
    //}
    function logOut() {
        sendLog('', 'Uživatel se odhlašuje.');
        unset($_SESSION);
        unset($_REQUEST);
        session_destroy();
        unset($_POST);
        unset($_GET);
        header('Refresh: 0');
        header('Location: .');
    }
?>
