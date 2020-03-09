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
                <a class="navbar-brand" href="{{ url('/admin/grade') }}">
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

         
                    <div class="card-header">Create New grade</div>
                    
                    <div class="card-body">

  

                        <a href="{{ url('/admin/grade') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/grade') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                       
                            {{ csrf_field() }}
                            <div class="d-md-flex"> 
                            <div class="form-group {{ $errors->has('student_id') ? 'has-error' : ''}}">
    <label for="student_id" class="control-label">{{ 'รหัสนักศึกษา' }}</label>
    <input readonly class="form-control" name="student_id" type="text" id="student_id" value="{{ Auth::user()->student_id }}" >
    {!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}
</div>






<div class="form-group {{ $errors->has('department_id') ? 'has-error' : ''}}">
    <label for="department_id" hidden class="control-label">{{ 'รหัสสาขาวิชา' }}</label>
    <input readonly hidden class="form-control" name="department_id" type="text" id="department_id" value="1" >
    {!! $errors->first('department_id', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group {{ $errors->has('course_id') ? 'has-error' : ''}}">
    <label for="course_id" class="control-label">{{ 'รหัสหลักสูตร' }}</label>
    <input readonly class="form-control" name="course_id" type="text" id="course_id" value="{!! Auth::user()->course_id !!}" >
    {!! $errors->first('course_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('course_name') ? 'has-error' : ''}}">
    <label for="course_name" class="control-label">{{ 'ชื่อหลักสูตร' }}</label>
    <input readonly class="form-control" name="course_name" type="text" id="course_name" value="{!! Auth::user()->course_name !!}" >
    {!! $errors->first('course_name', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('group_id') ? 'has-error' : ''}}">
    <label for="group_id" class="control-label">{{ 'รหัสกลุ่มวิชา' }}</label>
    <input readonly class="form-control" name="group_id" type="text" id="group_id" value="204" >
    {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="control-label">{{ 'รหัสหมวดวิชา' }}</label>
    <input readonly class="form-control" name="category_id" type="text" id="category_id" value="3" >
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>

</div>


<div class="form-group {{ $errors->has('subject_id') ? 'has-error' : ''}}">
    <label for="subject_id" class="control-label">{{ 'รหัสรายวิชา' }}</label>
    <input  class="form-control" name="subject_id" type="text" id="subject_id" value="{{ isset($grade->subject_id) ? $grade->subject_id : ''}}" >
    {!! $errors->first('subject_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('subject_name') ? 'has-error' : ''}}">
    <label for="subject_name" class="control-label">{{ 'ชื่อรายวิชา' }}</label>
    <input  class="form-control" name="subject_name" type="text" id="subject_name" value="{{ isset($grade->subject_name) ? $grade->subject_name : ''}}" >
    {!! $errors->first('subject_name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('subject_credit') ? 'has-error' : ''}}">
    <label for="subject_credit" class="control-label">{{ 'หน่วยกิต' }}</label>
    <input  class="form-control" name="subject_credit" type="text" id="subject_credit" value="{{ isset($grade->subject_credit) ? $grade->subject_credit : ''}}" >
    {!! $errors->first('subject_credit', '<p class="help-block">:message</p>') !!}
</div>



<label for="grade1" class="control-label">{{ 'เกรดรายวิชา' }}</label>
<div class="form-group {{ $errors->has('grade1') ? 'has-error' : ''}}">
    
    <select name="grade1" placeholder="หลักสูตร" class="form-control" id="grade1" >
    <option value="4">A</option>
   <option value="3.5">B+</option>
   <option value="3">B</option>
   <option value="2.5">C+</option>
   <option value="2">C</option>
   <option value="1.5">D+</option>
   <option value="1">D</option>
   <option value="0">F</option>
   <option value="S">S</option>
   <option value="U">U</option>

</select>
    {!! $errors->first('faculty', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" >
</div>


                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
