<?php
    const PhpFileNamesArray = array(
        "lab2-commonPart1.php",
        "lab2-commonPart2.php",
        "lab2-commonPart3.php",
        "lab2-commonPart4.php"
    );
    const PassiveState = "passiveReferenceState";
    const ActiveState = "activeReferenceState";
    const StandartReferencesStateArray = array(PassiveState, PassiveState, PassiveState, PassiveState);

    $referencesStatesArray = StandartReferencesStateArray;

    if (strstr($currentPage, PhpFileNamesArray[0])) {
        $referencesStatesArray[0] = ActiveState;
    } else if (strstr($currentPage, PhpFileNamesArray[1])) {
        $referencesStatesArray[1] = ActiveState;
    } else if (strstr($currentPage, PhpFileNamesArray[2])) {
        $referencesStatesArray[2] = ActiveState;
    } else if (strstr($currentPage, PhpFileNamesArray[3])) {
         $referencesStatesArray[3] = ActiveState;
    }
?>