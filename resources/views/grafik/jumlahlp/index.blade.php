@extends('mainlayout')

@section('styles')
@endsection

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div>Rekap Jumlah LP</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-header">
                    <ul class="nav nav-justified">
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-0" class="nav-link show active">Rekap</a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-1" class="nav-link show">Grafik</a></li>
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-2" class="nav-link show">Peta</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="tab-eg7-0" role="tabpanel">
                            <table class="mb-0 table table-bordered" id="myTable" style="width:100%">
                                <thead class="btn-primary">
                                    <tr>
                                        <th width="5%">#</th>
                                        <th>Satuan</th>
                                        <th width="20%">Jumlah Laporan Polisi</th>
                                    </tr>
                                </thead>
                                <tbody id="listdata">
                                    <tr>
                                        <td colspan="3">
                                            <div class="alert alert-warning text-center">Data Kosong</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane show" id="tab-eg7-1" role="tabpanel">
                            <div id="area_grafik" style="height:600px;"></div>
                        </div>
                        <div class="tab-pane show" id="tab-eg7-2" role="tabpanel">
                            <div id="area_peta" style="height:600px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="/js/rekap/jumlahlp.js"></script>
<script>

</script>
@endsection