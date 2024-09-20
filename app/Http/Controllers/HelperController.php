<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seo;

class HelperController extends Controller
{
    public static function getSeo($page)
    {
        return Seo::where('page', $page)->first();
    }
}
