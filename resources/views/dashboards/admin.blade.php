@extends('mainlayout') 
@section('styles') 
@endsection 
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div>
                    <div class="page-title-subheading">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-midnight-bloom">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">LP Hari Ini</div>
                        <div class="widget-subheading">&nbsp;</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <span id="lphariini">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-arielle-smile">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">LP Bulan Ini</div>
                        <div class="widget-subheading">
                            &nbsp;
                        </div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <span id="lpbulanini">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total LP</div>
                        <div class="widget-subheading">&nbsp;</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <span id="totallp">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-6">
            <div class="card mb-3 widget-content">
                <div class="widget-content-wrapper">
                    <div id="grafik-pie" style="width: 100%; max-height: 500px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6">
            <div class="card mb-3 widget-content">
                <div class="widget-content-wrapper">
                    <div id="grafik-line" style="width: 100%;max-height: 500px"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
@section('scripts') 
<script type="text/javascript" src="/js/dashboards/admin.js"></script>
@endsection
