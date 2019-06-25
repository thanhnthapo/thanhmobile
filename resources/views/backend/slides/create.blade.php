@extends('layouts.backend')

@section('content')
<div class="row">
	<div class="col-lg-6" style="margin: 0px 100px">
		<h2>Thêm Mới Sản Phẩm</h2>

		<form role="form" method="POST" action="{{ route('slide.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label>Link Banner</label>
				<input class="form-control" name="link" value="{{ old('link') }}">
			</div>

			<div class="form-group">
				<label for="">Banner</label>
				<input type="file" name="img" id="img"><br>
				<p style="color: red">{{ $errors->first('img')}}</p>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Thêm</button>
			</div>
		</form>
	</div>
</div>
@endsection