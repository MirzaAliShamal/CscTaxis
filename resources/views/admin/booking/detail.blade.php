@extends('layouts.admin')
@section('title', 'Bookings')
@section('nav-title', 'Bookings')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon"><i class="material-icons">toc</i></div>
                    <h5 class="card-title">Booking ID: {{ $booking->uuid }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <h5 class="font-weight-bold mb-0">From:</h5>
                            <p>{{ $booking->from }}</p>
                        </div>

                        <div class="col-md-6 mb-2">
                            <h5 class="font-weight-bold mb-0">To:</h5>
                            <p>{{ $booking->to }}</p>
                        </div>

                        @if (!is_null($booking->flight_no))
                            <div class="col-md-6 mb-2">
                                <h5 class="font-weight-bold mb-0">Flight Number    :</h5>
                                <p>{{ $booking->flight_no }}</p>
                            </div>
                        @endif

                        @if (!is_null($booking->arrival_from))
                            <div class="col-md-6 mb-2">
                                <h5 class="font-weight-bold mb-0">Arrival From    :</h5>
                                <p>{{ $booking->arrival_from }}</p>
                            </div>
                        @endif

                        @if (!is_null($booking->airline))
                            <div class="col-md-6 mb-2">
                                <h5 class="font-weight-bold mb-0">Airline    :</h5>
                                <p>{{ $booking->airline }}</p>
                            </div>
                        @endif

                        @if (!is_null($booking->meeting_point))
                            <div class="col-md-6 mb-2">
                                <h5 class="font-weight-bold mb-0">Booking Point    :</h5>
                                <p>{{ $booking->meeting_point }}</p>
                            </div>
                        @endif

                        @if (!is_null($booking->ship_name))
                            <div class="col-md-6 mb-2">
                                <h5 class="font-weight-bold mb-0">Ship Name    :</h5>
                                <p>{{ $booking->ship_name }}</p>
                            </div>
                        @endif

                        <div class="col-md-6 mb-2">
                            <h5 class="font-weight-bold mb-0">Direction:</h5>
                            <p>
                                @if ($booking->direction == "1")
                                    One Way
                                @else
                                    Two Way
                                @endif
                            </p>
                        </div>

                        <div class="col-md-6 mb-2">
                            <h5 class="font-weight-bold mb-0">Pickup Date Time:</h5>
                            <p>{{ $booking->pickup_datetime }}</p>
                        </div>

                        @if (!is_null($booking->return_datetime))
                            <div class="col-md-6 mb-2">
                                <h5 class="font-weight-bold mb-0">Return Date Time:</h5>
                                <p>{{ $booking->return_datetime }}</p>
                            </div>
                        @endif

                        <div class="col-md-6 mb-2">
                            <h5 class="font-weight-bold mb-0">Passengers:</h5>
                            <p>{{ $booking->passenger }}</p>
                        </div>
                        <div class="col-md-6 mb-2">
                            <h5 class="font-weight-bold mb-0">Large Cases:</h5>
                            <p>{{ $booking->large_cases }}</p>
                        </div>
                        <div class="col-md-6 mb-2">
                            <h5 class="font-weight-bold mb-0">Small Cases:</h5>
                            <p>{{ $booking->small_cases }}</p>
                        </div>

                        <div class="col-md-6 mb-2">
                            <h5 class="font-weight-bold mb-0">Payment Method:</h5>
                            <p>
                                @if ($booking->payment_method == "1")
                                    Cash in Car
                                @elseif ($booking->payment_method == "2")
                                    Card in Car
                                @else
                                    Paid via stripe <a href="{{ route('admin.transaction') }}/?booking_id={{ $booking->id }}">View Transaction</a>
                                @endif
                            </p>
                        </div>

                        <div class="col-md-6 mb-2">
                            <h5 class="font-weight-bold mb-0">Phone:</h5>
                            <p>{{ $booking->phone }}</p>
                        </div>
                        <div class="col-md-6 mb-2">
                            <h5 class="font-weight-bold mb-0">Name:</h5>
                            <p>{{ $booking->name }}</p>
                        </div>
                        <div class="col-md-6 mb-2">
                            <h5 class="font-weight-bold mb-0">Email:</h5>
                            <p>{{ $booking->email }}</p>
                        </div>

                        @if (!is_null($booking->instruction))
                            <div class="col-md-12 mb-2">
                                <h5 class="font-weight-bold mb-0">Instruction:</h5>
                                <p>{{ $booking->instruction }}</p>
                            </div>
                        @endif

                        <div class="col-md-6 mb-2">
                            <h5 class="font-weight-bold mb-0">Estimated Fare:</h5>
                            <h3 class="font-weight-bold m-0">£ {{ $booking->fare }}</h3>
                        </div>
                        <div class="col-md-6 mb-2">
                            <h5 class="font-weight-bold mb-0">Status:</h5>
                            <p>
                                @if ($booking->status == "0")
                                    <span class="badge badge-warning">Pending</span>
                                @elseif ($booking->status == "1")
                                    <span class="badge badge-success">Accepted</span>
                                @elseif ($booking->status == "2")
                                    <span class="badge badge-rose">Completed</span>
                                @else
                                    <span class="badge badge-danger">Cancelled</span>
                                @endif
                            </p>
                        </div>

                        <div class="col-12 text-center justify-content-center">
                            @if ($booking->status != "3")
                                @if ($booking->status == "1")
                                    <a href="{{ route('admin.booking.status.change', [$booking->id, 'complete']) }}" class="btn btn-success">Mark as Complete</a>
                                @else
                                    <a href="{{ route('admin.booking.status.change', [$booking->id, 'accept']) }}" class="btn btn-rose">Accept</a>
                                    <a href="{{ route('admin.booking.status.change', [$booking->id, 'decline']) }}" class="btn btn-danger">Decline</a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
