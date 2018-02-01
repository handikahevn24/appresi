@extends('template')

@section('main')
    <div id=resi>
        <h2>Tambah Resi</h2>

        {!! Form::open(['url' => 'resi'])!!}
        @include('resi.form', ['submitButtonText' => 'Tambah Resi'])
        {!! Form::close()!!}
    </div>
@stop

@section('footer')
    @include('footer')
@stop