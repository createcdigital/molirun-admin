@extends('layouts.lay_admin')

@section('title', 'DASHBOARD | SHAKE TO WIN')

@section('css-page')
    <link href="{{ asset('/assets/global/plugins/bower_components/jquery.gritter/css/jquery.gritter.css') }}" rel="stylesheet">
    @endsection

            <!-- START @PAGE CONTENT -->
@section('content')
    <section id="page-content">

        <!-- Start page header -->
        <div class="header-content">
            <h2><i class="fa fa-home"></i>Dashboard <span>dashboard & statistics</span></h2>
            <div class="breadcrumb-wrapper hidden-xs">
                <span class="label">You are here:</span>
                <ol class="breadcrumb">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div><!-- /.header-content -->
        <!--/ End page header -->

        <!-- Start body content -->
        <div class="body-content animated fadeIn">

            <div class="row">

            </div>

        </div><!-- /.body-content -->
        <!--/ End body content -->

        <!-- Start footer content -->
        @include('layouts._footer-admin')
                <!--/ End footer content -->

    </section><!-- /#page-content -->
    @stop
            <!--/ END PAGE CONTENT -->


@section('js-plugins')
    <script src="{{ asset('assets/global/plugins/bower_components/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/flot/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/jquery.gritter/js/jquery.gritter.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bower_components/counter-up/jquery.counterup.min.js') }}"></script>
@endsection

@section('js-page')
    <script src="{{ asset('assets/admin/js/apps.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/blankon.dashboard.js') }}"></script>
    <script src="{{ asset('assets/admin/js/demo.js') }}"></script>
@endsection