<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>SS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Employee</b>SS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">{{count(auth()->user()->employee->notifications)}}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have {{auth()->user()->employee->notificationTotal()}} notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  @foreach(auth()->user()->employee->notifications as $notification)
                  <li>
                    <a href="#">
                      <i class="fa {{$notification->icon}}"></i> {{$notification->total}} {{$notification->name}}
                    </a>
                  </li>
                  @endforeach
                </ul>
              </li>
            </ul>
          </li>
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/img/profile_picture/{{auth()->user()->employee->person->picture}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{auth()->user()->employee->person->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/img/profile_picture/{{auth()->user()->employee->person->picture}}" class="img-circle" alt="User Image">
                <p>
                  {{auth()->user()->employee->person->name}} - {{auth()->user()->employee->position->name}}
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('profile')}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
            <a href="{{route('profile')}}" class="profile-tab">
                <img src="/img/profile_picture/{{auth()->user()->employee->person->picture}}" class="img-circle" alt="User Image">
            </a>
        </div>
        <div class="pull-left info">
          <p>{{auth()->user()->employee->person->name}}</p>
          <i class="fa fa-circle text-success"></i> Online
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-id-card"></i> <span>My HR</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('profile')}}"><i class="fa fa-user"></i>Profile</a></li>
            <li><a href="{{route('family')}}"><i class="fa fa-users"></i>Family</a></li>
            <li><a href="{{route('address')}}"><i class="fa fa-home"></i>Address</a></li>
            <li><a href="{{route('certificate')}}"><i class="fa fa-certificate"></i>Certificate</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa ion-ios-body-outline"></i> <span>Self Service</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('selfservice')}}"><i class="fa fa-money"></i>Benefit</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-file-text-o"></i>Payslip
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('payslip.monthly')}}"><i class="fa fa-circle-o"></i>Monthly</a></li>
                <li><a href="{{route('payslip.yearly')}}"><i class="fa fa-circle-o"></i>Yearly</a></li>
              </ul>
            </li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share-square-o"></i>
            <span>My Request</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('request.personal')}}"><i class="fa fa-user"></i>Personal</a></li>
            <li><a href="{{route('request.list')}}"><i class="fa fa-money"></i>Benefit</a></li>
          </ul>
        </li>
        @if(auth()->user()->employee->subordinate()->count()>0 or auth()->user()->employee->isPIC() == true)
        <li class="treeview">
          <a href="#">
            <i class="fa fa-handshake-o"></i> <span>Approval</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('approve.personal')}}"><i class="fa fa-user-o"></i>Personal</a></li>
            <li><a href="{{route('approve.benefit')}}"><i class="fa fa-money"></i>Benefit</a></li>
          </ul>
        </li>
        <li><a href="{{route('setting')}}"><i class="fa fa-cogs"></i> <span>Settings</span></a></li>
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>