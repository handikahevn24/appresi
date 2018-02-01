@if (Session::has('flash_message'))
    <div class="alert alert-success {{Session::has('penting') ? 'alert-imporant' : '' }}">
        <buton type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</buton>
        {{Session::get('flash_message')}}
    </div>
@endif