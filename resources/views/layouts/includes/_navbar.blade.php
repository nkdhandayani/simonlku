<header class="main-header">
  
  <!-- Logo -->
    <div class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="../../assets/images/Logo Dinas Pariwisata.png" height="25px" width="20px" style="padding-bottom: 5px"><span>  </span><b>SIMON </b>LKU</span></span>
    </div>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"></a>


      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{url('adminLTE/dist/img/user.png')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">
                @if(\Auth::guard('user')->check())
                  {{ \Auth::guard('user')->user()->nm_user }}
                @elseif(\Auth::guard('bpw')->check())
                  {{ \Auth::guard('bpw')->user()->nm_bpw }}
                @endif
              </span>
            </a>

            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{url('adminLTE/dist/img/user.png')}}" class="img-circle" alt="User Image">

                <p>
                  @if(\Auth::guard('user')->check())
                    {{ \Auth::guard('user')->user()->nm_user }}
                  @elseif(\Auth::guard('bpw')->check())
                    {{ \Auth::guard('bpw')->user()->nm_bpw }}
                  @endif
                  <small>
                    @if(\Auth::guard('user')->user() && \Auth::guard('user')->user()->level == '0')
                    Administrator
                    @elseif(\Auth::guard('user')->user() && \Auth::guard('user')->user()->level == '1')
                    Staf Jasa Pariwisata
                    @elseif(\Auth::guard('user')->user() && \Auth::guard('user')->user()->level == '2')
                    Kepala Seksi Jasa Pariwisata
                    @endif

                    @if(\Auth::guard('bpw')->user())
                    Biro Perjalanan Wisata
                    @endif
                  </small>
                </p>
              </li>

              <li class="user-footer">
                <div class="pull-left">
                  
                  <a href="/profile" class="btn btn-default btn-flat">Profile</a>

                </div>
                <div class="pull-right">
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-default btn-flat">Sign out</button>
                  </form>
                </div>
              </li>

            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>