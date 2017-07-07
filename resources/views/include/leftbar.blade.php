<div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <li class="sidebar-toggler-wrapper hide">
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler"> </div>
            <!-- END SIDEBAR TOGGLER BUTTON -->
        </li>
        <li class="nav-item start @if(Request::is('home')) active open @endif">
            <a href="{{url('home')}}" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
                @if(Request::is('home'))
                    <span class="selected"></span>
                @endif
            </a>
        </li>
        <li class="nav-item @if(Request::is('pelanggan') || Request::is('tambah-pelanggan') || Request::is('edit-pelanggan')) active open @endif">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-truck"></i>
                <span class="title">Data Pelanggan</span>
                @if(Request::is('pelanggan') || Request::is('tambah-pelanggan') || Request::is('edit-pelanggan'))
                    <span class="arrow open"></span>
                    <span class="selected"></span>
                @else
                    <span class="arrow"></span>
                @endif
            </a>
            <ul class="sub-menu">
                <li class="nav-item @if(Request::is('pelanggan')) active open @endif">
                    <a href="{{url('dropping')}}" class="nav-link ">
                        <span class="title">Informasi Dropping</span>
                        @if(Request::is('dropping'))
                            <span class="selected"></span>
                        @else
                            <span class="arrow"></span>
                        @endif
                    </a>
                </li>
                <li class="nav-item @if(Request::is('tambah-dropping')) active open @endif">
                    <a href="{{url('tambah-dropping')}}" class="nav-link ">
                        <span class="title">Tambah Dropping</span>
                        @if(Request::is('tambah-dropping'))
                            <span class="selected"></span>
                        @else
                            <span class="arrow"></span>
                        @endif
                    </a>
                </li>
                <li class="nav-item @if(Request::is('pengembalian-dropping')) active open @endif">
                    <a href="{{url('pengembalian-dropping')}}" class="nav-link ">
                        <span class="title">Pengembalian Dropping</span>
                        @if(Request::is('pengembalian-dropping'))
                            <span class="selected"></span>
                        @else
                            <span class="arrow"></span>
                        @endif
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item @if(Request::is('management')) active open @endif">
            <a href="{{url('management')}}" class="nav-link nav-toggle">
                <i class="fa fa-group"></i>
                <span class="title">User Management</span>
                @if(Request::is('management'))
                    <span class="selected"></span>
                @endif
            </a>
        </li>
    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>