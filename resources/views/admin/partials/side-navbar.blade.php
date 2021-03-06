<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            {{--            <div class="pull-left image">--}}
            {{--                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">--}}
            {{--            </div>--}}
            {{--            <div class="pull-left info">--}}
            {{--                <p>Alexander Pierce</p>--}}
            {{--                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
            {{--            </div>--}}
        </div>
        <!-- search form -->
{{--        <form action="#" method="get" class="sidebar-form">--}}
{{--            <div class="input-group">--}}
{{--                <input type="text" name="q" class="form-control" placeholder="Search...">--}}
{{--                <span class="input-group-btn">--}}
{{--                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
{{--                </button>--}}
{{--              </span>--}}
{{--            </div>--}}
{{--        </form>--}}
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>

                <a href="{{route('dash')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cutlery"></i>
                    <span>Restaurants</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('shop.create')}}"><i class="fa fa-circle-o"></i> Add Restaurant</a></li>
                    <li><a href="{{route('shop.index')}}"><i class="fa fa-circle-o"></i> View Restaurant</a></li>

                </ul>
            </li>



            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cutlery"></i>
                    <span>Cuisines</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('cuisine.create')}}"><i class="fa fa-circle-o"></i> Add Cuisines</a></li>
                    <li><a href="{{route('cuisine.index')}}"><i class="fa fa-circle-o"></i> View Cuisines</a></li>

                </ul>
            </li>

{{--            <li class="treeview">--}}
{{--                <a href="#">--}}
{{--                    <i class="fa fa-cutlery"></i>--}}
{{--                    <span>Delivery People</span>--}}
{{--                    <span class="pull-right-container">--}}
{{--              <i class="fa fa-angle-left pull-right"></i>--}}
{{--            </span>--}}
{{--                </a>--}}
{{--                <ul class="treeview-menu">--}}
{{--                    <li><a href="{{route('transporter.create')}}"><i class="fa fa-circle-o"></i> Add Delivery Boy</a></li>--}}
{{--                    <li><a href="{{route('transporter.index')}}"><i class="fa fa-circle-o"></i> View Delivery Boy</a></li>--}}

{{--                </ul>--}}
{{--            </li>--}}

            <li>
                <a href="{{route('ord_report')}}">
                    <i class="fa fa-clipboard"></i>
                    <span> Order Report</span>
                </a>
            </li>
            <li>
            <a href="{{route('ord')}}">
                    <i class="fa fa-first-order"></i>
                    <span> Orders</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user-circle-o"></i>
                    <span>Users</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('users.index')}}"><i class="fa fa-circle-o"></i> View User</a></li>

                </ul>
            </li>
            <li>
                <a href="{{route('feed')}}">
                    <i class="fa fa-star"></i>
                    <span> FeedBack</span>
                </a>
            </li>





            {{--            <li class="treeview">--}}
            {{--                <a href="#">--}}
            {{--                    <i class="fa fa-edit"></i> <span>Forms</span>--}}
            {{--                    <span class="pull-right-container">--}}
            {{--              <i class="fa fa-angle-left pull-right"></i>--}}
            {{--            </span>--}}
            {{--                </a>--}}
            {{--                <ul class="treeview-menu">--}}
            {{--                    <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>--}}
            {{--                    <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>--}}
            {{--                    <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>--}}
            {{--                </ul>--}}
            {{--            </li>--}}
            {{--            <li class="treeview">--}}
            {{--                <a href="#">--}}
            {{--                    <i class="fa fa-table"></i> <span>Tables</span>--}}
            {{--                    <span class="pull-right-container">--}}
            {{--              <i class="fa fa-angle-left pull-right"></i>--}}
            {{--            </span>--}}
            {{--                </a>--}}
            {{--                <ul class="treeview-menu">--}}
            {{--                    <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>--}}
            {{--                    <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>--}}
            {{--                </ul>--}}
            {{--            </li>--}}
            {{--            <li>--}}
            {{--                <a href="pages/calendar.html">--}}
            {{--                    <i class="fa fa-calendar"></i> <span>Calendar</span>--}}
            {{--                    <span class="pull-right-container">--}}
            {{--              <small class="label pull-right bg-red">3</small>--}}
            {{--              <small class="label pull-right bg-blue">17</small>--}}
            {{--            </span>--}}
            {{--                </a>--}}
            {{--            </li>--}}
            {{--            <li>--}}
            {{--                <a href="pages/mailbox/mailbox.html">--}}
            {{--                    <i class="fa fa-envelope"></i> <span>Mailbox</span>--}}
            {{--                    <span class="pull-right-container">--}}
            {{--              <small class="label pull-right bg-yellow">12</small>--}}
            {{--              <small class="label pull-right bg-green">16</small>--}}
            {{--              <small class="label pull-right bg-red">5</small>--}}
            {{--            </span>--}}
            {{--                </a>--}}
            {{--            </li>--}}
            {{--            <li class="treeview">--}}
            {{--                <a href="#">--}}
            {{--                    <i class="fa fa-folder"></i> <span>Examples</span>--}}
            {{--                    <span class="pull-right-container">--}}
            {{--              <i class="fa fa-angle-left pull-right"></i>--}}
            {{--            </span>--}}
            {{--                </a>--}}
            {{--                <ul class="treeview-menu">--}}
            {{--                    <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>--}}
            {{--                    <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>--}}
            {{--                    <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>--}}
            {{--                    <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>--}}
            {{--                    <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>--}}
            {{--                    <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>--}}
            {{--                    <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>--}}
            {{--                    <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>--}}
            {{--                    <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>--}}
            {{--                </ul>--}}
            {{--            </li>--}}
            {{--            <li class="treeview">--}}
            {{--                <a href="#">--}}
            {{--                    <i class="fa fa-share"></i> <span>Multilevel</span>--}}
            {{--                    <span class="pull-right-container">--}}
            {{--              <i class="fa fa-angle-left pull-right"></i>--}}
            {{--            </span>--}}
            {{--                </a>--}}
            {{--                <ul class="treeview-menu">--}}
            {{--                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>--}}
            {{--                    <li class="treeview">--}}
            {{--                        <a href="#"><i class="fa fa-circle-o"></i> Level One--}}
            {{--                            <span class="pull-right-container">--}}
            {{--                  <i class="fa fa-angle-left pull-right"></i>--}}
            {{--                </span>--}}
            {{--                        </a>--}}
            {{--                        <ul class="treeview-menu">--}}
            {{--                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>--}}
            {{--                            <li class="treeview">--}}
            {{--                                <a href="#"><i class="fa fa-circle-o"></i> Level Two--}}
            {{--                                    <span class="pull-right-container">--}}
            {{--                      <i class="fa fa-angle-left pull-right"></i>--}}
            {{--                    </span>--}}
            {{--                                </a>--}}
            {{--                                <ul class="treeview-menu">--}}
            {{--                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
            {{--                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>--}}
            {{--                                </ul>--}}
            {{--                            </li>--}}
            {{--                        </ul>--}}
            {{--                    </li>--}}
            {{--                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>--}}
            {{--                </ul>--}}
            {{--            </li>--}}
            {{--            <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>--}}
            {{--            <li class="header">LABELS</li>--}}
            {{--            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>--}}
            {{--            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>--}}
            {{--            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>--}}
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
