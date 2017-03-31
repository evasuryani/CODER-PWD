@extends('layouts.app')

@section('content')
<link href="{{ asset('assets') }}/css/welcome.css" rel="stylesheet">
<body class="">
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
        <img src="{{url('/img/page1.jpg')}}">
      </div>
      <div class="item">
        <img src="{{url('/img/page2.jpg')}}">
      </div>
      <div class="item">
        <img src="{{url('/img/page3.jpg')}}">
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

  <div class="bg" style="background-image:url('img/page44.jpg')">
    <div class="container-fluid">
      <div class="row">
        <div class="h3">
          <div><h3 class="text-center"><strong>CODER (Competition Holder)</strong></h3></div>
          <p class="text-center">
          adalah Web yang bertujuan sebagai perantara news terbaru kompetisi di berbagai bidang<br> yang juga diharapkan bisa membantu para pelajar atau khalayak umum yang kesulitan mencari berbagai berita lomba atau kompetisi terbaru.
          </p>
        </div>
      </div>
    </div>
  </div>


  <div class="c" style="background-image:url('img/page47.jpg') ; " id="b">
    <br><br>
    <div class="container"><br><br>
      <h1 class="text-center">Info Lomba</h1>
      <div class="row">
      @foreach ($data['data'] as $row)
        <div class="col-md-4">
          <div class="thumbnail">
            <img src="{{ asset('upload/'.@$row->poster) }}" alt="" class="img-responsive" height="300" width="400">
            <div class="caption">
              <h3>{{ @$row->nama_lomba }} <small>{{ @$row->bidang_lomba->nama_bidang}}</small><!--harusnya ngambil nama bidang, bukan id--></h3>
              <p>
              Tanggal Perlombaan : {{ @$row->tgl_perlombaan}}
              <br>
              Deskripsi : {{ @$row->deskripsi}}
              <br>
              Link : {{ @$row->link}}
              </p>
            </div>
          </div>
        </div>
       @endforeach

      </div>
    </div>
    <br><br><br><br><br>
  </div>



  <!-- <div class="c" style="background-image:url('img/page45.jpg');">
    <div class="container-fluid text-center">
      <h3><strong>Disini kalian dapat menemukan berbagai macam perlombaan </strong></h3>
      <div class="row">
        <div class="col-md-3">
          <h3><span class="glyphicon glyphicon-heart"></span> Design</h3>
        </div>
        <div class="col-md-3">
          <h3><span class="glyphicon glyphicon-briefcase"></span> Enterprise</h3>
        </div>
        <div class="col-md-3">
          <h3><span class="glyphicon glyphicon-phone"></span> App</h3>
        </div>
        <div class="col-md-3">
          <h3><span class="fa fa-line-chart"></span> Growth</h3>
        </div>
      </div>
    </div>
  </div>



<footer class="text-center" >
  <a class="up-arrow" href="#a" class="tooltip" title="scrollTOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
    </a>
</footer>
<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[class="tooltip"]').tooltip();

  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#a']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({ scrollTop: $(hash).offset().top }, 900, function(){ window.location.hash = hash;  });
        // Add hash (#) to URL when done scrolling (default click behavior)
    } // End if
  });
}) -->
</script>
</body>
@include('layouts.footer')
@endsection
