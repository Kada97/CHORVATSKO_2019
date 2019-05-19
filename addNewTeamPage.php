<div class="formAuthorisedDiv">
    <form id="addTeamMajorForm" method = "POST">
        <fieldset>
            <legend id="legendGeneralDescription" align="center">Přidat tým</legend>
            
            <h1>Administrativní info - možnosti:</h1>
            <ul>
                <li>Skupina dětí se musí upravit na následující počty:</li>
                <ul>
                    <li>35</li>
                    <ul>
                        <li>Vznikne 5 týmů po 7 dětech</li>
                        <li>Vznikne 7 týmů po 5 dětech</li>
                    </ul>
                    <li>36</li>
                    <ul>
                        <li>Vznikne 6 týmů po 6 dětech</li>
                    </ul>
                    <li>40</li>
                    <ul>
                        <li>Vznikne 5 týmů po 8 dětech</li>
                        <li>Vznikne 8 týmů po 5 dětech</li>
                    </ul>
                    <li>42</li>
                    <ul>
                        <li>Vznikne 6 týmů po 7 dětech</li>
                        <li>Vznikne 7 týmů po 6 dětech</li>
                    </ul>
                    <li>45</li>
                    <ul>
                        <li>Vznikne 5 týmů po 9 dětech</li>
                        <li>Vznikne 9 týmů po 5 dětech</li>
                    </ul>
                </ul>
                <li>Z toho plyne:</li>
                <ul>
                    <li>Množství možných týmů bude v rozmezí mezi 5 a 9</li>
                    <li>Množství počtu členů v týmu bude v rozmezí mezi 5 a 9</li>
                </ul>
                <li>Optimální konfigurace:</li>
                <ul>
                    <li>Vznikne menší počet týmů.</li>
                    <li>Záleží na reálném setkání a vyspělosti jednotlivců.</li>
                    <li>Větší počet týmů by vyžadoval věší samostatnost a duchapřítomnost členů.</li>
                    <li>Pokud bude ve výsledku větší počet týmů, budou se muset soutěže uzpůsobit tak, aby nebyla jednotlivá kola časově náročná.</li>
                </ul>
            </ul>
            
            
            
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
