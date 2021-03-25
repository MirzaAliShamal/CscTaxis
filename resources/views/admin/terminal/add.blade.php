@extends('layouts.admin')
@section('title', 'Terminals')
@section('nav-title', 'Terminals')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.terminal.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <h5 class="card-title">Add Terminal</h5>
                    </div>
                    <div class="card-body ">
                    	<div class="row">
                            <div class="col-12">
                    			<div class="form-group">
                    				<label for="name">Place Name</label>
                    				<input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="off">
                    				@error('name')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                    			</div>
                    		</div>
                    		<div class="col-12">
                    			<div class="form-group">
                    				<label for="address">Address</label>
                    				<input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" autocomplete="off">
                    				@error('address')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                                    <input type="hidden" name="lat" id="lat" value="{{ old('lat') }}">
                                    <input type="hidden" name="long" id="lang" value="{{ old('long') }}">
                    			</div>
                    		</div>
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="type" value="1"> Airport Terminal
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="type" value="2"> Cruise Terminal
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    @error('type')
                    					<span class="error">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                                </div>
                            </div>
                    	</div>
                    </div>
                    <div class="card-footer mt-4">
                        <button type="submit" class="btn btn-rose">submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA6GhjR-WmiKCgr71McBioeymDd6_Ti_0s&sensor=false&libraries=places"></script>
    <script>
        var address = document.getElementById('address');
        var autocomplete = new google.maps.places.Autocomplete(address,{componentRestrictions:{country:["uk"]}});

        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            console.log(latitude);
            document.getElementById("lat").value = latitude;
            document.getElementById("lang").value = longitude;
        });
    </script>
@endsection
