@extends('layouts.admin')
@section('title', 'FAQs')
@section('nav-title', 'FAQs')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.faq.save', $faq->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <h5 class="card-title">Add Faq</h5>
                    </div>
                    <div class="card-body ">
                    	<div class="row">
                            <div class="col-12">
                    			<div class="form-group">
                    				<label for="name">Question</label>
                    				<input type="text" name="question" id="question" class="form-control @error('question') is-invalid @enderror" value="{{ old('question', $faq->question) }}" autocomplete="off">
                    				@error('question')
                    					<span class="invalid-feedback">
                    						<strong>{{ $message }}</strong>
                    					</span>
                    				@enderror
                    			</div>
                    		</div>
                    		<div class="col-12">
                    			<div class="form-group">
                    				<label for="answer">Address</label>
                    				<textarea name="answer" id="answer" class="answer" rows="10">{{ $faq->answer }}</textarea>
                    				@error('address')
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
        CKEDITOR.replace( 'answer' );
    </script>
@endsection
