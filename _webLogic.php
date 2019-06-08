<?php
    if (!isset($_SESSION['loggedin'])) {
        if (empty($_POST)) {
            include 'loginPage.php';
        }
        else{
            foreach ($_POST as $key => $value) {
                switch ($key) {
                    case 'registerPage':    include 'registerPage.php';         break;
                    case 'register':        include 'register.php';             break;
                    case 'loginPage':       include 'loginPage.php';            break;
                    case 'login':           include 'login.php';                break;
                    case 'forgUsernamePage':include 'forgotUsernamePage.php';   break;
                    case 'forgUsernameGet': include 'forgotUsername.php';       break;
                    case 'forgPasswordPage':include 'forgotPasswordPage.php';   break;
                    case 'forgPassword':    include 'forgotPassword.php';       break;
                    case 'readManual':      include '_webManual.php';           break;
                }
            }
        }
        if($_SESSION['error_msg'] != '') {
            sendLog('', '');
        }
    }
    else {
        echo '<header><nav>';
        include '_navigation.php';
        echo '</nav></header>';
        
        if (empty($_POST)) {
            include '_home.php';
            include '_dbRecountTeamdata.php';
        }
        else {
            foreach ($_POST as $key => $value) {
                
                //Buttons
                switch ($key) {
                    case 'addNewTeam':          include 'addNewTeam.php';               break;
                    case 'addNewCode':          include 'addNewCode.php';               break;
                    case 'confirmCoins':        include 'confirmCoins.php';             break;
                    case 'addNewPic':           include 'addNewPicture.php';            break;
                    case 'confirmSendMoney':    include 'sendMoney.php';                break;
                    case 'useCode':             include 'useCode.php';                  break;
                    case 'editUserPrep':        include 'editUserPrep.php';             break;
                    case 'editUser':            include 'editUser.php';                 break;
                    case 'confirmSendGift':     include 'gifts.php';                    break;
                    case 'viewUserPrep':        include 'viewUserPrep.php';             break;
                    case 'viewTeamPrep':        include 'viewTeamPrep.php';             break;
                    case 'addGameResult':       include 'addGameResult.php';            break;
                
                    default:
                        //If not buttons, then select-option menu
                        switch ($value) {
                        
                            //ADMIN cases
                            case 'addNewTeamPage':      include 'addNewTeamPage.php';           break;
                            case 'addNewCodePage':      include 'addNewCodePage.php';           break;
                            case 'bankManager':         include 'coinManagerPage.php';          break;
                            case 'editUserPage':        include 'editUserPage.php';             break;
                            case 'giftPage':            include 'giftsPage.php';                break;
                            case 'addGameResultPage':   include 'addGameResultPage.php';        break;
            
                            //USER cases

                            case 'home':                include '_home.php';                    break;
                            case 'privGall':            include 'privateGalleryPage.php';       break;
                            case 'sendMoneyPage':       include 'sendMoneyPage.php';            break;
                            case 'useCodePage':         include 'useCodePage.php';              break;
                            case 'profile':             include 'myProfilePage.php';            break;
                            case 'team':                include 'myTeamPage.php';               break;
                            
                            //USER and HOST cases

                            case 'aboutCurrency':       include 'coinsComparePage.php';         break;
                            case 'manuals':             include 'manualsAndInstructions.php';   break;
                            case 'about':               include 'about.php';                    break;
                            case 'addPicPage':          include 'addNewPicturePage.php';        break;
                            case 'dailyQuestion':       include 'dailyQuestionPage.php';        break;

                            //EVERYONE cases
                        
                            case 'ratU':                include 'ratingUsersPage.php';          break;
                            case 'ratT':                include 'ratingTeamsPage.php';          break;
                            case 'achievements':        include 'achievementsPage.php';         break;
                            case 'gameResults':         include 'gameResultsPage.php';          break;
                            case 'uplGall':             include 'uplGalleryPage.php';           break;
                            case 'publGall':            include 'publicGalleryPage.php';        break;
                            case 'calendar':            include 'calendarCamp.php';             break;
                            case 'LOGOUT':              include '_logout.php';                  break;
                            default:                    $key = 'home'; $value = 'home';

                            
                            //OLD cases
//                            case 'buttDownPublAll':     include 'downloadAllPublicPictures.php'; break;
//                            case 'gameSpiner':          include 'gameSpiner.php'; break;
//                            case 'settings':            include 'settings.php'; break;
                            
                        }
                }
            }
        }
    }
    if (isset($_SESSION) && $_SESSION['error_msg'] != '') {
        sendLog('', $_SESSION['error_msg']);
    }
    
?>
