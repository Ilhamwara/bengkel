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
        <li class="nav-item @if(Request::is('pelanggan') || Request::is('pelanggan/tambah-pelanggan')) active open @endif">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-truck"></i>
                <span class="title">Pelanggan</span>
                @if(Request::is('pelanggan') || Request::is('tambah-pelanggan') || Request::is('edit-pelanggan'))
                    <span class="arrow open"></span>
                    <span class="selected"></span>
                @else
                    <span class="arrow"></span>
                @endif
            </a>
            <ul class="sub-menu">

            <li class="nav-item @if(Request::is('pelanggan')) active open @endif">
                    <a href="{{url('pelanggan')}}" class="nav-link ">
                        <span class="title">Data Pelanggan</span>
                        @if(Request::is('pelanggan'))
                            <span class="selected"></span>
                        @else
                            <span class="arrow"></span>
                        @endif
                    </a>
                </li>

                <li class="nav-item @if(Request::is('pelanggan/tambah-pelanggan')) active open @endif">
                    <a href="{{url('pelanggan/tambah-pelanggan')}}" class="nav-link ">
                        <span class="title">Tambah Pelanggan</span>
                        @if(Request::is('pelanggan/tambah-pelanggan'))
                            <span class="selected"></span>
                        @else
                            <span class="arrow"></span>
                        @endif
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item @if(Request::is('jasa') || Request::is('sparepart')) active open @endif">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-truck"></i>
                <span class="title">Referensi</span>
                @if(Request::is('jasa') || Request::is('sparepart')) 
                    <span class="arrow open"></span>
                    <span class="selected"></span>
                @else
                    <span class="arrow"></span>
                @endif
            </a>
            <ul class="sub-menu">

            <li class="nav-item @if(Request::is('jasa')) active open @endif">
                    <a href="{{url('jasa')}}" class="nav-link ">
                        <span class="title">Jasa</span>
                        @if(Request::is('jasa'))
                            <span class="selected"></span>
                        @else
                            <span class="arrow"></span>
                        @endif
                    </a>
                </li>

                <li class="nav-item @if(Request::is('sparepart')) active open @endif">
                    <a href="{{url('sparepart')}}" class="nav-link ">
                        <span class="title">Sparepart</span>
                        @if(Request::is('sparepart'))
                            <span class="selected"></span>
                        @else
                            <span class="arrow"></span>
                        @endif
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item @if(Request::is('buat-order') || Request::is('work-data') || Request::is('history')) active open @endif">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-truck"></i>
                <span class="title">Work Order</span>
                @if(Request::is('buat-order') || Request::is('work-data') || Request::is('history')) 
                    <span class="arrow open"></span>
                    <span class="selected"></span>
                @else
                    <span class="arrow"></span>
                @endif
            </a>
            <ul class="sub-menu">

            <li class="nav-item @if(Request::is('buat-order')) active open @endif">
                    <a href="{{url('buat-order')}}" class="nav-link ">
                        <span class="title">Buat Order Work</span>
                        @if(Request::is('buat-order'))
                            <span class="selected"></span>
                        @else
                            <span class="arrow"></span>
                        @endif
                    </a>
                </li>

            <li class="nav-item @if(Request::is('work-data')) active open @endif">
                    <a href="{{url('work-data')}}" class="nav-link ">
                        <span class="title">Data Work Order</span>
                        @if(Request::is('work-data'))
                            <span class="selected"></span>
                        @else
                            <span class="arrow"></span>
                        @endif
                    </a>
                </li>

                <li class="nav-item @if(Request::is('history')) active open @endif">
                    <a href="{{url('history')}}" class="nav-link ">
                        <span class="title">History WO</span>
                        @if(Request::is('history'))
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