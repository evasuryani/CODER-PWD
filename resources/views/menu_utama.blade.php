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
    <div class=" container" style="color:white;height:80%;width: 80%; "><br><br>
      <h2><strong>Service </strong></h2>
      <p class="text-center">Disini Terdapat Perlombaan yang anda adakan.</p><br><br>
      <div class="row">
       @foreach ($data as $row)
        <div class="col-md-4">
          <div class="thumbnail">
            <img src="{{url('/img/d.jpg')}}" alt="" class="img-rounded" height="300" width="400">
            <p class="text-center"><strong>{{ $row->nama_lomba }}</strong></p>
            <p>Bidang : {{ $row->id_bidang}}</p>
            <p>Tanggal Perlombaan : {{ $row->tgl_perlombaan}}</p>
            <p>Deskripsi : {{ $row->deskripsi}}</p>
            <p>Link : {{ $row->link}}


          </div>
        </div>
       @endforeach
      </div>
    </div>
  </div>
</body>
@endsection
