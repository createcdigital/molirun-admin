@extends('layouts.lay_account')


@section('title', '503 | MOLIRUN')

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
    <h1>503</h1>
    <h3>Be Right Back.</h3>
    <h4>System upgrade in progress. Please try again later.</h4>
</div>
<!--/ END ERROR PAGE -->

</section><!-- /#page-content -->
@stop
<!--/ END ERROR PAGE -->