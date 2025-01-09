<?php

use Carbon\Carbon;

function formatDate($dt)
{
    return Carbon::parse($dt)->format('M d, Y');
}

function formatCustomDate($dt, $fmt)
{
    return Carbon::parse($dt)->format($fmt);
}

function monthName($i)
{
    $arrMonth = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    return $arrMonth[$i];
}