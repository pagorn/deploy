<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ระบบตรวจสอบผู้สำเร็จการศึกษา คณะวิทยาศาสตร์ มหาวิทยาลัยขอนแก่น</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-25"><a href="{{ url('/') }}">ตรวจสอบผู้สำเร็จการศึกษา</a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="#home-section" class="nav-link">ลงทะเบียน</a></li>
                <li><a href="#programs-section" class="nav-link">วิธีการเข้าใช้งาน</a></li>
                <li><a href="#courses-section" class="nav-link">ตรวจสอบผลผู้สำเร็จการศึกษา</a></li>
                
                
              </ul>
            </nav>
          </div>

          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="login" class="nav-link"><span>เข้าสู่ระบบ</span></a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
      
    </header>

    <div class="intro-section" id="home-section">
      
      <div class="slide-1" style="background-image: url('images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                  <h1  data-aos="fade-up" data-aos-delay="100">ลงทะเบียนเข้าใช้งานระบบ</h1>
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">ยินดีต้อนรับนักศึกษาเข้าสู่หน้าสมัครเข้าใช้ระบบตรวจสอบผู้สำเร็จการศึกษา ให้นักศึกษากรอก ข้อมูลเลขประจำตัว อีเมล รหัสผ่านให้ครบถ้วน.</p>
                  <p data-aos="fade-up" data-aos-delay="300"><a href="#courses-section" class="btn btn-primary py-3 px-5 btn-pill">ตรวจสอบผลผู้สำเร็จการศึกษา</a></p>

                </div>

                

                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                <form method="POST" action="{{ route('register') }}"  class="form-box">
                    <h3 class="h4 text-black mb-4">ลงทะเบียน</h3>
                    @csrf
                    <div class="d-md-flex">
                        <div class="form-group row">
                            
                            <div class="col-md-11">
                                <input id="name" placeholder="ชื่อ-สกุล" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-11">
                                <input id="student_id" placeholder="รหัสนักศึกษา" type="text" class="form-control @error('student_id') is-invalid @enderror" name="student_id" value="{{ old('student_id') }}" required autocomplete="student_id" autofocus>

                                @error('student_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

</div>

<div class="form-group row">
                        <label for="course_id" class="col-md-4 col-form-label text-md-right">{{ __('รหัสหลักสูตร') }}</label>
                        <div class="col-md-6"> <select name="course_id" placeholder="หลักสูตร" class="form-control" id="course_id" >
    @foreach (json_decode('{"310210101160": "310210101160", "310234601160": "310234601160"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($course_id->grade1) && $grade->grade1 == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select></div>
    {!! $errors->first('course_id', '<p class="help-block">:message</p>') !!}
</div>

                        


                        <div class="form-group row">
                        <label for="course_name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อหลักสูตร') }}</label>
                        <div class="col-md-6"> <select name="course_name" placeholder="หลักสูตร" class="form-control" id="course_name" >
    @foreach (json_decode('{"สถิติ": "สถิติ", "สารสนเทศสถิติ": "สารสนเทศสถิติ"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($course_name->grade1) && $grade->grade1 == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select></div>
    {!! $errors->first('course_name', '<p class="help-block">:message</p>') !!}
</div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                  </form>

                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>




        <script type="text/javascript">
        window.onload = function() {
   document.getElementById("course_name").addEventListener('change',function(e) {ha(e,'course_id');}, false);
   document.getElementById("course_id").addEventListener('change',function(e) {ha(e,'course_name');}, false);
};
function ha (e,id){
   var index = e.target.selectedIndex;
   document.getElementById(id).selectedIndex = index;
};
    </script>

    <div class="site-section" id="programs-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center"  data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">วิธีการใช้งานระบบตรวจสอบผู้สำเร็จการศึกษา</h2>
            
          </div>
        </div>
        <div class="row mb-5 align-items-center">
          <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
            <img src="images/login.png" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">ลงทะเบียนเข้าใช้งานระบบ</h2>
            <p class="mb-4">1.กรอกข้อมูลส่วนตัว อีเมล และรหัสผ่านให้ถูกต้องและครบถ้วน</p>
            <p class="mb-4">2.คลิกปุ่มลงทะเบียน
</p>

            

          </div>
        </div>

        <div class="row mb-5 align-items-center">
          <div class="col-lg-7 mb-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
            <img src="images/new2.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 mr-auto order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">การส่งผลเกรด</h2>
            <p class="mb-4">1.เลือกหมวดรายวิชาที่ต้องการส่งเกรด เเบ่งเป็น 2 ส่วน ได้แก่ 1.หมวดวิชาศึกษาทั่วไป/หมวดวิชาเฉพาะ 2.หมวดวิชาเลือกเสรี
</p>
            <p class="mb-4">2.คลิกเพิ่มรายวิชาที่ลงทะเบียน และคลิกเลือกผลเกรดที่ได้ จากนั้นกดยืนยัน

</p>
            <p class="mb-4">3.เมื่อเพิ่มรายวิชาที่ลงทะเบียนและผลเกรดจนครบ กดดูผลเพื่อตรวจสอบความถูกต้องอีกครั้ง
</p>
            <p class="mb-4">4.กรณีที่เพิ่มรายวิชา หรือส่งผลเกรดผิด ให้คลิกปุ่มลบ/แก้ไข
</p>
            <p class="mb-4">5.ในกรณีส่งผลเกรดหมวดวิชาเลือกเสรี นักศึกษาจะต้องเพิ่มรหัสวิชา ชื่อรายวิชา และจำนวนหน่วยกิตก่อนเลือกผลเกรด
</p>
          
          </div>
        </div>

        <div class="row mb-5 align-items-center">
          <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
            <img src="images/new1.svg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
            <h2 class="text-black mb-4">ดูผลการตรวจสอบ และส่งรายงานผลการตรวจสอบ</h2>
            <p class="mb-4">1.นักศึกษาสามารถดูผลการตรวจสอบตามเงื่อนไขการสำเร็จการศึกษาจากหน้าผลการอนุมัติ
</p>
<p class="mb-4">2.สามารถออกรายงานผลตรวจสอบได้ โดยคลิก Export Doc 

</p>
<p class="mb-4">3.นักศึกษาที่คาดว่าจะสำเร็จการศึกษา คลิกส่งรายงานผล เพื่ออัปโหลดไฟล์รายงานผลการตรวจสอบให้กับเจ้าหน้าที่บุคคลกรงานศึกษาตรวจสอบต่อไป

</p>
<p class="mb-4">4.นักศึกษาสามารถเข้าดูสถานะการตรวจสอบของตนเองได้ โดยค้นหาจากรหัสนักศึกษา ในหน้าตรวจสอบผู้สำเร็จการศึกษา
</p>
            

          </div>
        </div>

      </div>
    </div>

    
    <div class="site-section bg-image overlay" style="background-image: url('images/hero_12.jpg');" id="courses-section">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-md-8 text-center testimony">
              <h1>ตรวจสอบผลผู้สำเร็จการศึกษา</h1><br>
             
             
             
          
                        <form method="GET" action="{{ url('/report') }}" accept-charset="UTF-8"  role="search">
         

     


              <div class="form-group row">
                <div class="col-md-9 mb-3 mb-lg-0">
                <input required type="text" name="search" class="form-control" placeholder="รหัสนักศึกษา" value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                <input type="submit" class="btn btn-primary py-3 px-5 btn-block btn-pill" value="ตรวจสอบผล">
                </div>
              </div>
</form>
            <blockquote>
              <p>&ldquo; ผลิตบัณฑิตทางด้านวิทยาศาสตร์และเทคโนโลยีให้เป็นบัณฑิตที่พึงประสงค์ บริการสอนวิชาพื้นฐานทางด้านวิทยาศาสตร์และเทคโนโลยี การวิจัยเพื่อสร้างองค์ความรู้และนวัตกรรม บริการวิชาการแก่สังคม และทำนุบำรุงศิลปวัฒนธรรม เพื่อให้เกิดการพัฒนาที่สมดุลและยั่งยืน &rdquo;</p>
            </blockquote>
          </div>
        </div>
      </div>
    </div>

    
     

        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | สาขาวิชาสถิติ คณะวิทยาศาสตร์ มหาวิทยาลัยขอนแก่น
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>

  
    
  </div> <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>

  
  <script src="js/main.js"></script>
    
  </body>
</html>