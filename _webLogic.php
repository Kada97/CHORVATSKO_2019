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
        }
        else {
            foreach ($_POST as $key => $value) {
                switch ($key) {
                    case 'home':		include '_home.php'; break;
//                    case 'addT':                include 'addTeamPage.php'; break;
//                    case 'addNewTeam':          include 'addTeam.php'; break;
//                    case 'addNewCodePage':      include 'addNewCodePage.php'; break;
//                    case 'addNewCode':          include 'addNewCode.php'; break;
//                    case 'editUserPage':        include 'editUserPage.php'; break;
//                    case 'editUserPrep':        include 'editUserPrep.php'; break;
//                    case 'editUser':            include 'editUser.php'; break;
//                    case 'addPicPage':          include 'addNewPicturePage.php'; break;
//                    case 'addNewPic':           include 'addNewPicture.php'; break;
//                    case 'publGall':            include 'publicGalleryPage.php'; break;
//                    case 'privGall':            include 'privateGalleryPage.php'; break;
//                    case 'buttDownPublAll':	include 'downloadAllPublicPictures.php'; break;
//                    case 'ratU':		include 'ratingUsersPage.php'; break;
//                    case 'viewUserPrep':	include 'viewUserPrep.php'; break;
//                    case 'ratT':		include 'ratingTeamsPage.php'; break;
//                    case 'viewTeamPrep':	include 'viewTeamPrep.php'; break;
//                    case 'useCodePage':         include 'useCodePage.php'; break;
//                    case 'useCode':             include 'useCode.php'; break;
//                    case 'dayQuestion':         include 'dayQuestionPage.php'; break;
//                    case 'gameSpiner':          include 'gameSpiner.php'; break;
                    case 'LOGOUT':              include '_logout.php'; /*logOut();*/break;
//                    case 'profile':             include 'profile.php'; break;
//                    case 'settings':            include 'settings.php'; break;
//                    case 'about':               include 'about.php'; break;
//                    case 'coinManager':         include 'coinManager.php'; break;
//                    case 'confirmCoins':        include 'confirmCoins.php'; break;
//                    case 'sendMoneyPage':       include 'sendMoneyPage.php'; break;
//                    case 'confirmSend':         include 'sendMoney.php'; break;
//
                    default:
                        switch ($value) {
                            case 'home':                include '_home.php'; break;
//                            case 'addT':                include 'addTeamPage.php'; break;
//                            case 'addNewTeam':          include 'addTeam.php'; break;
//                            case 'addNewCodePage':      include 'addNewCodePage.php'; break;
//                            case 'addNewCode':          include 'addNewCode.php'; break;
//                            case 'editUserPage':        include 'editUserPage.php'; break;
//                            case 'editUserPrep':        include 'editUserPrep.php'; break;
//                            case 'editUser':            include 'editUser.php'; break;
//                            case 'addPicPage':          include 'addNewPicturePage.php'; break;
//                            case 'addNewPic':           include 'addNewPicture.php'; break;
//                            case 'publGall':            include 'publicGalleryPage.php'; break;
//                            case 'privGall':            include 'privateGalleryPage.php'; break;
//                            case 'buttDownPublAll':     include 'downloadAllPublicPictures.php'; break;
//                            case 'ratU':                include 'ratingUsersPage.php'; break;
//                            case 'viewUserPrep':        include 'viewUserPrep.php'; break;
//                            case 'ratT':                include 'ratingTeamsPage.php'; break;
//                            case 'viewTeamPrep':        include 'viewTeamPrep.php'; break;
//                            case 'useCodePage':         include 'useCodePage.php'; break;
//                            case 'useCode':             include 'useCode.php'; break;
//                            case 'dayQuestion':         include 'dayQuestionPage.php'; break;
//                            case 'gameResults':         include 'gameResultsPage.php'; break;
//                            case 'achievements':        include 'achievementsPage.php'; break;
//                            case 'aboutCoins':          include 'coinsComparePage.php'; break;
//                            case 'uplGall':             include 'uplGalleryPage.php'; break;
//                            case 'caldC':               include 'calendarCamp.php'; break;
//                            case 'caldD':               include 'calendarDay.php'; break;
//                            case 'gameSpiner':          include 'gameSpiner.php'; break;  
//                            case 'coinManager':         include 'coinManager.php'; break;
//                            case 'confirmCoins':        include 'confirmCoins.php'; break;
//                            case 'sendMoneyPage':       include 'sendMoneyPage.php'; break;
//                            case 'sendMoney':           include 'sendMoney.php'; break;
//
                            case 'LOGOUT':              include '_logout.php'; /*logOut();*/break;
//                            case 'profile':             include 'profile.php'; break;
//                            case 'settings':            include 'settings.php'; break;
//                            case 'about':               include 'about.php'; break;
//                            case 'profile':             include 'profile.php'; break;
//                            case 'settings':            include 'settings.php'; break;
//                            case 'about':               include 'about.php'; break;
                            case 'LOGOUT':              include '_logout.php'; /*logOut();*/break;
                            case 'home':                include '_home.php';break;
                            default:                    $key = 'home'; $value = 'home';
                        }
                }
            }
        }
//        if (isset($_SESSION) && $_SESSION['error_msg'] != '') {
//            sendLog('', $_SESSION['error_msg']);
//        }
    }
?>
