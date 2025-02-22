<!-- resources/views/form.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Payment Success - Golara</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Keep all your existing CSS links -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/templatemo.css">
    <link rel="stylesheet" href="/css/custom.css">  
    
    <!-- Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/fontawesome.min.css">

    <!-- Additional Custom Styles -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        
        .form-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: 40px auto;
            max-width: 800px;
        }

        .match-info {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .form-title {
            color: #212529;
            font-weight: 600;
            margin-bottom: 25px;
            font-size: 24px;
        }

        .form-label {
            font-weight: 500;
            color: #212529;
        }

        .form-control {
            padding: 12px;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .btn-submit {
            background-color: #28a745;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            font-weight: 500;
            width: 100%;
            margin-top: 20px;
        }

        .btn-submit:hover {
            background-color: #218838;
        }

        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand text-success logo h1 align-self-center" href="{{ url('/index') }}">
                <img src="/Asset/img/golara.png" alt="Golara" style="height: 40px;">
            </a>
        </div>
    </nav>
    
    <!-- Purchase Form -->
    @csrf

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
    </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center mb-4">
                                        <img src="/Asset/img/ceklis.png" alt="Checkmark" class="img-fluid" style="width: 100px;">
                                    </div>
                                    <h2 class="text-success mb-4">Payment Successful!</h2>
                                    <p class="mb-4">Your ticket purchase has been confirmed.</p>
                                    <div class="payment-details mb-4">
                                        <p><strong>Event:</strong> Persib VS Persija</p>
                                        <p><strong>Tribune:</strong> {{ $tribun->nama_tribun }}</p>
                                        <p><strong>Quantity:</strong> {{ $payment->quantity }} ticket(s)</p>
                                        <p><strong>Total Amount:</strong> Rp {{ number_format($tribun->harga * $payment->quantity, 0, ',', '.') }}</p>
                                        
                                        <!-- Add Download Button -->
                                        <div class="mt-4">
                                        <a href="{{ route('download.pdf') }}" class="button">Download E-Ticket PDF</a>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    <!-- Form Section -->
    <div class="container">
        <div class="form-container">
            <h2 class="form-title text-center">Ticket Purchase Form</h2>
            
            <!-- Match Information -->
            <div class="match-info">
                <h3 class="h5 mb-10">Match Details</h3>
                <p class="mb-1"><strong>Event:</strong> Persib VS Persija</p>
                <p class="mb-1"><strong>Date:</strong> 20 November 2024, 19:00 WIB</p>
                <p class="mb-1"><strong>Venue:</strong> Stadion Gelora Bandung Lautan Api</p>
                <p class="mb-0"><strong>Tribune:</strong> {{ $tribun->nama_tribun }}</p>

                <a href="{{ route('index') }}" class="btn btn-primary">Back to Home</a>
        </div>
                
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/jquery-1.11.0.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/templatemo.js"></script>
    <script src="/js/custom.js"></script>
</body>

</html>