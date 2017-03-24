@extends('layouts.lay_account')


@section('title', 'LOST PASSWORD | SHAKE TO WIN')

@section('css-page')
    <link href="{{ asset('assets/admin/css/pages/sign.css') }}" rel="stylesheet">
@endsection

<!-- START @SIGN WRAPPER -->
@section('content')
<div id="sign-wrapper">

    <!-- Brand -->
    <div class="brand">
        <img src="{{ asset('assets/admin/img/logo/html/logo-vertical.png') }}" alt="brand logo"/>
    </div>
    <!--/ Brand -->

    <!-- Lost password form -->
    <form class="form-horizontal rounded shadow" action="{{url('page/email')}}" method="POST">
        {!! csrf_field() !!}
        <div class="sign-header">
            <div class="form-group">
                <div class="sign-text">
                    <span>Reset your password</span>
                </div>
            </div>
        </div>
        <div class="sign-body">
            <div class="form-group">
                <div class="input-group input-group-lg rounded">
                    <input class="form-control" placeholder="Username or email " type="email" name="email" value="{{ old('email') }}">
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
            </div><!-- /.form-group -->
            <div class="form-group">
                <button type="submit" class="btn btn-theme btn-lg btn-block no-margin rounded">Send reset email</button>
            </div>
        </div>
    </form>
    <!--/ Lost password form -->

    <!-- Content text -->
    <p class="text-muted text-center sign-link">Back to <a href="{{url('page/signin')}}"> Sign in</a></p>
    <!--/ Content text -->

</div><!-- /#sign-wrapper -->
@stop
<!--/ END SIGN WRAPPER -->
