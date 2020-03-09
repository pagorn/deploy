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
  
                
                <div class="dropdown show">
  <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  บันทึกเกรด
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="grade/create">บันทึกเกรดหมวดวิชาศึกษาทั่วไป/หมวดวิชาเฉพาะ</a>
    <a class="dropdown-item" href="create1">บันทึกเกรดหมวดเลือกเสรี</a>

  </div>


  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  ตรวจสอบเงื่อนไข
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header btn btn-primary ">
        <h5 class="modal-title" id="exampleModalLongTitle">ตรวจสอบเงื่อนไข</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      ตรวจสอบเงื่อนไขการสำเร็จการศึกษา<br>
1.นักศึกษาบันทึกเกรดตามหมวดรายวิชาให้ครบตามหลักสูตร และถูกต้องตามความเป็นจริง <br>
2.บันทึกเกรดเลือกเสรี นักศึกษากรอกรหัสวิชา ชื่อรายวิชา หน่วยกิตให้ถูกต้องตรงตามความเป็นจริง<br>
3.ในกรณีที่ต้องการโยกย้ายรายวิชาในหมวดวิชาเลือกเป็นหมวดวิชาเลือกเสรี นักศึกษาจะต้องลบรายวิชาดังกล่าว ก่อนเข้าบันทึกเกรดหมวดเลือกเสรี<br>
4.ยื่นเอกสารตรวจสอบจบ สำหรับนักศึกษาชั้นปีที่ 4 หรือนักศึกษาที่คาดว่าจะสำเร็จการศึกษาเท่านั้น นักศึกษาจะต้องตรวจสอบความถูกต้อง ว่าลงทะเบียนครบทุกรายวิชาตามหลักสูตร บันทึกเกรด และอื่นๆ ก่อนกดส่ง เนื่องจากระบบจะนำส่งผลการตรวจสอบให้กับเจ้าหน้าที่งานบริการศึกษาตรวจสอบต่อไป และไม่สามารถกลับมาแก้ไขได้<br>
5.Export Doc กรุณานำส่งเอกสารให้อาจารย์ที่ปรึกษาลงนาม<br>
6.เงื่อนไขการสำเร็จการศึกษามี 5 เงื่อนไข ได้แก่ <br>1)หน่วยกิตที่ลงทะเบียนครบตามหลักสูตร <br>2)เกรดเฉลี่ยรวม 2.00 ขึ้นไป<br> 3)เกรดเฉลี่ยเฉพาะหลักสูตร 2.00 ขึ้นไป <br>4)หน่วยกิตกิจกรรมทุกด้าน 60 ขึ้นไป  <br>5)ไม่มีหนี้สิน หรือไม่ติดหมวกกันน็อค ซึ่งอีก 2 เงื่อนไขหลัง นักศึกษาจะต้องตรวจสอบด้วยตนเอง<br>
      </div>
   
    </div>
  </div>
</div>




  <a href="report/create" class="btn btn-primary "  role="button" aria-pressed="true">ยื่นเอกสารเพื่อตรวจสอบ</a>
  <a href="grade/show" target="_blank" class="btn btn-primary " role="button" aria-pressed="true">Export Doc</a>

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
                    <div class="card-header">Create New report</div>
                    <div class="card-body">
                       
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif


                    <form method="POST" action="{{ url('/admin/report') }}"  accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" >
                            {{ csrf_field() }}


    

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




<div class="form-group">
    <input class="btn btn-primary" onclick="return confirm(&quot;เอกสารของท่านจะส่งไปยังเจ้าหน้าที่เพื่อตรวจสอบต่อไป&quot;)" value="ยื่นเอกสารเพื่อตรวจสอบ" type="submit" >
</div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
