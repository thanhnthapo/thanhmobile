@extends('layouts.home')

@section('content')
<div class="container">
  <div class="mainbanner">
    <div id="main-banner" class="owl-carousel home-slider">
      @foreach($slides as $slide)
      <div class="item"> <a href="{{ $slide->link }}"><img width="1903px" src="{{ asset('uploads/slide/'.$slide->img)}}" alt="main-banner1" class="img-responsive" /></a> </div>
      @endforeach
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div id="brand_carouse" class="owl-carousel brand-logo">
      <div class="item text-center"> <a href="#"><img src="./image/brand/brand1.png" alt="Disney" class="img-responsive" /></a> </div>
      <div class="item text-center"> <a href="#"><img src="image/brand/brand2.png" alt="Dell" class="img-responsive" /></a> </div>
      <div class="item text-center"> <a href="#"><img src="image/brand/brand3.png" alt="Harley" class="img-responsive" /></a> </div>
      <div class="item text-center"> <a href="#"><img src="image/brand/brand4.png" alt="Canon" class="img-responsive" /></a> </div>
      <div class="item text-center"> <a href="#"><img src="image/brand/brand5.png" alt="Canon" class="img-responsive" /></a> </div>
      <div class="item text-center"> <a href="#"><img src="image/brand/brand6.png" alt="Canon" class="img-responsive" /></a> </div>
      <div class="item text-center"> <a href="#"><img src="image/brand/brand7.png" alt="Canon" class="img-responsive" /></a> </div>
      <div class="item text-center"> <a href="#"><img src="image/brand/brand8.png" alt="Canon" class="img-responsive" /></a> </div>
      <div class="item text-center"> <a href="#"><img src="image/brand/brand9.png" alt="Canon" class="img-responsive" /></a> </div>
      <div class="item text-center"> <a href="#"><img src="image/brand/brand5.png" alt="Canon" class="img-responsive" /></a> </div>
    </div>
  </div>
  <div class="row">
    <div id="content" class="col-sm-12">
      <div class="customtab">
        <div id="tabs" class="customtab-wrapper">
          <ul class='customtab-inner'>
            <li class='tab'><a href="#tab-latest">SẢN PHẨM MỚI NHẤT</a></li>
            <li class='tab'><a href="#tab-special">SẢN PHẨM ĐẶC BIỆT</a></li>
            <li class='tab'><a href="#tab-bestseller">SẢN PHẨM GIẢM GIÁ</a></li>
          </ul>
        </div>
        <div id="tab-latest" class="tab-content">
          <div class="box">
            <div id="latest-slidertab" class="row owl-carousel product-slider">
              @foreach($new_products as $new_product)
              <div class="item">
                <div class="ribon-wrapper"><div class="ribon new">News</div></div>
                <div class="product-thumb transition">
                  <div class="image product-imageblock"> <a href="{{ url('product/show',['id' => $new_product->id]) }}"><img src="{{ asset('uploads/'.$new_product->img)}}" alt="{{ $new_product->desciption }}" title="{{ $new_product->name }}" class="img-responsive" /> </a>
                    <div class="button-group">
                      <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                      <button type="button" class="addtocart-btn" ><a href="{{ route('cart.add',['id'=>$new_product->id] )}}">Add To Cart</a></button>
                      <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
                    </div>
                  </div>
                  <div class="caption product-detail">
                    <h4 class="product-name"><a href="{{ url('product/show',['id' => $new_product->id]) }}" title="{{ $new_product->name }}">{{ $new_product->name }}</a></h4>
                    <p class="price product-price">{{ number_format($new_product->price) }} VNĐ<span class="price-tax">Ex Tax: $100.00</span></p>
                    <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                  </div>
                  <div class="button-group">
                    <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                    <button type="button" class="addtocart-btn" ><a href="{{ route('cart.add',['id'=>$new_product->id] )}}">Add To Cart</a></button>
                    <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <!-- tab-latest-->
        <div id="tab-special" class="tab-content">
          <div class="box">
            <div id="special-slidertab" class="row owl-carousel product-slider">
              @foreach($special_products as $special_product)
              <div class="item">
                <div class="product-thumb transition">
                  <div class="image product-imageblock"> <a href="{{url('product/show', ['id' => $special_product->id ]) }}"> <img src="{{ asset('uploads/'. $special_product->img) }}" alt="{{ $special_product->name }}" title="{{ $special_product->name }}" class="img-responsive" /> </a>
                    <div class="button-group">
                      <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                      <button type="button" class="addtocart-btn" ><a href="{{ route('cart.add',['id'=>$special_product->id] )}}">Add To Cart</a></button>
                      <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
                    </div>
                  </div>
                  <div class="caption product-detail">
                    <h4 class="product-name"><a href="{{url('product/show', ['id' => $special_product->id ]) }}" title="{{ $special_product->name }}">{{ $special_product->name }}</a></h4>
                    <p class="price product-price"> <span class="price-new">{{ number_format($special_product->price )}} VNĐ</span> </p>
                  </div>
                  <div class="button-group">
                    <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                    <button type="button" class="addtocart-btn" ><a href="{{ route('cart.add',['id'=>$new_product->id] )}}"></a>Add To Cart</button>
                    <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <!-- tab-special-->
        <div id="tab-bestseller" class="tab-content">
          <div class="box">
            <div id="bestseller-slidertab" class="row owl-carousel product-slider">
              @foreach($sale_products as $product)
              @if($product->sale_price != 0)
              <div class="item">
                <div class="product-thumb transition">
                  <div class="image product-imageblock"> <a href="{{url('product/show',[$product->id]) }}"> <img src="{{ asset('uploads/'.$product->img) }}" alt="{{ $product->name }}" title="l{{ $product->name }}" class="img-responsive" /> </a>
                    <div class="button-group">
                      <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                      <button type="button" class="addtocart-btn" ><a href="{{ route('cart.add',['id'=>$new_product->id] )}}"></a>Add To Cart</button>
                      <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
                    </div>
                  </div>
                  <div class="caption product-detail">
                    <h4 class="product-name"><a href="{{url('product/show',[$product->id]) }}" title="{{ $product->name }}">{{ $product->name }}</a></h4>
                    <p class="price product-price">
                      <span class="price-new">{{ number_format($product->price) }} VNĐ</span>
                      <span class="price-old">{{ number_format($product->sale_price ) }} VNĐ</span>
                    </p>
                  </div>
                  <div class="button-group">
                    <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                    <button type="button" class="addtocart-btn" ><a href="{{ route('cart.add',['id'=>$product->id] )}}">Add To Cart</a></button>
                    <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
              </div>
              @endif
              @endforeach
            </div>
          </div>
        </div>
        <h3 class="productblock-title">LAPTOP Bán Chạy</h3>
        <div class="box">
          <div id="Weekly-slider" class="row owl-carousel product-slider">
            @foreach($laptops as $laptop)
            <div class="item product-slider-item">
              <div class="product-thumb transition">
                <div class="image product-imageblock"> <a href="{{url('product/show',['id' => $laptop->id]) }}"> <img src="{{ asset('uploads/'.$laptop->img) }}" alt="{{ $laptop->name }}" title="{{ $laptop->name }}" class="img-responsive" /> </a>
                  <div class="button-group">
                    <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                    <button type="button" class="addtocart-btn" ><a href="{{ route('cart.add',['id'=>$laptop->id] )}}">Add To Cart</a></button>
                    <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
                <div class="caption product-detail">
                  <h4 class="product-name"><a href="{{url('product/show',['id' => $laptop->id]) }}" title="{{ $laptop->name }}">{{ $laptop->name }}</a></h4>

                  <p class="price product-price">  
                    @if($laptop->sale_price == 0)
                    <span class="price-new">{{ number_format($laptop->price) }} VNĐ</span> 
                    @else
                    <span class="price-new">{{ number_format($laptop->price) }} VNĐ</span> 
                    <span class="price-old">{{ number_format($laptop->sale_price)}} VNĐ</span>
                    @endif
                  </p>
                </div>
                <div class="button-group">
                  <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                  <button type="button" class="addtocart-btn" >Add To Cart</button>
                  <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <h3 class="productblock-title">MÁY TÍNH BÀN</h3>
      <div class="box">
        <div id="feature-slider" class="row owl-carousel product-slider">
          @foreach($pcs as $pc)
          <div class="item product-slider-item">
            <div class="product-thumb transition">
              <div class="image product-imageblock"> <a href="{{url('product/show', [$pc->id]) }}"> <img src="{{ asset('uploads/'.$pc->img) }}" alt="{{ $pc->description }}y" title="{{ $pc->description }}" class="img-responsive" /> </a>
                <div class="button-group">
                  <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                  <button type="button" class="addtocart-btn" >Add To Cart</button>
                  <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
                </div>
              </div>
              <div class="caption product-detail">
                <h4 class="product-name"><a href="{{url('product/show', [$pc->id]) }}" title="{{ $pc->description }}">{{ $pc->name }}</a></h4>
                <p class="price product-price"> <span class="price-new">{{ number_format($pc->price) }} VNĐ</span></p>
              </div>
              <div class="button-group">
                <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                <button type="button" class="addtocart-btn" >Add To Cart</button>
                <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="parallax">
        <ul id="testimonial" class="row owl-carousel product-slider">
          <li class="item">
            <div class="panel-default">
              <div class="testimonial-image"><img src="image/t1.jpg" alt="#"></div>
              <div class="testimonial-name">
                <h2>Janet Wilson</h2>
              </div>
              <div class="testimonial-designation">
                <p>Web Designer</p>
              </div>
              <div class="testimonial-desc">Rem ipsum doLoremRem ipsum doLorem ipsum ut labore et dolore ma ipsum ut labore et <br>
              dolore  Rem ipsum doLorem ipsum ut labore et dolore mamagna.Lorem ipsum doLorem ipsum dolor sit amet, consectetur adipisicing.</div>
            </div>
          </li>
          <li class="item">
            <div class="panel-default">
              <div class="testimonial-image"><img src="image/t2.jpg" alt="#"></div>
              <div class="testimonial-name">
                <h2>Linda Howard</h2>
              </div>
              <div class="testimonial-designation">
                <p>Web Deweloper</p>
              </div>
              <div class="testimonial-desc">Rem ipsum doLoremRem ipsum doLorem ipsum ut labore et dolore ma ipsum ut labore et <br>
              dolore  Rem ipsum doLorem ipsum ut labore et dolore mamagna.Lorem ipsum doLorem ipsum dolor sit amet, consectetur adipisicing.</div>
            </div>
          </li>
          <li class="item">
            <div class="panel-default">
              <div class="testimonial-image"><img src="image/t3.jpg" alt="#"></div>
              <div class="testimonial-name">
                <h2>Janet Wilson</h2>
              </div>
              <div class="testimonial-designation">
                <p>Web Designer</p>
              </div>
              <div class="testimonial-desc">Rem ipsum doLoremRem ipsum doLorem ipsum ut labore et dolore ma ipsum ut labore et <br>
              dolore  Rem ipsum doLorem ipsum ut labore et dolore mamagna.Lorem ipsum doLorem ipsum dolor sit amet, consectetur adipisicing.</div>
            </div>
          </li>
          <li class="item">
            <div class="panel-default">
              <div class="testimonial-image"><img src="image/t4.jpg" alt="#"></div>
              <div class="testimonial-name">
                <h2>Linda Howard</h2>
              </div>
              <div class="testimonial-designation">
                <p>Web Deweloper</p>
              </div>
              <div class="testimonial-desc">Rem ipsum doLoremRem ipsum doLorem ipsum ut labore et dolore ma ipsum ut labore et <br>
              dolore  Rem ipsum doLorem ipsum ut labore et dolore mamagna.Lorem ipsum doLorem ipsum dolor sit amet, consectetur adipisicing.</div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection