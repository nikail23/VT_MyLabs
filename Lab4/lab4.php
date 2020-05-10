<?php
    const AllowedFileTypes = array('.txt');
    const MaxFileSize = 524288;
    const NewLine = '<br/>';
    const FileName = 'inputfile';
    const SearchTextName = 'searchText';
    const SourceTextName = 'sourceText';

    function CheckInputFile(string $fileName) {
        if (isset($_FILES[$fileName]) && $_FILES[$fileName]['error'] == 0) {

            if (!file_exists($_FILES[$fileName]['tmp_name'])) {
                echo 'Файл не загрузился!';
                return false;
            }
                
            $fileServerPath = $_FILES[$fileName]['tmp_name']; 
            $fileOriginalName = $_FILES[$fileName]['name']; 
            $fileExtension = substr($fileOriginalName, strpos($fileOriginalName,'.'), strlen($fileOriginalName)-1);
            
            if (!in_array($fileExtension, AllowedFileTypes)) {
                echo 'Данный тип файла не поддерживается.';
                return false;
            }

            else if (filesize($fileServerPath) > MaxFileSize) {
                echo 'Файл слишком большой.';
                return false;
            }

            return true;   
        }
        else
            return false;
    }

    function GetSortedArray($sourceArray) {
        $sortedResults = array();
        foreach ($sourceArray as $value) {
            if (!in_array($value, $sortedResults)) {
                array_push($sortedResults, $value);
            }
        }
        return $sortedResults;
    }

    function GetRegExprBySearchText(string $searchText) {
        $searchRegExp = '\b'.trim($searchText).'\b';
        $searchRegExp = preg_replace("/[ \t\f\v]+/u", "\b \b", $searchRegExp);
        if (preg_match("/\".+\"/", $searchRegExp)) 
            $searchRegExp = preg_replace("/\"/", "", $searchRegExp);
        else
            $searchRegExp = preg_replace("/ /", "|", $searchRegExp);
        $searchRegExp = '/'.$searchRegExp.'/';
        return $searchRegExp;
    }

    function FindOccurrencesAndColored(string $sourceText, string $searchText) {
        $editableText = $sourceText;
        $searchRegExp = GetRegExprBySearchText($searchText);
        preg_match_all($searchRegExp, $editableText, $searchResults);
        $sortedResults = GetSortedArray($searchResults[0]);
        foreach ($sortedResults as $value) {
           $editableText = preg_replace('/\b'.$value.'\b/', '<span style="color:red">'.$value.'</span>', $editableText);  
        }  
        return $editableText;
    }

    function SourceTextCheck(string $sourceTextName) {
        return isset($_POST[$sourceTextName]);
    }

    function SearchTextCheck(string $searchTextName) {
        return (isset($_POST[$searchTextName]) && $_POST[$searchTextName] != '');
    }

    $fileCheck = CheckInputFile(FileName);

    if ($fileCheck) {
        $sourceText = file_get_contents($fileServerPath);
        $editableText = $sourceText;
    } 
    else if (SourceTextCheck(SourceTextName))
    {
        $sourceText = $_POST[SourceTextName];
        $editableText = $sourceText;
        if (SearchTextCheck(SearchTextName)) {
            $searchText = $_POST[SearchTextName];
            $editableText = FindOccurrencesAndColored($sourceText, $searchText);
        }
    }           
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Лабораторная 4. ВТ. Вариант 12.
        </title>
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
            <input name="inputfile" type="file" id="inputfile">
            <br/>
            <input value="Отправить" type="submit">
            <br/>
        </form>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <input hidden="hidden" name="sourceText" value="<?=htmlspecialchars(nl2br($sourceText));?>">
            <pre>
                <?php 
                    if ($editableText != '')
                        echo $editableText;
                ?>
            </pre>
            Введите слово/словосочетание для поиска: <input name="searchText" type="text">
            <br/>
            <input type="submit" value="Отправить">
        </form>
    </body>
</html>
