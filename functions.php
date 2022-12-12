<?php
declare(strict_types=1);


function getCurrency()
{
    $link = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=22/11/2022';
    $list = simplexml_load_file($link);
    $checkList = ['R01235', 'R01239', 'R01770', 'R01820', 'R01350'];
    $searchCountry = [];
    foreach ($list->Valute as $country) {
        if (in_array($country['ID'], $checkList)) {
            $searchCountry[] = $country;
        }
    }
    return $searchCountry;
}
