<div class="card" style=" position: relative; padding: 0; margin:0;">
    <nav  style="z-index: 99999999999999999999999999999999999999999;" >
        <div class="nav-wrapper blue-text white">
            <a href="{{url('/')}}" class="brand-logo" style="padding-left: 20px;">
                <img src="{{asset('img/logo.png')}}" height="40">
            </a>
            <ul class="right hide-on-med-and-down" style="width: 75.6%; position: relative;">
                <li  style="min-width: 60.6%; margin-right: 5%; ">
                    <form  style=" height: 50px;">
                        <div class="input-field" style="background-color: #f5f5f5; top: 7px;">
                            <input id="search" type="search" required>
                            <label class="label-icon" for="search" style="top: -17px;"><i class="fa fa-search" style="color: #3596e0; font-size: 1.5em;"></i></label>
                        </div>
                    </form>
                </li>
                <li><a href="sass.html"><i class="fa fa-bell " style="color: #3596e0; font-size: 1.5em;"></i></a></li>
                <li><a href="sass.html"><i class="fa fa-comments " style="color: #3596e0; font-size: 1.5em;"></i></a></li>
                <li class="">
                    <a  class="dropdown-button" href="#!" data-activates="dropdown1">
                       {{ ucfirst(Auth::user()->first_name )}} {{ ucfirst(Auth::user()->last_name) }}
                        <span class=" fa fa-angle-down"></span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <ul id="dropdown1" class="dropdown-content"  >
        <li><a href="javascript:;" id="drop"> Profile</a></li>
        <li>
            <a id="drop" href="javascript:;">
                <span class="badge bg-red pull-right">50%</span>
                <span>Settings</span>
            </a>
        </li>
        <li><a href="javascript:;" id="drop">Help</a></li>
        <li>
            <a id="drop" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out pull-right"></i> Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>

    </ul>
</div>
