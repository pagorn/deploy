
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
วิทยาศาสตรบัณฑิต สาขาวิชา {!! Auth::user()->course_name !!}  (ตั้งแต่รหัสขึ้นต้นด้วย 51 เป็นต้นไป)</h3></center>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspข้าพเจ้า  นาย/นาง/นางสาว……{{$name}}………รหัสประจำตัว………{{$student_id }}……<br>
คาดว่าจะได้รับปริญญาวิทยาศาสตรบัณฑิต  สาขาวิชา {!! Auth::user()->course_name !!} เกียรตินิยมอันดับ…………<br>
ภาคการศึกษา    ต้น     ปลาย      ฤดูร้อน      ปีการศึกษา………………………<br>
ขอยื่นแบบฟอร์มแสดงรายละเอียดการศึกษารายวิชาที่ได้เรียนมาทั้งหมด  ไม่น้อยกว่า {{$credit_sum}} หน่วยกิต  ต่องานทะเบียนและประมวลผลการศึกษา  ดังต่อไปนี้คือ.—<br><br>


1. หมวดวิชาศึกษาทั่วไป    รวม  {{$credit1}} หน่วยกิต           แยกออกเป็น  3 กลุ่มวิชา  คือ<br>
	

    

1.1  กลุ่มวิชาภาษา        รวม   {{$credit4}}  หน่วยกิต<br>

<table  class="table table-striped" border="1" width="100%">
                                <thead>
                                    <tr>
                                    <th width="20%">รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>ค่าคะแนน</th><th>หมายเหตุ</th><th>เกรดที่ได้</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($grade as $item)
                                    <tr>
                                        
                                        <td width="10%" align="center">{{ $item->subject_id }}</td>
                                        <td width="60%">{{ $item->subject_name }}</td>
                                        <td width="5%" align="center">{{ $item->subject_credit }}</td>
                                        <td width="5%" align="center">{{ $item->subject_credit*($item->grade1) }}</td>
                                        <td width="5%" align="center"></td>
                                        <td width="5%" align="center">
                                        @if(($item->grade1)=="0")
                    F          
                    @elseif(($item->grade1)=="")
                    W
                    @else
                    <span>{{ $item->grade1}}</span>
                    @endif</td>

                      
                                       
                                    </tr>
                                @endforeach
                                <tr align="center"><td></td><td>รวม</td><td>{{ $count_credit_1 }}</td><td></td><td></td>
                    
                    <td></td></tr>  
                                    </tr>  
                                </tbody>
                            </table><br><br>
                            1.2  กลุ่มวิชามนุษยศาสตร์และสังคมศาสตร์           รวม   {{$credit5}}  หน่วยกิต<br>

                            <table  class="table table-striped" border="1"  width="100%">
                                <thead>
                                    <tr>
                                    <th width="20%">รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>ค่าคะแนน</th><th>หมายเหตุ</th><th>เกรดที่ได้</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($grade_2 as $item)
                                    <tr>
                                        
                                        <td width="10%" align="center">{{ $item->subject_id }}</td>
                                        <td width="60%">{{ $item->subject_name }}</td>
                                        <td width="5%" align="center">{{ $item->subject_credit }}</td>
                                        <td width="5%" align="center">{{ $item->subject_credit*($item->grade1) }}</td>
                                        <td width="5%" align="center"></td>
                                        <td width="5%" align="center">
                                        @if(($item->grade1)=="0")
                    F          
                    @elseif(($item->grade1)=="")
                    W
                    @else
                    <span>{{ $item->grade1}}</span>
                    @endif</td>

                    
                    
                                @endforeach
                                <tr align="center"><td></td><td>รวม</td><td>{{ $count_credit_2 }}</td><td></td><td></td>
                    
                    <td></td></tr>  
                                    </tr>
                                </tbody>
                            </table><br><br>


1.3  กลุ่มวิชาวิทยาศาสตร์และคณิตศาสตร์	                             รวม  {{$credit6}}  หน่วยกิต

<table  class="table table-striped" border="1" width="100%">
                                <thead>
                                    <tr>
                                    <th width="20%">รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>ค่าคะแนน</th><th>หมายเหตุ</th><th>เกรดที่ได้</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($grade_3 as $item)
                                    <tr>
                                        
                                        <td width="10%" align="center">{{ $item->subject_id }}</td>
                                        <td width="60%">{{ $item->subject_name }}</td>
                                        <td width="5%" align="center">{{ $item->subject_credit }}</td>
                                        <td width="5%" align="center">{{ $item->subject_credit*($item->grade1) }}</td>
                                        <td width="5%" align="center"></td>
                                        <td width="5%" align="center">
                                        @if(($item->grade1)=="0")
                    F          
                    @elseif(($item->grade1)=="")
                    W
                    @else
                    <span>{{ $item->grade1}}</span>
                    @endif</td>

                                        
                                       
                                    </tr>
                                @endforeach
                                <tr align="center"><td></td><td>รวม</td><td>{{ $count_credit_3 }}</td><td></td><td></td>
                    
                    <td></td></tr>  
                                    </tr>  
                                </tbody>
                            </table><br><br>

2.  หมวดวิชาเฉพาะ   ไม่น้อยกว่า  {{$credit2}} หน่วยกิต   แยกเป็น  3   กลุ่มวิชา  ดังนี้<br>
	2.1  กลุ่มวิชาพื้นฐาน    				ไม่น้อยกว่า  {{$credit7}} หน่วยกิต   ประกอบด้วย<br>
    <table  class="table table-striped" border="1" width="100%">
                                <thead>
                                    <tr>
                                    <th width="20%">รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>ค่าคะแนน</th><th>หมายเหตุ</th><th>เกรดที่ได้</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($grade_4 as $item)
                                    <tr>
                                        
                                        <td width="10%" align="center">{{ $item->subject_id }}</td>
                                        <td width="60%">{{ $item->subject_name }}</td>
                                        <td width="5%" align="center">{{ $item->subject_credit }}</td>
                                        <td width="5%" align="center">{{ $item->subject_credit*($item->grade1) }}</td>
                                        <td width="5%" align="center"></td>
                                        <td width="5%" align="center">
                                        @if(($item->grade1)=="0")
                    F          
                    @elseif(($item->grade1)=="")
                    W
                    @else
                    <span>{{ $item->grade1}}</span>
                    @endif</td>

                                        
                                       
                                    </tr>
                                @endforeach
                                <tr align="center"><td></td><td>รวม</td><td>{{ $count_credit_4 }}</td><td></td><td></td>
                    
                    <td></td></tr>  
                                    </tr>  
                                </tbody>
                            </table><br><br>

                            2.2  กลุ่มวิชาบังคับ    				ไม่น้อยกว่า  {{$credit8}} หน่วยกิต   ประกอบด้วย<br>
    <table  class="table table-striped" border="1" width="100%">
                                <thead>
                                    <tr>
                                    <th width="20%">รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>ค่าคะแนน</th><th>หมายเหตุ</th><th>เกรดที่ได้</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($grade_5 as $item)
                                    <tr>
                                        
                                        <td width="10%" align="center">{{ $item->subject_id }}</td>
                                        <td width="60%">{{ $item->subject_name }}</td>
                                        <td width="5%" align="center">{{ $item->subject_credit }}</td>
                                        <td width="5%" align="center">{{ $item->subject_credit*($item->grade1) }}</td>
                                        <td width="5%" align="center"></td>
                                        <td width="5%" align="center">
                                        @if(($item->grade1)=="0")
                    F          
                    @elseif(($item->grade1)=="")
                    W
                    @else
                    <span>{{ $item->grade1}}</span>
                    @endif</td>

                                        
                                       
                                    </tr>
                                @endforeach
                                <tr align="center"><td></td><td>รวม</td><td>{{ $count_credit_6 }}</td><td></td><td></td>
                    
                    <td></td></tr>  
                                    </tr>  
                                </tbody>
                            </table><br><br>

                            2.3  กลุ่มวิชาเลือก    				ไม่น้อยกว่า  {{$credit9}} หน่วยกิต   ประกอบด้วย<br>
    <table  class="table table-striped" border="1" width="100%">
                                <thead>
                                    <tr>
                                    <th width="20%">รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>ค่าคะแนน</th><th>หมายเหตุ</th><th>เกรดที่ได้</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($grade_6 as $item)
                                    <tr>
                                        
                                        <td width="10%" align="center">{{ $item->subject_id }}</td>
                                        <td width="60%">{{ $item->subject_name }}</td>
                                        <td width="5%" align="center">{{ $item->subject_credit }}</td>
                                        <td width="5%" align="center">{{ $item->subject_credit*($item->grade1) }}</td>
                                        <td width="5%" align="center"></td>
                                        <td width="5%" align="center">
                                        @if(($item->grade1)=="0")
                    F          
                    @elseif(($item->grade1)=="")
                    W
                    @else
                    <span>{{ $item->grade1}}</span>
                    @endif</td>

                                        
                                       
                                    </tr>
                                @endforeach
                                <tr align="center"><td></td><td>รวม</td><td>{{ $count_credit_7 }}</td><td></td><td></td>
                    
                    <td></td></tr>  
                                    </tr>  
                                </tbody>
                            </table><br><br>

                            3. หมวดเลือกเสรี    				ไม่น้อยกว่า  {{$credit3}} หน่วยกิต   ประกอบด้วย<br>
    <table  class="table table-striped" border="1" width="100%">
                                <thead>
                                    <tr>
                                    <th width="20%">รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>ค่าคะแนน</th><th>หมายเหตุ</th><th>เกรดที่ได้</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($grade_7 as $item)
                                    <tr>
                                        
                                        <td width="10%" align="center">{{ $item->subject_id }}</td>
                                        <td width="60%">{{ $item->subject_name }}</td>
                                        <td width="5%" align="center">{{ $item->subject_credit }}</td>
                                        <td width="5%" align="center">{{ $item->subject_credit*($item->grade1) }}</td>
                                        <td width="5%" align="center"></td>
                                        <td width="5%" align="center">
                                        @if(($item->grade1)=="0")
                    F          
                    @elseif(($item->grade1)=="")
                    W
                    @else
                    <span>{{ $item->grade1}}</span>
                    @endif</td>

                                        
                                       
                                    </tr>
                                @endforeach
                                <tr align="center"><td></td><td>รวม</td><td>{{ $count_credit_8 }}</td><td></td><td></td>
                    
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