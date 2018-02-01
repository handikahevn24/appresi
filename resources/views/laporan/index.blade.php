@extends('template')

@section('main')

<div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4>Laporan Ongkir Hari ini</h4>
                        </div>
                        <div class="panel-body">
                                <p>Ekpedisi</p>
                                <p>JNE  : Rp. </p>
                                <p>JNT  : Rp. </p>
                                <p>TIKI : Rp. </p>
                                <p>POS  : Rp. </p>
                                <p>Jumlah Ongkir : <strong> Rp. {{ $jumlah_ongkir_hari_ini}}</strong></p>
                        </div>
                </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>Laporan Ongkir Minggu ini {{$week}}</h4>
                        </div>
                        <div class="panel-body">
                                <p>Ekpedisi</p>
                                <p>JNE  : Rp. </p>
                                <p>JNT  : Rp. </p>
                                <p>TIKI : Rp. </p>
                                <p>POS  : Rp. </p>
                                <p>Jumlah Ongkir : <strong>Rp. {{ $jumlah_ongkir_minggu_ini}} </strong></p>
                        </div>
                </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Laporan Ongkir Bulan Ini</h4>
                        </div>
                        <div class="panel-body">
                                <p>Ekpedisi</p>
                                <p>JNE  : Rp. </p>
                                <p>JNT  : Rp. </p>
                                <p>TIKI : Rp. </p>
                                <p>POS  : Rp. </p>
                                <p>Jumlah Ongkir : <strong> Rp. {{ $jumlah_ongkir_bulan_ini}} </strong></p>
                        </div>
                </div>
        </div>
</div>
<div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h4>Laporan Ongkir Global</h4>
                        </div>
                        <div class="panel-body">
                            <p>Ekpedisi</p>
                            <p>JNE  : Rp {{$total_ongkir_jne}}</p>
                            <p>JNT  : Rp {{$total_ongkir_jnt}} </p>
                            <p>TIKI : Rp {{$total_ongkir_tiki}}</p>
                            <p>POS  : Rp {{$total_ongkir_pos}}</p>
                            <p>Jumlah Ongkir : <strong> Rp. {{$total_ongkir}} </strong></p>
                            <div id="poll_div"></div>
                            <?=$lava->render("BarChart","Ekpedisi","poll_div");?>
                        </div>
                </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h4>Laporan Ongkir Custom Tanggal <span>// MASIH BELUM SELESAI //</span></h4>
                        </div>
                        <div class="panel-body">
                        @include('laporan.form_pencarian') 
                            <p>Ekpedisi</p>
                            <p>JNE  : Rp </p>
                            <p>JNT  : Rp  </p>
                            <p>TIKI : Rp </p>
                            <p>POS  : Rp </p>
                            <p>Jumlah Ongkir : Rp. </p>
                        </div>
                </div>
        </div>
</div>
@endsection