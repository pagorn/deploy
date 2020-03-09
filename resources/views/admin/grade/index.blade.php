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
  กรณีเปลี่ยนวิชาเลือกเป็นเลือกเสรี
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header btn btn-primary ">
        <h5 class="modal-title" id="exampleModalLongTitle">กรณีเปลี่ยนวิชาเลือกเป็นเลือกเสรี</h5>
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

@foreach($report as $item)
@if(!empty($item->student_id==$student_id))
             @else
             <a href="report/create" class="btn btn-primary "  role="button" aria-pressed="true">ส่งข้อมูลเพื่อตรวจสอบ</a>

                    @endif
                    @endforeach

                    @foreach($report as $item)

@if(!empty($item->edit1==1))
<a href="{{$edit_id}}/edit1" class="btn btn-primary "  role="button" aria-pressed="true">ปรับปรุงข้อมูลเพื่อตรวจสอบ</a>
                    @else

                    @endif
                    @endforeach


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
                    <div class="card-header">   <h5>ผลการอนุมัติ</h5></div>
                    <div class="card-body">

    <div class="d-md-flex">
    <div> <p><strong>โครงสร้างหลักสูตร: </strong>{!! Auth::user()->course_id !!}</p></div>
    <div>  <p><strong> &nbsp;ชื่อหลักสูตร : </strong>{!! Auth::user()->course_name !!}</p></div></div>
    <div class="d-md-flex">
    <div> <p><strong>ชื่อ-สกุล : </strong>{!! Auth::user()->name !!}</p></div>
    <div>  <p><strong> &nbsp;รหัสนักศึกษา : </strong>{!! Auth::user()->student_id !!}</p></div></div>




<p><b>คำชี้แจ้ง:</b> คลิกเพื่อเปลี่ยนสถานะ การทดสอบคอมพิวเตอร์ของสำนักนวัตกรรมการเรียนการสอน, หน่วยกิจกรรมครบ 5 ด้าน 60 หน่วยกิจกรรม, ผ่านการทดสอบภาษาอังกฤษ</p>

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









    <div class="container">
        <div class="row">


            <div class="col">
                <div class="card">
                    <div class="card-header"><h5>หมวดวิชาศึกษาทั่วไป กลุ่มวิชาภาษา <b>หน่วยกิตที่ลงทะเบียน {{ $count_credit_sum1}} หน่วยกิต GPA {{ number_format($gpa_credit_1, 2)}}</h5></div>
                    <div class="card-body">




                        <br/>
                        <div class="table-responsive">
                        <table  class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>เกรดที่ได้</th><th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($grade as $item)
                                    <tr>

                                        <td>{{ $item->subject_id }}</td>
                                        <td>{{ $item->subject_name }}</td>
                                        <td>{{ $item->subject_credit }}</td>
                                        <td>
                                        @if(($item->grade1)=="0")
                    F
                    @elseif(($item->grade1)=="S")
                    S

                    @elseif(($item->grade1)=="U")
                    U

                    @elseif(($item->grade1)=="W")
                    W
                    @else
                    <span>{{ $item->grade1}}</span>


                    @endif</td>


                                        <td>

                                            <a href="{{ url('/admin/grade/' . $item->id . '/edit') }}" title="Edit grade"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</button></a>

                                            <form method="POST" action="{{ url('/admin/grade' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete grade" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> ลบ</button>
                                            </form>


                                        </td>

                                    </tr>

                                @endforeach

                                </tbody>
                            </table>



                            <div class="pagination-wrapper"> {!! $grade->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="container">
        <div class="row">


            <div class="col">
                <div class="card">
                    <div class="card-header"><h5>หมวดวิชาศึกษาทั่วไป กลุ่มวิชามนุษยศาสตร์และสังคมศาสตร์ <b>หน่วยกิตที่ลงทะเบียน {{ $count_credit_sum2}} หน่วยกิต GPA {{ number_format($gpa_credit_2, 2)}}</h5></div>
                    <div class="card-body">





                        <br/>
                        <div class="table-responsive">
                        <table  class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>เกรดที่ได้</th><th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($grade_2 as $item)
                                    <tr>

                                        <td>{{ $item->subject_id }}</td>
                                        <td>{{ $item->subject_name }}</td>
                                        <td>{{ $item->subject_credit }}</td>

                                        <td>
                                        @if(($item->grade1)=="0")
                    F
                    @elseif(($item->grade1)=="S")
                    S

                    @elseif(($item->grade1)=="U")
                    U

                    @elseif(($item->grade1)=="W")
                    W
                    @else
                    <span>{{ $item->grade1}}</span>
                    @endif</td>


                                        <td>

                                            <a href="{{ url('/admin/grade/' . $item->id . '/edit') }}" title="Edit grade"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</button></a>

                                            <form method="POST" action="{{ url('/admin/grade' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete grade" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> ลบ</button>
                                            </form>


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>



                            <div class="pagination-wrapper"> {!! $grade->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>






    <div class="container">
        <div class="row">


            <div class="col">
                <div class="card">
                    <div class="card-header"><h5>หมวดวิชาศึกษาทั่วไป กลุ่มคณิตศาสตร์และวิทยาศาสตร์ <b>หน่วยกิตที่ลงทะเบียน {{ $count_credit_sum3}} หน่วยกิต GPA {{ number_format($gpa_credit_3, 2)}}</h5></div>
                    <div class="card-body">





                        <br/>
                        <div class="table-responsive">
                        <table  class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>เกรดที่ได้</th><th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($grade_3 as $item)
                                    <tr>

                                        <td>{{ $item->subject_id }}</td>
                                        <td>{{ $item->subject_name }}</td>
                                        <td>{{ $item->subject_credit }}</td>

                                        <td>
                                        @if(($item->grade1)=="0")
                    F
                    @elseif(($item->grade1)=="S")
                    S

                    @elseif(($item->grade1)=="U")
                    U

                    @elseif(($item->grade1)=="W")
                    W
                    @else
                    <span>{{ $item->grade1}}</span>
                    @endif</td>

                                        <td>

                                            <a href="{{ url('/admin/grade/' . $item->id . '/edit') }}" title="Edit grade"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</button></a>

                                            <form method="POST" action="{{ url('/admin/grade' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete grade" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> ลบ</button>
                                            </form>


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>



                            <div class="pagination-wrapper"> {!! $grade->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>






    <div class="container">
        <div class="row">


            <div class="col">
                <div class="card">
                    <div class="card-header"><h5>หมวดวิชาเฉพาะ กลุ่มวิชาพื้นฐาน <b>หน่วยกิตที่ลงทะเบียน {{ $count_credit_sum4}} หน่วยกิต GPA {{ number_format($gpa_credit_4, 2)}}</h5></div>
                    <div class="card-body">





                        <br/>
                        <div class="table-responsive">
                        <table  class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>เกรดที่ได้</th><th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($grade_4 as $item)
                                    <tr>

                                        <td>{{ $item->subject_id }}</td>
                                        <td>{{ $item->subject_name }}</td>
                                        <td>{{ $item->subject_credit }}</td>
                                        <td>
                                        @if(($item->grade1)=="0")
                    F
                    @elseif(($item->grade1)=="S")
                    S

                    @elseif(($item->grade1)=="U")
                    U

                    @elseif(($item->grade1)=="W")
                    W
                    @else
                    <span>{{ $item->grade1}}</span>
                    @endif</td>

                                        <td>

                                            <a href="{{ url('/admin/grade/' . $item->id . '/edit') }}" title="Edit grade"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</button></a>

                                            <form method="POST" action="{{ url('/admin/grade' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete grade" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> ลบ</button>
                                            </form>


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>



                            <div class="pagination-wrapper"> {!! $grade->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>







    <div class="container">
        <div class="row">


            <div class="col">
                <div class="card">
                    <div class="card-header"><h5>หมวดวิชาเฉพาะ กลุ่มวิชาบังคับ <b>หน่วยกิตที่ลงทะเบียน {{ $count_credit_sum6}} หน่วยกิต GPA {{ number_format($gpa_credit_6, 2)}}</h5></div>
                    <div class="card-body">





                        <br/>
                        <div class="table-responsive">
                        <table  class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>เกรดที่ได้</th><th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($grade_5 as $item)
                                    <tr>

                                        <td>{{ $item->subject_id }}</td>
                                        <td>{{ $item->subject_name }}</td>
                                        <td>{{ $item->subject_credit }}</td>

                                        <td>
                                        @if(($item->grade1)=="0")
                    F
                    @elseif(($item->grade1)=="S")
                    S

                    @elseif(($item->grade1)=="U")
                    U

                    @elseif(($item->grade1)=="W")
                    W
                    @else
                    <span>{{ $item->grade1}}</span>
                    @endif</td>

                                        <td>

                                            <a href="{{ url('/admin/grade/' . $item->id . '/edit') }}" title="Edit grade"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</button></a>

                                            <form method="POST" action="{{ url('/admin/grade' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete grade" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> ลบ</button>
                                            </form>


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>



                            <div class="pagination-wrapper"> {!! $grade->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="container">
        <div class="row">


            <div class="col">
                <div class="card">
                    <div class="card-header"><h5>หมวดวิชาเฉพาะ กลุ่มวิชาเลือก <b>หน่วยกิตที่ลงทะเบียน {{ $count_credit_sum7}} หน่วยกิต GPA {{ number_format($gpa_credit_7, 2)}}</h5></div>
                    <div class="card-body">





                        <br/>
                        <div class="table-responsive">
                        <table  class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>เกรดที่ได้</th><th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($grade_6 as $item)
                                    <tr>

                                        <td>{{ $item->subject_id }}</td>
                                        <td>{{ $item->subject_name }}</td>
                                        <td>{{ $item->subject_credit }}</td>

                                        <td>
                                        @if(($item->grade1)=="0")
                    F
                    @elseif(($item->grade1)=="S")
                    S

                    @elseif(($item->grade1)=="U")
                    U

                    @elseif(($item->grade1)=="W")
                    W
                    @else
                    <span>{{ $item->grade1}}</span>
                    @endif</td>

                                        <td>

                                            <a href="{{ url('/admin/grade/' . $item->id . '/edit') }}" title="Edit grade"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</button></a>

                                            <form method="POST" action="{{ url('/admin/grade' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete grade" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> ลบ</button>
                                            </form>


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>



                            <div class="pagination-wrapper"> {!! $grade->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="container">
        <div class="row">


            <div class="col">
                <div class="card">
                    <div class="card-header"><h5>หมวดวิชาเลือกเสรี <b>หน่วยกิตที่ลงทะเบียน {{ $count_credit_sum8}} หน่วยกิต GPA {{ number_format($gpa_credit_8, 2)}}</h5></div>
                    <div class="card-body">





                        <br/>
                        <div class="table-responsive">
                        <table  class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>เกรดที่ได้</th><th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($grade_7 as $item)
                                    <tr>

                                        <td>{{ $item->subject_id }}</td>
                                        <td>{{ $item->subject_name }}</td>
                                        <td>{{ $item->subject_credit }}</td>

                                        <td>
                                        @if(($item->grade1)=="0")
                    F
                    @elseif(($item->grade1)=="S")
                    S

                    @elseif(($item->grade1)=="U")
                    U

                    @elseif(($item->grade1)=="W")
                    W
                    @else
                    <span>{{ $item->grade1}}</span>
                    @endif</td>

                                        <td>

                                            <a href="{{ url('/admin/grade/' . $item->id . '/edit') }}" title="Edit grade"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</button></a>

                                            <form method="POST" action="{{ url('/admin/grade' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete grade" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> ลบ</button>
                                            </form>


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>



                            <div class="pagination-wrapper"> {!! $grade->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
