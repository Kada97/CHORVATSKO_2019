<?php

$registerSql = "
    INSERT INTO users
    (username, password, verification, firstname, lastname, birthdate, sex, age, agree1, agree2, needhelp)
    VALUES
    ('$username' , '$password' , '$verification' , '$firstname' , '$lastname' , '$birthday' , '$sex' , '$age' , '$agree1' , '$agree2', 'OK')
    ;";

$userdataSql = "
    INSERT INTO userdata
    (username, rank)
    VALUES
    ('$username' , 'NOOB')
    ;";



// CREATING ROWS IN DB
$register = mysqli_query($conn, $registerSql) or die(mysqli_error($conn));
$userData = mysqli_query($conn, $userdataSql) or die(mysqli_error($conn));
$kolikUserdata = 


