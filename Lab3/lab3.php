<?php
    const NewLine = '<br/>';
    const DayRegExp = '/^(0[1-9]|1[0-9]|2[0-9]|3[01])$/';
    const MonthRegExp = '/^(0[1-9]|1[012])$/';
    const YearRegExp = '/^([0-9]{4})$/';
    const NumbersRegExp = '/^([0-9]+)$/';
    const BirthDayErrorString = 'Неправильно введен день рождения! Требуется - двухзначное число!';
    const BirthMonthErrorString = 'Неправильно введен месяц рождения! Требуется - двухзначное число!';
    const BirthYearErrorString = 'Неправильно введен год рождения! Требуется - четырехзначное число!';
    const CurrentDateShowFormat = 'd.m.Y';
    const AgeShowFormat = '%Y лет, %m месяцев, %d дней.';
    const FutureAgeShowFormat = '%Y лет, %m месяцев, %d дней';
    const EasternYears = array(
        1 => 'Год мыши', 
        2 => 'Год быка', 
        3 => 'Год тигра', 
        4 => 'Год кота', 
        5 => 'Год дракона', 
        6 => 'Год змеи', 
        7 => 'Год лошади', 
        8 => 'Год овцы', 
        9 => 'Год обезьяны', 
        10 => 'Год петуха', 
        11 => 'Год собаки', 
        0 => 'Год кабана'
    );

    function InputClassStyleHandle($check) {
        if (!$check)
            echo "declineInputComponent";
        else 
            echo "confirmInputComponent";
    }

    function ErrorStringShowHandle($check, $errorString) {
        if (!$check) 
            echo $errorString.NewLine;
        else
            echo NewLine;
    }

    function CheckStringByRegExp($value, $regExp) {
        if ((isset($value)) && (preg_match_all($regExp, $value) == 1))
            return true;
        return false;
    }

    $birthDay = $birthMonth = $birthYear = 0;
    $days = $months = $years = 0;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $birthDay = $_POST['birthDay'];
        $birthMonth = $_POST['birthMonth'];
        $birthYear = $_POST['birthYear'];
        $days = $_POST['days'];
        $months = $_POST['months'];
        $years = $_POST['years'];

        $birthDayCheck = CheckStringByRegExp($birthDay, DayRegExp);
        $birthMonthCheck = CheckStringByRegExp($birthMonth, MonthRegExp);
        $birthYearCheck = CheckStringByRegExp($birthYear, YearRegExp);
        $daysCheck = CheckStringByRegExp($days, NumbersRegExp);
        $monthsCheck = CheckStringByRegExp($months, NumbersRegExp);
        $yearsCheck = CheckStringByRegExp($years, NumbersRegExp);

        if ($birthDayCheck && $birthMonthCheck && $birthYearCheck) {
            $birthDateString = $birthDay.'.'.$birthMonth.'.'.$birthYear;
            $birthDate = new DateTime($birthDateString);
            $currentDate = new DateTime('now');
            $age = $currentDate->diff($birthDate);

            echo $birthDateString.NewLine;
            echo ($currentDate->format(CurrentDateShowFormat)).NewLine;
            echo 'Возраст: '.($age->format(AgeShowFormat)).NewLine;

            if ($daysCheck && $monthsCheck && $yearsCheck) {
                $futureAgeString = 'P'.$years.'Y'.$months.'M'.$days.'D';
                $futureAge = new DateInterval($futureAgeString);
                $resultDate = $birthDate;
                $resultDate->add($futureAge);

                echo 'Человеку исполниться '.($futureAge->format(FutureAgeShowFormat)).' в '.($resultDate->format(CurrentDateShowFormat)).NewLine;
            }

            $index = $birthYear % 12;
            echo 'Пользователь родился в '.EasternYears[$index];
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css\style.css" >
        <title>
            Лабораторная 3. ВТ. 
        </title>    
    </head>
    <body >
        <div class="wrapper">
            <div class="myForm">
                <h3>Лабораторная 3. Вариант 3.</h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    Введите дату рождения: <br/>
                    День: 
                    <input 
                        type="text" 
                        name="birthDay" 
                        value="<?php echo $birthDay ?>"
                        class="<?php InputClassStyleHandle($birthDayCheck) ?>" 
                        required
                    />
                    <?php ErrorStringShowHandle($birthDayCheck, BirthDayErrorString) ?>
                    Месяц: 
                    <input 
                        type="text" 
                        name="birthMonth" 
                        value="<?php echo $birthMonth ?>"
                        class="<?php InputClassStyleHandle($birthMonthCheck) ?>" 
                        required
                    />
                    <?php ErrorStringShowHandle($birthMonthCheck, BirthMonthErrorString) ?>
                    Год: 
                    <input 
                        type="text" 
                        name="birthYear" 
                        value="<?php echo $birthYear ?>"
                        class="<?php InputClassStyleHandle($birthYearCheck) ?>" 
                        required
                    />
                    <?php ErrorStringShowHandle($birthYearCheck, BirthYearErrorString) ?>
                    <h3>Определить, когда пользователю исполниться: </h3><br/>
                    Дней(я): 
                    <input 
                        type="text" 
                        name="days"
                        value="<?php echo $days ?>"
                    /> <br/>
                    Месяцев(а): 
                    <input 
                        type="text" 
                        name="months" 
                        value="<?php echo $months ?>"
                    /> <br/>
                    Лет(Года): 
                    <input 
                        type="text" 
                        name="years" 
                        value="<?php echo $years ?>"
                    /> <br/>
                    <p>
                        <input 
                            type="submit" 
                            name="actionButton"
                        />
                    </p>
                </form>
            </div>
        </div>
    </body>
</html>