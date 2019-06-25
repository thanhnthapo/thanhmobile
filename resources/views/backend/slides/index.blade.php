@extends('layouts.backend')

@section('content')
<div class="col-lg-12">
  <h3>Quản Lý Banner</h3>
  <div class="table-responsive">
    <button class="btn btn-success" style="margin: 10px 0px"><a href="{{ route('slide.create') }}" ><i class="fa fa-plus"></i> Thêm mới</a></button>
    <table class="table table-bordered table-hover tablesorter">
      <thead>
        <tr>
          <th>Link </th>
          <th>Ảnh </th>
          <th>Action </th>
        </tr>
      </thead>
      <tbody>
        @foreach($slides as $slide)
        <tr>
          <td>{{ $slide->link }}</td>
          <td style="text-align: center;"><img src="{{ asset('uploads/'.$slide->img)}}" alt="" width="350px"></td>
          <td><button class="btn btn-warning" style="float: left;"><a href="{{ route('slide.edit',['id'=>$slide->id]) }}"><i class="fa fa-edit"></i></a></button>  
              <div class="form_delete">
              {!! Form::open([
              'method'=>'post',
              'route'=>['slide.destroy',$slide->id]]) !!}

              {!! Form::hidden('_method','delete') !!}
              {!! csrf_field()!!}
              <button onclick="return confirm('Xác nhận xóa')"type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>

              {!! Form::close() !!}
              </div></td>           
        </tr>
        @endforeach
      </tbody>
    </table>
    {!! $slides->links() !!}
  </div>
</div>

@endsection