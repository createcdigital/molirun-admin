@extends('layouts.lay_admin')

@section('title', '参赛用户')

@section('css-page')
    <link href="{{ asset('assets/global/plugins/bower_components/datatables/css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/global/plugins/bower_components/datatables/css/datatables.responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/global/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/global/plugins/bower_components/chosen_v1.2.0/chosen.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/global/plugins/bower_components/bootstrap-datepicker-vitalets/css/datepicker.css') }}" rel="stylesheet">
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

        <div class="row">
            <div class="col-md-12">

                <!-- Start Laravel DataTables using ajax -->
                <div class="panel rounded shadow no-overflow">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h3 class="panel-title">{{ trans('racer.list') }}</h3>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-sm" data-action="refresh" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Refresh"><i class="fa fa-refresh"></i></button>
                            <button class="btn btn-sm" data-action="collapse" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Collapse"><i class="fa fa-angle-up"></i></button>
                            <button class="btn btn-sm" data-action="remove" data-container="body" data-toggle="tooltip" data-placement="top" data-title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div><!-- /.panel-heading -->
                    <div class="panel-body">

                        <div class="panel-body">
                            {{--<button class="btn btn-success" onclick="javascript:location.href='/racer/create'">{{ trans('racer.new') }}</button>--}}
                        </div>


                        <table class="table table-bordered" id="datatable-sample">
                            <thead>
                            <tr>
                                <th>报名序号</th>
                                <th>参赛组</th>

                                <th>成人姓名</th>
                                <th>手机号码</th>
                                <th>证件号码</th>

                                <th>成人2姓名</th>
                                <th>手机号码</th>
                                <th>证件号码</th>

                                <th>未成年人姓名</th>
                                <th>监护人证件号码</th>
                                <th>监护人手机号码</th>

                                <th>赛事包领取方式</th>
                                <th>支付状态</th>

                                <th>报名时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>

                        </table>
                    </div>
                </div>
                <!--/ End Laravel DataTables using ajax -->

            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div><!-- /.body-content -->
    <!--/ End body content -->

    <!-- Start Modal -->
    <div class="modal fade modal-success" id="modal-view-datatable" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">查看记录 "<span class="row-name"></span>"</h4>
                </div>
                <div class="modal-body">
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade modal-primary" id="modal-edit-datatable" tabindex="-1" role="dialog">
        <input type="hidden" name="_token_edit" value="<?php echo csrf_token(); ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">编辑记录 "<span class="row-name"></span>"</h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-edit-confirm">保存</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade modal-danger" id="modal-delete-datatable" tabindex="-1" role="dialog">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">删除记录 "<span class="row-name"></span>"</h4>
                </div>
                <div class="modal-body">
                    <p>
                        <b>你确定你要永久删除这条数据?</b>
                    </p>
                    <p>
                        此操作不能撤销.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-delete-confirm" data-dismiss="modal">删除</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--/ End Modal -->


    <!-- Start footer content -->
    @include('layouts._footer-admin')
    <!--/ End footer content -->

</section><!-- /#page-content -->
@stop
<!--/ END PAGE CONTENT -->


@section('js-plugins')
    <script src="{{ asset('assets/global/plugins/bower_components/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/datatables/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/datatables/js/datatables.responsive.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/holderjs/holder.js') }}" id="js_holder"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/jquery-autosize/jquery.autosize.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/chosen_v1.2.0/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/jquery-mockjax/jquery.mockjax.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/bootstrap-datepicker-vitalets/js/bootstrap-datepicker.js') }}"></script>

@endsection

@section('js-page')
    <script src="{{ asset('assets/admin/js/apps.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/app.racer.js') }}"></script>
    <script src="{{ asset('assets/admin/js/demo.js') }}"></script>
@endsection

