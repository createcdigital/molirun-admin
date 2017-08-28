<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use View;
use Yajra\Datatables\Datatables;


class CouponController extends BaseController
{
    /*
      |--------------------------------------------------------------------------
      | TableController
      |--------------------------------------------------------------------------
      |
     */

    protected $request;

    public function __construct(Request $request) {

        parent::__construct();

        $this->request = $request;

        $this->setApp();
    }

    /**
     * Show the datatable screen to the user.
     *
     * @return Response
     */
    public function getIndex() {

        return view('coupon/coupon-index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(Coupon::query())->make(true);
    }


}
