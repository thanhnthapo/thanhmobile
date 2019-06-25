   <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
      <li class="{{ Request::is('admin') ? 'active' : null }}"><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="{{ Request::is('admin/product') ? 'active' : null }}"><a href="{{ route('product.index') }}"><i class="fa fa-bar-chart-o"></i> Quản Lý Sản Phẩm</a></li>
      <li class="{{ Request::is('admin/user') ? 'active' : null }}"><a href="{{ route('user.index') }}"><i class="fa fa-table"></i> Quản Lý Người Dùng</a></li>
      <li class="{{ Request::is('admin/category') ? 'active' : null }}"><a href="{{ route('category.index') }}"><i class="fa fa-edit"></i> Quản Lý Danh Mục</a></li>
      <li class="{{ Request::is('admin/order') ? 'active' : null }}"><a href="{{ route('order.index') }}"><i class="fa fa-font"></i> Quản Lý Đơn Hàng</a></li>
      <li class="{{ Request::is('admin/slide') ? 'active' : null }}"><a href="{{ route('slide.index') }}"><i class="fa fa-font"></i> Quản Lý Banner</a></li>
    </ul>
  </div>
 <style>
 	li.active{
 		background:#8e99008c;
 	}
 </style>