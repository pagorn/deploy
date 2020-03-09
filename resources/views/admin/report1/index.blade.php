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
             
                    <div class="card-header">รายงานผู้สำเร็จการศึกษา</div>
                    <div class="card-body">
                    <div class="d-md-flex">

                    <form method="GET" action="{{ url('/admin/report/') }}"  role="search"> 
                    
                    <div class="dropdown" name="search">
  <button class="btn btn-primary dropdown-toggle"  name="search" type="submit" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    หลักสูตร
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <button class="dropdown-item" name="search" value="สารสนเทศสถิติ" type="submit">สารสนเทศสถิติ</button> 
  <button class="dropdown-item" name="search" value="สถิติ" type="submit">สถิติ</button> 
  </div>


  
  </form>
  </div>


  <form method="GET" action="{{ url('/admin/report/') }}"  role="search"> 
                    
  <button class="btn btn-primary dropdown-toggle"  name="search" type="submit" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    สถานะ
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <button class="dropdown-item" name="search" value="ไม่ผ่านการตรวจสอบ" type="submit">ไม่ผ่านการตรวจสอบ</button> 
  <button class="dropdown-item" name="search" value="รอยืนยันผลการศึกษา" type="submit">รอยืนยันผลการศึกษา</button> 
  <button class="dropdown-item" name="search" value="จบการศึกษา" type="submit">จบการศึกษา</button> 
  </div>
  <button class="btn btn-secondary" name="search" value="" type="submit">กลับค่าเริ่มต้น</button> 
 </form>

 
</div>    

                        <form method="GET" action="{{ url('/admin/report') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        ค้นหา
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th>รหัสนักศึกษา</th><th>ชื่อ-สกุล</th><th>ชื่อหลักสูตร</th><th>เกรดเฉลี่ยรวม</th><th>สถานะ</th><th>หมายเหตุ</th><th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($report as $item)
                                    <tr>
                                        
                                        <td>{{ $item->student_id }}</td>
                                        <td>{{ $item->name }}</td>
                                      
                                        <td>{{ $item->course_name }}</td>

                                        <td>{{ $item->gpax}} 

                                    
                                        </td>
                       

                                        
                                        <td><h5>@if(!empty($item->status))
                    <span class="btn @if($item->status=='จบการศึกษา') btn-sm btn-success @endif @if ($item->status=='รอยืนยันผลการศึกษา') btn-sm btn-warning @endif @if ($item->status=='ไม่ผ่านการตรวจสอบ') btn-sm btn-danger @endif  ">{{ $item->status }}</span>                    
                    
                    @else
                   
                    @endif
                    </h5>


                                        


                    <td>{{ $item->ps }}</td>


                                        <td>
                                        
                                        <form method="GET" target="_blank" action="{{ url('/admin/report/show/') }}"  role="search">  <button class="btn btn-primary btn-sm" name="search" value="{{$item->id}}" type="submit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>รายละเอียด</button> </form>

                                            <a href="{{ url('/admin/report/' . $item->id . '/edit') }}" title="Edit report"><button class="btn btn-secondary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> ปรับสถานะ</button></a>

                                            <form method="POST" action="{{ url('/admin/report' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete report" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> ลบ</button>
                                            </form>


                                            
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $report->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
