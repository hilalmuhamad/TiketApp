<!DOCTYPE html>
<html lang="en">

<head>
    <title>Golara</title>
    <link rel="icon" href="/Asset/img/golara.png" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrapproperty.min.css">
    <link rel="stylesheet" href="/css/templatemo.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/animate.css">

    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- link bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Load fonts style after rendering the layout styles -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/fontawesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

</head>

<style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="{{ url('/index') }}">
                <img src="/Asset/img/golara.png" alt="Golara" style="height: 40px;">
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                        <a class="nav-link" href="{{ url('/index') }}">Home</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">About</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" href="{{ url('/ticket') }}">Tiket</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                        </li>
                    </ul>
                </div>
                <!-- Example single danger button -->
                <div class="btn-group">
                    <a href="{{ route('tickets.list') }}" class="btn btn-warning btn-sm">
                        My Tickets
                    </a>
                    <button type="button" class="btn btn-sm btn-warning dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('ticket') }}">View Tickets</a></li>
                    </ul>
                </div>

            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Start Banner Hero -->
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="Asset/img/persib1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block text-white">
                <h2><b>Golara - Gol Nusantara, Pengalaman Nonton Bola Terbaik!</b></h2>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
            </div>
            <div class="carousel-item active">
            <img src="Asset/img/persib2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2><b>Amankan tiketmu sekarang juga!</b></h2>
                <p>Tiket pertandingan bola kini lebih mudah didapatkan dengan platform kami. Nikmati pengalaman menonton pertandingan sepak bola favorit Anda dengan kenyamanan dan kemudahan dalam membeli tiket secara online.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="Asset/img/persib3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2><b>Persib menang euy</b></h2>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->

    <!-- Category Start -->
    <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3"><b>Pertandingan mendatang</b></h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="Asset/img/persibpersija.jpg" alt="Icon">
                                </div>
                                <h6 class="font-weight-bold">Persib vs Persija</h6>
                                <span class="d-block">Stadion Gelora Bandung Lautan Api</span>
                                <span class="d-block">16 Februari 2025, 19:00 WIB</span>
                            </div>
                            <div class="mt-3">
                                <a href="{{ url('/ticket') }}" class="btn btn-dark">Beli Tiket</a>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="Asset/img/persibmalut.jpg" alt="Icon">
                                </div>
                                <h6 class="font-weight-bold">Persib vs Malut</h6>
                                <span class="d-block">Stadion Gelora Bandung Lautan Api</span>
                                <span class="d-block">16 Februari 2025, 19:00 WIB</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="Asset/img/persib2.jpg" alt="Icon">
                                </div>
                                <h6>Home</h6>
                                <span>123 Properties</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="Asset/img/persib2.jpg" alt="Icon">
                                </div>
                                <h6>Office</h6>
                                <span>123 Properties</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="Asset/img/persib2.jpg" alt="Icon">
                                </div>
                                <h6>Building</h6>
                                <span>123 Properties</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="Asset/img/persib2.jpg" alt="Icon">
                                </div>
                                <h6>Townhouse</h6>
                                <span>123 Properties</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="Asset/img/persib2.jpg" alt="Icon">
                                </div>
                                <h6>Shop</h6>
                                <span>123 Properties</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="Asset/img/persib2.jpg" alt="Icon">
                                </div>
                                <h6>Garage</h6>
                                <span>123 Properties</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End -->

        <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pertandingan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #222;
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        nav {
            margin-bottom: 20px;
        }

        nav a {
            margin: 0 10px;
            text-decoration: none;
            color: #222;
            font-weight: bold;
        }

        nav a:hover {
            color: #1e3a8a;
        }

        .match-container {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .team {
            width: 150px;
        }

        .team img {
            width: 80px;
            height: auto;
        }

        .team-name {
            font-weight: bold;
            font-size: 1.2em;
        }

        .status {
            color: #999;
            font-size: 0.9em;
        }

        .score {
            font-size: 3em;
            font-weight: bold;
            margin: 0 20px;
        }

        .vs {
            background-color: #d1e9ff;
            padding: 5px 10px;
            border-radius: 50%;
            font-weight: bold;
        }

        .match-info {
            margin: 10px 0;
            color: #555;
            font-size: 0.9em;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: white;
            border: 2px solid #1e3a8a;
            color: #1e3a8a;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .button:hover {
            background-color: #1e3a8a;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Hasil Pertandingan</h1>
    <nav>
        <a href="#">First Team</a>
        <a href="#">Legend</a>
        <a href="#">Putri</a>
        <a href="#">U16</a>
        <a href="#">U18</a>
        <a href="#">U20</a>
    </nav>

    <div class="match-container">
        <div class="team">
            <div class="team-name">PSIS SEMARANG</div>
            <div class="status" style="color: #9ca3af;">LOSS</div>
            <img src="asset/img/psis.png" alt="PSIS Logo">
        </div>

        <div class="score">0</div>
        <div class="vs">VS</div>
        <div class="score">1</div>

        <div class="team">
            <img src="asset/img/logo_persib.png" alt="Persib Logo">
            <div class="team-name">PERSIB BANDUNG</div>
            <div class="status" style="color: #f97316;">WIN</div>
        </div>
    </div>

    <div class="match-info">
        <div>📍 JATIDIRI</div>
        <div>📅 09 Februari 2025 - 19:00 WIB</div>
    </div>

    <a href="#" class="button">LIHAT SEMUA HASIL →</a>
</body>
</html>
  

    <div class="container my-5">
        <div class="row">
            <div class="col-12 text-center">
                <img src="/Asset/img/persib4.jpg" alt="Champion" class="img-fluid">
            </div>
        </div>
    </div>
    <!-- End Champion Image Section -->

    <div class="card-group">
        <div class="card">
            <img src="/Asset/img/champion.png" class="card-img-top" alt="Fans Zone">
            <div class="card-body">
                <h5 class="card-title">Fans Zone</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card">
            <img src="/Asset/img/welcome.png" class="card-img-top" alt="Card 2">
            <div class="card-body">
                <h5 class="card-title">Mateo kocijan</h5>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <div class="card">
            <img src="/Asset/img/klok.jpg" class="card-img-top" alt="Card 3">
            <div class="card-body">
                <h5 class="card-title">Marcklok</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>

    <!-- Start Footer -->
    <footer class="bg-dark">
        <h2 class="h2 text-success text-center border-bottom pb-3 border-light logo">persibday</h2>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>
