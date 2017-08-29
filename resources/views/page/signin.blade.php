@extends('layouts.lay_account')

@section('title', 'SIGN IN | MOLIRUN')

@section('css-page')
    <link href="{{ asset('assets/admin/css/pages/sign.css') }}" rel="stylesheet">
@endsection

<!-- START @SIGN WRAPPER -->
@section('content')
<div id="sign-wrapper">

    <!-- Brand -->
    <div class="brand">

    </div>
    <!--/ Brand -->

    <!-- Login form -->
    <form class="sign-in form-horizontal shadow rounded no-overflow" action="/page/signin" method="post">
        {!! csrf_field() !!}

        <div class="sign-header">
            <div class="form-group">
                <div class="sign-text">
                    <span>Member Area</span>
                </div>
            </div><!-- /.form-group -->
        </div><!-- /.sign-header -->
        <div class="sign-body">
            <div class="form-group">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input class="form-control input-sm" placeholder="Email " type="email" name="email" value="{{ old('email') }}">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                </div>
            </div><!-- /.form-group -->
            <div class="form-group">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input type="password" class="form-control input-sm" placeholder="Password" name="password">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                </div>
            </div><!-- /.form-group -->
        </div><!-- /.sign-body -->
        <div class="sign-footer">
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="ckbox ckbox-theme">
                            <input id="rememberme" type="checkbox">
                            <label for="rememberme" class="rounded">Remember me</label>
                        </div>
                    </div>

                </div>
            </div><!-- /.form-group -->
            <div class="form-group">
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                    @endforeach
                @endif
            </div><!-- /.form-group -->
            <div class="form-group">
                <button type="submit" class="btn btn-theme btn-lg btn-block no-margin rounded" id="login-btn">Sign In</button>
            </div><!-- /.form-group -->
        </div><!-- /.sign-footer -->
    </form><!-- /.form-horizontal -->
    <!--/ Login form -->

    <!-- Content text -->
    {{--<p class="text-muted text-center sign-link">Need an account? <a href="{{url('page/signup')}}"> Sign up free</a></p>--}}
    <!--/ Content text -->

</div><!-- /#sign-wrapper -->
@stop
<!--/ END SIGN WRAPPER -->


@section('js-plugins')
    <script src="{{ asset('assets/global/plugins/bower_components/jquery-validation/dist/jquery.validate.min.js') }}"></script>
@endsection

@section('js-page')
    <script src="{{ asset('assets/admin/js/apps.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/blankon.sign.js') }}"></script>
    <script src="{{ asset('assets/admin/js/demo.js') }}"></script>
@endsection