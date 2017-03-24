<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- START @HEAD -->
<head>
	<!-- START @META SECTION -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">

	<title>@yield('title')</title>
	<!--/ END META SECTION -->

	<!-- START @FAVICONS -->
	<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('apple-icon-57x57.png') }}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('apple-icon-60x60.png') }}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('apple-icon-72x72.png') }}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('apple-icon-76x76.png') }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('apple-icon-114x114.png') }}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('apple-icon-120x120.png') }}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('apple-icon-144x144.png') }}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('apple-icon-152x152.png') }}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-icon-180x180.png') }}">
	<link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('android-icon-192x192.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon-96x96.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
	<link rel="manifest" href="{{ asset('manifest.json') }}">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="{{ asset('ms-icon-144x144.png') }}">
	<meta name="theme-color" content="#ffffff">
	<!--/ END FAVICONS -->

	<!-- START @FONT STYLES -->
	<link href="https://fonts.lug.ustc.edu.cn/css?family=Open+Sans:400,300,600,700" rel="stylesheet">
	<link href="https://fonts.lug.ustc.edu.cn/css?family=Oswald:700,400" rel="stylesheet">
	<!--/ END FONT STYLES -->

	<!-- START @GLOBAL MANDATORY STYLES -->
	<link href="{{ asset('assets/global/plugins/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/global/plugins/bower_components/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/global/plugins/bower_components/animate.css/animate.min.css') }}" rel="stylesheet">
	<!--/ END GLOBAL MANDATORY STYLES -->


	<!-- START @PAGE LEVEL STYLES -->
	@yield('css-page')
	<!--/ END PAGE LEVEL STYLES -->


	<!-- START @THEME STYLES -->
	<link href="{{ asset('assets/admin/css/reset.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/admin/css/layout.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/admin/css/components.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/admin/css/plugins.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/admin/css/themes/default.theme.css') }}" rel="stylesheet" id="">
	<!--/ END THEME STYLES -->


	<!-- START @IE SUPPORT -->
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="{{ asset('assets/global/plugins/bower_components/html5shiv/dist/html5shiv.min.js') }}"></script>
	<script src="{{ asset('assets/global/plugins/bower_components/respond-minmax/dest/respond.min.js') }}"></script>
	<![endif]-->
	<!--/ END IE SUPPORT -->
</head>
<!--/ END HEAD -->

<!--

    |=========================================================================================================================|
    |  TABLE OF CONTENTS (Use search to find needed section)                                                                  |
    |=========================================================================================================================|
    |  01. @HEAD                        |  Container for all the head elements                                                |
    |  02. @META SECTION                |  The meta tag provides metadata about the HTML document                             |
    |  03. @FAVICONS                    |  Short for favorite icon, shortcut icon, website icon, tab icon or bookmark icon    |
    |  04. @FONT STYLES                 |  Font from google fonts                                                             |
    |  05. @GLOBAL MANDATORY STYLES     |  The main 3rd party plugins css file                                                |
    |  06. @PAGE LEVEL STYLES           |  Specific 3rd party plugins css file                                                |
    |  07. @THEME STYLES                |  The main theme css file                                                            |
    |  08. @IE SUPPORT                  |  IE support of HTML5 elements and media queries                                     |
    |=========================================================================================================================|
    |  09. @BODY                        |  Contains all the contents of an HTML document                                      |
    |  10. @WRAPPER                     |  Wrapping page section                                                              |
    |  11. @HEADER                      |  Header page section contains about logo, top navigation, notification menu         |
    |  12. @SIDEBAR LEFT                |  Sidebar page section contains all sidebar menu left                                |
    |  13. @PAGE CONTENT                |  Contents page section contains breadcrumb, content page, footer page               |
    |  14. @SIDEBAR RIGHT               |  Sidebar page section contains all sidebar menu right                               |
    |  15. @BACK TOP                    |  Element back to top and action                                                     |
    |=========================================================================================================================|
    |  16. @CORE PLUGINS                |  The main 3rd party plugins script file                                             |
    |  17. @PAGE LEVEL PLUGINS          |  Specific 3rd party plugins script file                                             |
    |  18. @PAGE LEVEL SCRIPTS          |  The main theme script file                                                         |
    |=========================================================================================================================|

    START @BODY
		|=========================================================================================================================|
        |  TABLE OF CONTENTS (Apply to body class)                                                                                |
        |=========================================================================================================================|
        |  01. page-boxed                   |  Page into the box is not full width screen                                         |
        |  02. page-header-fixed            |  Header element become fixed position                                               |
        |  03. page-sidebar-fixed           |  Sidebar element become fixed position with scroll support                          |
        |  04. page-sidebar-minimize        |  Sidebar element become minimize style width sidebar                                |
        |  05. page-footer-fixed            |  Footer element become fixed position with scroll support on page content           |
        |  06. page-sound                   |  For playing sounds on user actions and page events                                 |
        |=========================================================================================================================|

        -->
<body class="page-session page-sound page-header-fixed page-sidebar-fixed">

<!--[if lt IE 9]>
<p class="upgrade-browser">Upps!! You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- START @WRAPPER -->
<section id="wrapper">

	<!-- START @HEADER -->
	@include('layouts._header')
			<!--/ END HEADER -->

	<!--

            START @SIDEBAR LEFT
            |=========================================================================================================================|
            |  TABLE OF CONTENTS (Apply to sidebar left class)                                                                        |
            |=========================================================================================================================|
            |  01. sidebar-box               |  Variant style sidebar left with box icon                                              |
            |  02. sidebar-rounded           |  Variant style sidebar left with rounded icon                                          |
            |  03. sidebar-circle            |  Variant style sidebar left with circle icon                                           |
            |=========================================================================================================================|

            -->
	@include('layouts._sidebar_left')
			<!--/ END SIDEBAR LEFT -->

	<!-- START @PAGE CONTENT -->
	@yield('content')
			<!--/ END PAGE CONTENT -->

	<!-- START @SIDEBAR RIGHT -->
	@include('layouts._sidebar_right')
			<!--/ END SIDEBAR RIGHT -->

	<!-- START @ALL MODALS -->
	@if((Request::is('component','component/modals')))
	@include('component._all-modals')
	@endif
			<!--/ END ALL MODALS -->

</section><!-- /#wrapper -->
<!--/ END WRAPPER -->



<!-- START @BACK TOP -->
<div id="back-top" class="animated pulse circle">
	<i class="fa fa-angle-up"></i>
</div><!-- /#back-top -->
<!--/ END BACK TOP -->

<!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
	<!-- START @CORE PLUGINS -->
	<script src="{{ asset('assets/global/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/global/plugins/bower_components/jquery-cookie/jquery.cookie.js') }}"></script>
	<script src="{{ asset('assets/global/plugins/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/global/plugins/bower_components/typehead.js/dist/handlebars.js') }}"></script>
	<script src="{{ asset('assets/global/plugins/bower_components/typehead.js/dist/typeahead.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/global/plugins/bower_components/jquery-nicescroll/jquery.nicescroll.min.js') }}"></script>
	<script src="{{ asset('assets/global/plugins/bower_components/jquery.sparkline.min/index.js') }}"></script>
	<script src="{{ asset('assets/global/plugins/bower_components/jquery-easing-original/jquery.easing.1.3.min.js') }}"></script>
	<script src="{{ asset('assets/global/plugins/bower_components/ionsound/js/ion.sound.min.js') }}"></script>
	<script src="{{ asset('assets/global/plugins/bower_components/bootbox/bootbox.js') }}"></script>
	<!--/ END CORE PLUGINS -->

	<!-- START @PAGE LEVEL PLUGINS -->
	@yield('js-additional')
	@yield('js-plugins')
	<!--/ END PAGE LEVEL PLUGINS -->

	<!-- START @PAGE LEVEL SCRIPTS -->
	@yield('js-page')
	<!--/ END PAGE LEVEL SCRIPTS -->
<!--/ END JAVASCRIPT SECTION -->

<!-- START GOOGLE ANALYTICS -->
<!--/ END GOOGLE ANALYTICS -->

</body>
<!--/ END BODY -->

</html>
