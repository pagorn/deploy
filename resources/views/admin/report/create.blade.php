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
                    <div class="card-header">Create New report</div>
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








<div class="container">
    <div class="row">


            <div class="col">
                <div class="card">
                    <div class="card-header">   <h5>ผลการอนุมัติ</h5></div>
                    <div class="card-body">

    <div class="d-md-flex">
    <div> <p><strong>โครงสร้างหลักสูตร: </strong>{!! Auth::user()->course_id !!}</p></div>
    <div>  <p><strong> &nbsp;ชื่อหลักสูตร : </strong>{!! Auth::user()->course_name !!}</p></div></div>
    <div class="d-md-flex">
    <div> <p><strong>ชื่อ-สกุล : </strong>{!! Auth::user()->name !!}</p></div>
    <div>  <p><strong> &nbsp;รหัสนักศึกษา : </strong>{!! Auth::user()->student_id !!}</p></div></div>




    <div class="card">

   <div class="card-body">

      <h5 class="card-title ">การทดสอบคอมพิวเตอร์ของสำนักนวัตกรรมการเรียนการสอน</h5>

      <p class="card-text">        @foreach($user as $item)
    @if($item->status1 == 1)
        <form action="{{ route('completedUpdate1', $item->id) }}" method="POST">
            {{ csrf_field() }}
            <button type="submit" class="btn-sm btn-success" name="changeStatus" value="0">ผ่าน</button>
        </form>
    @else
        <form action="{{ route('completedUpdate1', $item->id) }}" method="POST">
            {{ csrf_field() }}
            <button type="submit" class="btn-sm btn-danger" name="changeStatus" value="1">ไม่ผ่าน</button>
        </form>
    @endif
    @endforeach</p>
    </div>
  </div>
  <div class="card">

    <div class="card-body">
      <h5 class="card-title">หน่วยกิจกรรมครบ 5 ด้าน 60 หน่วยกิจกรรม</h5>

      <p class="card-text">     @foreach($user as $item)
    @if($item->status2 == 1)
    <form action="{{ route('completedUpdate2', $item->id) }}" method="POST">
            {{ csrf_field() }}
            <button type="submit" class="btn-sm btn-success" name="changeStatus" value="0">ผ่าน</button>
        </form>
    @else
        <form action="{{ route('completedUpdate2', $item->id) }}" method="POST">
            {{ csrf_field() }}
            <button type="submit" class="btn-sm btn-danger" name="changeStatus" value="1">ไม่ผ่าน</button>
        </form>
    @endif
    @endforeach</p>
    </div>
  </div>
  <div class="card">

    <div class="card-body">
      <h5 class="card-title">ผ่านการทดสอบภาษาอังกฤษ</h5>

      <p class="card-text">   @foreach($user as $item)
    @if($item->status3 == 1)
    <form action="{{ route('completedUpdate3', $item->id) }}" method="POST">
            {{ csrf_field() }}
            <button type="submit" class="btn-sm btn-success" name="changeStatus" value="0">ผ่าน</button>
        </form>
    @else
        <form action="{{ route('completedUpdate3', $item->id) }}" method="POST">
            {{ csrf_field() }}
            <button type="submit" class="btn-sm btn-danger" name="changeStatus" value="1">ไม่ผ่าน</button>
        </form>
    @endif
    @endforeach</p>
    </div>









      </div>
                </div>
            </div>
        </div>
    </div> </div>

    <div class="container">
        <div class="row">


            <div class="col">
                <div class="card">



                    <div class="card-body">






  <div class="card-group">
  <div class="card">

    <div class="card-body ">

      <h5 class="card-title ">จำนวนหน่วยกิตรวมขั้นต่ำ: {{$credit_sum}}</h5>
      <p class="card-text">จำนวนหน่วยกิตที่ได้: {{ $sum_credit}} </p>
      <p class="card-text">       @foreach($course_detail as $item)
    @if(($credit_sum)>$sum_credit)
    <button type="button" class="btn btn-danger btn-sm">ไม่ผ่าน</button>
    @else
    <button type="button" class="btn btn-success btn-sm">ผ่าน</button>
    @endif
    @endforeach</p>
    </div>
  </div>
  <div class="card">

    <div class="card-body">
      <h5 class="card-title">เกรดเฉลี่ยรวมไม่ต่ำกว่า: 2.00</h5>
      <p class="card-text">เกรดเฉลี่ยรวมที่ได้: {{ number_format($sum_gpa, 2)}}</p>
      <p class="card-text">     @foreach($course_detail as $item)
    @if(($sum_gpa)<2)
    <button type="button" class="btn btn-danger btn-sm">ไม่ผ่าน</button>
    @else
    <button type="button" class="btn btn-success btn-sm">ผ่าน</button>
    @endif
    @endforeach</p>
    </div>
  </div>
  <div class="card">

    <div class="card-body">
      <h5 class="card-title">เกรดเฉลี่ยเฉพาะหลักสูตรไม่ต่ำกว่า: 2.00</h5>
      <p class="card-text">เกรดเฉลี่ยเฉพาะหลักสูตรที่ได้: {{ number_format($sum_gpa_1, 2)}} </p>
      <p class="card-text">     @foreach($course_detail as $item)
    @if(($sum_gpa_1)<2)
    <button type="button" class="btn btn-danger btn-sm">ไม่ผ่าน</button>
    @else
    <button type="button" class="btn btn-success btn-sm">ผ่าน</button>
    @endif
    @endforeach</p>
    </div>
  </div>
</div>




  <div class="table-responsive">
                        <table  class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>โครงสร้างหลักสูตร</th><th>หน่วยกิตตามเกณฑ์</th><th>หน่วยกิตที่ลงทะเบียน</th><th>หน่วยกิตที่ผ่าน</th><th>หน่วยกิตที่ยังขาด</th><th>GPA</th><th>เงื่อนไข</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>

                                        <td><b>1. หมวดวิชาศึกษาทั่วไป</b></td>
                                        <td>{{$credit1}} </td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>


                                        <td>{{ number_format($gpa_1, 2)}}</td>


                                        <td>
                                        @foreach($course_detail as $item)
    @if(($count_credit_1)<12 or ($count_credit_2)<9 or ($count_credit_3)<9)
    <button type="button" class="btn btn-danger btn-sm">ไม่ผ่าน</button>
    @else
    <button type="button" class="btn btn-success btn-sm">ผ่าน</button>
    @endif
    @endforeach

                                        </td>

                                    </tr>






                                    <tr>

                                        <td>1.1 กลุ่มวิชาภาษา</td>
                                        <td>{{$credit4}}</td>
                                        <td>{{ $count_credit_sum1 }}</td>
                                        <td>{{ $count_credit_1 }}</td>
                                        <td>

                                        @if(($count_credit_1)<$credit4)
    <button type="button" class="btn btn-danger btn-sm">{{$credit4-($count_credit_1)}}</button>
    @else
    <button type="button" class="btn btn-success btn-sm">ผ่าน</button>
    @endif


                                        </td>


                                        <td>{{ number_format($gpa_credit_1, 2)}}</td>


                                        <td>
                                        @foreach($course_detail as $item)
    @if(($count_credit_1)<$credit4)
    <button type="button" class="btn btn-danger btn-sm">ไม่ผ่าน</button>
    @else
    <button type="button" class="btn btn-success btn-sm">ผ่าน</button>
    @endif
    @endforeach

                                        </td>

                                    </tr>


                                    <tr>

                                        <td>1.2 กลุ่มวิชามนุษยศาสตร์และสังคมศาสตร์</td>
                                        <td>{{$credit5}}</td>
                                        <td>{{ $count_credit_sum2 }}</td>
                                        <td>{{ $count_credit_2 }}</td>
                                        <td>
                                        @if(($count_credit_2)<$credit5)
    <button type="button" class="btn btn-danger btn-sm">{{$credit5-($count_credit_2)}}</button>
    @else
    <button type="button" class="btn btn-success btn-sm">ผ่าน</button>
    @endif



                                        </td>


                                        <td>{{ number_format($gpa_credit_2, 2)}}</td>


                                        <td>
                                        @foreach($course_detail as $item)
    @if(($count_credit_2)<$credit5)
    <button type="button" class="btn btn-danger btn-sm">ไม่ผ่าน</button>
    @else
    <button type="button" class="btn btn-success btn-sm">ผ่าน</button>
    @endif
    @endforeach

                                        </td>

                                    </tr>



                                    <tr>

                                        <td>1.3 กลุ่มคณิตศาสตร์และวิทยาศาสตร์</td>
                                        <td>{{$credit6}}</td>
                                        <td>{{ $count_credit_sum3 }}</td>
                                        <td>{{ $count_credit_3 }}</td>
                                        <td>
                                        @if(($count_credit_3)<$credit6)
    <button type="button" class="btn btn-danger btn-sm">{{$credit6-($count_credit_3)}}</button>
    @else
    <button type="button" class="btn btn-success btn-sm">ผ่าน</button>
    @endif



                                        </td>


                                        <td>{{ number_format($gpa_credit_3, 2)}}</td>


                                        <td>
                                        @foreach($course_detail as $item)
    @if(($count_credit_3)<$credit6)
    <button type="button" class="btn btn-danger btn-sm">ไม่ผ่าน</button>
    @else
    <button type="button" class="btn btn-success btn-sm">ผ่าน</button>
    @endif
    @endforeach

                                        </td>

                                    </tr>




                                    <tr>

                                        <td><b>2. หมวดวิชาเฉพาะ</b></td>
                                        <td>{{$credit2}} </td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>


                                        <td>{{ number_format($gpa_2, 2)}}</td>


                                        <td>
                                        @foreach($course_detail as $item)
    @if(($count_credit_4)<36 or ($count_credit_6)<46 or ($count_credit_7)<15)
    <button type="button" class="btn btn-danger btn-sm">ไม่ผ่าน</button>
    @else
    <button type="button" class="btn btn-success btn-sm">ผ่าน</button>
    @endif
    @endforeach

                                        </td>

                                    </tr>


                                    <tr>
                                    <td>2.1 กลุ่มวิชาพื้นฐาน</td>
                                        <td>{{$credit7}}</td>
                                        <td>{{ $count_credit_sum4 }}</td>
                                        <td>{{ $count_credit_4 }}</td>
                                        <td>

                                        @if(($count_credit_4)<$credit7)
    <button type="button" class="btn btn-danger btn-sm">{{$credit7-($count_credit_4)}}</button>
    @else
    <button type="button" class="btn btn-success btn-sm">ผ่าน</button>
    @endif


                                        </td>


                                        <td>{{ number_format($gpa_credit_4, 2)}}</td>


                                        <td>
                                        @foreach($course_detail as $item)
    @if(($count_credit_4)<$credit7)
    <button type="button" class="btn btn-danger btn-sm">ไม่ผ่าน</button>
    @else
    <button type="button" class="btn btn-success btn-sm">ผ่าน</button>
    @endif
    @endforeach

                                        </td>

                                    </tr>






                                    <tr>
                                    <td>2.2 กลุ่มวิชาบังคับ</td>
                                        <td>{{$credit8}}</td>
                                        <td>{{ $count_credit_sum6 }}</td>
                                        <td>{{ $count_credit_6 }}</td>
                                        <td>

                                        @if(($count_credit_6)<$credit8)
    <button type="button" class="btn btn-danger btn-sm">{{$credit8-($count_credit_6)}}</button>
    @else
    <button type="button" class="btn btn-success btn-sm">ผ่าน</button>
    @endif

                                        </td>


                                        <td>{{ number_format($gpa_credit_6, 2)}}</td>


                                        <td>
                                        @foreach($course_detail as $item)
    @if(($count_credit_6)<$credit8)
    <button type="button" class="btn btn-danger btn-sm">ไม่ผ่าน</button>
    @else
    <button type="button" class="btn btn-success btn-sm">ผ่าน</button>
    @endif
    @endforeach

                                        </td>

                                    </tr>


                                    <tr>
                                    <td>2.3 กลุ่มวิชาเลือก</td>
                                        <td>{{$credit9}}</td>
                                        <td>{{ $count_credit_sum7 }}</td>
                                        <td>{{ $count_credit_7 }}</td>
                                        <td>

                                        @if(($count_credit_7)<$credit9)
    <button type="button" class="btn btn-danger btn-sm">{{$credit9-($count_credit_7)}}</button>
    @else
    <button type="button" class="btn btn-success btn-sm">ผ่าน</button>
    @endif


                                        </td>


                                        <td>{{ number_format($gpa_credit_7, 2)}}</td>


                                        <td>
                                        @foreach($course_detail as $item)
    @if(($count_credit_7)<$credit9)
    <button type="button" class="btn btn-danger btn-sm">ไม่ผ่าน</button>
    @else
    <button type="button" class="btn btn-success btn-sm">ผ่าน</button>
    @endif
    @endforeach

                                        </td>

                                    </tr>




                                    <tr>
                                    <td><b>3. หมวดเลือกเสรี</b></td>
                                        <td>{{$credit3}}</td>
                                        <td>{{ $count_credit_sum8 }}</td>
                                        <td>{{ $count_credit_8 }}</td>
                                        <td>

                                        @if(($count_credit_8)<$credit3)
    <button type="button" class="btn btn-danger btn-sm">{{$credit3-($count_credit_8)}}</button>
    @else
    <button type="button" class="btn btn-success btn-sm">ผ่าน</button>
    @endif

                                        </td>


                                        <td>{{ number_format($gpa_credit_8, 2)}}</td>


                                        <td>
                                        @foreach($course_detail as $item)
    @if(($count_credit_8)<$credit3)
    <button type="button" class="btn btn-danger btn-sm">ไม่ผ่าน</button>
    @else
    <button type="button" class="btn btn-success btn-sm">ผ่าน</button>
    @endif
    @endforeach

                                        </td>

                                    </tr>
                                </tbody>
                            </table>



                            <div class="pagination-wrapper"> {!! $grade->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

</div>



<form method="POST" action="{{ url('/admin/report') }}"  accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" >
                            {{ csrf_field() }}



                            <div style="display: none;">
                            <div class="form-group {{ $errors->has('student_id') ? 'has-error' : ''}}">
    <label for="student_id" class="control-label">{{ 'รหัสนักศึกษา' }}</label>
    <input readonly class="form-control" name="student_id" type="text" id="student_id" value="{{ Auth::user()->student_id}}" >
    {!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'ชื่อ-สกุล' }}</label>
    <input readonly class="form-control" name="name" type="text" id="name" value="{{Auth::user()->name}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('course_id') ? 'has-error' : ''}}">
    <label for="course_id" class="control-label">{{ 'รหัสหลักสูตร' }}</label>
    <input readonly class="form-control" name="course_id" type="text" id="course_id" value="{{Auth::user()->course_id}}" >
    {!! $errors->first('course_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('course_name') ? 'has-error' : ''}}">
    <label for="course_name" class="control-label">{{ 'ชื่อหลักสูตร' }}</label>
    <input readonly class="form-control" name="course_name" type="text" id="course_name" value="{{Auth::user()->course_name}}" >
    {!! $errors->first('course_name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('sum_credit') ? 'has-error' : ''}}">
    <label for="sum_credit" class="control-label">{{ 'จำนวนหน่วยกิตรวมขั้นต่ำ' }}</label>
    <input readonly class="form-control" name="sum_credit" type="text" id="sum_credit" value="{{ $sum_credit}}" >
    {!! $errors->first('sum_credit', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('gpax') ? 'has-error' : ''}}">
    <label for="gpax" class="control-label">{{ 'เกรดเฉลี่ยรวมไม่ต่ำกว่า: 2.00' }}</label>
    <input readonly class="form-control" name="gpax" type="text" id="gpax" value="{{ number_format($sum_gpa, 2)}}" >
    {!! $errors->first('gpax', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('sum_gpa_1') ? 'has-error' : ''}}">
    <label for="sum_gpa_1" class="control-label">{{ 'เกรดเฉลี่ยเฉพาะหลักสูตรไม่ต่ำกว่า: 2.00' }}</label>
    <input readonly class="form-control" name="sum_gpa_1" type="text" id="sum_gpa_1" value="{{ number_format($sum_gpa_1, 2)}}" >
    {!! $errors->first('sum_gpa_1', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('gpa_1') ? 'has-error' : ''}}">
    <label for="gpa_1" class="control-label">{{ 'เกรดเฉลี่ยหมวดวิชาศึกษาทั่วไป' }}</label>
    <input readonly class="form-control" name="gpa_1" type="text" id="gpa_1" value="{{ number_format($gpa_1, 2)}}" >
    {!! $errors->first('gpa_1', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('gpa_2') ? 'has-error' : ''}}">
    <label for="gpa_2" class="control-label">{{ 'เกรดเฉลี่ยหมวดวิชาเฉพาะ' }}</label>
    <input readonly class="form-control" name="gpa_2" type="text" id="gpa_2" value="{{ number_format($gpa_2, 2)}}" >
    {!! $errors->first('gpa_1', '<p class="help-block">:message</p>') !!}
</div>





<div class="form-group {{ $errors->has('count_credit_1') ? 'has-error' : ''}}">
    <label for="count_credit_1" class="control-label">{{ 'หน่วยกิตรวมกลุ่มวิชาภาษา' }}</label>
    <input readonly class="form-control" name="count_credit_1" type="text" id="count_credit_1" value="{{$count_credit_1}}" >
    {!! $errors->first('count_credit_1', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('count_credit_2') ? 'has-error' : ''}}">
    <label for="count_credit_2" class="control-label">{{ 'หน่วยกิตรวมกลุ่มวิชามนุษยศาสตร์และสังคมศาสตร์' }}</label>
    <input readonly class="form-control" name="count_credit_2" type="text" id="count_credit_2" value="{{$count_credit_2}}" >
    {!! $errors->first('count_credit_2', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('count_credit_3') ? 'has-error' : ''}}">
    <label for="count_credit_3" class="control-label">{{ 'หน่วยกิตรวมกลุ่มวิชามนุษยศาสตร์และสังคมศาสตร์' }}</label>
    <input readonly class="form-control" name="count_credit_3" type="text" id="count_credit_3" value="{{$count_credit_3}}" >
    {!! $errors->first('count_credit_3', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('count_credit_4') ? 'has-error' : ''}}">
    <label for="count_credit_4" class="control-label">{{ 'หน่วยกิตรวมกลุ่มคณิตศาสตร์และวิทยาศาสตร์' }}</label>
    <input readonly class="form-control" name="count_credit_4" type="text" id="count_credit_4" value="{{$count_credit_4}}" >
    {!! $errors->first('count_credit_4', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group {{ $errors->has('count_credit_6') ? 'has-error' : ''}}">
    <label for="count_credit_6" class="control-label">{{ 'หน่วยกิตรวมกลุ่มวิชาบังคับ' }}</label>
    <input readonly class="form-control" name="count_credit_6" type="text" id="count_credit_6" value="{{$count_credit_6}}" >
    {!! $errors->first('count_credit_6', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('count_credit_7') ? 'has-error' : ''}}">
    <label for="count_credit_7" class="control-label">{{ 'หน่วยกิตรวมกลุ่มวิชามนุษยศาสตร์และสังคมศาสตร์' }}</label>
    <input readonly class="form-control" name="count_credit_7" type="text" id="count_credit_7" value="{{$count_credit_7}}" >
    {!! $errors->first('count_credit_7', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('count_credit_8') ? 'has-error' : ''}}">
    <label for="count_credit_8" class="control-label">{{ 'หน่วยกิตรวมกลุ่มวิชาเลือก' }}</label>
    <input readonly class="form-control" name="count_credit_8" type="text" id="count_credit_8" value="{{$count_credit_8}}" >
    {!! $errors->first('count_credit_8', '<p class="help-block">:message</p>') !!}
</div>




<div class="form-group {{ $errors->has('gpa_credit_1') ? 'has-error' : ''}}">
    <label for="gpa_credit_1" class="control-label">{{ 'เกรดเฉลี่ยรวมกลุ่มวิชาภาษา' }}</label>
    <input readonly class="form-control" name="gpa_credit_1" type="text" id="gpa_credit_1" value="{{ number_format($gpa_credit_1, 2)}}" >
    {!! $errors->first('gpa_credit_1', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('gpa_credit_2') ? 'has-error' : ''}}">
    <label for="gpa_credit_2" class="control-label">{{ 'เกรดเฉลี่ยรวมกลุ่มวิชามนุษยศาสตร์และสังคมศาสตร์' }}</label>
    <input readonly class="form-control" name="gpa_credit_2" type="text" id="gpa_credit_2" value="{{ number_format($gpa_credit_2, 2)}}" >
    {!! $errors->first('gpa_credit_2', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('gpa_credit_3') ? 'has-error' : ''}}">
    <label for="gpa_credit_3" class="control-label">{{ 'เกรดเฉลี่ยรวมกลุ่มวิชามนุษยศาสตร์และสังคมศาสตร์' }}</label>
    <input readonly class="form-control" name="gpa_credit_3" type="text" id="gpa_credit_3" value="{{ number_format($gpa_credit_3, 2)}}" >
    {!! $errors->first('gpa_credit_3', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('gpa_credit_4') ? 'has-error' : ''}}">
    <label for="gpa_credit_4" class="control-label">{{ 'เกรดเฉลี่ยรวมกลุ่มคณิตศาสตร์และวิทยาศาสตร์' }}</label>
    <input readonly class="form-control" name="gpa_credit_4" type="text" id="gpa_credit_4" value="{{ number_format($gpa_credit_4, 2)}}" >
    {!! $errors->first('gpa_credit_4', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group {{ $errors->has('gpa_credit_6') ? 'has-error' : ''}}">
    <label for="gpa_credit_6" class="control-label">{{ 'เกรดเฉลี่ยรวมกลุ่มวิชาบังคับ' }}</label>
    <input readonly class="form-control" name="gpa_credit_6" type="text" id="gpa_credit_6" value="{{ number_format($gpa_credit_6, 2)}}" >
    {!! $errors->first('gpa_credit_6', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('gpa_credit_7') ? 'has-error' : ''}}">
    <label for="gpa_credit_7" class="control-label">{{ 'เกรดเฉลี่ยรวมกลุ่มวิชามนุษยศาสตร์และสังคมศาสตร์' }}</label>
    <input readonly class="form-control" name="gpa_credit_7" type="text" id="gpa_credit_7" value="{{ number_format($gpa_credit_7, 2)}}" >
    {!! $errors->first('gpa_credit_7', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('gpa_credit_8') ? 'has-error' : ''}}">
    <label for="gpa_credit_8" class="control-label">{{ 'เกรดเฉลี่ยรวมกลุ่มวิชาเลือก' }}</label>
    <input readonly class="form-control" name="gpa_credit_8" type="text" id="gpa_credit_8" value="{{ number_format($gpa_credit_8, 2)}}" >
    {!! $errors->first('gpa_credit_8', '<p class="help-block">:message</p>') !!}
</div>
</div>
<br>

<div class="form-group">
    <input class="btn btn-primary" onclick="return confirm(&quot;เอกสารของท่านจะส่งไปยังเจ้าหน้าที่เพื่อตรวจสอบต่อไป&quot;)" value="ส่งข้อมูลเพื่อตรวจสอบ" type="submit" >
</div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
