<!-- resources/views/payment.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Golara - Payment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/templatemo.css">
    <link rel="stylesheet" href="/css/custom.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/fontawesome.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        
        .payment-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: 40px auto;
            max-width: 800px;
        }

        .payment-summary {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .payment-method {
            border: 2px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .payment-method:hover {
            border-color:rgb(129, 255, 185);
        }

        .payment-method.selected {
            border-color:rgb(110, 253, 195);
            background-color: #f8fff9;
        }

        .payment-method img {
            height: 30px;
            margin-right: 10px;
        }

        .total-amount {
            font-size: 24px;
            font-weight: 600;
            color:rgb(1, 114, 26);
        }

        .btn-pay {
            background-color:rgb(14, 106, 68);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            font-weight: 500;
            width: 100%;
            margin-top: 20px;
            cursor: not-allowed;
        }

        .btn-pay.enabled {
            cursor: pointer;
        }

        .btn-pay:hover {
            background-color:rgb(8, 132, 51);
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

    <!-- Payment Section -->
    <div class="container">
        <div class="payment-container">
            <h1 class="text-center mb-4"><b>Payment Details</b></h1>
            
            <!-- Order Summary -->
            <div class="payment-summary">
                <h3 class="h5 mb-3">Order Summary</h3>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <p class="mb-1"><strong>Event:</strong> Persib VS Persija</p>
                        <p class="mb-1"><strong>Date:</strong> 20 November 2024</p>
                        <p class="mb-1"><strong>Tribune:</strong> {{ $tribun->nama_tribun }}</p>
                        <p class="mb-1"><strong>Quantity:</strong> {{ request('quantity') }} ticket(s)</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="mb-1">Price per ticket: Rp {{ number_format($tribun->harga, 0, ',', '.') }}</p>
                        <p class="mb-1"><b>Total Amount:</b></p>
                        <p class="total-amount">Rp {{ number_format($tribun->harga * request('quantity'), 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Payment Method Selection -->
            <form method="POST" action="{{ route('payment.process') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="tribun_id" value="{{ $tribun->id }}">
                <input type="hidden" name="quantity" value="{{ request('quantity') }}">
                <input type="hidden" name="name" value="{{ request('name') }}">
                <input type="hidden" name="email" value="{{ request('email') }}">
                <input type="hidden" name="phone" value="{{ request('phone') }}">

                <h3 class="h5 mb-3"><b>Select Payment Method</b></h3>

                <!-- Bank Transfer and E-Wallet Options -->
                <div class="mb-4">
                    <h4 class="h6 mb-3">Bank Transfer</h4>
                    <div class="payment-method">
                        <input type="radio" name="payment_method" value="bca" id="bca" required>
                        <label for="bca" class="ms-2">
                            <img src="/Asset/img/bca.png" alt="BCA" class="me-2">BCA Virtual Account  -  9892883774646 (PT. Golara)
                        </label>
                    </div>
                    <div class="payment-method">
                        <input type="radio" name="payment_method" value="mandiri" id="mandiri">
                        <label for="mandiri" class="ms-2">
                            <img src="/Asset/img/mandiri.webp" alt="Mandiri" class="me-2" style="height: 20px;">Mandiri Virtual Account -  9892883774987 (PT. Golara)
                        </label>
                    </div>
                    <div class="payment-method">
                        <input type="radio" name="payment_method" value="bni" id="bni">
                        <label for="bni" class="ms-2">
                            <img src="/Asset/img/bni.png" alt="BNI" class="me-2" style="height: 20px;">BNI Virtual Account -  9892883774994 (PT. Golara)
                        </label>
                    </div>
                </div>

                <div class="mb-4">
                    <h4 class="h6 mb-3">E-Wallet</h4>
                    <div class="payment-method">
                        <input type="radio" name="payment_method" value="gopay" id="gopay">
                        <label for="gopay" class="ms-2">
                            <img src="/Asset/img/gopay.png" alt="GoPay" class="me-2" style="height: 20px;">GoPay - 081234567890 (PT. Golara)
                        </label>
                    </div>
                    <div class="payment-method">
                        <input type="radio" name="payment_method" value="ovo" id="ovo">
                        <label for="ovo" class="ms-2">
                            <img src="/Asset/img/ovo.png" alt="OVO" class="me-2" style="height: 20px;">OVO - 081234567890 (PT. Golara)
                        </label>
                    </div>
                    <div class="payment-method">
                        <input type="radio" name="payment_method" value="dana" id="dana">
                        <label for="dana" class="ms-2">
                            <img src="/Asset/img/dana.png" alt="DANA" class="me-2" style="height: 20px;">DANA - 081234567890 (PT. Golara)
                        </label>
                    </div>
                </div>

                <div class="mb-4">
                    <h4 class="h6 mb-3">Upload Proof of Payment</h4>
                    <div class="payment-method">
                        <input type="file" name="payment_proof" id="payment_proof" accept="image/*" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-pay" id="pay_now_button" disabled>Pay Now</button>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/jquery-1.11.0.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/templatemo.js"></script>
    <script src="/js/custom.js"></script>
    <script>
        // Add selected class to payment method when selected
        document.querySelectorAll('.payment-method').forEach(method => {
            method.addEventListener('click', function() {
                this.querySelector('input[type="radio"]').checked = true;
                document.querySelectorAll('.payment-method').forEach(m => {
                    m.classList.remove('selected');
                });
                this.classList.add('selected');
            });
        });

        // Enable Pay Now button when file is uploaded
        document.getElementById('payment_proof').addEventListener('change', function() {
            const payNowButton = document.getElementById('pay_now_button');
            if (this.files.length > 0) {
                payNowButton.disabled = false;
                payNowButton.classList.add('enabled');
            } else {
                payNowButton.disabled = true;
                payNowButton.classList.remove('enabled');
            }
        });
    </script>
</body>
</html>