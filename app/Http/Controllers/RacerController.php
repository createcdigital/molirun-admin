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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use View;
use Excel;
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
        if(isset($request->pay_status))
            $model->pay_status = $request->pay_status;
        if(isset($request->transaction_id))
            $model->transaction_id = $request->transaction_id;
        if(isset($request->transaction_date))
            $model->transaction_date = $request->transaction_date;

            // race result
//            $model->p1_race_number = $request->p1_race_number;
//            $model->p2_race_number = $request->p2_race_number;
//            $model->kids_race_number = $request->kids_race_number;
//            $model->race_time = $request->race_time;

        $model->save();

    }
    public function  Export()
    {
        //redeem

        $info = DB::select("SELECT * from racers  order by created_at");

        $export = array();
        foreach ($info as $key=>$value) {
            array_push($export,array(
                                    'openid'=>$value->openid,
                                    '昵称'=>$value->nickname,
                                    //'headimgurl'=>$value->headimgurl,
                                    '性别'=>$value->sex,
                                    '城市'=>$value->city,
                                    '国家'=>$value->country,
                                    '省份'=>$value->province,
                                    //'subscribe_time'=>$value->subscribe_time,

                                    // form
                                    '报名组别'=>$value->grouptype,
                                    '标签'=>$value->p1_tag,

                                    // p1
                                    '成人1姓名'=>$value->p1_name,
                                    '成人1性别'=>$value->p1_sex,
                                    '成人1出生年月'=>$value->p1_birthday,
                                    '成人1T恤尺码'=>$value->p1_teesize,

                                    '成人1证件类型'=>$value->p1_card_type,
                                    '成人1证件号码'=>$value->p1_card_number,
                                    '成人1手机号'=>$value->p1_phone,

                                    '成人1紧急联系人'=>$value->p1_emergency_name,
                                    '成人1紧急联系人手机'=>$value->p1_emergency_phone,

                                    // p2
                                    '成人2姓名'=>$value->p2_name,
                                    '成人2性别'=>$value->p2_sex,
                                    '成人2出生年月'=>$value->p2_birthday,
                                    '成人2T恤尺码'=>$value->p2_teesize,

                                    '成人2证件类型'=>$value->p2_card_type,
                                    '成人2证件号码'=>$value->p2_card_number,
                                    '成人2手机号'=>$value->p2_phone,

                                    '成人2紧急联系人'=>$value->p2_emergency_name,
                                    '成人2紧急联系人手机'=>$value->p2_emergency_phone,

                                    // kids
                                    '未成年人姓名'=>$value->kids_name,
                                    '未成年人性别'=>$value->kids_sex,
                                    '未成年人出生年月'=>$value->kids_birthday,
                                    '未成年人T恤尺码'=>$value->kids_teesize,

                                    '未成年人证件类型'=>$value->kids_card_type,
                                    '未成年人证件号码'=>$value->kids_card_number,
                                    '未成年人法定监护人姓名'=>$value->kids_guardian_name,
                                    '未成年人法定监护人手机号'=>$value->kids_guardian_phone,

                                    '未成年人紧急联系人'=>$value->kids_emergency_name,
                                    '未成年人紧急联系人手机'=>$value->kids_emergency_phone,

                                    // package
                                    '领取方式'=>$value->pakcage_get_way,
                                    '收件人姓名'=>$value->pakcage_get_name,
                                    '收件人手机'=>$value->pakcage_get_phone,
                                    '收件人地址'=>$value->pakcage_get_address,

                                    // payment
                                    //'订单号'=>$value->out_trade_no,
                                    '支付状态'=>$value->pay_status,
                                    '交易号'=>$value->transaction_id,
                                    '交易日期'=>$value->transaction_date,

                                    '报名日期'=>$value->created_at));
        }


        Excel::create('用户报名信息', function($excel) use ($export) {
            $excel->sheet('报名信息', function($sheet) use ($export) {
                $sheet->fromArray($export);
            });

        })->export('xls');
    }

}
