<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Graduation Completed Status Checking System</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>





        <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                ระบบตรวจสอบผู้สำเร็จการศึกษา
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
  
                <div class="dropdown show">
  <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  เพิ่มข้อมูล
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="department">สาขาวิชา</a>
    <a class="dropdown-item" href="courses">หลักสูตร</a>
    <a class="dropdown-item" href="subcategory">หมวดวิชา</a>
    <a class="dropdown-item" href="subgroup">กลุ่มวิชา</a>
   
  </div>

  <a href="course_detail" class="btn btn-primary " role="button" aria-pressed="true">รายละเอียดหลักสูตร</a>

  <a href="manage_course" class="btn btn-primary " role="button" aria-pressed="true">รายวิชา</a>

  <a href="report" class="btn btn-primary " role="button" aria-pressed="true">รายงานผล</a>

</div>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                  
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
  </div>
</nav>

</div>
    <div class="container">
        <div class="row">
          

            <div class="col">
                <div class="card">

           
                    <div class="card-header">รายละเอียดหลักสูตร</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/course_detail/create') }}" class="btn btn-success btn-sm" title="Add New course_detail">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <form method="GET" action="{{ url('/admin/course_detail/') }}" class="form-inline my-2 my-lg-0 float-right" role="search"> 
                    
               

                    <select class="form-control"  name="search" id="search" required>
                    <option value="" selected disabled hidden>รหัสหลักสูตร</option>
                              @foreach($course_detail1 as $item)
                                          <option value="{{$item->course_id}}">{{$item->course_id}}</option>
                                      @endforeach
                              </select>
                  
                  
                             
                  
                              <input class="btn btn-primary" type="submit" value="ค้นหา">
                              <button class="btn btn-primary" onclick="location.href='course_detail'" type="button">
         ล้างค่า</button>
                          
                  
                    
                    </form>
                       

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>รหัสสาขาวิชา</th><th>รหัสหลักสูตร</th><th>รหัสหมวดวิชา</th><th>รหัสกลุ่มวิชา</th><th>หน่วยกิตทั้งหลักสูตร</th><th>หน่วยกิตหมวดวิชา</th><th>หน่วยกิตกลุ่มวิชา</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($course_detail as $item)
                                    <tr>
                                        <td>{{ $item->department_id }}</td>
                                        <td>{{ $item->course_id }}</td>
                                        <td>{{ $item->category_id }}</td>
                                        <td>{{ $item->group_id }}</td>
                                        <td>{{ $item->sum_credit_coures }}</td>
                                        <td>{{ $item->sum_credit_group }}</td>
                                        <td>{{ $item->sum_credit_category }}</td>
                                        <td>
                                            
                                            <a href="{{ url('/admin/course_detail/' . $item->id . '/edit') }}" title="Edit course_detail"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/course_detail' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete course_detail" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $course_detail->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
