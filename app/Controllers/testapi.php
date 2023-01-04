<?php

namespace App\Controllers;

class TestApi extends BaseController {
	
    public function showAPI() {

        return view('consume_rest_api');
    }
	
}