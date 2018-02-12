<div id="pencarian">
    {!! Form::open(['url' => 'resi/cari', 'method' => 'GET', 'id' => 'form_pencarian']) !!}
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

                <div class="col-md-3">
                    <div class="input-group">
                            {!! Form::label('nama','Nama',['class'=>'control-label']) !!}
                        {!! Form::text('nama', (!empty($nama)) ? $nama : null, ['class' =>'form-control', 'placeholder' => 'Masukan Nama ']) !!}
                    </div>
                </div>

                <div class="col-md-3">
                    {!! Form::label('ke','Cari:',['class'=>'control-label']) !!}
                    <span class="input-group-btn">
                                {!!Form::button('Cari', ['class'=> 'btn btn-primary btn-block', 'type' => 'submit']) !!}
                            </span>
                    </div>
                </div>
            </div>
            
    {!! Form::close()!!}
</div>