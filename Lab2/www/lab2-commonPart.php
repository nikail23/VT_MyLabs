<?php
    const PassiveState = "passiveReferenceState";
    const ActiveState = "activeReferenceState";
    const StandartReferencesStateArray = array(PassiveState, PassiveState, PassiveState, PassiveState);

    $referencesStatesArray = StandartReferencesStateArray;

    if (isset($_GET["id"]))
    {
        $id = $_GET["id"];
        switch ($id) {
            case "reference-1":
                $referencesStatesArray[0] = ActiveState;
                break;
            case "reference-2":
                $referencesStatesArray[1] = ActiveState;
                break;
            case "reference-3":
                $referencesStatesArray[2] = ActiveState;
                break;
            case "reference-4":
                $referencesStatesArray[3] = ActiveState;
                break;
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/lab2.css" >
        <title>
            Лабораторная 2. ВТ.
        </title>    
    </head>
    <body >
        <div class="wrapper">
            <div class="referencesList">
                <a href="lab2-commonPart.php?id=reference-1" class="<?php echo $referencesStatesArray[0]?>"> Ссылка 1 </a>
                <a href="lab2-commonPart.php?id=reference-2" class="<?php echo $referencesStatesArray[1]?>"> Ссылка 2 </a>
                <a href="lab2-commonPart.php?id=reference-3" class="<?php echo $referencesStatesArray[2]?>"> Ссылка 3 </a>
                <a href="lab2-commonPart.php?id=reference-4" class="<?php echo $referencesStatesArray[3]?>"> Ссылка 4 </a>
            </div>
            <div class="myForm">
                <form action="lab2-individualPart.php" method="post">
                    Исходный текст: <input type="text" name="sourceText" /><br/>
                    <p><input type="submit" name="actionButton"/></p>
                </form>
            </div>
        </div>
    </body>
</html>