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
                            <i class="material-icons">add</i>
                        </div>
                        <h5 class="card-title">Airport Transport Page Content</h5>
                    </div>
                    <div class="card-body ">
                    	<div class="row">
                    		<div class="col-12">
                    			<div class="form-group">
                    				<label for="airport_transport">Content</label>
                    				<textarea name="airport_transport" id="airport_transport" class="airport_transport" rows="10">{{ setting('airport_transport') ?? '' }}</textarea>
                    				@error('private_tours')
                    					<span class="invalid-feedback">
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
    <script>
        CKEDITOR.replace( 'airport_transport' );
    </script>
@endsection
