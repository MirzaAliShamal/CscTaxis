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
                        <h5 class="card-title">Banner Area</h5>
                    </div>
                    <div class="card-body ">
                    	<div class="row">
                    		<div class="col-12">
                    			<div class="form-group">
                    				<label for="banner_heading">Banner Heading</label>
                    				<input type="text" class="form-control" name="banner_heading" id="banner_heading" value="{{ setting('banner_heading') ?? '' }}" autocomplete="off">
                    			</div>
                    		</div>
                            <div class="col-12">
                    			<div class="form-group">
                    				<label for="banner_text">Banner Text</label>
                    				<input type="text" class="form-control" name="banner_text" id="banner_text" value="{{ setting('banner_text') ?? '' }}" autocomplete="off">
                    			</div>
                    		</div>
                    	</div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-rose">submit</button>
                    </div>
                </div>
            </form>

            <form action="{{ route('admin.setting.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <h5 class="card-title">How It Works area</h5>
                    </div>
                    <div class="card-body ">
                    	<div class="row">
                    		<div class="col-md-3">
                    			<div class="form-group">
                    				<label for="how_work_heading_1">Heading 1</label>
                    				<input type="text" class="form-control" name="how_work_heading_1" id="how_work_heading_1" value="{{ setting('how_work_heading_1') ?? '' }}" autocomplete="off">
                    			</div>
                                <div class="form-group">
                    				<label for="how_work_text_1">Text 1</label>
                    				<input type="text" class="form-control" name="how_work_text_1" id="how_work_text_1" value="{{ setting('how_work_text_1') ?? '' }}" autocomplete="off">
                    			</div>
                    		</div>
                            <div class="col-md-3">
                    			<div class="form-group">
                    				<label for="how_work_heading_2">Heading 2</label>
                    				<input type="text" class="form-control" name="how_work_heading_2" id="how_work_heading_2" value="{{ setting('how_work_heading_2') ?? '' }}" autocomplete="off">
                    			</div>
                                <div class="form-group">
                    				<label for="how_work_text_2">Text 2</label>
                    				<input type="text" class="form-control" name="how_work_text_2" id="how_work_text_2" value="{{ setting('how_work_text_2') ?? '' }}" autocomplete="off">
                    			</div>
                    		</div>
                            <div class="col-md-3">
                    			<div class="form-group">
                    				<label for="how_work_heading_3">Heading 3</label>
                    				<input type="text" class="form-control" name="how_work_heading_3" id="how_work_heading_3" value="{{ setting('how_work_heading_3') ?? '' }}" autocomplete="off">
                    			</div>
                                <div class="form-group">
                    				<label for="how_work_text_3">Text 3</label>
                    				<input type="text" class="form-control" name="how_work_text_3" id="how_work_text_3" value="{{ setting('how_work_text_3') ?? '' }}" autocomplete="off">
                    			</div>
                    		</div>
                            <div class="col-md-3">
                    			<div class="form-group">
                    				<label for="how_work_heading_4">Heading 4</label>
                    				<input type="text" class="form-control" name="how_work_heading_4" id="how_work_heading_4" value="{{ setting('how_work_heading_4') ?? '' }}" autocomplete="off">
                    			</div>
                                <div class="form-group">
                    				<label for="how_work_text_4">Text 4</label>
                    				<input type="text" class="form-control" name="how_work_text_4" id="how_work_text_4" value="{{ setting('how_work_text_4') ?? '' }}" autocomplete="off">
                    			</div>
                    		</div>
                    	</div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-rose">submit</button>
                    </div>
                </div>
            </form>

            <form action="{{ route('admin.setting.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="card-header card-header-rose card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">add</i>
                        </div>
                        <h5 class="card-title">About Us</h5>
                    </div>
                    <div class="card-body ">
                    	<div class="row">
                    		<div class="col-md-12">
                    			<div class="form-group">
                    				<label for="aboutus_content">Content</label>
                                    <textarea name="aboutus_content" id="aboutus_content" class="aboutus_content" rows="10">{{ setting('aboutus_content') ?? '' }}</textarea>
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
@section('js')
    <script>
        CKEDITOR.replace( 'aboutus_content' );
    </script>
@endsection
