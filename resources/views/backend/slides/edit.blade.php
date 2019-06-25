@extends('layouts.backend')

@section('content')
<div class="row">
	<div class="col-lg-6" style="margin: 0px 100px">
		<h2>Banner</h2>

		<form role="form" method="POST" action="{{ route('slide.update',['id' => $slide->id]) }}" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="_method" value="PUT">
			<div class="form-group">
				<label>Link</label>
				<input class="form-control" name="link" value="{{ $slide->link }}">
				<p style="color: red">{{ $errors->first('link')}}</p>
			</div>
			<div class="form-group">
				<label for="">Banner</label>
				<input type="file" name="img" id="img"><br>
				<p style="color: red">{{ $errors->first('img')}}</p>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Lưu Lại</button>
			</div>
		</form>
	</div>
</div>
@endsection