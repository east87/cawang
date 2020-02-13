<!doctype html>
<html class="no-js" lang="en">
    <head>
        <!-- title -->
        <title>Cawang</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="author" content="Cawang">
        <!-- description -->
        <meta name="description" content="">
        <!-- keywords -->
        <meta name="keywords" content="">
        <!-- favicon -->
       <?php include 'include/icon.php';?>  
        <!-- animation -->
        <link rel="stylesheet" href="<?= FRONTEND_BASE_URL; ?>/css/animate.css" />
        <!-- bootstrap -->
        <link rel="stylesheet" href="<?= FRONTEND_BASE_URL; ?>/css/bootstrap.min.css" />
        <!-- et line icon --> 
        <link rel="stylesheet" href="<?= FRONTEND_BASE_URL; ?>/css/et-line-icons.css" />
        <!-- font-awesome icon -->
        <link rel="stylesheet" href="<?= FRONTEND_BASE_URL; ?>/css/font-awesome.min.css" />
        <!-- themify icon -->
        <link rel="stylesheet" href="<?= FRONTEND_BASE_URL; ?>/css/themify-icons.css">
        <!-- swiper carousel -->
        <link rel="stylesheet" href="<?= FRONTEND_BASE_URL; ?>/css/swiper.min.css">
        <!-- justified gallery  -->
        <link rel="stylesheet" href="<?= FRONTEND_BASE_URL; ?>/css/justified-gallery.min.css">
        <!-- magnific popup -->
        <link rel="stylesheet" href="<?= FRONTEND_BASE_URL; ?>/css/magnific-popup.css" />
        <!-- revolution slider -->
        <!-- bootsnav -->
        <link rel="stylesheet" href="<?= FRONTEND_BASE_URL; ?>/css/bootsnav.css">
        <!-- style -->
        <link rel="stylesheet" href="<?= FRONTEND_BASE_URL; ?>/css/style.css" />
        <!-- responsive css -->
        <link rel="stylesheet" href="<?= FRONTEND_BASE_URL; ?>/css/responsive.css" />
        <!--[if IE]>
            <script src="<?= FRONTEND_BASE_URL; ?>/js/html5shiv.js"></script>
        <![endif]-->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 
    </head>
    <body>
        
         <section id="" class="p-0 bg-light-gray wow fadeIn">
         <div class="container">
                <div class="row row-btu">
                    <div class="col-xs-12 col-md-12 col-lg-6 order-1 order-lg-1 text-center">
                    <div class="col-12 padding-10px-bottom">
                       <h6 class="alt-font text-light-blue font-weight-600">BTU Calculator</h6>
                      <p class="text-extra-small width-90 md-width-100">Dengan data ini dapat membantu memperkirakan kapasitas pendinginan yang diperlukan untuk ruangan dan memilih Air Conditioner yang sesuai dengan kebutuhan Anda</p>
                    </div>
                    <div class="row hitung-btu">
                        <div class="col-5 col-lg-3 text-left">
                            
                           <label class="text-extra-small">Panjang (m):</label>
                            <input value="1" type="number" min="1" name="panjang" id="panjang" placeholder="panjang" class="small-input">
                        </div>
                        <div class="col-2 col-lg-1">
                            <label class="operan text-small">X</label>
                        </div>
                        <div class="col-5 col-lg-3 text-left">
                            <label class="text-extra-small text-left">Lebar (m):</label>
                            <input  value="1" type="number" min="1" name="lebar" id="lebar" placeholder="lebar"  class="small-input">
                        </div>
                        <div class="col-12 col-lg-1 d-none d-sm-block">
                            <label class="operan text-small">atau</label>
                        </div>
                        
                        <div class="col-12 col-lg-4 text-left">
                            <label class="text-small">Area (m<sup>2</sup>):</label>
                            <input  value="1" type="number" min="1" name="area" id="area" placeholder="area" class="small-input">
                        </div>
                        <div class="col-12 col-lg-12 padding-20px-bottom">
                            <span id="" class="width-80 text-extra alt-font padding-10px-all">Pilih Tipe Ruangan</span>                        
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="select-style small-select">
                                <select name="ruangan" id="ruangan" class="input-style bg-transparent mb-0">
                                    <option value="">Ruangan</option>
                                    <option value="500">Ruang keluarga</option>
                                    <option value="600">Kamar Tidur</option>
                                    <option value="700">Ruang Tamu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 text-center padding-10px-all">
                            <button id="hitung" type="button" disabled="" class="btn btn-primary btn-small">Hitung</button>
                        </div>
                    </div>
                    </div>
                    <div class="col-xs-12 col-md-12 col-lg-6 order-2 order-lg-2 text-center bg-blue padding-25px-all">
                        <div class="col-12 padding-30px-bottom">
                            <h6 id="btu_title" class="alt-font text-white-2 font-weight-600"> <span id="setbtu">0</span> BTU or <span id="setarea"> </span> (m<sup>2</sup>)</h6>
                            <span id="rekomendasi" class="width-100 alt-font text-white-2 font-weight-600 padding-25px-all">Rekomendasi Terbaik</span>                        
                        </div>
                        <div class="col-12 text-center">
                            <img src="<?=IMAGES_BASE_URL?>/recomend_ac.png" alt="" class="width-60">  
                        </div>
                        <div class="col-12 margin-20px-top">
                            <span id="total_pk" class="text-large text-white-2 width-30 md-width-100">0 PK  </span>
                            <span class="text-white-2 width-30 md-width-100"> - </span>
                            <span id="total_btu" class="text-large text-white-2 width-30 md-width-100"> 0 BTU/H</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script>
        $(document).ready(function(){
         $("#panjang").change(function(){
              var panjang = parseInt($("#panjang").val());
              var lebar =  parseInt($("#lebar").val());
              var area = panjang * lebar;
              $("#area").val(area);
          });
          $("#lebar").change(function(){
              var panjang = parseInt($("#panjang").val());
              var lebar =  parseInt($("#lebar").val());
              var area = panjang * lebar;
              var area = panjang * lebar;
              $("#area").val(area);
          });
          $("#ruangan").change(function(){
            var ruangan= parseInt($(this).val()) || 0;
             if (ruangan == 0){
                 $("#hitung").attr('disabled', true); 
             } else {
                 $("#hitung").attr('disabled', false); 
                 
             }
              var area =  parseInt($("#area").val());
              var sub_total= area * ruangan;
           
          });
        $("#hitung").click(function(){
            var getpk;
            var getbtu;
              var area = parseInt($("#area").val());
              var ruangan =  parseInt($("#ruangan").val());
              var sub_total= area * ruangan;
              if (sub_total <= 5000){
                  getpk= '1/2 PK';
                  getbtu = '5,000 BTU/H';
                  //alert(getbtu);
                  //alert(sub_total);
              } else if (sub_total > 5000 && sub_total <=7000 ){
                 getpk= '3/4 PK';
                 getbtu = '7,000 BTU/H';
                 //alert(sub_total);
              } 
              else if (sub_total > 7000 && sub_total <=9000 ){
                 getpk= '1 PK';
                 getbtu = '9,000 BTU/H';
                 alert(sub_total);
              } 
              else if (sub_total > 9000 && sub_total <=12000 ){
                 getpk= '1 1/2 PK';
                 getbtu = '12,000 BTU/H';
                 //alert(sub_total);
              }
              else {
                getpk= 'Belum tersedia';
                getbtu = 'Belum tersedia'; 
              }
              var total =Intl.NumberFormat('en-US').format(sub_total)
               $("#setbtu").text(total);
               $("#setarea").text(area);
               $("#total_pk").text(getpk);
               $("#total_btu").text(getbtu);
          });
          
        });
        </script>
        <!-- end scroll to top  -->
        <!-- javascript libraries -->
        
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/jquery.js"></script>
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/modernizr.js"></script>
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/bootstrap.bundle.js"></script>
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/skrollr.min.js"></script>
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/smooth-scroll.js"></script>
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/jquery.appear.js"></script>
        <!-- menu navigation -->
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/bootsnav.js"></script>
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/jquery.nav.js"></script>
        <!-- animation -->
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/wow.min.js"></script>
        <!-- page scroll -->
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/page-scroll.js"></script>
        <!-- swiper carousel -->
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/swiper.min.js"></script>
        <!-- counter -->
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/jquery.count-to.js"></script>
        <!-- parallax -->
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/jquery.stellar.js"></script>
        <!-- magnific popup -->
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/jquery.magnific-popup.min.js"></script>
        <!-- portfolio with shorting tab -->
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/isotope.pkgd.min.js"></script>
        <!-- images loaded -->
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/imagesloaded.pkgd.min.js"></script>
        <!-- pull menu -->
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/classie.js"></script>
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/hamburger-menu.js"></script>
        <!-- counter  -->
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/counter.js"></script>
        <!-- fit video  -->
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/jquery.fitvids.js"></script>
        <!-- skill bars  -->
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/skill.bars.jquery.js"></script> 
        <!-- justified gallery  -->
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/justified-gallery.min.js"></script>
        <!--pie chart-->
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/jquery.easypiechart.min.js"></script>
        <!-- instagram -->
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/instafeed.min.js"></script>
        <!-- retina -->
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/retina.min.js"></script>
        <!-- revolution -->
      
        <script type="text/javascript" src="<?= FRONTEND_BASE_URL; ?>/js/main.js"></script>
       
       
    </body>
</html>