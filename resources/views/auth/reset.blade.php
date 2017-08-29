<html lang="en"><!--<![endif]--><!-- START @HEAD  --><head>
    <!-- START @META  SECTION -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Blankon is a theme fullpack admin template powered by Twitter bootstrap 3 front-end framework. Included are multiple example pages, elements styles, and javascript widgets to get your project started.">
    <meta name="keywords" content="admin, admin template, bootstrap3, clean, fontawesome4, good documentation, lightweight admin, responsive dashboard, webapp">
    <meta name="author" content="Djava UI">
    <title>RESET PASSWORD | molirun</title>
    <!--/ END META SECTION -->

    <!-- START @FAVICONS  -->
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!--/ END FAVICONS -->

    <!-- START @FONT  STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet">
    <!--/ END FONT STYLES -->

    <!-- START @GLOBAL  MANDATORY STYLES -->
    <link href="{{ asset('/assets/global/plugins/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--/ END GLOBAL MANDATORY STYLES -->

    <!-- START @PAGE  LEVEL STYLES -->
    <link href="{{ asset('/assets/global/plugins/bower_components/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/global/plugins/bower_components/animate.css/animate.min.css') }}" rel="stylesheet">
    <!--/ END PAGE LEVEL STYLES -->

    <!-- START @THEME  STYLES -->
    <link href="{{ asset('/assets/admin/css/reset.css') }}" rel="stylesheet">

    <link href="{{ asset('/assets/admin/css/layout.css') }}" rel="stylesheet">

    <link href="{{ asset('/assets/admin/css/components.css') }}" rel="stylesheet">

    <link href="{{ asset('/assets/admin/css/plugins.css') }}" rel="stylesheet">

    <link href="{{ asset('/assets/admin/css/themes/laravel.theme.css') }}" rel="stylesheet" id="theme">

    <link href="{{ asset('/assets/admin/css/pages/sign.css') }}" rel="stylesheet">

    <link href="{{ asset('/assets/admin/css/custom.css') }}" rel="stylesheet">

    <!--/ END THEME STYLES -->

    <!-- START @IE  SUPPORT -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('/assets/global/plugins/bower_components/html5shiv/dist/html5shiv.min.js') }}"></script>
    <script src="{{ asset('/assets/global/plugins/bower_components/respond-minmax/dest/respond.min.js') }}"></script>
    <![endif]-->
    <!--/ END IE SUPPORT -->
    <style type="text/css"></style><style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style><style id="style-1-cropbar-clipper">/* Copyright 2014 Evernote Corporation. All rights reserved. */
        .en-markup-crop-options {
            top: 18px !important;
            left: 50% !important;
            margin-left: -100px !important;
            width: 200px !important;
            border: 2px rgba(255,255,255,.38) solid !important;
            border-radius: 4px !important;
        }

        .en-markup-crop-options div div:first-of-type {
            margin-left: 0px !important;
        }
    </style></head>
<!--/ END HEAD -->

<!--

    |=========================================================================================================================|
	|  TABLE OF CONTENTS (Use search to find needed section)                                                                  |
	|=========================================================================================================================|
    |  01. @HEAD                                                |  Container for all the head elements                                                |
	|  02. @META  SECTION                |  The meta tag provides metadata about the HTML document                             |
	|  03. @FAVICONS                                        |  Short for favorite icon, shortcut icon, website icon, tab icon or bookmark icon    |
	|  04. @FONT  STYLES                 |  Font from google fonts                                                             |
	|  05. @GLOBAL  MANDATORY STYLES     |  The main 3rd party plugins css file                                                |
	|  06. @PAGE  LEVEL STYLES           |  Specific 3rd party plugins css file                                                |
	|  07. @THEME  STYLES                |  The main theme css file                                                            |
	|  08. @IE  SUPPORT                  |  IE support of HTML5 elements and media queries                                     |
	|=========================================================================================================================|
	|  09. @BODY                                                |  Contains all the contents of an HTML document                                      |
	|  10. @LOADING  ANIMATION           |  Loading animation when the page reload                                             |
	|  11. @WRAPPER                                          |  Wrapping page section                                                              |
	|  12. @SIGN  WRAPPER                |  Wrapping sign design                                                               |
	|=========================================================================================================================|
	|  13. @CORE  PLUGINS                |  The main 3rd party plugins script file                                             |
	|  14. @PAGE  LEVEL SCRIPTS          |  The main theme script file                                                         |
	|=========================================================================================================================|

    START @BODY
        |=========================================================================================================================|
        |  TABLE OF CONTENTS (Apply to body class)                                                                                |
        |=========================================================================================================================|
        |  01. page-boxed                   |  Page into the box is not full width screen                                         |
        |  02. page-sound                   |  For playing sounds on user actions and page events                                 |
        |=========================================================================================================================|

        -->
<body class="page-sound laravel">
<!--[if lt IE 9]>
<p class="upgrade-browser">Upps!! You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- START @SIGN  WRAPPER -->
<div id="sign-wrapper">

    <!-- Brand -->
    <div class="brand">
        <img src="{{ asset('/assets/admin/img/logo/html/logo-vertical.png') }}" alt="brand logo">
    </div>
    <!--/ Brand -->

    <!-- Lost password form -->
    <form class="form-horizontal rounded shadow" action="{{ url('password/reset') }}" method="POST">
        {!! csrf_field() !!}
        <input type="hidden" name="token" value="{{ $token }}">

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
                    <input class="form-control" placeholder="Email " type="email" name="email" value="">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-lg rounded">
                    <input class="form-control" placeholder="Password" type="password" name="password" value="">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-lg rounded">
                    <input class="form-control" placeholder="Confirm Password" type="password" name="password_confirmation" value="">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                </div>
            </div>
        </div>
        <div class="sign-footer">
            <div class="form-group">
            </div><!-- /.form-group -->
            <div class="form-group">
                <button type="submit" class="btn btn-theme btn-lg btn-block no-margin rounded">Reset password</button>
            </div>
        </div>
    </form>
    <!--/ Lost password form -->


</div><!-- /#sign-wrapper -->
<!--/ END SIGN WRAPPER -->

<!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
<!-- START @CORE  PLUGINS -->
<script src="{{ asset('/assets/global/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('/assets/global/plugins/bower_components/jquery-cookie/jquery.cookie.js') }}"></script>
<script src="{{ asset('/assets/global/plugins/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/global/plugins/bower_components/typehead.js/dist/handlebars.js') }}"></script>
<script src="{{ asset('/assets/global/plugins/bower_components/typehead.js/dist/typeahead.bundle.min.js') }}"></script>
<script src="{{ asset('/assets/global/plugins/bower_components/jquery-nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('/assets/global/plugins/bower_components/jquery.sparkline.min/index.js') }}"></script>
<script src="{{ asset('/assets/global/plugins/bower_components/jquery-easing-original/jquery.easing.1.3.min.js') }}"></script>
<script src="{{ asset('/assets/global/plugins/bower_components/ionsound/js/ion.sound.min.js') }}"></script>
<script src="{{ asset('/assets/global/plugins/bower_components/bootbox/bootbox.js') }}"></script>
<!--/ END CORE PLUGINS -->

<!-- START @PAGE  LEVEL PLUGINS -->
<!--/ END PAGE LEVEL PLUGINS -->

<!-- START @PAGE  LEVEL SCRIPTS -->
<!--/ END PAGE LEVEL SCRIPTS -->
<!--/ END JAVASCRIPT SECTION -->

<!-- START GOOGLE ANALYTICS -->
<!--<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-55892530-1', 'auto');
    ga('send', 'pageview');

</script>-->
<!--/ END GOOGLE ANALYTICS -->

<!-- END BODY -->


<script aria-hidden="true" type="application/x-lastpass" id="hiddenlpsubmitdiv" style="display: none;"></script></body></html>