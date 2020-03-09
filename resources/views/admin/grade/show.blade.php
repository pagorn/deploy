
<html>
<head>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Sarabun:300&display=swap">
    <style>
      body {
        font-family: 'Sarabun';
        font-size: 16px;
      }
    </style>

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Graduation Completed Status Checking System</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   

</head>
<body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://www.jqueryscript.net/demo/Export-Html-To-Word-Document-With-Images-Using-jQuery-Word-Export-Plugin/FileSaver.js"></script>



<center><a class="word-export" href="javascript:void(0)"> <button type="button" class="btn btn-primary btn-lg">ดาวน์โหลดไฟล์ Word</button></a></center>
<script src="https://www.jqueryscript.net/demo/Export-Html-To-Word-Document-With-Images-Using-jQuery-Word-Export-Plugin/jquery.wordexport.js"></script> 
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $("a.word-export").click(function(event) {
            $("#page-content").wordExport();
        });
    });
    </script>
<div id="page-content">


<center><h3>แบบฟอร์มตรวจสอบการสำเร็จการศึกษา<br>
วิทยาศาสตรบัณฑิต สาขาวิชา {!! Auth::user()->course_name !!}  (ตั้งแต่รหัสขึ้นต้นด้วย 60 เป็นต้นไป)</h3></center>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspข้าพเจ้า  นาย/นาง/นางสาว……{{$name}}………รหัสประจำตัว………{{$student_id }}……<br>
คาดว่าจะได้รับปริญญาวิทยาศาสตรบัณฑิต  สาขาวิชา {!! Auth::user()->course_name !!} เกียรตินิยมอันดับ…………<br>
ภาคการศึกษา    ต้น     ปลาย      ฤดูร้อน      ปีการศึกษา………………………<br>
ขอยื่นแบบฟอร์มแสดงรายละเอียดการศึกษารายวิชาที่ได้เรียนมาทั้งหมด  ไม่น้อยกว่า {{$credit_sum}} หน่วยกิต  ต่องานทะเบียนและประมวลผลการศึกษา  ดังต่อไปนี้คือ.—<br><br>

<table style="width: 100.0201093951094%;" border="1">
<tbody>
<tr>
<td style="width: 33%;">
<div>
<div> <center>การทดสอบคอมพิวเตอร์ของสำนักนวัตกรรมการเรียนการสอน</div>
</div>
</td>
<td style="width: 33%;">
<div>
<div> <center>หน่วยกิจกรรมครบ 5 ด้าน 60 หน่วยกิจกรรม</div>
</div>
</td>
<td style="width: 33%;">
<div>
<div> <center>ผ่านการทดสอบภาษาอังกฤษ</div>
</div>
</td>
</tr>
<tr>
<td style="width: 33%;">@foreach($user as $item)   
    @if($item->status1 == 1) 
   <center> <b>ผ่าน</b>               
    @else
    <b>ไม่ผ่าน</b>       </center>                                          
    @endif
    @endforeach</td>
<td style="width: 33%;">@foreach($user as $item)   
    @if($item->status2 == 1) 
   <center> <b>ผ่าน</b>               
    @else
    <b>ไม่ผ่าน</b>       </center>                                          
    @endif
    @endforeach</td>
<td style="width: 33%;">@foreach($user as $item)   
    @if($item->status3 == 1) 
   <center> <b>ผ่าน</b>       </center>          
    @else
    <center>  <b>ไม่ผ่าน</b>       </center>                                          
    @endif
    @endforeach</td>
</tr>
</tbody>
</table>

<br>

<table style="width: 100.0201093951094%;" border="1">
<tbody>
<tr>
<td style="width: 33%;">
<div>
<div> <center>จำนวนหน่วยกิตรวมขั้นต่ำ: {{$credit_sum}}</div>
</div>
</td>
<td style="width: 33%;">
<div>
<div> <center>เกรดเฉลี่ยรวมไม่ต่ำกว่า: 2.00</div>
</div>
</td>
<td style="width: 33%;">
<div>
<div> <center>เกรดเฉลี่ยเฉพาะหลักสูตรไม่ต่ำกว่า: 2.00</div>
</div>
</td>
</tr>
<tr>
<td style="width: 33%;"> <center>จำนวนหน่วยกิตที่ได้: {{ $sum_credit}}</td>
<td style="width: 33%;"> <center>เกรดเฉลี่ยรวมที่ได้: {{ number_format($sum_gpa, 2)}}</td>
<td style="width: 33%;"> <center>เกรดเฉลี่ยรวมที่ได้: {{ number_format($sum_gpa, 2)}}</td>
</tr>
<tr>
<td style="width: 33%;"> <center>@foreach($course_detail as $item)              
    @if(($credit_sum)>$sum_credit)
    <center> <b>ผ่าน</b>               
    @else
    <b>ไม่ผ่าน</b>       </center>                                          
    @endif
    @endforeach</td>
<td style="width: 33%;"> <center>@foreach($course_detail as $item)              
    @if(($sum_gpa)<2)
    <center> <b>ผ่าน</b>               
    @else
    <b>ไม่ผ่าน</b>       </center>                                          
    @endif
    @endforeach</td>
<td style="width: 33%;"> <center>@foreach($course_detail as $item)              
    @if(($sum_gpa_1)<2)
    <center> <b>ผ่าน</b>               
    @else
    <b>ไม่ผ่าน</b>       </center>                                          
    @endif
    @endforeach</td>
</tr>
</tbody>
</table>

<br>
        <div class="row">
         
      
            <div class="col">
                <div class="card">
                    

                    
                    <div class="card-body">
                      

                   
  
  
  
 
  
  

  
  <div class="table-responsive">
                        <table  class="table table-striped" border="1">
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
   

        <br>


1. หมวดวิชาศึกษาทั่วไป    รวม  {{$credit1}} หน่วยกิต           แยกออกเป็น  3 กลุ่มวิชา  คือ<br>
	

    

1.1  กลุ่มวิชาภาษา        รวม   {{$credit4}}  หน่วยกิต<br>

<table  class="table table-striped" border="1" width="100%">
                                <thead>
                                    <tr>
                                    <th width="20%">รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>เกรดที่ได้</th><th>ค่าคะแนน</th><th>หมายเหตุ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php($sum=0)
                                @foreach($grade as $item)
                                    <tr>
                                        
                                    
                                @php($sum+=$item->subject_credit*(float)$item->grade1)
                    
                                        <td width="10%" align="center">{{ $item->subject_id }}</td>
                                        <td width="60%">{{ $item->subject_name }}</td>
                                        <td width="5%" align="center">{{ $item->subject_credit }}</td>
                                        <td width="5%" align="center">
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
                                        <td width="5%" align="center">{{ $item->subject_credit*(float)$item->grade1 }}</td>
                                        <td width="5%" align="center"></td>
                                        

                                 </tr>
                        
                                 @endforeach

                                <tr align="center"><td></td><td>รวม</td><td>{{ $count_credit_1 }}</td><td></td><td>{{$sum}}</td>
                    
                    <td></td></tr>  
                                    </tr>  
                                </tbody>
                            </table><br><br>
                            1.2  กลุ่มวิชามนุษยศาสตร์และสังคมศาสตร์           รวม   {{$credit5}}  หน่วยกิต<br>

                            <table  class="table table-striped" border="1"  width="100%">
                                <thead>
                                    <tr>
                                    <th width="20%">รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>เกรดที่ได้</th><th>ค่าคะแนน</th><th>หมายเหตุ</th>
                                    </tr>
                                </thead>
                                <tbody> @php($sum=0)
                                @foreach($grade_2 as $item)
                                    <tr>
                                    @php($sum+=$item->subject_credit*(float)$item->grade1)
                    
                                        <td width="10%" align="center">{{ $item->subject_id }}</td>
                                        <td width="60%">{{ $item->subject_name }}</td>
                                        <td width="5%" align="center">{{ $item->subject_credit }}</td>
                                        <td width="5%" align="center">
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
                    <td width="5%" align="center">{{ $item->subject_credit*(float)$item->grade1 }}</td>
                                        <td width="5%" align="center"></td>

                    
                    
                                @endforeach
                                <tr align="center"><td></td><td>รวม</td><td>{{ $count_credit_2 }}</td><td></td><td>{{$sum}}</td>
                    
                    <td></td></tr>  
                                    </tr>
                                </tbody>
                            </table><br><br>


1.3  กลุ่มวิชาวิทยาศาสตร์และคณิตศาสตร์	                             รวม  {{$credit6}}  หน่วยกิต

<table  class="table table-striped" border="1" width="100%">
                                <thead>
                                    <tr>
                                    <th width="20%">รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>เกรดที่ได้</th><th>ค่าคะแนน</th><th>หมายเหตุ</th>
                                    </tr>
                                </thead>
                                <tbody> @php($sum=0)
                                @foreach($grade_3 as $item)
                                    <tr>
                                    @php($sum+=$item->subject_credit*(float)$item->grade1)
                    
                    <td width="10%" align="center">{{ $item->subject_id }}</td>
                    <td width="60%">{{ $item->subject_name }}</td>
                    <td width="5%" align="center">{{ $item->subject_credit }}</td>
                    <td width="5%" align="center">
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
<td width="5%" align="center">{{ $item->subject_credit*(float)$item->grade1 }}</td>
                                        <td width="5%" align="center"></td>

                                        
                                       
                                    </tr>
                                @endforeach
                                <tr align="center"><td></td><td>รวม</td><td>{{ $count_credit_3 }}</td><td></td><td>{{$sum}}</td>
                    
                    <td></td></tr>  
                                    </tr>  
                                </tbody>
                            </table><br><br>

2.  หมวดวิชาเฉพาะ   ไม่น้อยกว่า  {{$credit2}} หน่วยกิต   แยกเป็น  3   กลุ่มวิชา  ดังนี้<br>
	2.1  กลุ่มวิชาพื้นฐาน    				ไม่น้อยกว่า  {{$credit7}} หน่วยกิต   ประกอบด้วย<br>
    <table  class="table table-striped" border="1" width="100%">
                                <thead>
                                    <tr>
                                    <th width="20%">รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>เกรดที่ได้</th><th>ค่าคะแนน</th><th>หมายเหตุ</th>
                                    </tr>
                                </thead>
                                <tbody> @php($sum=0)
                                @foreach($grade_4 as $item)
                                    <tr>
                                    @php($sum+=$item->subject_credit*(float)$item->grade1)
                    
                                        <td width="10%" align="center">{{ $item->subject_id }}</td>
                                        <td width="60%">{{ $item->subject_name }}</td>
                                        <td width="5%" align="center">{{ $item->subject_credit }}</td>
                                        <td width="5%" align="center">
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
                    <td width="5%" align="center">{{ $item->subject_credit*(float)$item->grade1 }}</td>
                                        <td width="5%" align="center"></td>
                                       
                                    </tr>
                                @endforeach
                                <tr align="center"><td></td><td>รวม</td><td>{{ $count_credit_4 }}</td><td></td><td>{{$sum}}</td>
                    
                    <td></td></tr>  
                                    </tr>  
                                </tbody>
                            </table><br><br>

                            2.2  กลุ่มวิชาบังคับ    				ไม่น้อยกว่า  {{$credit8}} หน่วยกิต   ประกอบด้วย<br>
    <table  class="table table-striped" border="1" width="100%">
                                <thead>
                                    <tr>
                                    <th width="20%">รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>เกรดที่ได้</th><th>ค่าคะแนน</th><th>หมายเหตุ</th>
                                    </tr>
                                </thead>
                                <tbody> @php($sum=0)
                                @foreach($grade_5 as $item)
                                    <tr>
                                    @php($sum+=$item->subject_credit*(float)$item->grade1)
                    
                    <td width="10%" align="center">{{ $item->subject_id }}</td>
                    <td width="60%">{{ $item->subject_name }}</td>
                    <td width="5%" align="center">{{ $item->subject_credit }}</td>
                    <td width="5%" align="center">
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
<td width="5%" align="center">{{ $item->subject_credit*(float)$item->grade1 }}</td>
                                        <td width="5%" align="center"></td>

                                        
                                       
                                    </tr>
                                @endforeach
                                <tr align="center"><td></td><td>รวม</td><td>{{ $count_credit_6 }}</td><td></td><td>{{$sum}}</td>
                    
                    <td></td></tr>  
                                    </tr>  
                                </tbody>
                            </table><br><br>

                            2.3  กลุ่มวิชาเลือก    				ไม่น้อยกว่า  {{$credit9}} หน่วยกิต   ประกอบด้วย<br>
    <table  class="table table-striped" border="1" width="100%">
                                <thead>
                                    <tr>
                                    <th width="20%">รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>เกรดที่ได้</th><th>ค่าคะแนน</th><th>หมายเหตุ</th>
                                    </tr>
                                </thead>
                                <tbody> @php($sum=0)
                                @foreach($grade_6 as $item)
                                    <tr>
                                    @php($sum+=$item->subject_credit*(float)$item->grade1)
                    
                    <td width="10%" align="center">{{ $item->subject_id }}</td>
                    <td width="60%">{{ $item->subject_name }}</td>
                    <td width="5%" align="center">{{ $item->subject_credit }}</td>
                    <td width="5%" align="center">
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
<td width="5%" align="center">{{ $item->subject_credit*(float)$item->grade1 }}</td>
                                        <td width="5%" align="center"></td>

                                        
                                       
                                    </tr>
                                @endforeach
                                <tr align="center"><td></td><td>รวม</td><td>{{ $count_credit_7 }}</td><td></td><td>{{$sum}}</td>
                    
                    <td></td></tr>  
                                    </tr>  
                                </tbody>
                            </table><br><br>

                            3. หมวดเลือกเสรี    				ไม่น้อยกว่า  {{$credit3}} หน่วยกิต   ประกอบด้วย<br>
    <table  class="table table-striped" border="1" width="100%">
                                <thead>
                                    <tr>
                                    <th width="20%">รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>เกรดที่ได้</th><th>ค่าคะแนน</th><th>หมายเหตุ</th>
                                    </tr>
                                </thead>
                                <tbody> @php($sum=0)
                                @foreach($grade_7 as $item)
                                    <tr>
                                    @php($sum+=$item->subject_credit*(float)$item->grade1)
                    
                    <td width="10%" align="center">{{ $item->subject_id }}</td>
                    <td width="60%">{{ $item->subject_name }}</td>
                    <td width="5%" align="center">{{ $item->subject_credit }}</td>
                    <td width="5%" align="center">
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
<td width="5%" align="center">{{ $item->subject_credit*(float)$item->grade1 }}</td>
                                        <td width="5%" align="center"></td>

                                        
                                       
                                    </tr>
                                @endforeach
                                <tr align="center"><td></td><td>รวม</td><td>{{ $count_credit_8 }}</td><td></td><td>{{$sum}}</td>
                    
                    <td></td></tr>  
                                    </tr>  
                                </tbody>
                            </table><br><br>


หมายเหตุ  	วิชาที่ลงทะเบียนเรียนในเทอมสุดท้าย  ให้นักศึกษากรอก  รหัส  ชื่อวิชา  จำนวน    หน่วยกิตให้เรียบร้อยและเขียนในช่องหมายเหตุว่า “ลงทะเบียนเทอมสุดท้าย” สำหรับเกรดที่ได้เจ้าหน้าที่จะเป็นคนกรอกให้<br><br>

<center>ลายมือชื่อนักศึกษา………………………	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspลายมือชื่ออาจารย์ที่ปรึกษา……………………<br>
                         (……{{$name}}…) &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp(……………………………)      <br>    
             วันที่…..…เดือน………………พ.ศ………&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp วันที่…..…เดือน………………พ.ศ………<br><br><br>
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspและ/หรือหัวหน้าภาควิชา…………………………….<br>
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp(…….………………………..)<br>
             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspวันที่…..…เดือน………………พ.ศ………

                            
</center>
                            <br><br>



                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><center><b>ข้อมูลนักศึกษา</b></center><br>

ที่อยู่ที่สามารถติดต่อได้สะดวก<br>
…………………………………………………………………………………………………………………………………………………………………………โทร…………………………………….<br>
E-Mail : ……………………………………………..โทรศัพท์เคลื่อนที่ : ……………………………<br>

การตรวจสอบ (เฉพาะเจ้าหน้าที่)<br><br>

</div>
                            </body>
                            <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</html>