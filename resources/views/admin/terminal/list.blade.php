@extends('layouts.admin')
@section('title', 'Terminals')
@section('nav-title', 'Terminals')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon"><i class="material-icons">list</i></div>
                    <h5 class="card-title">Terminals List</h5>
                </div>
                <div class="card-body">
                	<div class="row">
                        <div class="col-md-2 col-sm-3 col-12">
                            <form action="{{ route('admin.terminal.bulk.action') }}" class="bulk-action-form" method="GET">
                                <input type="hidden" name="action_id" id="action_id">
                                <select name="action" id="action" class="form-control">
                                    <option value="0" selected>Bulk Action</option>
                                    <option value="delete">Delete</option>
                                </select>
                            </form>
                        </div>
                        <div class="col-md-10 col-sm-9 col-12">
                            <div class="toolbar text-right">
			                	<a href="{{route('admin.terminal.add')}}" class="btn btn-rose">+ Add Terminal</a>
			                </div>
                        </div>
                	</div>
                	<div class="material-datatables mt-3">
                        <table class="datatables table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Place Name</th>
                                    <th>Address</th>
                                    <th>Type</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($list as $item)
                                <tr>
                                	<td>{{ $item->id }}</td>
                                	<td>{{ $item->created_at->format('d/m/Y') }}</td>
                                	<td>{{ $item->name }}</td>
                                	<td>{{ $item->address }}</td>
                                    <td class="text-center">
                                        @if ($item->type == 1)
                                            Airport Terminal
                                        @else
                                            Cruise Terminal
                                        @endif
                                    </td>
                                	<td class="td-actions text-right">
                                		<a href="{{ route('admin.terminal.edit', $item->id) }}" rel="tooltip" class="btn btn-success btn-round" data-original-title="Edit" title="Edit">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <button type="button" onclick="deleteAlert('{{ route('admin.terminal.delete', $item->id) }}')" rel="tooltip" class="btn btn-danger btn-round delete-btn" data-original-title="Delete" title="Delete">
                                            <i class="material-icons">delete_outline</i>
                                        </button>
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
