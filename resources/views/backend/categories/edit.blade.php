@extends('layouts.backend')

@section('content')
<div class="row">
		<div class="col-lg-6" style="margin: 0px 100px">
			<h2>Sửa Danh Mục</h2>
			
			<form role="form" method="POST" action="{{ route('category.update',['id' => $category->id]) }}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="_method" value="PUT">
				<div class="form-group">
					<label>Tên Danh Mục</label>
					<input class="form-control" name="name" value="{{ $category->name }}">
					<p style="color: red">{{ $errors->first('name')}}</p>
				</div>
				<div class="form-group">
					<label>Mô Tả</label>
					<input class="form-control" placeholder="" name="decription" value="{{ $category->decription }}">
					<p style="color: red">{{ $errors->first('decription')}}</p>
				</div>
				<div class="form-group">
					<label>Keywords</label>
					<input class="form-control" placeholder="" name="keywords" value="{{ $category->keywords }}">
					<p style="color: red">{{ $errors->first('keywords')}}</p>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success">Lưu Lại</button>
				</div>
			</form>
		</div>
	</div>
@endsection