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
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="main-card mb-3 card">
                <div class="card-body" style="min-height: 377px;">
                    <div style="text-align: right;">
                        <button onclick="window.location = '/laporanpolisi/form'" class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm">Tambah Data Laporan Polisi</button>
                    </div>
                    <h5 class="card-title">5 Laporan Polisi Terakhir</h5>
                    <table class="mb-0 table table-striped" id="myTable" style="width:100%">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="10%">Opsi</th>
                                <th>Nomor Laporan Polisi</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="list-lp">
                            <td colspan="5">
                                <div class="alert alert-warning text-center">Data Kosong</div>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
@section('scripts')
<script type="text/javascript" src="/js/dashboards/user.js"></script>
@endsection
