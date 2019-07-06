@extends('layouts.backend')

@section('content')
<div class="col-lg-12">
  <h3>Danh Sách Người Dùng</h3>
  <div class="table-responsive">
    <button class="btn btn-success" style="margin: 10px 0px"><a href="{{ route('user.create') }}" ><i class="fa fa-plus"></i> Thêm mới</a></button>
    <table class="table table-bordered table-hover tablesorter">
      <thead>
       <tr>
        <th>Tên <i class="fa fa-sort"></i></th>
        <th>Email <i class="fa fa-sort"></i></th>
        <th>Địa Chỉ </th>
        <th>Số Điện Thoại</th>
        <th>Action</th>
      </tr>
      <tbody>
      </tbody>
    </thead>
  </table>
  <div class="phantrang">

  </div>
  {{-- {!! $users->links() !!} --}}
</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
  $(function(){
    listUser(); 
    $(document).on('click','.pageContent', function(){
      var page = $(this).attr('page');
      listUser(page);
    })
    function listUser(page = 1){
      $.ajax({
        url:'/admin/user/list/ajax?page=' + page,
        type: 'GET',
        success: function(res){

          var $listuser = '';
          for (var i = 0; i < res.userPagnate.data.length; i++) {
            $listuser += '<tr>'
            $listuser += '<td>'+ res.userPagnate.data[i].name +'</td>'
            $listuser += '<td>'+ res.userPagnate.data[i].email +'</td>'
            $listuser += '<td>'+ res.userPagnate.data[i].email +'</td>'
            $listuser += '<td>'+ res.userPagnate.data[i].phone +'</td>'
            $listuser += '<td><button class="btn btn-warning" style="float: left"><a href="/admin/user/' + res.userPagnate.data[i].id + '/edit"><i class="fa fa-edit"></i></a></button>'
            $listuser += `<button class="btn btn-danger"><a class="delete-user" user-id="` + res.userPagnate.data[i].id + `" onclick="return confirm('Xác nhận xóa?')" href="#"><i class="fa fa-trash"></i></a></button>`
            $listuser += '</td>'
            $listuser += '</tr>'
          }
          $('tbody').html($listuser);

          $pageContent = '';
          for ($currentPage = 1; $currentPage <= res.userPagnate.last_page; $currentPage++) {
           $pageContent += '<button classname=""><a  href="#" class="pageContent" page = "'+ $currentPage +'">'+ $currentPage +'</a></button>';
         }

         $('.phantrang').html($pageContent);

        // $('.phantrang').html($phantrang);
      },

      error: function(err){

      }
    })
    }

    $("delete-user").on('click',function(){
      var userId = $(this).attr("user-id");
      var token = $("meta[name='csrf-token']").attr("content");
      console.log(userId);
      $(this).parent().parent().parent().remove();
      $.ajax({
        url:'/admin/user/delete',
        type: 'POST',
        data: {"id": userId, "token": token},
        success: function(res){
        },
        error: function(err){
        }
      })
    })
  })
</script>
@endsection 