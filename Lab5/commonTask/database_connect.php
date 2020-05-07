<?php
    $databaseLink = mysqli_connect(Host, User, Password, Database) or die(getErrorString());

    $query = "SET CHARACTER SET 'UTF8'";
    mysqli_query($databaseLink, $query) or die(getErrorString());

    $query = "SET NAMES 'UTF8'";
    mysqli_query($databaseLink, $query) or die(getErrorString());
?>
    