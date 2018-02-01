<div class="form-group">
    {!! Form::label('tanggal_resi','Tanggal Resi:',['class'=>'control-label']) !!}
    {!! Form::date('tanggal_resi',null,['class' =>'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::label('noresi','No Resi:',['class'=>'control-label']) !!}
    {!! Form::text('noresi',null,['class' =>'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::label('id_toko', 'Nama: Toko: ', ['class' => 'control-label']) !!}
    @if(count($list_toko) > 0 )
    {!! Form::select('id_toko', $list_toko, null, ['class' => "form-control", 'id' => 'id_toko', 'placeholder' => 'Pilih Toko']) !!}
    @else
    <p>Tidak ada pilihan TOKO</p>
    @endif
</div>

<div class="form-group">
    {!! Form::label('nama_konsumen','Nama Konsumen:',['class'=>'control-label']) !!}
    {!! Form::text('nama_konsumen',null,['class' =>'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::label('hp_konsumen','No HP Konsumen:',['class'=>'control-label']) !!}
    {!! Form::text('hp_konsumen',null,['class' =>'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::label('provinsi','Provinsi :',['class'=>'control-label']) !!}
    {!! Form::text('provinsi',null,['class' =>'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::label('alamat','Alamat :',['class'=>'control-label']) !!}
    {!! Form::text('alamat',null,['class' =>'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::label('ekpedisi','Ekpedisi :',['class'=>'control-label']) !!}
    {!! Form::text('ekpedisi',null,['class' =>'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::label('ongkir','Ongkir :',['class'=>'control-label']) !!}
    {!! Form::text('ongkir',null,['class' =>'form-control'])!!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-primary form-control']) !!}
</div>