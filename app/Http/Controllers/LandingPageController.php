<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\PageData as PD;

class LandingPageController extends Controller
{
    //
    public function landingPage(){
        $data = [
            'PD' => self::pageData()
        ];
        return View('landingPage.index',$data);
    }

    private static function pageData(){
        return PD::first();
    }

    public function textSetings(){
        $data = [
            'PD' => self::pageData()
        ];
        return View('landingPage.settings.textsLinks',$data);
    }
}
