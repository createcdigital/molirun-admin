<?php
/**
 * Created by PhpStorm.
 * User: createc
 * Date: 29/4/16
 * Time: 6:07 PM
 */

namespace App\Http\Controllers;

use App\Models\Racer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use View;

use Yajra\Datatables\Datatables;


class StockController extends BaseController {
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

        return view('stock/stock-index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(\App\Models\Stock::query())->make(true);
    }




}
