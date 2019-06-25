@extends('layouts.backend')

@section('content')
	<div class="col-lg-12">
    <h3>Danh sách danh mục</h3>
    <div class="table-responsive">
      <button class="btn btn-success" style="margin: 10px 0px"><a href="{{ route('category.create') }}" ><i class="fa fa-plus"></i> Thêm mới</a></button>

      <table class="table table-bordered table-hover tablesorter">
        <thead>
          <tr>
            <th>Tên Danh Mục </th>
            <th>Mô Tả </th>
            <th>Keyword </th>
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $category)
          <tr>
            <td>{{ $category->name}}</td>
            <td>{{ $category->decription}}</td>
            <td>{{ $category->keywords}}</td>
            <td><button class="btn btn-warning" style="float: left;"><a href="{{ route('category.edit',['id'=>$category->id]) }}"><i class="fa fa-edit"></i></a>
              <div class="form_delete">
              {!! Form::open([
              'method'=>'post',
              'route'=>['category.destroy',$category->id]]) !!}

              {!! Form::hidden('_method','delete') !!}
              {!! csrf_field()!!}
              <button onclick="return confirm('Xác nhận xóa')"type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>

              {!! Form::close() !!}
              </div> 
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
     {!! $categories->links() !!}
    </div>

  </div>
  @endsection