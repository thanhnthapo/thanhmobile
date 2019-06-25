@extends('layouts.backend')

@section('content')
<div class="row">
	<div class="col-lg-6" style="margin: 0px 100px">
		<h2>Sửa Thông Tin Sản Phẩm</h2>

		<form role="form" method="POST" action="{{ route('product.update',['id' => $product->id]) }}" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="_method" value="PUT">
			<div class="form-group">
				<label>Tên Sản Phẩm</label>
				<input class="form-control" name="name" value="{{ $product->name }}">
				<p style="color: red">{{ $errors->first('name')}}</p>
			</div>
			<div class="form-group">
				<label>Mô Tả</label>
				<input class="form-control" name="decription" value="{{ $product->decription }}">
				<p style="color: red">{{ $errors->first('decription')}}</p>
			</div>
			<div class="form-group">
				<label>Category</label>
				<input class="form-control" name="category_id" value="{{ $product->category_id }}">
				<p style="color: red">{{ $errors->first('category_id')}}</p>
			</div>
			<div class="form-group">
				<label>Giá</label>
				<input class="form-control" placeholder="" name="price" value="{{ $product->price }}">
				<p style="color: red">{{ $errors->first('price')}}</p>
			</div>
			<div class="form-group">
				<label>Mã Sản Phẩm</label>
				<input class="form-control" name="product_code" value="{{ $product->product_code }}">
				<p style="color: red">{{ $errors->first('product_code')}}</p>
			</div>
			<div class="form-group">
				<label>Số Lượng</label>
				<input class="form-control" name="qty" value="{{ $product->qty }}">
				<p style="color: red">{{ $errors->first('qty')}}</p>
			</div>

			<div class="form-group">
				<label for="">Ảnh Sản Phẩm</label>
				<input type="file" name="img" id="img" value="{{ $product->img }}"><br>
				<p style="color: red">{{ $errors->first('img')}}</p>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Lưu Lại</button>
			</div>
		</form>
	</div>
</div>
@endsection