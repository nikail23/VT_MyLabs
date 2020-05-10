<?php
    include "graphic_consts.php";

    function getLastDatesArray(int $pastDaysCount) {
        $lastDatesArray = array();
        for ($i = 0; $i < $pastDaysCount; $i++) {
            $dateTime = new DateTime('now');
            $dateTime->modify("-$i days");
            array_push($lastDatesArray, $dateTime);
        }
        return array_reverse($lastDatesArray);
    }

    function getLogDatesSortArray(array $fileArray) {
        for ($i = 0; $i < sizeof($fileArray); $i++) {
            $logString = explode("|", $fileArray[$i]);
            $logDatesArray[$i] = $logString[0]; 
        }
        foreach ($logDatesArray as &$logDate) {
            $dataRegExp = "/[^: ][\w+\.]+[^: ]/";
            preg_match_all($dataRegExp, $logDate, $matches);
            $logDate = $matches[0][0];
        }
        return $logDatesArray;
    }

    function getVisitsCountArray(array $fileArray, int $pastDaysCount) {
        $logDatesArray = getLogDatesSortArray($fileArray);
        $lastDatesArray = getLastDatesArray($pastDaysCount);
        $visitsCountArray = array();

        foreach ($lastDatesArray as $date) {
            $visitsCount = 0;
            foreach ($logDatesArray as $logDate) {
                if ($logDate == $date->format("d.m.Y")) {
                    $visitsCount++;
                }
            }
            array_push($visitsCountArray, $visitsCount);
        }
        return $visitsCountArray;
    }

    function writeGraphicPoints(array $visitsCountArray) {
        $x = 0;
        foreach ($visitsCountArray as $visitsCount) {
            $y = GraphicHeight - $visitsCount*DeltaY;
            echo "$x, $y ";
            $x += DeltaX;
        }
    }

    function writeCirclesAndTextOnPoints(array $visitsCountArray) {
        $x = 0;
        foreach ($visitsCountArray as $visitsCount) {
            $y = GraphicHeight - $visitsCount*DeltaY;
            echo "<circle cx=$x cy=$y r=\"4\"></circle>";
            echo "<text x=\"$x\" y=\"".($y-10)."\">$visitsCount</text>";
            $x += DeltaX;
        }
    }

    if (isset($_GET['col'])) { 
        $col = $_GET['col']; 
    } 
    else { 
        $col = 50; 
    }

    $file = file("stat.log");
?>

<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h3> График посещаемости сайта </h3>
        <div class="scroll-div">
            <svg 
            width="
                <?=GraphicWidth?>" 
            height="
                <?=GraphicHeight?>" 
            viewBox="
                <?=XCoordinateStart?>
                <?=YCoordinateStart?>
                <?=GraphicWidth?> 
                <?=GraphicHeight?>" 
            class=
                "chart">
                <polyline
                    fill="none"
                    stroke="#0074d9"
                    stroke-width="<?=StrokeWidth?>"
                    points="
                    <?php
                        if (isset($_GET['pastDaysCount'])) { 
                            $pastDaysCount = $_GET['pastDaysCount']; 
                        } 
                        else { 
                            $pastDaysCount = 10; 
                        }
                        $visitsCountArray = getVisitsCountArray($file, $pastDaysCount);
                        writeGraphicPoints($visitsCountArray);
                    ?>"
                />
            <?php writeCirclesAndTextOnPoints($visitsCountArray); ?>
            </svg>
        </div>
        <br><br>
        Показаны данные за последние <?=$pastDaysCount?> дней(я)!
        Просмотреть за последние 
        <a href="?pastDaysCount=7"> 7 </a>, 
        <a href="?pastDaysCount=14"> 14 </a>, 
        <a href="?pastDaysCount=21"> 21 </a>, 
        <a href="?pastDaysCount=30"> 30 </a> дней. 
        <br><br>
        <?php
            if ($col > sizeof($file)) { 
                $col = sizeof($file); 
            }
        ?>
        <table width="680" cellspacing="1" cellpadding="1" style="table-layout:fixed">
        <tr>
            <td class="table-item" width="100"><b>Время и дата</b></td>
            <td class="table-item" width="200"><b>Данные о посетителе</b></td>
            <td class="table-item" width="100"><b>IP</b></td>
            <td class="table-item" width="280"><b>Посещенный URL</b></td>
        </tr>
        <?php
            for ($si = sizeof($file) - 1; $si + 1 > sizeof($file) - $col; $si--) {
                $string = explode("|", $file[$si]);
                $logDataArray[$si] = $string[0]; 
                $logInfoArray[$si] = $string[1]; 
                $logIpArray[$si] = $string[2]; 
                $logUriArray[$si] = $string[3]; 
                echo '<tr bgcolor="#eeeeee"><td class="table-item">'.$logDataArray[$si].'</td>';
                echo '<td class="table-item">'.$logInfoArray[$si].'</td>';
                echo '<td class="table-item">'.$logIpArray[$si].'</td>';
                echo '<td class="table-item">'.$logUriArray[$si].'</td></tr>';
            }
        ?>  
        </table>
        <br> Просмотреть последние 
        <a href="?col=100"> 100 </a>
        <a href="?col=500"> 500 </a>
        <a href="?col=1000"> 1000 </a> посещений.
        <br> Просмотреть <a href="?col=<?=sizeof($file)?>".'> все посещения </a>
    </body>
</html>