@extends('layouts.admin')
@section('title', 'Bookings')
@section('nav-title', 'Bookings')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="page-categories">
                <ul class="nav nav-pills nav-pills-rose nav-pills-icons justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.booking.list') }}">
                            <i class="material-icons">border_all</i> All
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.booking.list', 'pending') }}">
                            <i class="material-icons">pending</i> Pending
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.booking.list', 'active') }}">
                            <i class="material-icons">toc</i> Active
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.booking.list', 'completed') }}">
                            <i class="material-icons">done_outline</i> Completed
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.booking.list', 'cancelled') }}">
                            <i class="material-icons">hide_source</i> Cancelled
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">Bookings List</h5>
                </div>
                <div class="card-body">
                	<div class="material-datatables mt-3">
                        <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Fare</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($list as $item)
                                <tr>
                                	<td>{{ $item->id }}</td>
                                	<td>{{ $item->created_at->format('d/m/Y') }}</td>
                                	<td>{{ $item->from }}</td>
                                	<td>{{ $item->to }}</td>
                                    <td>£{{ $item->fare }}</td>
                                    <td class="text-center">
                                        @if ($item->status == "0")
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($item->status == "1")
                                            <span class="badge badge-success">Accepted</span>
                                        @elseif($item->status == "2")
                                            <span class="badge badge-rose">Completed</span>
                                        @else
                                            <span class="badge badge-danger">Cancelled</span>
                                        @endif
                                    </td>
                                	<td class="td-actions text-right">
                                		<a href="{{ route('admin.booking.detail', $item->id) }}" rel="tooltip" class="btn btn-rose btn-round" data-original-title="View Details" title="View Details">
                                            <i class="material-icons">remove_red_eye</i>
                                        </a>
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
