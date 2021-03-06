<!DOCTYPE html>
<html lang="en">
<head>
  <title>UILancer - Pekerjaan {{ $hasil->judul_pekerjaan }}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body id="home" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    <a href="./"><img src="{{ asset('logo2.png') }}" alt="Logo" width="150px" height="50px" class="navbar-brand"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
      <!---->

                <li data-toggle="modal" data-target="#myModal"><a href="#">
            @if(\Auth::check())
            Welcome, {{\Auth::user()->name}}
            @else
            Login
            @endif
            </a></li>
      </ul>
    </div>
  </div>
</nav>

  <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
           @if(\Auth::check())
               <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Logout</h4>
        </div>
        <div class="modal-body">
          <a href="{{url('logout')}}" class="btn btn-danger">Logout</a>
        </div>
      </div>
            @else
               <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
       <div class="modal-body">
            <p>masuk sebagai</p><br><br><br><br>
          <a href="{{url('sso-login')}}" class="btn btn-warning mt-20 font2">Mahasiswa UI</a>
            &nbsp<span>atau</span> &nbsp
          <a href="{{url('login')}}" class="btn btn-primary mt-20 font2">Akun Official</a><br>
        </div>
      </div>
            @endif
      <!-- Modal content-->


    </div>
</div>

<!-- DETAIL PEKERJAAN -->

    <div class="container-fluid col-md-8 col-md-offset-2 col-xs-4 col-xs-offset-2 col-lg-8 col-lg-offset-2 text-center bg-white">
        <br/>
        <h1><p id="judul_pekerjaan">{{ $hasil->judul_pekerjaan }}</p></h1>
        <span>Oleh : <a data-toggle="modal" data-target="#myModal" href="#">{{ $jobGiver->name }}</a></span>
        @if($jobGiver->name == "Admin")
          <span>| Atas permintaan : {{ $userluar->where('pekerjaan_id',$hasil->id)->first()["name"] }} ({{ $userluar->where('pekerjaan_id',$hasil->id)->first()["asal_instansi"] }})</span>
        @endif
            <span>| Dibuat tanggal: {{ $hasil->created_at }}</span>
            <span>| Jumlah Pelamar: {{ $jumlah_pelamar }}</span>
            <span>| Status:
            @if($hasil->isTaken)
              Sudah Diambil
            @else
              Lowong
            @endif</span></p>
        <hr/>
        <div id="deskripsi" class="container-fluid text-left bg-grey">
            <h1>Deskripsi:</h1>
            <p>
            {!! $hasil->deskripsi_pekerjaan !!}<br/>

             <span>Skill yang dibutuhkan:</span>
             @if(count($hasill))
              @foreach($hasill as $skill)
                <span class="mb-5 mr-5 label label-default label-flat">{{ $skill->skill }}</span>
              @endforeach
            @endif
            <br/>

             <span>Durasi:</span>
            <span>{{ $hasil->durasi }} Minggu</span><br/>

             <span>Estimasi honor:</span>
            <span>Rp {{$hasil->budget}}</span><br/><br/>

            <span><b>Deadline:</b></span>
            <span>{{$hasil->endDate}}</span><br/>
        </p>
        <p><br/>
            <a class="btn btn-block btn-success mt-20 font2 text-center" data-toggle="modal" data-target="#myModal" href="#">APPLY</a>
        </p>

        @if (count($errors))

        <div class="well well-sm" id="error">
          <ul>

          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach

          </ul>
        </div>

        @endif
    </div>
</div>

<!-- Footer -->
<footer class="text-center">
  <p>Copyright &copy; 2016. UILancer</p>
</footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#home']").on('click', function(event) {

    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 900, function(){

      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
    });
  });

  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>