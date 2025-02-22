<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .ticket {
            border: 2px solid #000;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #000;
            padding-bottom: 20px;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 15px;
        }
        .match-info {
            text-align: center;
            margin: 20px 0;
        }
        .teams {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin: 20px 0;
        }
        .team {
            text-align: center;
            width: 40%;
        }
        .vs {
            font-size: 24px;
            font-weight: bold;
            color: #666;
        }
        .details {
            margin: 30px 0;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 8px;
        }
        .details p {
            margin: 10px 0;
            font-size: 14px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="header">
            <img src="{{ public_path('Asset/img/logo.png') }}" alt="Logo" class="logo">
            <h1>GOLARA E-TICKET</h1>
        </div>
        
        <div class="match-info">
            <div class="teams">
                <div class="team">
                    <h2>Persib</h2>
                    <img src="{{ public_path('Asset/img/logo_persib.png') }}" alt="Home Team" width="100">
                </div>
                <div class="vs">VS</div>
                <div class="team">
                    <h2>Persija</h2>
                    <img src="{{ public_path('Asset/img/persija_jakarta_logo.png') }}" alt="Away Team" width="100">
                </div>
            </div>
        </div>

        <div class="details">
            <p><strong>Lokasi:</strong> GBLA</p>
            <p><strong>Tanggal:</strong> 16 FEBRUARI 2025</p>
            <p><strong>Waktu:</strong> {{ $time }}</p>
            <p><strong>Tribun:</strong> {{ $tribune ?? 'VIP' }}</p>
            <p><strong>Nomor Kursi:</strong> {{ $seat_number ?? 'A-123' }}</p>
            <p><strong>Harga Tiket:</strong> Rp {{ number_format($price ?? 150000, 0, ',', '.') }}</p>
        </div>

        <div class="footer">
            <p>Tiket ini adalah bukti sah untuk memasuki stadion</p>
            <p>Mohon simpan tiket ini dengan baik</p>
            <div class="qr-code">
                @if(isset($ticket_number))
                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate($ticket_number)) !!} ">
                    <p>{{ $ticket_number }}</p>
                @endif
                <p>Scan untuk validasi tiket</p>
            </div>
        </div>
    </div>
</body>
</html>
