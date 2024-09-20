<?php

use Carbon\Carbon;

function formatDate($dt)
{
    return Carbon::parse($dt)->format('M d, Y');
}