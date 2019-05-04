<div class="formAuthorisedDiv">
    <form id="addCodeMajorForm" method = "POST">
        <fieldset>
            <legend id="legendGeneralDescription" align="center">Přidat kód</legend>

            <?php
                include '_divErrorMsg.php';
            ?>

            <div class = "formRow">
                <label for = "codeText" hidden>Text kódu</label>
                <input class = "txtField" 
                       type = "text" 
                       id = "codeText" 
                       name = "codeText" 
                       placeholder="Text kódu"
                       value = "<?php echo (isset($_SESSION['addNewCodeText']) ? htmlspecialchars($_SESSION['addNewCodeText']) : '')?>" 
                       autofocus required
                       >
            </div>

            <div class = "formRow" id="birthdateLikeRow">
                <label for = "forType">Typ příjemce (1 = user, 2 = team)</label>
                <input type="number" 
                       class = "txtFieldBirthdayLike"
                       name="forType" 
                       value = "<?php echo (isset($_SESSION['addNewCodeForType']) ? htmlspecialchars($_SESSION['addNewCodeForType']) : '')?>"
                       min="1" 
                       max="2" 
                       required
                       >
            </div>

            <div class = "formRow">
                <label for = "valueCode" hidden>Nominální hodnota kódu</label>
                <input class = "txtField" 
                       type = "text" 
                       id = "valueCode" 
                       name = "valueCode" 
                       placeholder="Nominální hodnota kódu"
                       value = "<?php echo (isset($_SESSION['addNewCodeValueCode']) ? htmlspecialchars($_SESSION['addNewCodeValueCode']) : '')?>"
                       required
                       >
            </div>

            <div class = "formRow" id="birthdateLikeRow">
                <label for = "typeGame">Typ hry 
                    <ul>
                        <li>1 = Find & Fill (umisťování QR kódů na různá místa)</li>
                        <li>2 = Treasury - hidden (rafinovaně schovávané QR)</li>
                        <li>3 = Reward (Nemusí být nutně QR; odměna jednotlivce, týmu, či bonusové ohodnocení)</li>
                        <li>4 = Daily Quest (Nemusí být nutně QR; za vykonané úkoly jakéhokoli rázu náleží odměna)</li>
                        <li>5 = InGame (Nemusí být nutně QR; při hrách se můžou objevit kódy)</li>
                        <li>6 = Other (Nemusí být nutně QR; jiné nespecifikované, potřeba vyplnit poznámku</li>
                    </ul>
                </label>
                <input type="number" 
                       name="typeGame" 
                       class = "txtFieldBirthdayLike"
                       min="1" 
                       max="6" 
                       value = "<?php echo (isset($_SESSION['addNewCodeTypeGame']) ? htmlspecialchars($_SESSION['addNewCodeTypeGame']) : '')?>"
                       required=""
                       >
            </div>
            
            <div class = "formRow">
                <label for = "codeText" hidden>Poznámka</label>
                <input class = "txtField" 
                       type = "text" 
                       id = "codeText" 
                       name = "detailText" 
                       placeholder="Poznámka"
                       value = "<?php echo (isset($_SESSION['addNewCodeDetailText']) ? htmlspecialchars($_SESSION['addNewCodeDetailText']) : '')?>" 
                       >
            </div>

            <div class = "formRow">
                <label for = "addCode" hidden>Přidat kód</label>
                <input class="submit" 
                       type = "submit" 
                       id = "addCode" 
                       name = "addNewCode" 
                       value = "Přidat kód"
                       >
            </div>
        </fieldset>
    </form>
</div>
