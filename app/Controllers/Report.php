<?php

namespace App\Controllers;

class Report extends BaseController
{
    public function dashboard()
    {
        return view('report_user');
    }
}
