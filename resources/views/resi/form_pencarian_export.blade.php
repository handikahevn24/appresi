<div id="pencarian">
    {!! Form::open(['url' => 'exportresi', 'method' => 'GET', 'id' => 'form_pencarian_export']) !!}
        <div class="row">
            <div class="input-group">
                <div class="col-md-6">
                    {!! Form::label('tanggal','Pilih Tanggal:',['class'=>'control-label']) !!}
                    {!! Form::date('tanggal',null,['class' =>'form-control'])!!}
                </div>
                <div class="col-md-4">
                    {!! Form::label('ke','Export',['class'=>'control-label']) !!}
                    <span class="input-group-btn">
                                {!!Form::button('Export', ['class'=> 'btn btn-primary btn-block', 'type' => 'submit']) !!}
                            </span>
                    </div>
                </div>
            </div>
            
    {!! Form::close()!!}
</div>