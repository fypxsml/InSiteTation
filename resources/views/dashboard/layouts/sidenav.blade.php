<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="/img/faces/avatar.jpg" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>{{ Auth::user()->fname }}  {{ Auth::user()->lname }}</p>
    </div>
  </div>
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
    <li><a href="/home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

    @if(Auth::user()->level() >= 2)

    <li class="treeview">
      <a href="#">
        <i class="fa fa-cube"></i>
        <span>Asset</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="/asset"><i class="fa fa-circle-o"></i> Manage Asset</a></li>
        <li><a href="/asset/search"><i class="fa fa-circle-o"></i> Search Asset</a></li>
        <li><a href="/asset/generate"><i class="fa fa-circle-o"></i> Generate QR Code</a></li>
        <li><a href="/asset/archived"><i class="fa fa-circle-o"></i> Archived Assets</a></li>
        <li><a href="/asset/category"><i class="fa fa-circle-o"></i> Category</a></li>
        <li><a href="/asset/subcategory"><i class="fa fa-circle-o"></i> Subcategory</a></li>
        <li><a href="/asset/insurance"><i class="fa fa-circle-o"></i> Insurance Company</a></li>
        <li><a href="/asset/service"><i class="fa fa-circle-o"></i> Service Company</a></li>
      </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-map-o"></i>
        <span>Project Site</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="/projectsite"><i class="fa fa-circle-o"></i> Manage Site</a></li>
        <li><a href="/projectsite/search"><i class="fa fa-circle-o"></i> Search Site</a></li>
        <li><a href="/projectsite/assign"><i class="fa fa-circle-o"></i> Assign Site</a></li>
        <li><a href="/projectsite/map"><i class="fa fa-circle-o"></i> Project Site Map</a></li>
      </ul>
    </li>

    @endif

    <li class="treeview">
      <a href="#">
        <i class="fa fa-calendar-plus-o"></i>
        <span>Requisition</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        @if(Auth::user()->level() >= 2)
          <li><a href="/requisition/pending"><i class="fa fa-circle-o"></i> Pending Requisition</a></li>
          <li><a href="/requisition/ongoing"><i class="fa fa-circle-o"></i> On-Going Requisition</a></li>
          <li><a href="/requisition/history"><i class="fa fa-circle-o"></i> Requisition History</a></li>
          <li><a href="/requisition/location"><i class="fa fa-circle-o"></i> Asset Location Map</a></li>
          <li><a href="/requisition/history/asset"><i class="fa fa-circle-o"></i> Asset Location History</a></li>

        @elseif(Auth::user()->level() == 1)

        <li><a href="/requisition"><i class="fa fa-circle-o"></i> Submit Requisition</a></li>
        <li><a href="/requisition/history/all"><i class="fa fa-circle-o"></i> Requisition List</a></li>
        <li><a href="/requistion/updatelocation"><i class="fa fa-circle-o"></i> Update Location</a></li>

        @endif
      </ul>
    </li>
    @if(Auth::user()->level() == 3)

    <li class="treeview">
      <a href="#">
        <i class="fa fa-user-o"></i>
        <span>Users</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="/register/approve"><i class="fa fa-circle-o"></i> Pending Registration</a></li>
        <li><a href="/user/search"><i class="fa fa-circle-o"></i> Search User</a></li>
      </ul>
    </li>

    @endif
  </ul>
</section>
<!-- /.sidebar -->
</aside>
