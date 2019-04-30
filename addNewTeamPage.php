<div class="formAuthorisedDiv">
    <form id="addTeamMajorForm" method = "POST">
        <fieldset>
            <legend id="legendGeneralDescription" align="center">Přidat tým</legend>
            
            <?php
                include '_divErrorMsg.php';
            ?>

            <div class = "formRow">
                <label for = "nameTeam" hidden>Jméno týmu:</label>
                <input class = "txtField" 
                       type = "text" 
                       id = "nameTeam" 
                       name = "name"
                       value = "<?php echo (isset($_SESSION['addTeamName']) ? htmlspecialchars($_SESSION['addTeamName']) : '')?>"
                       placeholder = "Jméno týmu" 
                       autofocus required
                       >
            </div>

            <div class = "formRow" id ="birthdateLikeRow">
                <label for = "numbMembers">Počet členů:</label>
                <input type="number" 
                       class = "txtFieldBirthdayLike"
                       name="numbMembers"
                       min="5" 
                       max="9" 
                       value = "<?php echo (isset($_SESSION['addTeamNumbMembers']) ? htmlspecialchars($_SESSION['addTeamNumbMembers']) : '')?>"
            </div>

            <div class = "formRow">
                <label for = "colorTeam" hidden>Barva:</label>
                <input class = "txtField" 
                       type = "text" 
                       id = "colorTeam" 
                       name = "color" 
                       value = "<?php echo (isset($_SESSION['addTeamColor']) ? htmlspecialchars($_SESSION['addTeamColor']) : '')?>"
                       placeholder = "Barva" 
                       required>
            </div>

            <div class = "formRow">
                <label for = "addTeam" hidden>Přidat tým:</label>
                <input class="submit" 
                       type = "submit" 
                       id = "addTeam" 
                       name = "addNewTeam" 
                       value = "Přidat tým">
            </div>
            
        </fieldset>
    </form>
</div>
