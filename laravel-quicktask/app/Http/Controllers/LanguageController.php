<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class LanguageController extends Controller
{
    public function changeLanguage(Request $request, $language)
    {
        Session::put('lang', $language);

        //back to previous page
        return redirect()->back();
    }
}
