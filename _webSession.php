<?php
    if (!isset($_SESSION)) {
        session_start();
        $_SESSION['pattern'] = '[a-zA-ZáčďéěíňóřšťůúýžÁČĎÉĚÍŇÓŘŠŤŮÚÝŽ]* ?[a-zA-ZáčďéěíňóřšťůúýžÁČĎÉĚÍŇÓŘŠŤŮÚÝŽ]* ?[0-9]*';
        $_SESSION['error_msg'] = '';
    }
?>
