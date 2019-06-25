@extends('layouts.backend')

@section('content')
<div class="list-center">
	<div class="col-lg-10">
    <h2>Danh Sách Sản Phẩm</h2>
    <div class="table-responsive">
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
          <tr>
            <td></td>
            <td></td>
            <td></td>
              <td></td>
            <td></td>
            <td><button class="btn btn-warning"><a href="">Sửa</a></button>  <button class="btn btn-danger"><a href="">Xóa</a></button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <button class="btn btn-success" style="margin: 10px 600px"><a href="{{ route('order.create') }}" >Thêm mới</a></button>
  @endsection