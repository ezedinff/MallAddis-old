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
            <h2>{{ ucfirst(Auth::user()->first_name )}} {{ ucfirst(Auth::user()->last_name) }} </h2>
            <p style="width: 100%;"><a href="javascript:;" style="text-align: center; color: #949494; width: 100%;">Super admin</a></p>
        </div>
    </div>
    <br>

    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <h3>malladdis admin</h3>
            <ul class="nav side-menu">
                <li >
                    <a href="{{url('/admin/dashboard')}}">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </a>
                </li>
                <li><a><i class="fa fa-gear"></i>Manage Details <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('/admin/cities')}}">Cities</a></li>
                        <li><a href="{{url('/admin/addCity')}}">Add City</a></li>
                        <li><a href="{{url('/admin/addSubCity')}}">Sub cities</a></li>
                        <li><a href="{{url('/admin/categories')}}">Categories</a></li>
                        <li><a href="{{url('/admin/addCategory')}}">Add category</a></li>
                        <li><a href="{{url('/admin/supplierCategories')}}">suppliers categories</a></li>
                        <li><a href="{{url('/admin/addSupplierCategory')}}">Add suppliers category</a></li>
                        <li><a href="{{url('/admin/supplierSubCategories')}}">suppliers sub categories</a></li>
                        <li><a href="{{url('/admin/addSubSupplierCategory')}}">Add sub category</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-gear"></i>Manage Supplier<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('/admin/suppliers')}}">suppliers</a></li>
                        <li><a href="{{url('/admin/addSupplier')}}">Add Supplier</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-gear"></i>Manage Malls & Retailers<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('/admin/malls')}}">Malls</a></li>
                        <li><a href="{{url('/admin/retailers')}}">Retailers</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-gear"></i>Manage Magazine<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('/admin/magazines')}}">Magazines</a></li>
                        <li><a href="{{url('/admin/addMagazine')}}">Add Magazine</a></li>
                    </ul>
                </li>
                <li><a><i class="fa fa-gear"></i>Manage News & Events<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{url('/admin/news')}}">Add News</a></li>
                        <li><a href="{{url('/admin/news')}}">Add Event</a></li>
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