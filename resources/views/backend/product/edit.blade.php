@extends('layouts.backend')

@section('content')
<div class="content-header">
	<h3>Sửa Thông Tin Sản Phẩm</h3>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" method="POST" action="{{ route('product.update',['id' => $product->id]) }}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="_method" value="PUT">
				<div class="box-body">
					<div class="form-group">
						<label class="col-sm-1">Tên</label>
						<div class="col-sm-4">
							<input class="form-control" name="name" value="{{ $product->name }}">
							<p style="color: red">{{ $errors->first('name')}}</p>
						</div>

						<label class="col-sm-1">Danh Mục</label>
						<div class="col-sm-5">
							<select name="category_id" id="category_id" class="form-control">
								<option value="0">Danh Mục Sản Phẩm</option>
								@foreach ($category as $categoryitem)
								<option value="{{ $categoryitem->id }}" {{ ($categoryitem->id == old('category_id')) ? 'selected' : '' }}>
									{{($categoryitem->id == $categoryitem->category_id)?"-":"" }}  {{$categoryitem->name }}
								</option>
								@endforeach
							</select>
							<p style="color: red">{{ $errors->first('category_id')}}</p>
						</div>
						{{-- <input class="form-control" name="category_id" value="{{ $product->category_id }}"> --}}

					</div>
					<div class="form-group">
						<label class="col-sm-1">Giá</label>
						<div class="col-sm-4">
							<input class="form-control" placeholder="" name="price" value="{{ $product->price }}">
							<p style="color: red">{{ $errors->first('price')}}</p>
						</div>

						<label class="col-sm-1">Mã Sản Phẩm</label>
						<div class="col-sm-5">
							<input class="form-control" name="product_code" value="{{ $product->product_code }}">
							<p style="color: red">{{ $errors->first('product_code')}}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-1">Số Lượng</label>
						<div class="col-sm-4">
							<input class="form-control" name="qty" value="{{ $product->qty }}">
							<p style="color: red">{{ $errors->first('qty')}}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Ảnh Sản Phẩm</label>
						<div class="col-sm-5">
							<input type="file" name="img" id="img" class="form-control" width="20px">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10">
							<img src="{{ asset('uploads/'.$product->img)}}" width="100px" alt="">
							<input type="hidden" name="img_product" value="{{ $product->img }}">
							<p style="color: red">{{ $errors->first('img')}}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Mô Tả</label>
						<div class="col-sm-10">
						<textarea name="decription" id="decription" class="form-control">{{ old('decription', $product->decription) }}</textarea>
						@if($errors->has('decription'))
						<p class="help-block">{{ $errors->first('decription') }}</p>
						@endif
						</div>
						{{-- <input class="form-control" name="decription" value="{{ $product->decription }}"> --}}
						{{-- <p style="color: red">{{ $errors->first('decription')}}</p> --}}
					</div>
					<div class="form-group">
						<div class="col-sm-2">
						<button type="submit" class="btn btn-success">Lưu Lại</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection

