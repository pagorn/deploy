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
                <div class="col mb-4">
                <center><img src="logo.png" width="200" height="370">
                  <h1  data-aos="fade-up" data-aos-delay="100">ผลการตรวจสอบผู้สำเร็จการศึกษา</h1>
                  


<div class="table-responsive"><font color="#ffffff">
                            <table class="table" border="1" BORDERCOLOR=#ffffff>
                                <thead>
                                    <tr align="center">
                                        <th>รหัสนักศึกษา</th><th>ชื่อ-สกุล</th><th>ชื่อหลักสูตร</th><th>เกรดเฉลี่ยรวม</th><th>สถานะ</th><th>หมายเหตุ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($report as $item)
                                    <tr>
                                        
                                        <td align="center">{{ $item->student_id }}</td>
                                        <td align="center">{{ $item->name }}</td>
                                      
                                        <td align="center">{{ $item->course_name }}</td>

                                        <td align="center">{{ $item->gpax }}</td>
                       

                                        
                                        <td align="center"><h5>@if(!empty($item->status))
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

                </div>

                

                
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>



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