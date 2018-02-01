@extends('template')

@section('main')
<div class="" id="resi">
    <h2>Data Resi {{$resi->noresi}} <span style="float:right;"><button class="btn btn-success hidden-print" onClick="window.print()">Print</button></span></h2>
    @if(!empty($resi))
    <table class="table table-striped">
        <tbody>
            <tr>
                <td>Tanggal</td>
                <td>: {{$resi->tanggal_resi}}</td>
            </tr>
            <tr>
                <td>Nama Toko</td>
                <td>: {{$resi->toko->nama_toko}}</td>
            </tr>
            <tr>
                <td>Nama Konsumen</td>
                <td>: {{$resi->nama_konsumen}}</td>
            </tr>
            <tr>
                <td>No Hp Konsumen</td>
                <td>: {{$resi->hp_konsumen}}</td>
            </tr>
            <tr>
                <td>Provinsi</td>
                <td>: {{$resi->provinsi}}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{$resi->alamat}}</td>
            </tr>
            <tr>
                <td>Ekpedisi</td>
                <td>: {{$resi->ekpedisi}}</td>
            </tr>
            <tr>
                <td>Ongkir</td>
                <td>: {{$resi->ongkir}}</td>
            </tr>
        </tbody>
    @else
    <p>Tidak Ada Data</p>
    @endif
    </table>
</div>
@stop

