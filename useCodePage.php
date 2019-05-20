<div class="formAuthorisedDiv">
    <form id="useCodeMajorForm" method = "POST">
        <fieldset>
            <legend id="legendGeneralDescription" align="center">Uplatnit kód</legend>
            
            <?php
                include '_divErrorMsg.php';
            ?>

            <div class = "formRow" id="birthdateLikeRow">
                <label for = "codeText">Text kódu</label>
                <input class = "txtField" 
                       type = "text" 
                       id = "codeText" 
                       name = "codeText" 
                       value = "<?php echo (isset($_SESSION['useCodeText']) ? htmlspecialchars($_SESSION['useCodeText']) : '');?>" 
                       autofocus 
                       required>
            </div>

            <div class = "formRow">
                <label for = "addCode" hidden>Uplatnit kód</label>
                <input class="submit" 
                       type = "submit" 
                       id = "addCode" 
                       name = "useCode" 
                       value = "Uplatnit kód">
            </div>
        </fieldset>
    </form>
</div>
        