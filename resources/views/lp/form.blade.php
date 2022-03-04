@extends('mainlayout')

@section('styles')
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div>Laporan Polisi</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <div class="btn-actions-pane-right"></div>
                </div>
                <div class="card-body">
                    <div id="smartwizard">
                        <ul>
                            <li><a href="#step-1">Langkah 1<br /><small>Data Laporan Polisi</small></a></li>
                            <li><a href="#step-2">Langkah 2<br /><small>Pelapor</small></a></li>
                            <li><a href="#step-3">Langkah 3<br /><small>Barang Bukti</small></a></li>
                        </ul>

                        <div>
                            <div id="step-1" class="">
                                @yield('datalp',View::make('lp._datalp'))
                            </div>
                            <div id="step-2" class="">
                                @yield('pelapor',View::make('lp._pelapor'))
                            </div>
                            <div id="step-3" class="">
                                @yield('barangbukti',View::make('lp._barangbukti'))
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    var GLOBAL_ID = "{{$idurl ?? ''}}";
</script>  
<script type="text/javascript" src="/js/lp/form.js"></script>
<script type="text/javascript" src="/js/lp/peta.js"></script>
@endsection