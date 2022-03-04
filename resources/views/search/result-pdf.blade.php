<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/theme/css/bootstrap-4-min.css" crossorigin="anonymous">
    <title>Data STNK</title>
</head>
<style>
    @page {
        margin: 0cm 0cm;
    }

    body {
        margin-top: 1cm;
        margin-left: 1cm;
        margin-right: 1cm;
        margin-bottom: 1cm;
    }
</style>

<body>
    <table style="width: 100%;"> 
        <tr>
            <td colspan="2">
                <table style="width: 100%;">
                    <tr>
                        <td>
                            <img style="width: 90px;height: 100px;" src="assets/images/logo polda jabar.png"
                                alt="Logo Polrestabes Bandung">
                        </td>
                        <td>
                            <div style="text-align: center;">
                                <h5>Data Surat Tanda Nomor Kendaraan</h5>
                            </div>
                        </td>
                        <td>
                            <div style="text-align: center;">
                                Tanggal Eksport : <?=date('d/m/Y')?>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table class="table table-bordered" border="1" style="width: 100%;font-size: 12px;">
                    <tbody>
                        <tr>
                            <td style="width: 148px;">Nomor LP</td>
                            <td>{{$data->nomor}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal LP</td>
                            <td>{{$data->tanggal}}</td>
                        </tr>
                        <tr>
                            <td style="width: 148px;">Nama Pemilik</td>
                            <td>{{$data->nama}}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>{{$data->alamat}}</td>
                        </tr>
                        <tr>
                            <td>Merk</td>
                            <td>{{$data->merk}}</td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td>{{$data->type}}</td>
                        </tr>
                        <tr>
                            <td>Jenis</td>
                            <td>{{$data->jenis}}</td>
                        </tr>
                        <tr>
                            <td>Model</td>
                            <td>{{$data->model}}</td>
                        </tr>
                        <tr>
                            <td>Tahun Pembuatan</td>
                            <td>{{$data->tahun_pembuatan}}</td>
                        </tr>
                        <tr>
                            <td>Tahun Registrasi</td>
                            <td>{{$data->tahun_registrasi}}</td>
                        </tr>
                        <tr>
                            <td>Isi Silinder</td>
                            <td><span class="badge bg-danger">{{$data->isi_silinder}}</span></td>
                        </tr>
                        <tr>
                            <td>Nomor BPKB</td>
                            <td>{{$data->nomor_bpkb}}</td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td style="vertical-align: top;">
                <table class="table table-bordered" border="1" style="width: 100%;font-size: 12px;">
                    <tr>
                        <td colspan="2" style="text-align: center;font-size: 30px;font-weight: bold;">
                            {{$data->nomor_registrasi}}</td>
                    </tr>
                    <tr>
                        <td style="width: 126px;">Nomor Rangka</td>
                        <td>{{$data->nomor_rangka}}</td>
                    </tr>
                    <tr>
                        <td>Nomor Mesin</td>
                        <td>{{$data->nomor_mesin}}</td>
                    </tr>
                    <tr>
                        <td>Warna</td>
                        <td>{{$data->warna}}</td>
                    </tr>
                    <tr>
                        <td>Warna TNKB</td>
                        <td>{{$data->warna_tnkb}}</td>
                    </tr>
                    <tr>
                        <td>Bahan Bakar</td>
                        <td>{{$data->bahan_bakar}}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>