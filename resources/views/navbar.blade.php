<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1" 
            aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}"> APP RESI</a>
        </div>
        <div class="collapse navbar-collapse"
        id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            @if (!empty($halaman) && $halaman == 'resi')
            <li class="active"><a href="{{ url('resi') }}">Resi
            <span class="sr-only">(current)</span></a></li>
            @else
            <li><a href="{{ url('resi') }}">Resi</a></li>
            @endif

            @if (!empty($halaman) && $halaman == 'ongkir')
            <li class="active"><a href="{{ url('ongkir') }}">Ongkir
            <span class="sr-only">(current)</span></a></li>
            @else
            <li><a href="{{ url('ongkir') }}">Ongkir</a></li>
            @endif

            @if (!empty($halaman) && $halaman == 'laporan')
            <li class="active"><a href="{{ url('laporan') }}">Laporan
            <span class="sr-only">(current)</span></a></li>
            @else
            <li><a href="{{ url('laporan') }}">Laporan</a></li>
            @endif

            @if (!empty($halaman) && $halaman == 'importexport')
            <li class="active"><a href="{{ url('importexport') }}">Import / Export
            <span class="sr-only">(current)</span></a></li>
            @else
            <li><a href="{{ url('importexport') }}">Import / Export</a></li>
            @endif

        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())
            <li><a href="{{url('logout')}}">{{Auth::user()->name}}</a></li>
            @else
                <li><a href="{{url('login')}}">Login</a></li>
            @endif
        </ul>
        </div> <!-- /.navbar-collapse -->
    </div> <!-- /.container-fluid -->
</nav>