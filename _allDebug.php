<?php
    foreach ($_POST as $key => $value) {
        echo '[' . $key . '] => ' . $value . '  |  ';
    }
    foreach ($_SESSION as $key => $value) {
        echo '[' . $key . '] => ' . $value . '  |  ';
    }
?>