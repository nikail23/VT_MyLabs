<?php
    const searchSymbols = 'оО';

    function getSymbolsOccurencesCount($symbols, $word)
    {
        $regex = '~['.$symbols.']~u';
        preg_match_all($regex, $word, $matches);
        return count($matches[0]);
    }

    function wordToUpperCaseHandle($word, $wordIndex)
    {
        return (($wordIndex + 1) % 3 == 0) ? (mb_convert_case($word, MB_CASE_UPPER, "UTF-8")) : $word;
    }

    function letterColorChangeHandle($letter, $letterIndex)
    {
        return (($letterIndex + 1) % 3 == 0) ? ('<span style="color:#9900CC;">'.$letter.'</span>') : $letter;
    }

    function showResults($resultText) 
    {
        echo $resultText;
        echo '<br/>';
        echo '"О" и "о" встречается '.getSymbolsOccurencesCount(searchSymbols, $resultText).' раз.';
    }

    $sourceText = $_POST['sourceText'];
    $sourceText = explode(' ', $sourceText);
    for ($i = 0; $i < count($sourceText); $i++) {
        $sourceText[$i] = wordToUpperCaseHandle($sourceText[$i], $i);
        $word = preg_split('/(?!^)(?=.)/u', $sourceText[$i]);
        for ($j = 0; $j < count($word); $j++) {
            $word[$j] = letterColorChangeHandle($word[$j], $j);
        }
        $sourceText[$i] = implode('', $word);
    }
    $resultText = implode(' ', $sourceText);
    showResults($resultText);
?>