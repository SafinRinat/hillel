<?php
//setlocale( LC_TIME, 'ru_RU', 'russian' );
//echo strftime('%F');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_GET['lang']) && !empty($_GET['lang']))
{
    $mounthList = [
        'eng' => [],
        'ru' => []
    ];

    $allMonth = [0,1,2,3,4,5,6,7,8,9,10,11];

    $ru_month = [
        'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'
    ];

    $en_month = [
        'January', 'February', 'March', 'May', 'June', 'July', 'August', 'September', 'Oktober', 'November', 'December'
    ];

    $lang = $_GET['lang'];

    if($lang === 'eng')
    {
        for ($counterMount = 1;$counterMount <= count($allMonth); $counterMount++) {
            $month = date('F', mktime(0, 0, 0, $counterMount, 1, date('Y')));
            array_push($mounthList['eng'], $month);
        }

        foreach($mounthList['eng'] as $inx) {
            echo $inx . '<br />';
        }
    }
    elseif($lang === 'ru')
    {
//        print_r( str_replace(date('F', mktime(0, 0, 0, 0, 1, date('Y'))), $en_month[0], $ru_month[0] ) );

        for ($counterRuMount = 0; $counterRuMount < count($allMonth) -1; $counterRuMount++) {
            $month = date('F', mktime(0, 0, 0, $counterRuMount, 1, date('Y')));

            $month = str_replace($month, $en_month[$counterRuMount], $ru_month[$counterRuMount]);

            array_push($mounthList['ru'], $month);
        }

        foreach($mounthList['ru'] as $inx) {
            echo $inx . '<br />';
        }
    }

}
else
{
    echo 'You not insert lang variable';
}