@extends('layouts.app')

@section('content')

<body class="" class="soura">
         <!-- carousel -->
  <div class="carousel slide" id="m" data-ride="carousel">
    <!-- indicator -->
    <ol class="carousel-indicators">
      <li class="active" data-target="#m" data-slide-to="0"></li>
      <li class="" data-target="#m" data-slide-to="1"></li>
      <li class="" data-target="#m" data-slide-to="2"></li>
    </ol>
     <!-- inner -->
    <div class="carousel-inner" roie="button">
      <div class="item active">
        <img src="{{url('/img/kk.jpg.jpg')}}">
      </div>
      <div class="item">
        <img src="{{url('/img/c.jpg')}}">
      </div>
      <div class="item">
        <img src="{{url('/img/m.jpg')}}">
      </div>
    </div>
    <!-- left and right control -->
    <a class="left carousel-control" href="#m" data-slide="prev" role="button">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">previous</span>
    </a>
    <a class="right carousel-control" href="#m" data-slide="next" role="button">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">next</span>
    </a>
  </div>


  <!-- service-->
  <div  id="service" class="bg-1">
    <div class=" container" style="color:white;height:80%;width: 80%; font-family: 'century gothic';font-size: 15px;"><br><br>
      <h1 class="text-center">LombaKu</h1>
      <h2 class="text-center"><small>Disini Terdapat Perlombaan yang anda adakan.</small></h2><br><br>
      <div class="row">
       @foreach ($data as $row)
        <div class="col-md-4">
          <div class="thumbnail">
            <img src="{{ asset('upload/'.@$row->poster) }}" alt="" class="img-responsive" height="300" width="500">
            <div class="caption">
              <h3>{{ $row->nama_lomba }} <small>{{ @$row->bidang_lomba->nama_bidang}}</small><!--harusnya ngambil nama bidang, bukan id--></h3>
              <p>
                Tanggal Perlombaan : {{ $row->tgl_perlombaan}}
                <br>
                Deskripsi : {{ $row->deskripsi}}
                <br>
                Link : {{ $row->link}}
              </p>
              <p>
                <a href="{{ route('perlombaan.edit', $row->id_lomba) }}" class="btn btn-warning">
                  <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <form action="{{ route('perlombaan.destroy', @$row->id_lomba) }}" method="POST">
                  {{ method_field('DELETE') }}
                  {{ csrf_field() }}

                <button type="submit" class="btn btn-delete btn-danger">
                    <i class="glyphicon glyphicon-trash"></i>
                </button>
                </form>
              </p>
            </div>
          </div>
        </div>
       @endforeach
      </div>
    </div>
  </div>
</body>
@include('layouts.footer')
@endsection
