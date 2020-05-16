<?php
    session_start();
    
    include 'consts.php';
    const SecondScriptPageName = "Следующая страница";

    $_SESSION[SessionName] = "session";
    $array = array(1, 2, 3, 4, 5);
    $_SESSION[FirstSessionParameterName] = serialize($array);

    echo "<a href='".SecondScriptPath."'> ".SecondScriptPageName." </a>";
?>
