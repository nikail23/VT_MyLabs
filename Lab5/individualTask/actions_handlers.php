<?php
    include 'consts.php';
    include 'functions.php';

    require 'database_connect.php';

    $tableName = '';
    $actionName = '';

    if (isset($_POST['tableSelect']) && isset($_POST['actionSelect'])) {
        $tableName = $_POST['tableSelect'];
        $actionName = $_POST['actionSelect'];
        
        echo "<link rel='stylesheet' href='css/style.css'>";
        switch ($actionName) {
            case ActionList[0]:
                require 'actions/add.php';
            break;
            case ActionList[1]:
                require 'actions/delete.php';
            break;
            case ActionList[2]:
                require 'actions/edit.php';
            break;
            case ActionList[3]:
                require 'actions/view.php';
            break;
            default:
                die('Полученная строка действия не соответствует ни одному известному действию!');
        }
    }
    else {
        die("Ошибка передачи параметров!");
    }

    echo "<a href='index.php'> На главную! </a>";

    require 'database_close.php';
?>

