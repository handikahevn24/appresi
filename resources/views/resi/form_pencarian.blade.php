<div id="pencarian">
    {!! Form::open(['url' => 'resi/cari', 'method' => 'GET', 'id' => 'form_pencarian']) !!}
        <div class="row">
            <div class="input-group">
                <div class="col-md-4">
                    {!! Form::label('dari','Tanggal Awal:',['class'=>'control-label']) !!}
                    {!! Form::date('dari',null,['class' =>'form-control'])!!}
                </div>

                <div class="col-md-4">
                    {!! Form::label('ke','Tanggal akhir:',['class'=>'control-label']) !!}
                    {!! Form::date('ke',null,['class' =>'form-control'])!!}
                </div>

                <div class="col-md-4">
                    {!! Form::label('ke','Cari:',['class'=>'control-label']) !!}
                    <span class="input-group-btn">
                                {!!Form::button('Cari', ['class'=> 'btn btn-primary btn-block', 'type' => 'submit']) !!}
                            </span>
                    </div>
                </div>
            </div>
            
    {!! Form::close()!!}
</div>