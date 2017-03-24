@extends('layouts.lay_admin')

@section('title', '新增参赛用户')

@section('css-page')
    <link href="{{ asset('assets/global/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/global/plugins/bower_components/chosen_v1.2.0/chosen.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/global/plugins/bower_components/bootstrap-datepicker-vitalets/css/datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/pages/app.racer.css') }}" rel="stylesheet">
@endsection

<!-- START @PAGE CONTENT -->
@section('content')
<section id="page-content">

    <!-- Start page header -->
    <div class="header-content">
        <h2><i class="fa fa-user"></i> {{ trans('racer.racer') }}  <span>{{ trans('racer.information') }}</span></h2>
        <div class="breadcrumb-wrapper hidden-xs">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/racer/index">{{ trans('layout.dashboard') }}</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="/racer/index">{{ trans('racer.racer') }} {{ trans('layout.management') }}</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li class="active">{{ trans('racer.racer') }}</li>
            </ol>
        </div><!-- /.breadcrumb-wrapper -->
    </div><!-- /.header-content -->
    <!--/ End page header -->

    <!-- Start body content -->
    <div class="body-content animated fadeIn">
        <form id="form-create" method="post" action="/racer/store" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="grouptype" value="5公里">
            <input type="hidden" name="pakcage_get_way" value="顺丰到付">
            <input type="hidden" name="p1_sex" value="男">
            <input type="hidden" name="p2_sex" value="">
            <input type="hidden" name="kids_sex" value="">
            <div class="row">

                <div class="col-md-12">
                    <!-- Start inline form-->
                    <div class="panel rounded shadow">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h3 class="panel-title">{{ trans('racer.new') }}

                                </h3>
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-sm" data-action="collapse" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Collapse"><i class="fa fa-angle-up"></i></button>
                                <button class="btn btn-sm" data-action="remove" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Remove"><i class="fa fa-times"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </div><!-- /.panel-heading -->
                        <div class="panel-body no-padding">
                            <div class="form-horizontal form-bordered">

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('racer.grouptype') }}</label>
                                        <div class="col-md-1">
                                            <div class="rdio rdio-theme circle">
                                                <input id="radio-type-default2" checked="checked" type="radio" value="5公里" name="radio_grouptype">
                                                <label for="radio-type-default2">5公里</label>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="rdio rdio-theme circle">
                                                <input id="radio-type-rounded2" type="radio" value="10公里" name="radio_grouptype">
                                                <label for="radio-type-rounded2">10公里</label>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="rdio rdio-theme circle">
                                                <input id="radio-type-circle2" type="radio" value="家庭跑" name="radio_grouptype">
                                                <label for="radio-type-circle2">家庭跑</label>
                                            </div>
                                        </div>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">{{ trans('racer.p1_tag') }}</label>
                                        <div class="col-md-3">
                                            <select class="chosen-select" name="p1_tag">
                                                <option value="小清新">小清新</option>
                                                <option value="重口味">重口味</option>
                                                <option value="天然萌">天然萌</option>
                                                <option value="自然呆">自然呆</option>
                                                <option value="纯爷们">纯爷们</option>
                                                <option value="万人迷">万人迷</option>
                                                <option value="女神经">女神经</option>
                                                <option value="男神经">男神经</option>
                                            </select>
                                        </div>
                                    </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('racer.pakcage_get_way') }}</label>
                                    <div class="col-md-1">
                                        <div class="rdio rdio-theme circle">
                                            <input id="radio_pakcage_get_way_delivery" checked="checked" type="radio" value="顺丰到付" name="radio_pakcage_get_way">
                                            <label for="radio_pakcage_get_way_delivery">顺丰到付</label>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="rdio rdio-theme circle">
                                            <input id="radio_pakcage_get_way_onsite" type="radio" value="现场领取" name="radio_pakcage_get_way">
                                            <label for="radio_pakcage_get_way_onsite">现场领取</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('racer.pakcage_get_name') }}</label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="pakcage_get_name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('racer.pakcage_get_phone') }}</label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="pakcage_get_phone">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('racer.pakcage_get_address') }}</label>
                                    <div class="col-md-3">
                                        <textarea class="form-control character-limit autosize" maxlength="50" rows="2" placeholder="50 characters limit" name="pakcage_get_address"></textarea>
                                    </div>
                                </div>



                                <div class="form-group form-group-divider">
                                        <div class="form-inner">
                                        <h4 class="no-margin">参赛人信息</h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('racer.p1_name') }}</label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="p1_name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('racer.p1_sex') }}</label>
                                    <div class="col-md-1">
                                        <div class="rdio rdio-theme circle">
                                            <input id="radio_p1_sex_male" checked="checked" type="radio" value="男" name="radio_p1_sex">
                                            <label for="radio_p1_sex_male">男</label>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="rdio rdio-theme circle">
                                            <input id="radio_p1_sex_female" type="radio" value="女" name="radio_p1_sex">
                                            <label for="radio_p1_sex_female">女</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('racer.p1_teesize') }}</label>
                                    <div class="col-md-3">
                                        <select class="chosen-select" name="p1_teesize">
                                            <option value="XS(160/82A)">XS(160/82A)</option>
                                            <option value="S(165/84A)">S(165/84A)</option>
                                            <option value="M(170/88A)">M(170/88A)</option>
                                            <option value="L(175/92A)">L(175/92A)</option>
                                            <option value="XL(180/96A)">XL(180/96A)</option>
                                            <option value="XXL(185/100A)">XXL(185/100A)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('racer.p1_birthday') }}</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" data-date-format="yy-mm-dd" name="p1_birthday" id="p1_birthday">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('racer.p1_card_type') }}</label>
                                    <div class="col-md-3">
                                        <select class="chosen-select" name="p1_card_type">
                                            <option value="身份证">身份证</option>
                                            <option value="护照">护照</option>
                                            <option value="港澳居民来往内地通行证">港澳居民来往内地通行证</option>
                                            <option value="台湾居民来往大陆通行证">台湾居民来往大陆通行证</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('racer.p1_card_number') }}</label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="p1_card_number">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('racer.p1_phone') }}</label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="p1_phone">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('racer.p1_emergency_name') }}</label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="p1_emergency_name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('racer.p1_emergency_phone') }}</label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="p1_emergency_phone">
                                    </div>
                                </div>



                                <!-- p2 -->
                                <div class="form-group form-p2">
                                    <label class="col-md-4 control-label">{{ trans('racer.p2_name') }}</label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="p2_name">
                                    </div>
                                </div>

                                <div class="form-group form-p2">
                                    <label class="col-md-4 control-label">{{ trans('racer.p2_sex') }}</label>
                                    <div class="col-md-1">
                                        <div class="rdio rdio-theme circle">
                                            <input id="radio_p2_sex_male" checked="checked" type="radio" name="radio_p2_sex">
                                            <label for="radio_p2_sex_male">男</label>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="rdio rdio-theme circle">
                                            <input id="radio_p2_sex_female" type="radio" name="radio_p2_sex">
                                            <label for="radio_p2_sex_female">女</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group form-p2">
                                    <label class="col-md-4 control-label">{{ trans('racer.p2_teesize') }}</label>
                                    <div class="col-md-3">
                                        <select class="chosen-select" name="p2_teesize">
                                            <option value="XS(160/82A)">XS(160/82A)</option>
                                            <option value="S(165/84A)">S(165/84A)</option>
                                            <option value="M(170/88A)">M(170/88A)</option>
                                            <option value="L(175/92A)">L(175/92A)</option>
                                            <option value="XL(180/96A)">XL(180/96A)</option>
                                            <option value="XXL(185/100A)">XXL(185/100A)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group form-p2">
                                    <label class="col-md-4 control-label">{{ trans('racer.p2_birthday') }}</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" data-date-format="yy-mm-dd" id="p2_birthday" name="p2_birthday">
                                    </div>
                                </div>

                                <div class="form-group form-p2">
                                    <label class="col-md-4 control-label">{{ trans('racer.p2_card_type') }}</label>
                                    <div class="col-md-3">
                                        <select class="chosen-select" name="p2_card_type">
                                            <option value="身份证">身份证</option>
                                            <option value="护照">护照</option>
                                            <option value="港澳居民来往内地通行证">港澳居民来往内地通行证</option>
                                            <option value="台湾居民来往大陆通行证">台湾居民来往大陆通行证</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group form-p2">
                                    <label class="col-md-4 control-label">{{ trans('racer.p2_card_number') }}</label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="p2_card_number">
                                    </div>
                                </div>

                                <div class="form-group form-p2">
                                    <label class="col-md-4 control-label">{{ trans('racer.p2_phone') }}</label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="p2_phone">
                                    </div>
                                </div>

                                <div class="form-group form-p2">
                                    <label class="col-md-4 control-label">{{ trans('racer.p2_emergency_name') }}</label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="p2_emergency_name">
                                    </div>
                                </div>

                                <div class="form-group form-p2">
                                    <label class="col-md-4 control-label">{{ trans('racer.p2_emergency_phone') }}</label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="p2_emergency_phone">
                                    </div>
                                </div>


                                <!-- kids -->
                                <div class="form-group form-kids">
                                    <label class="col-md-4 control-label">{{ trans('racer.kids_name') }}</label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="kids_name">
                                    </div>
                                </div>

                                <div class="form-group form-kids">
                                    <label class="col-md-4 control-label">{{ trans('racer.kids_sex') }}</label>
                                    <div class="col-md-1">
                                        <div class="rdio rdio-theme circle">
                                            <input id="radio_kids_sex_male" checked="checked" type="radio" name="radio_kids_sex">
                                            <label for="radio_kids_sex_male">男</label>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="rdio rdio-theme circle">
                                            <input id="radio_kids_sex_female" type="radio" name="radio_kids_sex">
                                            <label for="radio_kids_sex_female">女</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group form-kids">
                                    <label class="col-md-4 control-label">{{ trans('racer.kids_teesize') }}</label>
                                    <div class="col-md-3">
                                        <select class="chosen-select" name="kids_teesize">
                                            <option value="110以下">110以下</option>
                                            <option value="110-130">110-130</option>
                                            <option value="XS(160/82A)">XS(160/82A)</option>
                                            <option value="S(165/84A)">S(165/84A)</option>
                                            <option value="M(170/88A)">M(170/88A)</option>
                                            <option value="L(175/92A)">L(175/92A)</option>
                                            <option value="XL(180/96A)">XL(180/96A)</option>
                                            <option value="XXL(185/100A)">XXL(185/100A)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group form-kids">
                                    <label class="col-md-4 control-label">{{ trans('racer.kids_birthday') }}</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" data-date-format="yy-mm-dd" id="kids_birthday" name="kids_birthday">
                                    </div>
                                </div>

                                <div class="form-group form-kids">
                                    <label class="col-md-4 control-label">{{ trans('racer.kids_card_type') }}</label>
                                    <div class="col-md-3">
                                        <select class="chosen-select" name="kids_card_type">
                                            <option value="身份证">身份证</option>
                                            <option value="护照">护照</option>
                                            <option value="港澳居民来往内地通行证">港澳居民来往内地通行证</option>
                                            <option value="台湾居民来往大陆通行证">台湾居民来往大陆通行证</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group form-kids">
                                    <label class="col-md-4 control-label">{{ trans('racer.kids_card_number') }}</label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="kids_card_number">
                                    </div>
                                </div>

                                <div class="form-group form-kids">
                                    <label class="col-md-4 control-label">{{ trans('racer.kids_guardian_name') }}</label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="kids_guardian_name">
                                    </div>
                                </div>

                                <div class="form-group form-kids">
                                    <label class="col-md-4 control-label">{{ trans('racer.kids_guardian_phone') }}</label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="kids_guardian_phone">
                                    </div>
                                </div>

                                <div class="form-group form-kids">
                                    <label class="col-md-4 control-label">{{ trans('racer.kids_emergency_name') }}</label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="kids_emergency_name">
                                    </div>
                                </div>

                                <div class="form-group form-kids">
                                    <label class="col-md-4 control-label">{{ trans('racer.kids_emergency_phone') }}</label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="kids_emergency_phone">
                                    </div>
                                </div>





                                <div class="form-group form-group-divider">
                                    <div class="form-inner">
                                        <h4 class="no-margin">支付信息</h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('racer.pay_status') }}</label>
                                    <div class="col-md-3">
                                        <select class="chosen-select" name="pay_status">
                                            <option value="未支付">未支付</option>
                                            <option value="已支付">已支付</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('racer.transaction_id') }}</label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="transaction_id">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">{{ trans('racer.transaction_date') }}</label>
                                    <div class="col-md-3">
                                        <input class="form-control" type="text" name="transaction_date">
                                    </div>
                                </div>



                                </div><!-- /.form-body -->
                                <div class="form-footer">
                                    <div class="text-center">
                                        <button class="btn btn-danger mr-15 btn-cancel">{{ trans('layout.cancel') }}</button>
                                        <button class="btn btn-success" type="submit">{{ trans('layout.submit') }}</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div><!-- /.form-footer -->
                            </div>
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->
                    <!--/ End inline form -->
                </div>
        </div><!-- /.row -->
        </form>

    </div><!-- /.body-content -->
    <!--/ End body content -->



    <!-- Start footer content -->
    @include('layouts._footer-admin')
            <!--/ End footer content -->

</section><!-- /#page-content -->
@stop
<!--/ END PAGE CONTENT -->


@section('js-plugins')
    <script src="{{ asset('assets/global/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/holderjs/holder.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/jquery-autosize/jquery.autosize.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/chosen_v1.2.0/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/bootstrap-datepicker-vitalets/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/jquery-validation/dist/jquery.validate.min.js') }}"></script>
@endsection

@section('js-page')
    <script src="{{ asset('assets/admin/js/apps.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/app.racer.js') }}"></script>
    <script src="{{ asset('assets/admin/js/demo.js') }}"></script>
@endsection