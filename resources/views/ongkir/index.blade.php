@extends('template')

@section('main')
    <div id="ongkir">
        <h2>Ongkir</h2>
        @include('ongkir.form_pencarian_ongkir')
        @if(!empty($ongkir_list))
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Toko</th>
                        <th>Ekpedisi</th>
                        <th>Ongkir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ongkir_list as $ongkir)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$ongkir->toko->nama_toko}}</td>
                        <td>{{$ongkir->ekpedisi}}</td>
                        <td>{{$ongkir->ongkir}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Tidak Ada Data</p>
        @endif

        <div class="table-nav">
                <div class="jumlah-data">
                    <strong>Jumlah ongkir: {{$jumlah_ongkir}}</strong> |
                    <strong>Total ongkir: {{$total_ongkir}}</strong> |
                </div>
                <div class="paging">
                    {{$ongkir_list->links()}}
                </div>
            </div>
        
                <div class="tombol-nav">
                    <div>
                        <a href="resi/create" class="btn btn-primary"> Tambah Resi</a>
                    </div>
                </div>
        
            </div>
    </div>
@stop

@section('footer')
    @include('footer')
@stop