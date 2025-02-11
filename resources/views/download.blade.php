<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>E-Ticket Golara</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .ticket-container {
            border: 2px solid #000;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header img {
            max-width: 150px;
        }
        .ticket-info {
            margin-bottom: 30px;
        }
        .ticket-details {
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding: 20px 0;
            margin: 20px 0;
        }
        .qr-code {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        <div class="header">
            <img src="{{ public_path('Asset/img/golara.png') }}" alt="Golara Logo">
            <h1>E-TICKET</h1>
        </div>

        <div class="ticket-info">
            <h2>Persib VS Persija</h2>
            <p><strong>Ticket ID:</strong> #{{ $payment->id }}</p>
            <p><strong>Purchase Date:</strong> {{ $date }}</p>
        </div>

        <div class="ticket-details">
            <p><strong>Tribune:</strong> {{ $tribun->nama_tribun }}</p>
            <p><strong>Quantity:</strong> {{ $payment->quantity }} ticket(s)</p>
            <p><strong>Amount Paid:</strong> Rp {{ number_format($payment->amount, 0, ',', '.') }}</p>
            <p><strong>Ticket Holder:</strong> {{ $user->name }}</p>
        </div>

        <div class="qr-code">
            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate($qrcode)) !!} ">
            <p>Scan QR Code for ticket verification</p>
        </div>
    </div>
</body>
</html>