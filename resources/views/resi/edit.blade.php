@extends('template')

@section('main')
    <div id="resi">
        <h2>Edit Siswa</h2>
        {!! Form::model($resi, ['method' => 'PATCH', 'action' => ['ResiController@update', $resi->noresi]]) !!}
        @include('resi.form', ['submitButtonText' => 'Update Resi'])
        {!! Form::close() !!}
    </div>
@stop

@section('footer')
    @include('footer')
@stop