@extends('layouts.lay_account')


@section('title', '404 | SHAKE TO WIN')

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
        <h1>404!</h1>
        <h3>The page you are looking for has not been found!</h3>
        <h4>The page you are looking for might have been removed, or unavailable. <br> <br/> Maybe you could try a search:</h4>
        <a href="/dashboard/index" class="btn btn-sm btn-theme">Go to Dashboard</a>
    </div>
    <!--/ END @ERROR PAGE -->

</section><!-- /#page-content -->
@stop
<!--/ END ERROR PAGE -->
