<div class="left_col scroll-view" style="min-height: 100%; max-width: 20%; position: fixed; padding-right: 0; margin: 0; min-width:  19.5%;">
    <div class="navbar nav_title" style="border: 0;">
    </div>

    <div class="clearfix"></div>
<?php $mall = \App\Mall::where('company_id',auth()->user()->company_id)->get(); ?>
    <!-- menu profile quick info -->
    <div class="profile clearfix">
        <div class="profile_pic">
            <img src="{{asset('img/default_pic.png')}}" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
            <span>Welcome,</span>
            <h2>{{ ucfirst(Auth::user()->first_name )}} {{ ucfirst(Auth::user()->last_name) }} </h2>
            <p style="width: 100%;"><a href="javascript:;" style="text-align: center; color: #949494; width: 100%;">{{$mall[0]->name}}</a></p>
        </div>
    </div>
    <br>

    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <h3>{{$mall[0]->name}} admin</h3>
            <ul class="nav side-menu">
                <li >
                    <a href="{{url('/home')}}">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </a>
                </li>
                <li><a><i class="fa fa-gear"></i>Manage Tenants <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('/mall/tenants')}}">Tenants</a></li>
                        <li><a href="{{url('/mall/createService')}}">Add Tenants</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-gear"></i>Manage Lease space<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#">Lease spaces </a></li>
                        <li><a href="{{url('/mall/addLeaseSpace')}}">post lease space</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-tasks"></i>Manage vacancy<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('/mall/vacancy')}}">vacancy</a></li>
                        <li><a href="{{url('/mall/addVacancy')}}">post a vacancy</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-columns"></i>Manage layouts<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('/mall/addCover')}}">Add cover photo </a></li>
                        <li><a href="{{url('/mall/addLogo')}}">Add logo </a></li>
                        <li><a href="{{url('/mall/addSlide')}}">add photo for slide</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- /menu footer buttons -->

    <div class="sidebar-footer hidden-small " style="margin-left: 10px;">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
    </div>
    <!-- /menu footer buttons -->
</div>