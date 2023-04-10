<!-- ========== Left Sidebar Start ========== -->
<style>
span{
    color: black;
}
#sidebar-menu{
    background: silver;
}
.simplebar-content-wrapper{
    background: silver!important;
}
</style>
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu" style="background:silver">
                @if(auth()->user()->can('dashboard') || auth()->user()->can('master-data') || auth()->user()->can('history-log-list'))
                <li class="menu-title" key="t-menu">Menu</li>
                @endif

                @if(auth()->user()->can('dashboard'))
                <li>
                    <a href="{{ route('merek-list') }}" class="waves-effect">
                        <i class="fas fa-fw fa-columns"></i>
                        <span key="t-dashboards">Data Merek</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->can('dashboard'))
                <li>
                    <a href="{{ route('mobil-list') }}" class="waves-effect">
                        <i class="fas fa-fw fa-columns"></i>
                        <span key="t-dashboards">Data Mobil</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->can('dashboard'))
                <li>
                    <a href="{{ route('jenis-pembayaran-list') }}" class="waves-effect">
                        <i class="fas fa-fw fa-dollar-sign"></i>
                        <span key="t-dashboards">Data Jenis Pembayaran</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->can('dashboard'))
                <li>
                    <a href="{{ route('booking-list') }}" class="waves-effect">
                        <i class="fas fa-fw fa-receipt"></i>
                        <span key="t-dashboards">Data Booking</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->can('dashboard'))
                <li>
                    <a href="{{ route('pemesan-list') }}" class="waves-effect">
                        <i class="fas fa-fw fa-user"></i>
                        <span key="t-dashboards">Data Pemesan</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->can('dashboard'))
                <li>
                    <a href="{{ route('pesanan-list') }}" class="waves-effect">
                        <i class="fas fa-fw fa-receipt"></i>
                        <span key="t-dashboards">Data Pesanan</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->can('dashboard'))
                <li>
                    <a href="{{ route('perjalanan-list') }}" class="waves-effect">
                        <i class="fas fa-fw fa-street-view"></i>
                        <span key="t-dashboards">Data Perjalanan</span>
                    </a>
                </li>
                @endif

                @if(auth()->user()->can('master-data'))
                <li>
                    <a href="{{ route('master-data.index') }}">
                        <i class="mdi mdi-folder-outline"></i>
                        <span data-key="t-dashboard">Master Data</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
