<html>
    <body>
        <table>

            <tr>
                <td>Tanggal</td>
                @foreach($data_toko as $toko)
                <td>{{ $toko->nama_toko }}</td>
                @endforeach
                <td>Jumlah</td>
            </tr>
            @foreach($data_ongkir_toko as $tanggal)
            <tr>
                <td>{{$tanggal->tanggal_resi}}</td>
                @foreach($data_ongkir_toko as $data)
                <td>{{$data->ongkir}}</td>
                @endforeach
                <td>{{$data->sum('ongkir')}}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>