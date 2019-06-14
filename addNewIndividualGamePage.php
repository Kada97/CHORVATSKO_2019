<div class="formAuthorisedDiv">
    <form id="addIndividualGameMajorForm" method = "POST">
        <fieldset>
            <legend id="legendGeneralDescription" align="center">Přidat hru</legend>
            
            <?php
                include '_divErrorMsg.php';
            ?>

            <div class = "formRow">
                <label for = "nameGame" hidden>Jméno hry:</label>
                <input class = "txtField" 
                       type = "text" 
                       id = "nameGame" 
                       name = "name"
                       placeholder = "Jméno hry" 
                       autofocus required
                       >
            </div>

            <div class = "formRow">
                <label for = "nameUnit" hidden>Jméno jednotky pro skóre: (střel, ml, kg, pokusů, min, sec, běhů... )</label>
                <input class = "txtField" 
                       type = "text" 
                       id = "nameUnit" 
                       name = "nameUnit"
                       placeholder = "Jméno jednotky pro skóre: (střel, ml, kg, pokusů, min, sec, běhů... )" 
                       required
                       >
            </div>
<!--
            <div class = "formRow">
                <label for = "openTime" hidden>Čas otevření stanoviště v minutách</label>
                <input class = "txtField" 
                       type = "text" 
                       id = "openTime" 
                       name = "openTime"
                       placeholder = "Čas otevření stanoviště v minutách" 
                       required
                       >
            </div>-->

            <div class = "formRow">
                <label for = "addTeam" hidden>Přidat hru:</label>
                <input class="submit" 
                       type = "submit" 
                       id = "addGame" 
                       name = "addNewGame" 
                       value = "Přidat hru">
            </div>
            
        </fieldset>
    </form>
</div>
