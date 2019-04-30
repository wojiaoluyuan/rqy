<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg")}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">用户使用</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ active_class(if_route('user.center')) }}"><a href="{{ url('/user/center') }}"><i class="fa fa-home"></i> <span>商家中心</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-cloud-upload"></i> <span>发布/管理</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li class="padding_l_20 {{ active_class(if_route('user.release_task')) }}"><a href="{{ url('/user/release_task') }}"><i class="fa fa-circle-o"></i>发布推广任务</a></li>
                    <li class="padding_l_20 {{ active_class(if_route('user.advance_duty')) }}"><a href="{{ url('/user/advance_duty') }}"><i class="fa fa-circle-o"></i>垫付任务管理</a></li>
                    <li class="padding_l_20 {{ active_class(if_route('user.browse_task')) }}"><a href="{{ url('/user/browse_task') }}"><i class="fa fa-circle-o"></i>浏览任务管理</a></li>
                </ul>
            </li>
            <li class="{{ active_class(if_route('user.funds')) }}"><a href="{{ url('/user/funds/capital') }}"><i class="fa fa-credit-card"></i> <span>资金明细</span></a></li>
            <li class="{{ active_class(if_route('user.bind')) }}"><a href="{{ url('/user/bind') }}"><i class="fa fa-link"></i> <span>店铺管理</span></a></li>
            <li class="{{ active_class(if_route('user.explain')) }}"><a href="{{ url('/user/explain') }}"><i class="fa fa-exclamation-circle"></i> <span>申述中心</span></a></li>
            <li class="{{ active_class(if_route('user.plan')) }}"><a href="{{ url('/user/plan') }}"><i class="fa  fa-dollar"></i> <span>推广赚奖金</span></a></li>
            <li class="{{ active_class(if_route('user.ban')) }}"><a href="{{ url('/user/ban') }}"><i class="fa fa-minus-circle"></i> <span>黑名单</span></a></li>
            <li class="header">管理模块</li>
            <li class="{{ active_class(if_route('admin.notice')) }}"><a href="{{ url('/admin/notice') }}"><i class="fa fa-bullhorn"></i> <span>发布公告</span></a></li>
            <li class="{{ active_class(if_route('admin.check')) }}"><a href="{{ url('/admin/check') }}"><i class="fa fa-leanpub"></i> <span>充值审批</span></a></li>
            <li class="{{ active_class(if_route('user.api_doc')) }}"><a href="{{ url('/user/api_doc') }}"><i class="fa fa-book"></i> <span>接口文档</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>