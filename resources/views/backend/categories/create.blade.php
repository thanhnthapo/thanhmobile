@extends('layouts.backend')

@section('content')
<div class="row">
	<div class="col-lg-6" style="margin: 0px 100px">
		<h2>Thêm Mới Danh Mục</h2>
			
		<form role="form" method="POST" action="{{ route('category.store') }}">
			@csrf
			<div class="form-group">
				<label>Name</label>
				<input class="form-control" name="name" value="{{ old('name') }}">
				<p style="color: red">{{ $errors->first('name')}}</p>
			</div>
			<div class="form-group">
				<label>Desciption</label>
				<input class="form-control" placeholder="Enter text" name="decription" value="{{ old('decription') }}">
				<p style="color: red">{{ $errors->first('decription')}}</p>
			</div>
			<div class="form-group">
				<label>Keyword</label>
				<textarea class="form-control" placeholder="Enter text" name="keywords">{{ old('keywords') }}</textarea>
				{{ $errors->first('keywords')}}
			</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Thêm</button>
				</div>
			</form>
		</div>
	</div>
	@endsection