@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
         
      
            <div class="col">
                <div class="card">
                    <div class="card-header">    <h5>ผลการอนุมัติ</h5></div>
                    <div class="card-body">
                    @foreach($report as $item)
    <div class="d-md-flex">
    <div> <p><strong>โครงสร้างหลักสูตร: </strong>{{ $item->course_id }} </p></div>
    <div>  <p><strong> &nbsp;ชื่อหลักสูตร : </strong>{{ $item->course_name }} </p></div></div>
    <div class="d-md-flex">
    <div> <p><strong>ชื่อ-สกุล : </strong>{{ $item->name }}</p></div>
    <div>  <p><strong> &nbsp;รหัสนักศึกษา : </strong>{{$item->student_id}}  </p></div></div>
    @endforeach
   
    

    <div class="card-group">
  <div class="card">
 
    <div class="card-body ">
    
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
            </div>
        </div>
    </div> 
   

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
                    <div class="card-header"><h5>หมวดวิชาทั่วไป กลุ่มวิชาภาษา <b>หน่วยกิตที่ลงทะเบียน {{ $count_credit_sum1}} หน่วยกิต GPA {{ number_format($gpa_credit_1, 2)}}</h5></div>
                    <div class="card-body">
             
                      

                    
                        <br/>
                        <div class="table-responsive">
                        <table  class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>เกรดที่ได้</th>
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
                    <div class="card-header"><h5>หมวดวิชาทั่วไป กลุ่มวิชามนุษยศาสตร์และสังคมศาสตร์ <b>หน่วยกิตที่ลงทะเบียน {{ $count_credit_sum2}} หน่วยกิต GPA {{ number_format($gpa_credit_2, 2)}}</h5></div>
                    <div class="card-body">
                     

                

                       
                        <br/>
                        <div class="table-responsive">
                        <table  class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>เกรดที่ได้</th>
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
                    <div class="card-header"><h5>หมวดวิชาทั่วไป กลุ่มคณิตศาสตร์และวิทยาศาสตร์ <b>หน่วยกิตที่ลงทะเบียน {{ $count_credit_sum3}} หน่วยกิต GPA {{ number_format($gpa_credit_3, 2)}}</h5></div>
                    <div class="card-body">
                     

              

                       
                        <br/>
                        <div class="table-responsive">
                        <table  class="table table-striped">
                                <thead>
                                    <tr>
                                    <th>รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>เกรดที่ได้</th>
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
                                    <th>รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>เกรดที่ได้</th>
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
                                    <th>รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>เกรดที่ได้</th>
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
                                    <th>รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>เกรดที่ได้</th>
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
                                    <th>รหัสสาขาวิชา</th><th>ชื่อรายวิชา</th><th>หน่วยกิต</th><th>เกรดที่ได้</th>
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
@endsection
