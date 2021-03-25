@extends('layouts.admin')
@section('title', 'Dashboard')
@section('nav-title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <a href="{{ route('admin.terminal.list') }}">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon"><i class="material-icons">category</i></div>
                        <p class="card-category">Terminals</p>
                        <h3 class="card-title">{{ $terminalCount }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats"><i class="material-icons">category</i> Total # of terminals</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <a href="{{ route('admin.booking.list', 'completed') }}">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon"><i class="material-icons">fact_check</i></div>
                        <p class="card-category">Completed Trips</p>
                        <h3 class="card-title">{{ $completedBooking }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats"><i class="material-icons">fact_check</i> Total # of completed trips</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <a href="{{ route('admin.booking.list', 'active') }}">
                <div class="card card-stats">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon"><i class="material-icons">done_outline</i></div>
                        <p class="card-category">Active Bookings</p>
                        <h3 class="card-title">{{ $activeBooking }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats"><i class="material-icons">done_outline</i> Total # of active bookings</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <a href="{{ route('admin.booking.list', 'cancelled') }}">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon"><i class="material-icons">hide_source</i></div>
                        <p class="card-category">Declined</p>
                        <h3 class="card-title">{{ $cancelledBooking }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats"><i class="material-icons">hide_source</i> Total # of cancelled bookings</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
