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
            <p style="width: 100%;"><a href="javascript:;" style="text-align: center; color: #949494; width: 100%;">admin</a></p>
        </div>
    </div>
    <br>

    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
            <?php $supplier = \App\Supplier::where('company_id',auth()->user()->company_id)->get(); ?>
            <h3>{{$supplier[0]->name}} Supplier admin</h3>
            <ul class="nav side-menu">
                <li >
                    <a href="{{url('/supplier/dashboard')}}">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </a>
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