<?php

namespace App\Http\Controllers;

use App\Models\AccessLog;
use App\Models\GetCouponLog;
use App\Models\Tourist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use View;

class DashboardController extends BaseController {
    /*
      |--------------------------------------------------------------------------
      | DashboardController
      |--------------------------------------------------------------------------
     */

    public function __construct() {
        
        parent::__construct();

        $this->setApp();
    }

    /**
     * Show the application dashboard screen to the user.
     *
     * @return Response
     */
    public function index() {

        return redirect("/racer/index");
    }
    
}
