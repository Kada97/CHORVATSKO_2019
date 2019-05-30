<div id="navBar" <?php echo (isset($_SESSION['loggedin'])) ? '' : 'hidden' ?>>
   
    <!--NON-ADMIN MENU-->
    <?php 
        echo (isSet($_SESSION['username']) && $_SESSION['username'] == 'Admin')
        ? '<!--'
        : ''
    ?>
    <form method="POST" 
          name = "homeNav" 
          id = "mobileOptions" 
          <?php echo (isSet($_SESSION['username']) && $_SESSION['username'] == 'Admin')
          ? 'hidden disabled'
          : ''
          ?>
    >
        <div class="navSelectMobile">
            <label for = "mobileOptions" hidden>Menu</label>
            <select id = "mobileOptions" name = "mobileOptions" onChange="go()" >
                <option value="msg" disabled selected hidden>
                    Menu
                </option>
                <option value = "home" disabled>
                    Přehled
                </option>
                <option value = "calendar">
                    Kalendář
                </option>
                <option value = "ratU">
                    Žebříček uživatelů
                </option>
                <option value = "ratT" disabled>
                    Žebříček týmů
                </option>
                <option value = "profile" disabled>
                    Můj profil
                </option>
                <option value = "team" disabled>
                    Můj tým
                </option>
                <option value = "gameResults">
                    Výsledky z her
                </option>
                <option value = "achievements">
                    Rekordy
                </option>
                <option value = "gameSpiner" disabled>
                    Hra Automat
                </option>
                <option value = "addPicPage">
                   Přidat obrázek
                </option>
                <option value = "publGall">
                    Galerie
                </option>
                <option value = "privGall">
                    Soukromá galerie
                </option>
                <option value = "uplGall">
                    Všechny mé uploadované obrázky
                </option>
                <option value = "buttDownPublAll" disabled>
                    Stáhnout vše veřejné
                </option>
                <option value = "dailyQuestion">
                    Hádanky
                </option>
                <option value = "useCodePage">
                    Použít kód
                </option>
                <option value = "sendMoneyPage">
                    Poslat peníze
                </option>
                <option value = "manuals">
                    Návody a pokyny
                </option>
                <option value = "about">
                    O tomto webu
                </option>
                <option value = "LOGOUT">
                    Logout
                </option>
            </select>
        </div>
    </form>
    <?php echo (isSet($_SESSION['username']) && $_SESSION['username'] == 'Admin') ? '-->' : ''; ?>
    
    <!--ADMIN MENU-->
    <?php echo (isSet($_SESSION['username']) && $_SESSION['username'] == 'Admin') ? '' : '<!--'; ?>
    
    <form method="POST" 
          name = "homeNavAdmin" 
          id = "mobileOptions" 
        <?php echo (isSet($_SESSION['username']) && $_SESSION['username'] == 'Admin') ? '' : 'hidden disabled ' ?>
    >  
        <div class="navSelectMobile">
            <label for = "mobileOptions" hidden>Admin menu</label>
            <select id = "mobileOptions" name = "mobileOptions" onChange="goAdmin()" >
                <option value="msg" disabled selected hidden>
                    Admin menu
                </option>
                <option value = "calendar">
                    Kalendář
                </option>
                <option value = "addNewTeamPage">
                    Přidat tým
                </option>
                <option value = "addNewCodePage">
                    Přidat kód
                </option>
                <option value = "editUserPage">
                    Upravit uživatele
                </option>
                <option value = "bankManager">
                    Bankovní manažer
                </option>
                <option value = "addPicPage">
                   Přidat obrázek
                </option>
                <option value = "publGall">
                    Galerie
                </option>
                <option value = "privGall">
                    Soukromá galerie
                </option>
                <option value = "uplGall">
                    Všechny mé uploadované obrázky
                </option>
                <option value = "giftPage">
                    Dary
                </option>
                
                
                
                <option value = "LOGOUT">
                    Logout
                </option>
            </select>
        </div>
    </form>
    <?php echo (isSet($_SESSION['username']) && $_SESSION['username'] == 'Admin') ? '' : '-->' ?>
    
</div>
