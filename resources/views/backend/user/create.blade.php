@extends('layouts.backend')

@section('content')
	<div class="row">
		<div class="col-lg-6" style="margin: 0px 100px">
			<h2>Thêm Mới Người Dùng</h2>
			
			<form role="form" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label>Tên</label>
					<input class="form-control" name="name" value="{{ old('name') }}">
					<p style="color: red">{{ $errors->first('name')}}</p>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input class="form-control" placeholder="" name="email" value="{{ old('email') }}">
					<p style="color: red">{{ $errors->first('email')}}</p>
				</div>
				<div class="form-group">
					<label>Địa Chỉ</label>
					<input class="form-control" placeholder="" name="address" value="{{ old('address') }}">
					<p style="color: red">{{ $errors->first('address')}}</p>
				</div>
				<div class="form-group">
					<label>Điện Thoại</label>
					<input class="form-control" placeholder="" name="phone" value="{{ old('phone') }}">
					<p style="color: red">{{ $errors->first('phone')}}</p>
				</div>
				<div class="form-group">
					<label>Mật Khẩu</label>
					<input type="password" class="form-control" placeholder="" name="password" value="{{ old('password') }}">
					<p style="color: red">{{ $errors->first('password')}}</p>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Thêm</button>
				</div>
			</form>
		</div>
	</div>
@endsection