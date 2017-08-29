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


class RacerController extends BaseController {
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

        return view('racer/racer-index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(\App\Models\Racer::query())->make(true);
    }


    public function create()
    {
        return view('racer/racer-create');

    }


    public function store(Request $request)
    {
        $model = new Racer;

        //wechat information
        $model->openid = "";
        $model->nickname = "";
        $model->headimgurl = "";
        $model->sex = "";
        $model->city = "";
        $model->country = "";
        $model->province = "";
        $model->subscribe_time = "";


        // form
        $model->grouptype = $request->grouptype; // 0:5km, 1:10km, 2:family
        $model->p1_tag = $request->p1_tag;

        // p1
        $model->p1_name = $request->p1_name;
        $model->p1_sex = $request->p1_sex;
        $model->p1_birthday = $request->p1_birthday;
        $model->p1_teesize = $request->p1_teesize;

        $model->p1_card_type = $request->p1_card_type;
        $model->p1_card_number = $request->p1_card_number;
        $model->p1_phone = $request->p1_phone;

        $model->p1_emergency_name = $request->p1_emergency_name;
        $model->p1_emergency_phone = $request->p1_emergency_phone;

        // p2
        if(isset($request->p2_name))
            $model->p2_name = $request->p2_name;
        if(isset($request->p2_sex))
            $model->p2_sex = $request->p2_sex;
        if(isset($request->p2_birthday))
            $model->p2_birthday = $request->p2_birthday;
        if(isset($request->p2_teesize))
            $model->p2_teesize = $request->p2_teesize;

        if(isset($request->p2_card_type))
            $model->p2_card_type = $request->p2_card_type;
        if(isset($request->p2_card_number))
            $model->p2_card_number = $request->p2_card_number;
        if(isset($request->p2_phone))
            $model->p2_phone = $request->p2_phone;

        if(isset($request->p2_emergency_name))
            $model->p2_emergency_name = $request->p2_emergency_name;
        if(isset($request->p2_emergency_phone))
            $model->p2_emergency_phone = $request->p2_emergency_phone;

        // kids
        if(isset($request->kids_name))
            $model->kids_name = $request->kids_name;
        if(isset($request->kids_sex))
            $model->kids_sex = $request->kids_sex;
        if(isset($request->kids_birthday))
            $model->kids_birthday = $request->kids_birthday;
        if(isset($request->kids_teesize))
            $model->kids_teesize = $request->kids_teesize;

        if(isset($request->kids_card_type))
            $model->kids_card_type = $request->kids_card_type;
        if(isset($request->kids_card_number))
            $model->kids_card_number = $request->kids_card_number;
        if(isset($request->kids_guardian_name))
            $model->kids_guardian_name = $request->kids_guardian_name;
        if(isset($request->kids_guardian_phone))
            $model->kids_guardian_phone = $request->kids_guardian_phone;

        if(isset($request->kids_emergency_name))
            $model->kids_emergency_name = $request->kids_emergency_name;
        if(isset($request->kids_emergency_phone))
            $model->kids_emergency_phone = $request->kids_emergency_phone;

        // package
        $model->pakcage_get_way = $request->pakcage_get_way;
        if(isset($request->pakcage_get_name))
            $model->pakcage_get_name = $request->pakcage_get_name;
        if(isset($request->pakcage_get_phone))
            $model->pakcage_get_phone = $request->pakcage_get_phone;
        if(isset($request->pakcage_get_address))
            $model->pakcage_get_address = $request->pakcage_get_address;

//            // payment
        if(isset($request->pay_status))
            $model->pay_status = $request->pay_status;
        if(isset($request->transaction_id))
            $model->transaction_id = $request->transaction_id;
        if(isset($request->transaction_date))
            $model->transaction_date = $request->transaction_date;
//
//            // race result
//            $model->p1_race_number = $request->p1_race_number;
//            $model->p2_race_number = $request->p2_race_number;
//            $model->kids_race_number = $request->kids_race_number;
//            $model->race_time = $request->race_time;

        $model->save();

        return redirect('/racer/index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        \App\Models\Racer::destroy($this->request->id);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $model = \App\Models\Racer::find($this->request->id);

//        //wechat information
//        $model->openid = $request->openid;
//        $model->nickname = $request->nickname;
//        $model->headimgurl = $request->headimgurl;
//        $model->sex = $request->sex;
//        $model->city = $request->city;
//        $model->country = $request->country;
//        $model->province = $request->province;
//        $model->subscribe_time = $request->subscribe_time;

        // form
        if(isset($request->grouptype))
            $model->grouptype = $request->grouptype; // 0:5km, 1:10km, 2:family
        if(isset($request->p1_tag))
            $model->p1_tag = $request->p1_tag;

        // p1
        if(isset($request->p1_name))
            $model->p1_name = $request->p1_name;
        if(isset($request->p1_sex))
            $model->p1_sex = $request->p1_sex;
        if(isset($request->p1_birthday))
            $model->p1_birthday = $request->p1_birthday;
        if(isset($request->p1_teesize))
            $model->p1_teesize = $request->p1_teesize;

        if(isset($request->p1_card_type))
            $model->p1_card_type = $request->p1_card_type;
        if(isset($request->p1_card_number))
            $model->p1_card_number = $request->p1_card_number;
        if(isset($request->p1_phone))
            $model->p1_phone = $request->p1_phone;

        if(isset($request->p1_emergency_name))
            $model->p1_emergency_name = $request->p1_emergency_name;
        if(isset($request->p1_emergency_phone))
            $model->p1_emergency_phone = $request->p1_emergency_phone;

        // p2
        if(isset($request->p2_name))
            $model->p2_name = $request->p2_name;
        if(isset($request->p2_sex))
            $model->p2_sex = $request->p2_sex;
        if(isset($request->p2_birthday))
            $model->p2_birthday = $request->p2_birthday;
        if(isset($request->p2_teesize))
            $model->p2_teesize = $request->p2_teesize;

        if(isset($request->p2_card_type))
            $model->p2_card_type = $request->p2_card_type;
        if(isset($request->p2_card_number))
            $model->p2_card_number = $request->p2_card_number;
        if(isset($request->p2_phone))
            $model->p2_phone = $request->p2_phone;

        if(isset($request->p2_emergency_name))
            $model->p2_emergency_name = $request->p2_emergency_name;
        if(isset($request->p2_emergency_phone))
            $model->p2_emergency_phone = $request->p2_emergency_phone;

        // kids
        if(isset($request->kids_name))
            $model->kids_name = $request->kids_name;
        if(isset($request->kids_sex))
            $model->kids_sex = $request->kids_sex;
        if(isset($request->kids_birthday))
            $model->kids_birthday = $request->kids_birthday;
        if(isset($request->kids_teesize))
            $model->kids_teesize = $request->kids_teesize;

        if(isset($request->kids_card_type))
            $model->kids_card_type = $request->kids_card_type;
        if(isset($request->kids_card_number))
            $model->kids_card_number = $request->kids_card_number;
        if(isset($request->kids_guardian_name))
            $model->kids_guardian_name = $request->kids_guardian_name;
        if(isset($request->kids_guardian_phone))
            $model->kids_guardian_phone = $request->kids_guardian_phone;

        if(isset($request->kids_emergency_name))
            $model->kids_emergency_name = $request->kids_emergency_name;
        if(isset($request->kids_emergency_phone))
            $model->kids_emergency_phone = $request->kids_emergency_phone;

        // package
        if(isset($request->pakcage_get_way))
            $model->pakcage_get_way = $request->pakcage_get_way;
        if(isset($request->pakcage_get_name))
            $model->pakcage_get_name = $request->pakcage_get_name;
        if(isset($request->pakcage_get_phone))
            $model->pakcage_get_phone = $request->pakcage_get_phone;
        if(isset($request->pakcage_get_address))
            $model->pakcage_get_address = $request->pakcage_get_address;

            // payment
            $model->pay_status = $request->pay_status;
            $model->transaction_id = $request->transaction_id;
            $model->transaction_date = $request->transaction_date;

            // race result
//            $model->p1_race_number = $request->p1_race_number;
//            $model->p2_race_number = $request->p2_race_number;
//            $model->kids_race_number = $request->kids_race_number;
//            $model->race_time = $request->race_time;

        $model->save();

    }

}
