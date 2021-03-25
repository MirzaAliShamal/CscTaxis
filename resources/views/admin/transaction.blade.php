@extends('layouts.admin')
@section('title', 'Transactions')
@section('nav-title', 'Transactions')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">
                        @if (isset($req->booking_id))
                            Booking ID: {{ $booking->uuid }} Transaction
                        @else
                            Transactions List
                        @endif
                    </h5>
                </div>
                <div class="card-body">
                	<div class="material-datatables mt-3">
                        <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Stripe Charge ID</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($list as $item)
                                <tr>
                                	<td>{{ $item->id }}</td>
                                	<td>{{ $item->created_at->format('d/m/Y') }}</td>
                                	<td>{{ $item->stripe_charge_id }}</td>
                                	<td>£{{ $item->amount }}</td>
                                    <td class="text-center">
                                        @if ($item->status == "1")
                                            <span class="badge badge-success">Captured</span>
                                        @else
                                            <span class="badge badge-danger">Refunded</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
