@extends('layouts.backend')

@section('content')
	<div class="row">
		<div class="col-lg-6" style="margin: 0px 100px">
			<h2>Sửa Thông Tin Người Dùng</h2>
			
			<form role="form" method="POST" action="{{ route('user.update',['id' => $user->id]) }}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="_method" value="PUT">
				<div class="form-group">
					<label>Tên</label>
					<input class="form-control" name="name" value="{{ $user->name }}">
					<p style="color: red">{{ $errors->first('name')}}</p>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input class="form-control" placeholder="" name="email" value="{{ $user->email }}">
					<p style="color: red">{{ $errors->first('email')}}</p>
				</div>
				<div class="form-group">
					<label>Địa Chỉ</label>
					<input class="form-control" placeholder="" name="address" value="{{ $user->address }}">
					<p style="color: red">{{ $errors->first('address')}}</p>
				</div>
				<div class="form-group">
					<label>Điện Thoại</label>
					<input class="form-control" placeholder="" name="phone" value="{{ $user->phone }}">
					<p style="color: red">{{ $errors->first('phone')}}</p>
				</div>
				<div class="form-group">
					<label>Mật Khẩu</label>
					<input class="form-control" placeholder="" name="password" value="{{ $user->password }}">
					<p style="color: red">{{ $errors->first('password')}}</p>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success">Lưu Lại</button>
				</div>
			</form>
		</div>
	</div>
@endsection