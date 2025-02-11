<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Pending - Golara</title>
    <link rel="icon" href="/Asset/img/golara.png" type="image/png">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <style>
        .pending-container {
            max-width: 600px;
            margin: 50px auto;
            text-align: center;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .pending-icon {
            font-size: 48px;
            color: #ffc107;
            margin-bottom: 20px;
        }
        .order-details {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="pending-container">
            <div class="pending-icon">⏳</div>
            <h2>Payment Pending</h2>
            <p class="text-muted">Your payment is being reviewed by our admin</p>
            
            <div class="order-details">
                <h5>Order Details</h5>
                <p><strong>Order ID:</strong> {{ $payment->id }}</p>
                <p><strong>Amount:</strong> Rp {{ number_format($payment->amount, 0, ',', '.') }}</p>
                <p><strong>Status:</strong> <span class="badge bg-warning">Pending</span></p>
            </div>

            <p>We'll notify you once your payment is confirmed.</p>
            <a href="{{ route('tickets.list') }}" class="btn btn-primary">View My Tickets</a>
        </div>
    </div>
</body>
</html>