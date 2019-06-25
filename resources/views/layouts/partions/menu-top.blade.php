<nav id="menu" class="navbar">
  <div class="nav-inner">
    <div class="navbar-header"><span id="category" class="visible-xs">Categories</span>
      <button type="button" class="btn btn-navbar navbar-toggle" ><i class="fa fa-bars"></i></button>
    </div>
  </div>
  <div class="navbar-collapse">
    <ul class="main-navigation">
      <li><a href="{{ url('/') }}"   class="parent"  >Trang Chủ</a> </li>
      @foreach($categories as $category)
      <li><a href="{{ url('category/show',['id'=>$category->id]) }}"   class="parent"  >{{ $category->name  }}</a> </li>
      @endforeach
      {{--       <li><a href="category.html"   class="parent"  >Accessories</a> </li> --}}
      <li><a href="{{ url('new/show') }}" >Tin Tức</a></li>
      {{-- <li><a href="blog.html" class="parent"  >Blog</a></li> --}}
      {{-- <li><a href="{{ url('category/show') }}" >Giới Thiệu</a></li> --}}
      <li><a href="{{ url('contact/show') }}" >Liên Hệ</a> </li>
    </ul>
  </div>
</nav>

