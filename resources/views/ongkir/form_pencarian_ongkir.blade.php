<div id="pencarian">
    {!! Form::open(['url' => 'ongkir/cari', 'method' => 'GET', 'id' => 'form_pencarian']) !!}
        <div class="row">
            <div class="input-group">
                <div class="col-md-3">
                    {!! Form::label('dari','Tanggal Awal:',['class'=>'control-label']) !!}
                    {!! Form::date('dari',null,['class' =>'form-control'])!!}
                </div>

                <div class="col-md-3">
                    {!! Form::label('ke','Tanggal akhir:',['class'=>'control-label']) !!}
                    {!! Form::date('ke',null,['class' =>'form-control'])!!}
                </div>
                <div class="col-md-2">
                        {!! Form::label('ekpedisi','Ekpedisi:',['class'=>'control-label']) !!}
                        {!! Form::select('ekpedisi',['JNE' => 'JNE','JNT' => 'JNT', 'POS' =>'POS', 'TIKI'=>'TIKI'], (!empty($ekpedisi) ? $ekpedisi : null),
                        ['id'=>'ekpedisi', 'class'=>'form-control','placeholder'=>'-Ekpedisi-'])!!}
                </div>
                <div class="col-md-2">
                        {!! Form::label('id_toko','Toko:',['class'=>'control-label']) !!}
                    {!! Form::select('id_toko',$list_toko, (!empty($id_toko) ? $id_toko : null),
                        ['id'=>'id_toko', 'class'=>'form-control','placeholder'=>'-Toko-'])!!}
                </div>
                <div class="col-md-2">
                        {!! Form::label('ke','Cari:',['class'=>'control-label']) !!}
                        <span class="input-group-btn">
                            {!!Form::button('Cari', ['class'=> 'btn btn-primary btn-block', 'type' => 'submit']) !!}
                        </span>
                </div>
            </div>
        </div>
            
    {!! Form::close()!!}
</div>