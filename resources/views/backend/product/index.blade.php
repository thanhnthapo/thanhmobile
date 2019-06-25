@extends('layouts.backend')

@section('content')
	<div class="col-lg-12">
    <h3>Danh Sách Sản Phẩm</h3>
    <div class="table-responsive">
      <button class="btn btn-success" style="margin: 10px 0px"><a href="{{ route('product.create') }}" ><i class="fa fa-plus"></i> Thêm mới</a></button>
      <table class="table table-bordered table-hover tablesorter">
        <thead>
          <tr>
            <th>Tên Sản Phẩm <i class="fa fa-sort"></i></th>
            <th>Giá <i class="fa fa-sort"></i></th>
            <th>Ảnh </th>
            <th>Loại Sản Phẩm</th>
            <th>Mã Sản Phẩm</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
          <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td style="text-align: center;"><img src="{{ asset('uploads/'.$product->img)}}" alt="" width="50px"></td>
            @foreach($category as $category_name)
              @if($category_name->id == $product->category_id)
              <td>{{ $category_name->name }}</td>
              @endif
            @endforeach
            
            <td>{{ $product->product_code }}</td>
            <td>
              <button class="btn btn-warning" style="float: left;"><a href="{{ route('product.edit',['id'=>$product->id]) }}"><i class="fa fa-edit"></i></a></button>
              <button class="btn btn-danger" style="float: left"><a class="product-user" product-id="{{ $product->id }}" onclick="return confirm('Xác nhận xóa?')" href="#"><i class="fa fa-trash"></i></a></button>  
             {{--  <div class="form_delete">
              {!! Form::open([
              'method'=>'post',
              'route'=>['product.destroy',$product->id]]) !!}

              {!! Form::hidden('_method','delete') !!}
              {!! csrf_field()!!}
              <button onclick="return confirm('Xác nhận xóa')"type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>

              {!! Form::close() !!}
              </div> --}}
              </td>          
            </tr>
          @endforeach
        </tbody>
      </table>
      {!! $products->links() !!}
    </div>
  </div>
  @endsection
  @section('js')
<script type="text/javascript">
  $(function(){
    $('.product-user').click(function(){
      var productId = $(this).attr('product-id');
      $(this).parent().parent().parent().remove();

      $.ajax({
        url:'/admin/product/delete',
        type: 'POST',
        data: {id: productId},
        success: function(res){
          // console.log(res);
        },
        error: function(err){

        }
      })
    })
  })
</script>
@endsection 