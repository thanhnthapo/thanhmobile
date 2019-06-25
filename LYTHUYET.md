1. Laravel Introduce & Route in Laravel

2. MVC in laravel
- Model: Thao tác với database
- View: Hiển thị cho người dùng
- Controller: Điều hướng cho ứng dụng

3. Router in Laravel
- GET, PUT, POST, Delete, PATH
- Các loại route trong Laravel
	3.1. Group router
	Ex: /admin/news
		/admin/product

	3.2. Route name
	- Đặt tên cho route
	- Xem danh sach các route name: php artisan route:list
	- Cách dùng: route('route  name')
	3.3. Resource route
	index
	create
	edit
	update
	store
	show
	destroy


4. Controller
- Cú pháp tạo controller: php artisan make: controller ControllerName
make:auth
make:channel
make:command
make:controller
make:event
make:exception
make:factory
make:job
make:listener
make:mail
make:middleware
make:migration
make:model
make:notification
make:observer
make:policy
make:provider
make:request
make:resource
make:rule
make:seeder
make:test

5. View in Laravel
- resources/views/...
- Create a View file: file.blade.php
- Load view: return view('view_file');

Định nghĩa: Router -> Controller -> Load Views

6. Project

Controller:
	Frontend		
		HomeController
	Backend
		DashboardController
Route:
	Group: backend & Frontend

Views:
	layouts
		- frontend.blade.php
	Frontend
	Backend

7. Blade in Laravel
- Echo dữ liệu {{ $value }}
- if...else:
	@if()
	@elseif()
	@else
	@endif
- Sử dụng for | foreach | While
	@foreach()
	@endforeach

	@for()...@endfor

- @if(isset())...@endif
- {{ functionName() }}
8. Kế thừa trong Blade
- Page1: Test Content
- Page2: 
	@extends('page1') //Kế thừa page1 tưởng tự include

	--------------------------------------
9. Validate Form In Laravel
- make request: php artisan 

-------------------------------
10. Ajax
@section('js')
@endsection	

$.ajax({
	url:'',
	type: 'POST|GET|DELETE|PUT',
	data: {id: userId},
	successs: function(res){

	},
	error: function(err){

	}
})

1. Dropdown edit
2. Vadilate ảnh khi edit
3. Xóa cả cảnh trong uploads
4. Mô tả để textarea hoặc bộ soạn thảo
5. Thêm nhập lại mật khẩu