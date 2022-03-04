<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SiHiltem</title>
    <link href="/assets/theme/css/main.css" rel="stylesheet">
    <link href="/css/costumestyle.css" rel="stylesheet">   
    @yield('styles')
</head>
</head>

<body>
    <div class="preloader-wrapper">
        <div class="preloader">
            <img src="/assets/images/loading.gif" alt="Loading">
        </div>
    </div>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <a href="{{url('/')}}">
                    <div class="logo-src"></div>
                </a>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button"
                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-left"></div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="{{asset('assets/images/1.jpg')}}" alt="User Image">
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        {{ Auth::user()->name }}
                                    </div>
                                    <div class="widget-subheading">
                                        {{ Auth::user()->email }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui-theme-settings">
            <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
                <i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
            </button>
        </div>
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li>
                                <a href="{{url('/')}}">
                                    <i class="metismenu-icon pe-7s-home"></i>
                                    Beranda
                                </a>    
                            </li>
                            @if(Auth::user()->role_id == 2 || Auth::user()->role_id == 3 || Auth::user()->role_id == 4)
                            <li class="app-sidebar__heading">Administartif</li>
                            @if(Auth::user()->role_id != 4)
                            <li>
                                <a href="{{url('/laporanpolisi/')}}">
                                    <i class="metismenu-icon pe-7s-notebook"></i>
                                    Laporan Polisi
                                </a>    
                            </li>
                            <li>
                                <a href="{{url('/check/')}}">
                                    <i class="metismenu-icon pe-7s-notebook"></i>
                                    Status Barang Bukti
                                </a>    
                            </li>
                            @endif
                            <li>
                                <a href="{{url('/search/')}}">
                                    <i class="metismenu-icon pe-7s-search"></i>
                                    Pencarian Data Barang Bukti
                                </a>    
                            </li>
                            @endif
                            @if(Auth::user()->role_id == 1)
                            <li class="app-sidebar__heading">Master & Pengaturan</li>
                            <li>
                                <a href="{{url('/pengguna/')}}">
                                    <i class="metismenu-icon pe-7s-users"></i>
                                    Pengguna
                                </a>    
                            </li>
                            @endif
                            <li class="app-sidebar__heading">Grafik & Report</li>
                            @if(Auth::user()->role_id == 4)
                            <li>
                                <a href="{{url('/grafik/petasebaran/')}}">
                                    <i class="metismenu-icon pe-7s-map-2"></i>
                                    Peta Sebaran
                                </a>    
                            </li>
                            @endif
                            <li>
                                <a href="{{url('/grafik/jumlahlp/')}}">
                                    <i class="metismenu-icon pe-7s-graph2"></i>
                                    Jumlah LP
                                </a>    
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="metismenu-icon pe-7s-left-arrow"></i>
                                    Log Out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>    
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                @yield('content')
                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-right">
                            <strong>Copyright © 2020 <a href="https://dashboardpack.com/theme-details/architectui-html-dashboard-free/?v=b718adec73e0">ArchitectUI</a>.</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="/assets/theme/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/assets/theme/js/main.js"></script>
<script type="text/javascript" src="/js/costumescript.js"></script>
<script type="text/javascript" src="/js/global.js"></script>
<script>
    var BASE_URL = "{{url('/')}}";
    $(function() {
        $("body").addClass("preloader-site");
    })
    
    $(window).on('load',function () {
        $('.preloader-wrapper').fadeOut();
        $('body').removeClass('preloader-site');
    });

</script>
@yield('scripts')
</html>