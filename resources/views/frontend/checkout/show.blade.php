@extends('layouts.home')
@section('content')
<div class="container">
 <ul class="breadcrumb">
  <li><a href="index.html"><i class="fa fa-home"></i></a></li>
  <li><a href="cart.html">Shopping Cart</a></li>
  <li><a href="checkout.html">Checkout</a></li>
</ul>
<div id="content">
  <form action="{{ route('checkout.show') }}" method="post" class="beta-form-checkout">
    <div class="row">
      <div class="col-sm-6">
        <h4>Đặt hàng</h4>
        <div class="space20">&nbsp;</div>

        <div class="form-block">
          <label for="name">Họ tên*</label>
          <input type="text" id="name" placeholder="Họ tên" required>
        </div>
        <div class="form-block">
          <label for="email">Email*</label>
          <input type="email" id="email" required placeholder="expample@gmail.com">
        </div>

        <div class="form-block">
          <label for="adress">Địa chỉ*</label>
          <input type="text" id="adress" placeholder="Street Address" required>
        </div>


        <div class="form-block">
          <label for="phone">Điện thoại*</label>
          <input type="text" id="phone" required>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="your-order">
          <div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
          <div class="your-order-body" style="padding: 0px 10px">
            <div class="your-order-item">
              <div>
                <!--  one item   -->
                @foreach($carts as $cart)
                <div class="media">
                  <img width="25%" src="assets/dest/images/shoping1.jpg" alt="" class="pull-left">
                  <div class="media-body">
                    <p class="font-large">{{ $cart->name }}</p>
                    @foreach($category as $category_name)
                    @if($category_name->id == $cart->category_id)
                    <span class="color-gray your-order-info">Loại Sản Phẩm: {{ $category_name->name }}</span>
                    @endif
                    @endforeach
                    <span>Giá: {{ $cart->price }}</span>
                    <span class="color-gray your-order-info">Số Lượng: {{ $cart->qty }}</span>
                  </div>
                </div>
                @endforeach
                <!-- end one item -->
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="your-order-item">
              <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
              <div class="pull-right"><h5 class="color-black">$235.00</h5></div>
              <div class="clearfix"></div>
            </div>
          </div>
          <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>

          <div class="your-order-body">
            <ul class="payment_methods methods">
              <li class="payment_method_bacs">
                <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
                <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                <div class="payment_box payment_method_bacs" style="display: block;">
                  Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                </div>            
              </li>

              <li class="payment_method_cheque">
                <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
                <label for="payment_method_cheque">Chuyển khoản </label>
                <div class="payment_box payment_method_cheque" style="display: none;">
                  Chuyển tiền đến tài khoản sau:
                  <br>- Số tài khoản: 123 456 789
                  <br>- Chủ TK: Nguyễn A
                  <br>- Ngân hàng ACB, Chi nhánh TPHCM
                </div>            
              </li>

            </ul>
          </div>
          <input type="submit" class="btn-danger" value="Đặt Hàng" style="margin-left: 100px"></input>
        </div> <!-- .your-order -->
      </div>
    </div>
  </form>
</div> <!-- #content -->
</div>
@endsection