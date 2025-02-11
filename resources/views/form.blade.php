@extends('layouts.app')

@section('content')
<div class="container shadow">
    <div class="row justify-content-center">
        <div class="col-md-10 y-4">
            <div class="card">
                <div class="card-header">Purchase Ticket</div>

                <div class="card-body">
                    <form method="GET" action="{{ route('payment.form', $tribun->id) }}">
                        @csrf
                        <input type="hidden" name="tribun_id" value="{{ $tribun->id }}">

                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Number of Tickets</label>
                            <select class="form-control" id="quantity" name="quantity" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Continue to Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection