<div id="navBar">
<?php
    if (isSet($_SESSION['username'])) {
	if ($_SESSION['username'] == "Admin") {
	   
        echo    '<form method="POST">
	    ';/*
                    <label for = "buttHom" hidden>Přehled</label>
                    <button id= "buttHom" name = "home" class="navButton">Přehled</button>
			
                    <label for = "buttRatU" hidden>Žebříček uživatelů</label>
                    <button id= "buttRatU" name = "ratU" class="navButton">Žebříček uživatelů</button>
		    
		    <label for = "buttRatT" hidden>Žebříček týmů</label>
                    <button id= "buttRatT" name = "ratT" class="navButton">Žebříček týmů</button>

		    <label for = "buttAddPic" hidden>Přidat obrázek</label>
                    <button id= "buttAddPic" name = "addPicPage" class="navButton">Přidat obrázek</button>
		    
		    <label for = "buttDQu" hidden>Hádanky</label>
                    <button id= "buttDQu" name = "dayQuestion" class="navButton">Hádanky</button>

		    <label for = "buttPublGall" hidden>Galerie</label>
                    <button id= "buttPublGall" name = "publGall" class="navButton">Galerie</button>
		    
		    <label for = "buttUseCode" hidden>Uplatnit kód</label>
                    <button id= "buttUseCode" name = "useCodePage" class="navButton">Uplatnit kód</button>

		    <label for = "buttPrivGall" hidden>Soukromá galerie</label>
                    <button id= "buttPrivGall" name = "privGall" class="navButton">Soukromá galerie</button>
	 
		    <label for = "buttDownPublAll" hidden>Stáhnout všechny veřejné obrázky</label>
                    <button id= "buttDownPublAll" name = "buttDownPublAll" class="navButton">Stáhnout všechny veřejné obrázky</button>
		    
        '; */
//        if(isset($_SESSION["admin"]) && $_SESSION["username"] == "Admin"){echo'
//                    ';/*<label for = "buttAddT" hidden>Přidat tým</label>
//                    <button id= "buttAddT" name = "addT" class="navButton">Přidat tým</button>*/;echo'
//                    <label for = "buttAddCode" hidden>Přidat kód</label>
//                    <button id= "buttAddCode" name = "addNewCodePage" class="navButton">Přidat kód</button>
//                    <label for = "buttEditUser" hidden>Upravit uživatele</label>
//                    <button id= "buttEditUser" name = "editUserPage" class="navButton">Upravit uživatele</button>
//		    <label for = "buttCoinMan" hidden>Žetonový manager</label>
//                    <button id= "buttCoinMan" name = "coinManager" class="navButton">Žetonový manager</button>
//        ';}            
//        echo    '</form>'; 
	/*
            echo    '<form method="POST" name = "homeNav" id = "homeOptions">
                        <div class="navSelect">
                            <label for = "homeOption" hidden>Option</label>
                            <select id = "homeOption" name = "homeOption" onChange="go()" >
                                <option value="msg" disabled selected hidden>
                                    Menu
                                </option>
                                <option value = "profile">
                                    Můj profil
                                </option>
                                <option value = "team">
                                    Můj tým
                                </option>
                                <option value = "about">
                                    About us
                                </option>
                                <option value = "LOGOUT">
                                    Logout
                                </option>
                            </select>
                        </div>
                    </form>';
	*/}
	    
///////////////////////////////////////	
///////////////////////////////////////
    }?>	    
    
    <form method="POST" name = "homeNav" id = "mobileOptions">
        <div class="navSelectMobile">
            <label for = "mobileOptions" hidden>Menu</label>
            <select id = "mobileOptions" name = "mobileOptions" onChange="go()" >
                <option value="msg" disabled selected hidden>
                    Menu
                </option>
<!--                    <option value = "home">
                    Přehled
                </option>
                <option value = "caldC">
                    Kalendář celého tábora
                </option>
                <option value = "caldD">
                    Kalendář dne
                </option>
                <option value = "ratU">
                    Žebříček uživatelů
                </option>
                <option value = "ratT">
                    Žebříček týmů
                </option>
                <option value = "profile">
                    Můj profil
                </option>
                <option value = "team">
                    Můj tým
                </option>
                <option value = "gameResults">
                    Výsledky z her
                </option>
                <option value = "achievements">
                    Rekordy
                </option>
                <option value = "gameSpiner">
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
                <option value = "buttDownPublAll">
                    Stáhnout vše veřejné
                </option>
                <option value = "dayQuestion">
                   Hádanky
                </option>
                <option value = "useCodePage">
                    Použít kód
                </option>
                <option value = "sendMoneyPage">
                    Poslat peníze
                </option>
                <option value = "aboutCoins">
                    Jak vypadají žetony
                </option>
                <option value = "about">
                    O tomto webu
                </option>-->
                <option value = "LOGOUT">
                    Logout
                </option>
            </select>
        </div>
    </form>
</div>
    