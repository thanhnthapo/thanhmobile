@extends('layouts.home')

@section('content')
<div class="container">
  <ul class="breadcrumb">
    <li><a href="{{ route('frontend.home.index') }}"><i class="fa fa-home"></i></a></li>
    <li><a href="{{ url('cart/list') }}">Giỏ Hàng</a></li>
  </ul>
  <div class="row">
    <div class="col-sm-9" id="content">
      <h1>Giỏ hàng </h1>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center">Ảnh</th>
              <th class="text-left">Tên Sản Phẩm</th>
              <th class="text-left">Loại Sản Phẩm</th>
              <th class="text-left">Số Lượng</th>
              <th class="text-right">Giá Sản Phẩm</th>
              <th class="text-right">Thành Tiền</th>
            </tr>
          </thead>
          <tbody>
            @foreach($carts as $cart)
            <tr>
              <td class="text-center"><img class="img-thumbnail" width="50px" title="" alt="" src="{{ asset('uploads/'.$cart->img) }}"></td>
              <td class="text-left">{{ $cart->name }}</td>
              @foreach($category as $category_name)
               @if($category_name->id == $cart->category_id)
              <td class="text-left">{{ $category_name->name }}</td>
              @endif
              @endforeach

              <td class="text-left"><div style="max-width: 200px;" class="input-group btn-block">
                <form enctype="multipart/form-data" method="post" action="" style="float: left;"> 
                  @csrf
                  <input type="text" class="form-control quantity" size="1" value="{{ $cart->soluong }}" name="qty">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" title="" data-toggle="tooltip" type="submit" data-original-title="Update"><i class="fa fa-refresh"></i></button></span>
                  </form>
                <button class="btn btn-warning" title="" data-toggle="tooltip" type="button" data-original-title="Remove"><a href="{{ route('cart.delete',['id'=>$cart->id]) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></button>
              </td>
              <td class="text-right">{{ number_format($cart->price) }} VNĐ</td>
              <td class="text-right">{{ number_format($cart->price * $cart->soluong)}} VNĐ</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="row">
        <div class="col-sm-4 col-sm-offset-8">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td class="text-right"><strong>Tổng Tiền:</strong></td>
                <td class="text-right"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="buttons">
        <div class="pull-left"><a class="btn btn-default" href="{{ route('frontend.home.index') }}">Tiếp tục mua sắm</a></div>
        <div class="pull-right"><a class="btn btn-primary" href="checkout.html">Thanh Toán</a></div>
      </div>
    </div>
  </div>
</div>
@endsection