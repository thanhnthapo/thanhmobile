@extends('layouts.backend')

@section('content')
<div class="row">
	<div class="col-lg-6" style="margin: 0px 100px">
		<h2>Thêm Mới Sản Phẩm</h2>

		<form role="form" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label>Tên Sản Phẩm</label>
				<input class="form-control" name="name" value="{{ old('name') }}">
				<p style="color: red">{{ $errors->first('name')}}</p>
			</div>
			<div class="form-group">
				<label>Mô Tả</label>
				{{-- <textarea class="form-control" name="decription" id="decription" rows="" value="{{ old('decription') }}"></textarea> --}}
				<input class="form-control" name="decription" value="{{ old('decription') }}">
				<p style="color: red">{{ $errors->first('decription')}}</p>
			</div>
			<div class="form-group">
				<label>Category</label>
				<select name="category_id" id="" class="form-control">
					<option value="0">Danh Mục</option>
					@foreach ($category as $categoryitem)
					<option value="{{ $categoryitem->id }}" {{ ($categoryitem->id ==old('category_id')) ? 'selected' : '' }}>
						{{($categoryitem->id==$categoryitem->category_id)?"-":"" }}  {{$categoryitem->name }}
					</option>
					@endforeach
				</select>
				{{-- <input class="form-control" name="category_id" value="{{ old('category_id') }}"> --}}
				<p style="color: red">{{ $errors->first('category_id')}}</p>
			</div>
			<div class="form-group">
				<label>Giá</label>
				<input class="form-control" placeholder="" name="price" value="{{ old('price') }}">
				<p style="color: red">{{ $errors->first('price')}}</p>
			</div>
			<div class="form-group">
				<label>Giá Giảm</label>
				<input class="form-control" placeholder="" name="sale_price" value="{{ old('sale_price') }}">
				<p style="color: red">{{ $errors->first('sale_price')}}</p>
			</div>
			<div class="form-group">
				<label>Mã Sản Phẩm</label>
				<input class="form-control" name="product_code" value="{{ old('product_code') }}">
				<p style="color: red">{{ $errors->first('product_code')}}</p>
			</div>
			<div class="form-group">
				<label>Số Lượng</label>
				<input class="form-control" name="qty" value="{{ old('qty') }}">
				<p style="color: red">{{ $errors->first('qty')}}</p>
			</div>

			<div class="form-group">
				<label for="">Ảnh Sản Phẩm</label>
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