<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">

    <!-- my style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- logo title -->
    <link rel="icon" href="{{ asset('Asset/img/golara') }}" type="image/x-icon">

    <title>Tiket Sepak Bola</title>
    <link rel="icon" href="/Asset/img/golara.png" type="image/png">

    <style>
      /* Menambahkan background pada body */
      body {
        background-image: url('Asset/img/gbla.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
      }

      /* Jika hanya ingin di bagian hero */
      #hero {
        background-image: url('Assets/img/gbla.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        color: white; /* Menambahkan warna teks untuk kontras */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8); /* Tambahkan bayangan untuk teks */
      }
    </style>
  </head>

  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent position-fixed w-100">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="/Assets/img/Minimal Company Logo Instagram Post.png" alt="" width="30" class="d-inline-block align-text-top me-3">
            golara</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto mx-2">
            </ul>

            <div>
              @auth
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
              @else
              <a href="{{ route('register') }}" class="btn btn-dark">Register</a>
                <a href="{{ route('login') }}" class="btn btn-dark">Masuk</a>
              @endauth
            </div>
          </div>
        </div>
    </nav>

    <!--hero section  -->
    <section id="hero" class="vh-100 d-flex align-items-center justify-content-center">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-md-6 hero-tagline my-auto">
                    <h1>Selamat Datang Di Golara!</h1>
                    <p><span class="fw-bold">Wujudkan impian Anda</span> untuk hadir di acara yang sudah lama Anda tunggu! Segera pesan tiketnya!</p>
                    <a href="{{ route('index') }}" class="button-lg-primary btn btn-primary">Beli Tiket</a>
                  </div>
                  <div class="col-md-6 my-auto">
                    <img src="{{ asset('Asset/img/stadium.png') }}" alt="Your Image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
