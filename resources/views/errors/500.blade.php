@extends('layouts.lay_account')


@section('title', '500 | SHAKE TO WIN')

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
    <h1>500</h1>
    <h3>Internal Server Error.</h3>
    <h4>Sorry, something went wrong.</h4>
    <a href="dashboard.html" class="btn btn-sm btn-theme">Go to Dashboard</a>

    @unless(empty($sentryID))
        <!-- Sentry JS SDK 2.1.+ required -->
        <script src="https://cdn.ravenjs.com/3.3.0/raven.min.js"></script>

        <script>
            Raven.showReportDialog({
                eventId: '{{ $sentryID }}',

                // use the public DSN (dont include your secret!)
                dsn: 'https://1793d6dba1e942e88e35c3d4c0a9e56c@sentry.io/129244'
            });
        </script>
    @endunless
</div>
<!--/ END ERROR PAGE -->

</section><!-- /#page-content -->
@stop
<!--/ END ERROR PAGE -->