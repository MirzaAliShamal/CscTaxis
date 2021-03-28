@extends('layouts.admin')
@section('title', 'CMS')
@section('nav-title', 'CMS')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.setting.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">settings</i>
                        </div>
                        <h5 class="card-title">Settings</h5>
                    </div>
                    <div class="card-body ">
                    	<div class="row">
                    		<div class="col-md-4">
                    			<div class="form-group">
                    				<label for="fare_rate">Fare Rate</label>
                                    <input type="text" class="form-control" name="fare_rate" id="fare_rate" value="{{ setting('fare_rate') }}" autocomplete="off">
                    			</div>
                    		</div>
                            <div class="col-md-4">
                    			<div class="form-group">
                    				<label for="base_fare">Base Fare</label>
                                    <input type="text" class="form-control" name="base_fare" id="base_fare" value="{{ setting('base_fare') }}" autocomplete="off">
                    			</div>
                    		</div>
                            <div class="col-md-4">
                    			<div class="form-group">
                    				<label for="miles_limit">Miles Limit</label>
                                    <input type="text" class="form-control" name="miles_limit" id="miles_limit" value="{{ setting('miles_limit') }}" autocomplete="off">
                    			</div>
                    		</div>
                    	</div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-rose">submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
