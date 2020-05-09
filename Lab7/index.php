<?php
    include 'consts.php';
    include 'functions.php';

    $mailParametersCheck = false;

    if (checkPostParameters(MailParametersNamesArray)) {
        $mailParametersCheck = true;

        $mailReceiversString = $_POST[MailReceiversStringParameterName];
        $mailSubjectString = $_POST[MailSubjectStringParameterName];
        $mailTextString = $_POST[MailTextStringParameterName];

        // TODO: по хорошему еще проверочку сюда

        sendMail($mailReceiversString, $mailSubjectString, $mailTextString);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Лабораторная 7. Вариант 2. </title>
    </head>
    <body>
        <h2> Введите данные для отправки письма: </h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            Введите через запятую список получателей: <br/>
            <input 
                type="text" 
                name="<?=MailReceiversStringParameterName?>"
                <?php if ($mailParametersCheck) echo "value=\"".htmlspecialchars($mailReceiversString)."\""; ?>
            > <br/>
            Введите тему письма: <br/>
            <input 
                type="text" 
                name="<?=MailSubjectStringParameterName?>"
                <?php if ($mailParametersCheck) echo "value=\"".htmlspecialchars($mailSubjectString)."\""; ?>
            > <br/>
            Введите текст сообщения: <br/>
            <input 
                type="text" 
                name="<?=MailTextStringParameterName?>"
                <?php if ($mailParametersCheck) echo "value=\"".htmlspecialchars($mailTextString)."\""; ?>
            > <br/>
            <input type="submit" name="action">
        </form>
    </body>
</html>