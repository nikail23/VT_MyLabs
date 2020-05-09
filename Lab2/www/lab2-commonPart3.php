<?php 
    $currentPage = __FILE__;
    include "navigation.php"; 
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
                <a href="lab2-commonPart1.php" class="<?php echo $referencesStatesArray[0]?>"> Ссылка 1 </a>
                <a href="lab2-commonPart2.php" class="<?php echo $referencesStatesArray[1]?>"> Ссылка 2 </a>
                <a href="lab2-commonPart3.php" class="<?php echo $referencesStatesArray[2]?>"> Ссылка 3 </a>
                <a href="lab2-commonPart4.php" class="<?php echo $referencesStatesArray[3]?>"> Ссылка 4 </a>
            </div>
            <div class="myForm">
                <p>Это 3 страница!</p>
                <form action="lab2-individualPart.php" method="post">
                    Исходный текст: <input type="text" name="sourceText" /><br/>
                    <p><input type="submit" name="actionButton"/></p>
                </form>
            </div>
        </div>
    </body>
</html>