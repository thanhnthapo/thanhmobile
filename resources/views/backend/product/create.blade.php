@extends('layouts.backend')

@section('content')
<div class="content-header">
	<h3>Thêm Sản Phẩm</h3>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" method="POST" action="{{ route('product.store')}}" enctype="multipart/form-data">
				@csrf
				<div class="box-body">
					<div class="form-group">
						<label class="col-sm-1">Tên</label>
						<div class="col-sm-4">
							<input class="form-control" name="name" value="{{ old('name') }}">
							<p style="color: red">{{ $errors->first('name')}}</p>
						</div>

						<label class="col-sm-1">Danh Mục</label>
						<div class="col-sm-5">
							<select name="category_id" id="category_id" class="form-control">
								<option value="0">Chọn Danh Mục</option>
								@foreach ($category as $categoryitem)
								<option value="{{ $categoryitem->id }}" {{ ($categoryitem->id ==  old('category_id')) ? 'selected' : '' }}>
									{{($categoryitem->id==$categoryitem->category_id)?"-":"" }}  {{$categoryitem->name }}
								</option>
								@endforeach
							</select>	
						<p style="color: red">{{ $errors->first('category_id')}}</p>
						</div>

					</div>
					<div class="form-group">
						<label class="col-sm-1">Giá</label>
						<div class="col-sm-4">
							<input class="form-control" placeholder="" name="price" value="{{ old('price')  }}">
							<p style="color: red">{{ $errors->first('price')}}</p>
						</div>
						<label class="col-sm-1">Giá Giảm</label>
						<div class="col-sm-5">
							<input class="form-control" placeholder="" name="sale_price" value="{{ old('sale_price') }}">
							<p style="color: red">{{ $errors->first('sale_price')}}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-1">Mã SP</label>
						<div class="col-sm-4">
							<input class="form-control" name="product_code" value="{{ old('product_code')  }}">
							<p style="color: red">{{ $errors->first('product_code')}}</p>
						</div>
						<label class="col-sm-2">Số Lượng</label>
						<div class="col-sm-4">
							<input class="form-control" name="qty" value="{{ old('qty')  }}">
							<p style="color: red">{{ $errors->first('qty')}}</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Ảnh Sản Phẩm</label>
						<div class="col-sm-5">
							<input type="file" name="img" id="img" class="form-control">
							<p style="color: red">{{ $errors->first('img')}}</p>
						</div>
					</div>
					@for($i=0; $i<3; $i++)
					<div class="form-group">
						<label class="col-sm-2">Slide Ảnh Sản Phẩm {{ $i+1 }}</label>
						<div class="col-sm-5">
							<input type="file" name="detail_img[]" class="form-control">
							<p style="color: red">{{ $errors->first('detail_img')}}</p>
						</div>
					</div>
					@endfor
					<div class="form-group">
						<label class="col-sm-2">Mô Tả</label>
						<div class="col-sm-10">
							<textarea name="decription" id="decription" class="form-control">{{ old('decription') }}</textarea>
							@if($errors->has('decription'))
							<p style="color: red">{{ $errors->first('decription') }}</p>
							@endif
						</div>
						{{-- <input class="form-control" name="decription" value="{{ $product->decription }}"> --}}
						{{-- <p style="color: red">{{ $errors->first('decription')}}</p> --}}
					</div>
					<div class="form-group">
						<div class="col-sm-2"> 
							<button type="submit" class="btn btn-success">Thêm Mới</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection

