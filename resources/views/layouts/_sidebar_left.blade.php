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
<aside id="sidebar-left" class="sidebar-circle">

    <!-- Start left navigation - profile shortcut -->
    <div class="sidebar-content">
        <div class="media">
            <a class="pull-left has-notif avatar" href="{{url('page/profile')}}">
                <img src="{{ asset('assets/admin/img/avatar/50/1.png') }}" alt="admin">
                <i class="online"></i>
            </a>
            <div class="media-body">
                <h4 class="media-heading">Hello, <span>{{ $user->name }}</span></h4>
                <small>Admistrator</small>
            </div>
        </div>
    </div><!-- /.sidebar-content -->
    <!--/ End left navigation -  profile shortcut -->

    <!-- Start left navigation - menu -->
    <ul class="sidebar-menu">


        <!-- Start category usersmanagment -->
        <li class="sidebar-category">
            <span>{{ trans('racer.racer') }} <span class="hidden-sidebar-minimize">{{ trans('layout.management') }}</span></span>
            <span class="pull-right"><i class="fa fa-tags"></i></span>
        </li>
        <!--/ End category usersmanagment -->

        <!-- Start user -->
        <li {!! Request::is('racer', 'racer/*') ? 'class="active"' : null !!}>
            <a href="{{url('racer/index')}}">
                <span class="icon"><i class="fa fa-user"></i></span>
                <span class="text">{{ trans('racer.racer') }}</span>
            </a>
        </li>
        <!--/ End user -->

        <!-- Start stock -->
        <li {!! Request::is('stock', 'stock/*') ? 'class="active"' : null !!}>
            <a href="{{url('stock/index')}}">
                <span class="icon"><i class="fa fa-user"></i></span>
                <span class="text">{{ trans('stock.stock') }}</span>
            </a>
        </li>
        <!--/ End stock -->

        <!-- Start coupon -->
        <li {!! Request::is('coupon', 'coupon/*') ? 'class="active"' : null !!}>
            <a href="{{url('coupon/index')}}">
                <span class="icon"><i class="fa fa-user"></i></span>
                <span class="text">{{ trans('coupon.code') }}</span>
            </a>
        </li>
        <!--/ End coupon -->

    </ul><!-- /.sidebar-menu -->
    <!--/ End left navigation - menu -->

    <!-- Start left navigation - footer -->
    <div class="sidebar-footer hidden-xs hidden-sm hidden-md">
        <a id="help" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Help & Contact"><i class="fa fa-question-circle"></i></a>
        <a id="fullscreen" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Fullscreen"><i class="fa fa-desktop"></i></a>
        <a id="lock-screen" data-url="lock-screen" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Lock Screen"><i class="fa fa-lock"></i></a>
        <a id="logout" data-url="{{ url('page/signout') }}" class="pull-left" href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-title="Logout"><i class="fa fa-power-off"></i></a>
    </div><!-- /.sidebar-footer -->
    <!--/ End left navigation - footer -->

</aside><!-- /#sidebar-left -->
<!--/ END SIDEBAR LEFT -->
