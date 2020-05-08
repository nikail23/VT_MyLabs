<?php
    session_start();

    include 'consts.php';

    $array = unserialize($_SESSION[FirstSessionParameterName]);
    echo 'Переданный массив: '.NewLine;
    foreach ($array as $arrayElement) {
        echo $arrayElement.NewLine;
    }

    unset($_SESSION[FirstSessionParameterName]);
    session_destroy();
?>