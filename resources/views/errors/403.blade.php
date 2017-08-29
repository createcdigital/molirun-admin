@extends('layouts.lay_account')


@section('title', '403 | MOLIRUN')

@section('css-page')
    <link href="{{ asset('assets/admin/css/pages/error-page.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/pages/eform.css') }}" rel="stylesheet">
@endsection

<!-- START @PAGE CONTENT -->
@section('content')
            <!--[if lt IE 9]>
    <p class="upgrade-browser">Upps!! You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- START @ERROR PAGE -->
    <div class="error-wrapper">
        <h1>403!</h1>
        <h3>Forbidden: Access is denied.</h3>
        <h4>You do not have permission to view this directory or page using the creditials that you supplied.</h4>
        <a href="/dashboard/index" class="btn btn-sm btn-theme">Go to Dashboard</a>
    </div>
    <!--/ END ERROR PAGE -->

</section><!-- /#page-content -->
@stop
<!--/ END ERROR PAGE -->