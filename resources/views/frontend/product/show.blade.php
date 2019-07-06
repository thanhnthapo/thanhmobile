@extends('layouts.home')

@section('content')
<div class="container">

  <ul class="breadcrumb">
    <li><a href="{{ url('') }}"><i class="fa fa-home"></i></a></li>
    <li><a href="{{ url('category/show/'.$category->id) }}">{{ $category->name }}</a></li>
  </ul>
  <div class="row">
    <div id="content" class="col-sm-9">
      <div class="row">
        <div class="col-sm-6">
          <div class="thumbnails">
            <div><a class="thumbnail" href="#" title="{{$product->name}}"><img src="{{ asset('uploads/'.$product->img) }}" alt="{{$product->product_code}}" /></a></div>
            <div id="product-thumbnail" class="owl-carousel">
              @foreach($details_img as $detail)
              <div class="item">
                <div class="image-additional">
                  <a class="thumbnail  " href="#" title="lorem ippsum dolor dummy"> 
                    <img src="{{ asset('uploads/details/'.$detail->img) }}" height="200px" title="lorem ippsum dolor dummy" alt="lorem ippsum dolor dummy" />
                  </a>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <h1 class="productpage-title">{{ $product->name }}</h1>
          <div class="rating product"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="review-count"> <a href="#" onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;">1 reviews</a> / <a href="#" onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Write a review</a></span>
            <hr>
            <!-- AddThis Button BEGIN -->
            <div class="addthis_toolbox addthis_default_style"><a class="addthis_button_facebook_like" ></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_pinterest_pinit"></a> <a class="addthis_counter addthis_pill_style"></a></div>
            <!-- AddThis Button END -->
          </div>
          <ul class="list-unstyled productinfo-details-top">
            <li>
              <h2 class="productpage-price">{{ number_format($product->price) }} VNĐ</h2>
            </li>
          </ul>
          <hr>
          <ul class="list-unstyled product_info">
            <li>
              <label>Product Code:</label>
              <span>{{ $product->product_code }}</span></li>
              <li>
                <label>Số lượng còn: </label>
                <span>{{ $product->qty }}</span></li>
              </ul>
              <hr>
              <p class="product-desc">{{ $product->decription }}</p>
              <div id="product">
                <div class="form-group">
                  <input type="hidden" name="product_id" value="48" />
                  <div class="btn-group">
                    <button type="button" data-toggle="tooltip" class="btn btn-default wishlist" title="Add to Wish List" ><i class="fa fa-heart"></i></button>
                    <button type="button" id="button-cart" data-loading-text="Loading..." class="btn btn-success btn-block addtocart"><a href="{{ route('cart.add',['id'=>$product->id])}}">Add to Cart</a></button>
                    {{--   <button type="button" data-toggle="tooltip" class="btn btn-default compare" title="Compare this Product" ><i class="fa fa-exchange"></i></button> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="productinfo-tab">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
              <li><a href="#tab-review" data-toggle="tab">Reviews (1)</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab-description">
                <div class="cpt_product_description ">
                  <div>
                    {{ $product->decription }}
                  </div>
                </div>
                <!-- cpt_container_end --></div>
                <div class="tab-pane" id="tab-review">
                  <form class="form-horizontal">
                    <div id="review"></div>
                    <h2>Write a review</h2>
                    <div class="form-group required">
                      <div class="col-sm-12">
                        <label class="control-label" for="input-name">Your Name</label>
                        <input type="text" name="name" value="" id="input-name" class="form-control" />
                      </div>
                    </div>
                    <div class="form-group required">
                      <div class="col-sm-12">
                        <label class="control-label" for="input-review">Your Review</label>
                        <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                        <div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
                      </div>
                    </div>
                    <div class="form-group required">
                      <div class="col-sm-12">
                        <label class="control-label">Rating</label>
                        &nbsp;&nbsp;&nbsp; Bad&nbsp;
                        <input type="radio" name="rating" value="1" />
                        &nbsp;
                        <input type="radio" name="rating" value="2" />
                        &nbsp;
                        <input type="radio" name="rating" value="3" />
                        &nbsp;
                        <input type="radio" name="rating" value="4" />
                        &nbsp;
                        <input type="radio" name="rating" value="5" />
                      &nbsp;Good</div>
                    </div>
                    <div class="buttons clearfix">
                      <div class="pull-right">
                        <button type="button" id="button-review" data-loading-text="Loading..." class="btn btn-primary">Continue</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <h3 class="productblock-title">Sản Phẩm Liên Quan</h3>
            <div class="box">
              <div id="related-slidertab" class="row owl-carousel product-slider">
                @foreach($sp_lienquan as $lq)
                <div class="item">
                  <div class="product-thumb transition">
                    <div class="image product-imageblock"> <a href="{{ url('product/show',['id'=>$lq->id]) }}"> <img src="{{ asset('uploads/'.$lq->img) }}" alt="women's New Wine is an alcoholic" title="women's New Wine is an alcoholic" class="img-responsive" /> </a>
                      <div class="button-group">
                        <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                        <button type="button" class="addtocart-btn">Add to Cart</button>
                        <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                      </div>
                    </div>
                    <div class="caption product-detail">
                      <h4 class="product-name"><a href="{{ url('product/show',['id'=>$lq->id]) }}" title="{{ $lq->name }}">{{ $lq->name }}</a></h4>
                      <p class="price product-price"> 
                        @if($lq->sale_price ==0)
                       <span style="font-size: 14px;margin-left: 90px">{{ number_format($lq->price)}} VNĐ</span>
                       @else
                       <small class="price-old" style="font-size: 10px">{{ number_format($lq->price)}} VNĐ</small>
                       <span style="font-size: 14px">{{ number_format($lq->sale_price)}} VNĐ</span>
                       @endif
                     </p>
                   </div>
                   <div class="button-group">
                    <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                    <button type="button" class="addtocart-btn">Add to Cart</button>
                    <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection