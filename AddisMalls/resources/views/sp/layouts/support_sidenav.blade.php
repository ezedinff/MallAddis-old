<div class="left_col scroll-view" style="min-height: 100%; max-width: 20%; position: fixed; padding-right: 0; margin: 0; min-width:  19.5%;">
    <div class="navbar nav_title" style="border: 0;">
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
        <div class="profile_pic">
            <img src="{{asset('img/default_pic.png')}}" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
            <span>Welcome,</span>
            <?php $service = \App\Service_provider::where('company_id',auth()->user()->company_id)->get(); ?>
            <h2>{{ ucfirst(Auth::user()->first_name )}} {{ ucfirst(Auth::user()->last_name) }} </h2>
            <p style="width: 100%;"><a href="javascript:;" style="text-align: center; color: #949494; width: 100%;">{{$service[0]->name}}</a></p>
        </div>
    </div>
    <br>

    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <h3>{{$service[0]->name}} admin</h3>
            <ul class="nav side-menu">
                <li >
                    <a href="{{url('/sp/dashboard')}}">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </a>
                </li>
                <li><a><i class="fa fa-shopping-cart"></i> Manage products <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('/sp/products')}}">My products</a></li>
                        <li><a href="{{url('/sp/addProducts')}}">Add new product</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-plug"></i>Manage supply<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('/sp/supply')}}">My supplies</a></li>
                        <li><a href="{{url('/sp/addSupply')}}">Add new supply</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-floppy-o"></i>Manage demand<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('/sp/demands')}}">My demands</a></li>
                        <li><a href="{{url('/sp/addDemand')}}">Add new demand</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-tasks"></i>Manage vacancy<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('/sp/vacancy')}}">vacancy</a></li>
                        <li><a href="{{url('/sp/addVacancy')}}">post a vacancy</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-columns"></i>Manage layouts<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('/sp/addCover')}}">Add cover photo</a></li>
                        <li><a href="{{url('/sp/addLogo')}}">Add logo </a></li>
                        <li><a href="{{url('/sp/addSlide')}}">Add photo for slide</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-users"></i> Manage users<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('/sp/users')}}">users</a></li>
                        <li><a href="{{url('/sp/addUser')}}">Add new user</a></li>
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