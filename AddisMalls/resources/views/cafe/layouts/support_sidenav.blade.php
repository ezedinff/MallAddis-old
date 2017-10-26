<div class="left_col scroll-view" style="min-height: 100%; max-width: 20%; position: fixed; padding-right: 0; margin: 0; min-width:  19.5%;">
    <div class="navbar nav_title" style="border: 0;">
    </div>


    <!-- menu profile quick info -->
    <div class="profile clearfix" style="top: -50px; position: relative;">
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
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu"  style="top: -50px; position: relative;">
        <div class="menu_section">
            <h3>{{$service[0]->name}} admin</h3>
            <ul class="nav side-menu">
                <li >
                    <a href="{{url('/cafe/dashboard')}}">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </a>
                </li>
                <li >
                    <a href="{{url('/cafe/openingHour')}}">
                        <i class="fa fa-clock-o"></i> Opening Hours
                    </a>
                </li>
                <li><a><i class="fa fa-coffee"></i> Manage menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('/cafe/menu')}}">My menus</a></li>
                        <li><a href="{{url('/cafe/addMenu')}}">Add menu</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-cutlery"></i>Manage dishes<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('/cafe/dishes')}}">My dishes </a></li>
                        <li><a href="{{url('/cafe/addDishes')}}">Add new dishes</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-home"></i>Manage ambience's<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('/cafe/ambience')}}">My ambience </a></li>
                        <li><a href="{{url('/cafe/addAmbience')}}">post ambience</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-floppy-o"></i>Manage daily demand<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('/cafe/demands')}}">My daily demands</a></li>
                        <li><a href="{{url('/cafe/addDemand')}}">Add daily demand</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-tasks"></i>Manage Vacancy<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('/cafe/vacancy')}}">Vacancies</a></li>
                        <li><a href="{{url('/cafe/addVacancy')}}">post Vacancy</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-columns"></i>Manage layouts<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('/cafe/addCover')}}">Add cover photo</a></li>
                        <li><a href="{{url('/cafe/addLogo')}}">Add logo </a></li>
                        <li><a href="{{url('/cafe/addSlide')}}">Add photo for slide</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-users"></i> Manage users<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('/cafe/users')}}">users</a></li>
                        <li><a href="{{url('/cafe/addUser')}}">Add new user</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

</div>