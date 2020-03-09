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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

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

<form method="GET" action="{{ url('reportapprove') }}" class="form-inline my-2 my-lg-0 float-right" role="search"> 



<select class="form-control"  name="search" id="search" required>
<option value="" selected disabled hidden>หลักสูตร</option>
@foreach($courses as $item)
    <option value="{{$item->course_name}}">{{$item->course_name}}</option>
@endforeach
</select>


<select class="form-control"  name="search1" id="search1" required>
<option value="จบการศึกษา"  hidden>สถานะ</option>
          
          <option value="จบการศึกษา">จบการศึกษา</option>
          <option value="รอยืนยันผลการศึกษา">รอยืนยันผลการศึกษา</option>
          <option value="ไม่ผ่านการตรวจสอบ">ไม่ผ่านการตรวจสอบ</option>
    
</select>

<select class="form-control"  name="search2" id="search2" >
<option value="1" hidden>เกรดเฉลี่ย</option>
<option value="1">1</option>
<option value="1.5">1.5</option>
<option value="2">2</option>
<option value="2.5">2.5</option>
<option value="3">3</option>
<option value="3.5">3.5</option>

</select>

<input class="btn btn-primary" type="submit" value="ค้นหา">
<button class="btn btn-primary" onclick="location.href='reportapprove'" type="button">
ล้างค่า</button>


</form>
</div>


</div>    
                        <div class="table-responsive">
                            <table class="table" id="table_id">
                                <thead>
                                    <tr>
                                        <th>รหัสนักศึกษา</th><th>ชื่อ-สกุล</th><th>ชื่อหลักสูตร</th><th>เกรดเฉลี่ยรวม</th><th>สถานะ</th><th>หมายเหตุ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($report as $item)
                                    <tr>
                                        
                                        <td>{{ $item->student_id }}</td>
                                        <td>{{ $item->name }}</td>
                                      
                                        <td>{{ $item->course_name }}</td>

                                        <td>{{ $item->gpax }}</td>
                       

                                        
                                        <td><h5>@if(!empty($item->status))
                    <span class="btn @if($item->status=='จบการศึกษา') btn-sm btn-success @endif @if ($item->status=='รอยืนยันผลการศึกษา') btn-sm btn-warning @endif @if ($item->status=='ไม่ผ่านการตรวจสอบ') btn-sm btn-danger @endif  ">{{ $item->status }}</span>                    
                    
                    @else
                   
                    @endif
                    </h5>


                                        


                    <td>{{ $item->ps }}</td>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $report->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
<script>$(document).ready( function () {
    $('#table_id').DataTable();
} );</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
