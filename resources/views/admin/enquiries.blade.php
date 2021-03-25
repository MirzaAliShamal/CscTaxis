@extends('layouts.admin')
@section('title', 'Contact Enquries')
@section('nav-title', 'Contact Enquries')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                </div>
                <div class="card-body">
                	<div class="material-datatables mt-3">
                        <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($enq as $item)
                                <tr>
                                	<td>{{ $item->id }}</td>
                                	<td>{{ $item->created_at->format('d/m/Y') }}</td>
                                	<td>{{ $item->name }}</td>
                                	<td>{{ $item->email }}</td>
                                	<td>{{ $item->message }}</td>
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
