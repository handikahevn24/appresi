<html>
    <body>
        <table>
            <tr>
                <td>{{$tanggal_sekarang}}</td>
            </tr>

            <tr>
                @foreach($data_toko as $toko)
                <td>{{ $toko->nama_toko }}</td>
                @endforeach
                <td>Jumlah</td>
            </tr>
            <tr>
                @foreach($data_ongkir_toko as $data)
                    <td>{{$data->ongkir}}</td>
                @endforeach
                @if($hitung !== 0)
                    @for($i = 0 ; $i < $hitung ; $i++)
                    <td>0</td>
                    @endfor
                @endif
                <td>{{$jumlah}}</td>
            </tr>
        </table>
    </body>
</html>