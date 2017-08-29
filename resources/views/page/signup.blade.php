@extends('layouts.lay_account')

@section('title', 'SIGN UP | MOLIRUN')

@section('css-page')
    <link href="{{ asset('assets/admin/css/pages/signup.css') }}" rel="stylesheet">
@endsection

<!-- START @SIGN WRAPPER -->
@section('content')
<div id="sign-wrapper">

    <!-- Brand -->
    <div class="brand">
        <img src="{{ asset('assets/admin/img/logo/html/logo-250x75.png') }}" alt="brand logo"/>
    </div>
    <!--/ Brand -->

    <!-- Register form -->
    <form class="sign-in form-horizontal rounded shadow no-overflow" method="POST"  action="/page/signup">
        {!! csrf_field() !!}

        <div class="sign-header">
            <div class="form-group">
                <div class="sign-text">
                    <span>Create a new account</span>
                </div>
            </div>
        </div>
        <div class="sign-body">
            <div class="form-group">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input type="text" class="form-control" placeholder="Username" name="name" value="{{ old('name') }}">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                    <span class="input-group-addon"><i class="fa fa-check"></i></span>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-lg rounded no-overflow">
                    <input type="email" class="form-control" placeholder="Your Email" name="email" value="{{ old('email') }}">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                </div>
            </div>
        </div>
        <div class="sign-footer">
            <div class="form-group">
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <div class="ckbox ckbox-theme">
                    <input id="term-of-service" value="1" type="checkbox">
                    <label for="term-of-service" class="rounded">I agree with <a href="#">Term Of Service</a></label>
                </div>
                <div class="ckbox ckbox-theme">
                    <input id="newsletter" value="1" type="checkbox">
                    <label for="newsletter" class="rounded">Send me newsletter</label>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-theme btn-lg btn-block no-margin rounded">Sign Up</button>
            </div>
        </div>
    </form>
    <!--/ Register form -->

    <!-- Content text -->
    <p class="text-muted text-center sign-link">Already have an account? <a href="{{url('page/signin')}}"> Sign in here</a></p>
    <!--/ Content text -->

</div><!-- /#sign-wrapper -->
@stop
<!--/ END SIGN WRAPPER -->


@section('js-plugins')
    <script src="{{ asset('assets/global/plugins/bower_components/jquery-validation/dist/jquery.validate.min.js') }}"></script>
@endsection

@section('js-page')
    <script src="{{ asset('assets/admin/js/apps.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/blankon.signup.js') }}"></script>
    <script src="{{ asset('assets/admin/js/demo.js') }}"></script>
@endsection