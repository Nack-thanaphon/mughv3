<?php
function DateThai($strDate)
{
    $strYear = date("Y", strtotime($strDate));
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strMonthCut = array("", "January", "Febualy", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}

function DatetoInt($strDate)
{
    $strYear = date("Y", strtotime($strDate));
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strMonthCut = array("", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
    $strMonthThai = $strMonthCut[$strMonth];
    $strDate = " $strYear.'-'. $strMonthThai";
    return $intDate = (int)$strDate;
}


function Year($strDate)
{
    $strYear = date("Y", strtotime($strDate));
    $strMonth = date("n", strtotime($strDate));
    $strMonthCut = array("", "January", "Febualy", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strMonthThai $strYear";
}
