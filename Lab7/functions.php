<?php
    function checkPostParameters(array $parametersNamesArray) {
        foreach ($parametersNamesArray as $parameterName) {
            if (!(isset($_POST[$parameterName]))) {
                return false;
            }
        }
        return true;
    }

    function getEmailsArray(string $mailReceiversString) {
        $emailRegExp = "/\w+@\w+\.\w+/";
        preg_match_all($emailRegExp, $mailReceiversString, $matches, PREG_PATTERN_ORDER);
        if (count($matches[0])) {
            return $matches[0];
        }
        else
        {
            return null;
        }
    }

    function sendMail(string &$mailReceiversString, string $mailSubjectString, string $mailTextString) {
        $emailsArray = getEmailsArray($mailReceiversString);
        if ($emailsArray != null) {
            file_put_contents(SaveFileName, $emailsArray);
            require 'mail.php';
        }
        else {
            $mailReceiversString = $mailReceiversString." - некорректно записаны Emailы!";
        }
    }
?>