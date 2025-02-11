<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket kamu - Golara</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style2.css">
</head>
<body>
    <!-- Top Nav -->
    @include('partials.navbar')

    <div class="container py-5">
        <h2 class="mb-4 text-center">Tiket kamu</h2>

        @if(session('warning'))
            <div class="alert alert-warning">{{ session('warning') }}</div>
        @endif

        <div class="row">
            @if($tickets->count() > 0)
                @foreach($tickets as $ticket)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="/Asset/img/persib2.jpg" class="img-fluid mb-3" alt="Ticket Image">
                                <h5 class="card-title mb-7">Persib VS Persija</h5>
                                <div class="ticket-info">
                                    <p><strong>Tribun:</strong> {{ $ticket->tribun->nama_tribun }}</p>
                                    <p><strong>Tanggal:</strong> 20 November 2024</p>
                                    <p><strong>Jam:</strong> 19:00 WIB</p>
                                    <p><strong>Status:</strong> 
                                        @if($ticket->status == 'paid')
                                            <span class="badge bg-success">Paid</span>
                                        @else
                                            <span class="badge bg-warning">Pending Payment</span>
                                        @endif
                                    </p>
                                </div>
                                
                                <div class="mt-3">
                                    @if($ticket->status == 'paid')
                                        <a href="{{ route('payment.success', $ticket->id) }}" 
                                           class="btn btn-primary">Lihat tiket kamu</a>
                                    @else
                                        <a href="{{ route('payment.form', $ticket->tribun_id) }}" 
                                           class="btn btn-warning">Complete Payment</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="alert alert-info">
                        No tickets found.
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/jquery-1.11.0.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/templatemo.js"></script>
    <script src="/js/custom.js"></script>
</body>
</html>