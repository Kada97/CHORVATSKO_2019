<?php
    echo'
        <div class="formAuthorised">
            <form method = "POST">
                <fieldset>
                    <legend>Uplatnit kód</legend>
                    
                    <div class = "formRow">
                        <label for = "codeText">Text kódu</label>
                    </div>
                    <div class = "formRow">
                        <input class = "txtFieldAuthorised" type = "text" id = "codeText" name = "codeText" value = "'.(isset($_SESSION['useCodeText']) ? htmlspecialchars($_SESSION['useCodeText']) : "").'" autofocus required>
                    </div>
                    
                    <div class = "formRow">
                        <label for = "addCode" hidden>Uplatnit kód</label>
                        <input class="submAuthorised" type = "submit" id = "addCode" name = "useCode" value = "Uplatnit kód">
                    </div>
                    '; 
                    include '_divErrorMsg.php'; 
                    echo'
                </fieldset>
            </form>
            <br><br>
        </div>
        
    ';
?>