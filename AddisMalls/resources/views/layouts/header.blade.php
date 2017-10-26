<nav id="nav" class="white">
    <div class="nav-wrapper">
        <a href='{{url("/")}}' class="brand-logo" style="float: left; padding-top: 0.5%; padding-left: 0.5%; ">
            <img src="{{asset("/img/logo.png")}}" style="height: 50px;">
        </a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons" style="color: #42A5F5;">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li id="navMenu"><a href='{{url("/show/malls")}}' >malls</a></li>
            <li id="navMenu"><a href="#" >shops</a></li>
            <li id="navMenu">
                <a href="#" class="dropdown-button" data-activates='dropdown1'>category</a>
            </li>
            <li id="navMenu"><a href="{{url('/show/cafe_and_restaurants')}}" >cafe & restaurants</a></li>
            <li id="navMenu"><a href="#" >Magazine</a></li>
            <li id="navMenu"><a href="{{url('/show/jobs')}}" >Jobs</a></li>
            @if (Auth::guest())
                <li><a href="{{url('/login')}}" class="signinButton btn" >sign in</a></li>
                <li><a href="{{url('/register')}}" class="signinButton btn" >register</a></li>
            @else
                <li>
                    <a href="#" class="dropdown-button" data-activates='dropdown2'>
                        {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}&nbsp;<span class="fa fa-caret-down"></span>
                    </a>
                </li>
            @endif
        </ul>
        <ul class="side-nav blue lighten-1" id="mobile-demo">
            <li id="navMenus"><a href='{{url("/show/malls")}}' >malls</a></li>
            <li id="navMenus"><a href="#" >shops</a></li>
            <li id="navMenus"><a href="#">category</a></li>
            <li id="navMenus"><a href="{{url('/show/cafe_and_restaurants')}}" >cafe & restaurants</a></li>
            <li id="navMenus"><a href="#" >Magazine</a></li>
            <li id="navMenus"><a href="{{url('/show/jobs')}}" >Jobs</a></li>
            @if (Auth::guest())
                <li id="navMenus"><a href="{{url('/login')}}" style="text-transform: uppercase;">sign in</a></li>
                <li id="navMenus"><a href="{{url('/register')}}" style="text-transform: uppercase;" >register</a></li>
            @else
                <li id="navMenus">
                    <a  href="{{ route('logout') }}"
                       onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
                       Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            @endif
        </ul>
    </div>
</nav>
<!-- Dropdown Structure -->

<ul id='dropdown2' class='dropdown-content'>
    <li>
        <a href="javascript:;" id="drop">
            <span class="fa fa-user"></span>
            <span>Profile</span>
        </a>
    </li>
    <li>
        <a id="drop" href="javascript:;">
            <span class="fa fa-gear"></span>
            <span>Settings</span>
        </a>
    </li>
    <li><a href="javascript:;" id="drop"><span id="drop" class="fa fa-question-circle"></span>&nbsp Help</a></li>
    <li>
        <a id="drop" href="{{ route('logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
            <span class="fa fa-sign-out"></span><span>Logout</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>
<?php $categorys = \App\Category::orderBy('name', 'asc')->limit(8)->get(); ?>
<ul id='dropdown1' class='dropdown-content'>
    @foreach($categorys as $category)
        <li><a href="#!" id="drop">{{$category->name}}</a></li>
    @endforeach
</ul>




