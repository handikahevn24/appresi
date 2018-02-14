@extends('template')
@section('main')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Import / Export Excel</h4>
                </div>
                <div class="panel-body">
                    @include ('resi.form_pencarian_export')
                    <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{url('importresi')}}">
                        {{ csrf_field() }} 
                        <div class="form-group">
                            <label for="file" class="col-md-1 control-label">File Excel</label> 
                            <div class="col-md-3">
                                <input id="file" type="file" class="form-control" name="file">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="{{route('exportview')}}" role="button" class="btn btn-warning">Export Pertoko</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection