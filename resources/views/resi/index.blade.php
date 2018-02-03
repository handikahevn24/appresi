@extends('template')

@section('main')
<div id="resi">
    <h2>Resi</h2>
    @include('_partial.flash_message')
    @include ('resi.form_pencarian')
    @if (!empty($resi_list))
        <table class="table">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>No Resi</th>
                    <th>Nama Toko</th>
                    <th>Nama Konsumen</th>
                    <th>No Hp Konsumen</th>
                    <th>Provinsi</th>
                    <th>Alamat</th>
                    <th>Ekpedisi</th>
                    <th>Ongkir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($resi_list as $resi)
                    <tr>
                        <td>{{ $resi->tanggal_resi }}</td>
                        <td>{{ $resi->noresi }}</td>
                        <td>{{ $resi->toko->nama_toko }}</td>
                        <td>{{ $resi->nama_konsumen }}</td>
                        <td>{{ $resi->hp_konsumen}}</td>
                        <td>{{ $resi->provinsi }}</td>
                        <td>{{ $resi->alamat }}</td>
                        <td>{{ $resi->ekpedisi}}</td>
                        <td>Rp. {{ number_format($resi->ongkir, 2) }}</td>
                        <td>
                            <div class="box-button">{{ link_to('resi/' . $resi->noresi, 'Detail', ['class' => 'btn btn-success btn-sm']) }} </div>
                            <div class="box-button">{{ link_to('resi/' . $resi->noresi . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm'])}} </div>
                            <div class="box-button">{!! Form::open(['method' => 'DELETE', 'action' => ['ResiController@destroy', $resi->noresi]]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    @else
        <p>Tidak Ada Data Resi.</p>
    @endif
    
    <div class="table-nav">
        <div class="jumlah-data">
            <strong>Jumlah Resi Per Halaman: 
                    @if(!empty($jumlah_resi)) 
                    
                    {{$jumlah_resi}}
                    
                    @endif
            </strong>
        </div>
        <div class="paging">
            {{$resi_list->links()}}
        </div>
    </div>

        <div class="tombol-nav">
            <div>
                <a href="resi/create" class="btn btn-primary"> Tambah Resi</a>
            </div>
        </div>

    </div>
@stop

@section('footer')
    <div id="footer">
    <p>&copy; 2017 Laravel Handika</p>
    </div>
@stop