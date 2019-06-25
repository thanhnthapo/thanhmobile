<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Trang quản trị</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('backend/css/bootstrap.css') }}" rel="stylesheet">

  <!-- Add custom CSS here -->
  <link href="{{ asset('backend/css/sb-admin.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('backend/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Page Specific CSS -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  {{-- <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css"> --}}
</head>
<body>
  <div class="row">
    <div class="col-sm-6">
      <div class="well">
        <h2>Đăng Nhập</h2>
        <form enctype="multipart/form-data" method="post" action="{{ route('login') }}">
          @csrf
          <div class="form-group">
            <label for="input-email" class="control-label">E-Mail</label>
            <input type="text" class="form-control" id="email" placeholder="E-Mail Address" value="" name="email">
          </div>
          <div class="form-group">
            <label for="input-password" class="control-label">Password</label>
            <input type="password" class="form-control" id="password" placeholder="password" value="" name="password">
          </div>
          <div class="form-group">
            <span>Quên mật khẩu: <a href="#">tại đây</a></span></br>
          </div>
          <input type="submit" class="btn btn-primary" value="login">
        </form>
      </div>
    </div>
  </div>
</body>