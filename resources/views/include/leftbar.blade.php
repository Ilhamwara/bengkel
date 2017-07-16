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
                <i class="fa fa-child"></i>
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
        <li class="nav-item @if(Request::is('buat-order') || Request::is('work-data') || Request::is('history')) active open @endif">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-file-text-o"></i>
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
                    <span class="title">Buat Work Order</span>
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
        <li class="nav-item @if (Request::is('vehicle-inspection') || Request::is('buat-inspection')  || Request::is('tambah-vehicle')) active open @endif">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-truck"></i>
                <span class="title">Vehicle Inspection</span>
                @if(Request::is('vehicle-inspection') || Request::is('buat-inspection') || Request::is('tambah-vehicle'))
                <span class="arrow open"></span>
                <span class="selected"></span>
                @else
                <span class="arrow"></span>
                @endif
            </a>
            <ul class="sub-menu">
                <li class="nav-item @if(Request::is('vehicle-inspection')) active open @endif">
                    <a href="{{url('vehicle-inspection')}}" class="nav-link nav-toggle">
                        <span class="title">Data Vehicle Inspection</span>
                        @if(Request::is('vehicle-inspection'))
                        <span class="selected"></span>
                        @else
                        <span class="arrow"></span>
                        @endif
                    </a>
                </li>
                <li class="nav-item @if(Request::is('buat-inspection')) active open @endif">
                    <a href="{{url('buat-inspection')}}" class="nav-link nav-toggle">
                        <span class="title">Buat Vehicle Inspection</span>
                        @if(Request::is('buat-inspection'))
                        <span class="selected"></span>
                        @else
                        <span class="arrow"></span>
                        @endif
                    </a>
                </li>
                <li class="nav-item @if(Request::is('tambah-vehicle')) active open @endif">
                    <a href="{{url('tambah-vehicle')}}" class="nav-link nav-toggle">
                        <span class="title">Tambah Vehicle</span>
                        @if(Request::is('tambah-vehicle'))
                        <span class="selected"></span>
                        @else
                        <span class="arrow"></span>
                        @endif
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item @if(Request::is('estimasi-biaya') || Request::is('buat-estimasi-biaya')) active open @endif">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-calculator"></i>
                <span class="title">Estimasi Biaya</span>
                @if(Request::is('estimasi-biaya') || Request::is('estimasi-biaya'))
                <span class="arrow open"></span>
                <span class="selected"></span>
                @else
                <span class="arrow"></span>
                @endif
            </a>
            <ul class="sub-menu">
               <li class="nav-item @if(Request::is('estimasi-biaya')) active open @endif">
                <a href="{{url('estimasi-biaya')}}" class="nav-link nav-toggle">
                    <i class=""></i>
                    <span class="title">Data Estimasi Biaya</span>
                    @if(Request::is('estimasi-biaya'))
                    <span class="selected"></span>
                    @endif
                </a>
            </li>

            <li class="nav-item @if(Request::is('buat-estimasi-biaya')) active open @endif">
                <a href="{{url('buat-estimasi-biaya')}}" class="nav-link nav-toggle">
                    <i class=""></i>
                    <span class="title">Buat Estimasi Biaya</span>
                    @if(Request::is('buat-estimasi-biaya'))
                    <span class="selected"></span>
                    @endif
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item @if(Request::is('jasa') || Request::is('sparepart') || Request::is('supplier')) active open @endif">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-list"></i>
            <span class="title">Referensi</span>
            @if(Request::is('jasa') || Request::is('sparepart') || Request::is('supplier')) 
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

            <li class="nav-item @if(Request::is('supplier')) active open @endif">
                <a href="{{url('supplier')}}" class="nav-link ">
                    <span class="title">Supplier</span>
                    @if(Request::is('supplier'))
                    <span class="selected"></span>
                    @else
                    <span class="arrow"></span>
                    @endif
                </a>
            </li>

        </ul>
    </li>

    <li class="nav-item @if(Request::is('purchase-order') || Request::is('buat-purchase-order')) active open @endif">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-credit-card"></i>
            <span class="title">Purchase Order</span>
            @if(Request::is('purchase-order') || Request::is('buat-purchase-order')) 
            <span class="arrow open"></span>
            <span class="selected"></span>
            @else
            <span class="arrow"></span>
            @endif
        </a>
        <ul class="sub-menu">

            <li class="nav-item @if(Request::is('purchase-order')) active open @endif">
                <a href="{{url('purchase-order')}}" class="nav-link nav-toggle">
                    <i class=""></i>
                    <span class="title">Data Purchase Order</span>
                    @if(Request::is('purchase-order'))
                    <span class="selected"></span>
                    @endif
                </a>
            </li>

            <li class="nav-item @if(Request::is('buat-purchase-order')) active open @endif">
                <a href="{{url('buat-purchase-order')}}" class="nav-link nav-toggle">
                    <i class=""></i>
                    <span class="title">Buat PO</span>
                    @if(Request::is('buat-purchase-order'))
                    <span class="selected"></span>
                    @endif
                </a>
            </li>

        </ul>
    </li>


    <li class="nav-item @if(Request::is('penjualan') || Request::is('penjualan/tambah-penjualan')) active open @endif">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-credit-card"></i>
            <span class="title">Penjualan Sparepart</span>
            @if(Request::is('penjualan') || Request::is('penjualan/tambah-penjualan')) 
            <span class="arrow open"></span>
            <span class="selected"></span>
            @else
            <span class="arrow"></span>
            @endif
        </a>
        <ul class="sub-menu">

            <li class="nav-item @if(Request::is('penjualan')) active open @endif">
                <a href="{{url('penjualan')}}" class="nav-link nav-toggle">
                    <i class=""></i>
                    <span class="title">Data Penjualan</span>
                    @if(Request::is('penjualan'))
                    <span class="selected"></span>
                    @endif
                </a>
            </li>

            <li class="nav-item @if(Request::is('penjualan/tambah-penjualan')) active open @endif">
                <a href="{{url('penjualan/tambah-penjualan')}}" class="nav-link nav-toggle">
                    <i class=""></i>
                    <span class="title">Tambah Penjualan</span>
                    @if(Request::is('penjualan/tambah-penjualan'))
                    <span class="selected"></span>
                    @endif
                </a>
            </li>

        </ul>
    </li>

    <li class="nav-item @if(Request::is('laporan')) active open @endif">
        <a href="{{url('laporan')}}" class="nav-link nav-toggle">
            <i class="fa fa-list-alt"></i>
            <span class="title">Laporan</span>
            @if(Request::is('laporan'))
            <span class="selected"></span>
            @endif
        </a>
    </li>
    <li class="nav-item @if(Request::is('user-management')) active open @endif">
        <a href="{{url('user-management')}}" class="nav-link nav-toggle">
            <i class="fa fa-cog"></i>
            <span class="title">User Management</span>
            @if(Request::is('user-management'))
            <span class="selected"></span>
            @endif
        </a>
    </li>
    <li class="nav-item">
        <a href="{{url('logout')}}" class="nav-link nav-toggle">
            <i class="icon-logout"></i>
            <span class="title">Logout</span>
        </a>
    </li>
</ul>
<!-- END SIDEBAR MENU -->
<!-- END SIDEBAR MENU -->
</div>