<?php
function DateThai($strDate)
{
    $strYear = date("Y", strtotime($strDate));
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strMonthCut = array("", "January", "Febualy", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay-$strMonthThai-$strYear";
}

function DatetoInt($strDate)
{
    $strYear = date("Y", strtotime($strDate));
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strMonthCut = array("", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
    $strMonthThai = $strMonthCut[$strMonth];
    $strDate = " $strYear$strMonthThai.";
    return $intDate = (int)$strDate;
}

function DateFormat($date)
{
    $dateData = strtr($date, '/', '-');
    $newDate = date("Y-m-d", strtotime($dateData));

    return  $newDate;
}

function YearMonth($strDate)
{

    $original_date = $strDate;
    $timestamp = strtotime($original_date);
    $new_date = date("Y-m", $timestamp);

    return $new_date;
}

function renderImg($file = null)
{
    $website = 'https://info.aun-hpn.or.th/' . $file;
    return $website;
}


function Year($strDate)
{
    $strYear = date("Y", strtotime($strDate));
    $strMonth = date("n", strtotime($strDate));
    $strMonthCut = array("", "January", "Febualy", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strMonthThai-$strYear";
}
 function getDateEndInt($getDateEnd)
{
    $today = strtotime(date("Y-m-d h:i:sa"));
    $str_end = strtotime($getDateEnd); // ทำวันที่ให้อยู่ในรูปแบบ timestamp

    $nseconds = $str_end - $today; // วันที่ระหว่างเริ่มและสิ้นสุดมาลบกัน
    $ndays = round($nseconds / 86400); // หนึ่งวันมี 86400 วินาที
    // $ndays = round($ndays / 3);
    return $ndays;
}

