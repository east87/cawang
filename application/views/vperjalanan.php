<!doctype html>
<html class="no-js" lang="en">
    <head>
        <!-- title -->
        <title> 60 Tahun Pejalanan - Cawang | AC Terbaik Buatan Indonesia</title>
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
  <?php include 'include/analytics.php';?>
    </head>
    <body>
        <?php include 'include/tagmanager.php';?>
        <!-- start header -->
        <?php include 'include/vheader.php';?>
     <section class="bg-transparent wow fadeIn padding-60px-all">
            
            <div class="container-fluid margin-20px-bottom">
                <div class="swiper-auto-slide swiper-container white-move">
                <div class="swiper-wrapper col-12">
                        <!-- start slider item -->
               <div class="swiper-slide">
                 <video id="vid1" controls preload="none"></video>
                     <script>
                        var w = window.matchMedia("(max-width: 700px)");
                        var vid1 = document.getElementById("vid1");
                        var source1 = document.createElement("source");
                        source1.id = "hvid1";
                        source1.setAttribute("type", "video/mp4");
                        vid1.appendChild(source1);
                        
                        if (w.matches) {
                            vid1.pause();
                            source1.removeAttribute("src");
                            source1.setAttribute("src", "<?= VIDEO_BASE_URL; ?>/vid1hp.mp4");
                            vid1.load();
                            vid1.play();
                        } else {
                            vid1.pause();
                            source1.removeAttribute("src");
                            source1.setAttribute("src", "<?= VIDEO_BASE_URL; ?>/vid1web.mp4");
                            vid1.load();
                            vid1.play();
                        }
                        
                        window.addEventListener("resize", function() {
                            var w = window.matchMedia("(max-width: 700px)");
                            var vid1 = document.getElementById("vid1");
                            var source1 = document.getElementById("hvid1");
                        
                            if (w.matches) {
                                vid1.pause();
                                source1.src = "<?= VIDEO_BASE_URL; ?>/vid1hp.mp4";
                                vid1.load();
                                vid1.play();
                            } else {
                                vid1.pause();
                                source1.src = "<?= VIDEO_BASE_URL; ?>/vid1web.mp4";
                                vid1.load();
                                vid1.play();
                            }
                        });
                     </script>
               </div>
               <div class="swiper-slide">
                   <video id="vid2" controls></video>
                     <script>
                        var w = window.matchMedia("(max-width: 700px)");
                         var vid2 = document.getElementById("vid2");
                        var source2 = document.createElement("source");
                        source2.id = "hvid2";
                        source2.setAttribute("type", "video/mp4");
                        vid2.appendChild(source2);
                        
                        if (w.matches) {
                            vid2.pause();
                            source2.removeAttribute("src");
                            source2.setAttribute("src", "<?= VIDEO_BASE_URL; ?>/vid2hp.mp4");
                            vid2.load();
                            vid2.play();
                        } else {
                            vid2.pause();
                            source2.removeAttribute("src");
                            source2.setAttribute("src", "<?= VIDEO_BASE_URL; ?>/vid2web.mp4");
                            vid2.load();
                            vid2.play();
                        }
                        
                        window.addEventListener("resize", function() {
                            var w = window.matchMedia("(max-width: 700px)");
                            var vid2 = document.getElementById("vid2");
                            var source2 = document.getElementById("hvid2");
                        
                            if (w.matches) {
                                vid2.pause();
                                source2.src = "<?= VIDEO_BASE_URL; ?>/vid2hp.mp4";
                                vid2.load();
                                vid2.play();
                            } else {
                                vid2.pause();
                                source2.src = "<?= VIDEO_BASE_URL; ?>/vid2web.mp4";
                                vid2.load();
                                vid2.play();
                            }
                        });
                     </script>
               </div>
               <div class="swiper-slide">
                 <video id="vid3" controls></video>
                     <script>
                        var w = window.matchMedia("(max-width: 700px)");
                         var vid3 = document.getElementById("vid3");
                        var source3 = document.createElement("source");
                        source3.id = "hvid3";
                        source3.setAttribute("type", "video/mp4");
                        vid3.appendChild(source3);
                        
                        if (w.matches) {
                            vid3.pause();
                            source3.removeAttribute("src");
                            source3.setAttribute("src", "<?= VIDEO_BASE_URL; ?>/vid3hp.mp4");
                            vid3.load();
                            vid3.play();
                        } else {
                            vid3.pause();
                            source3.removeAttribute("src");
                            source3.setAttribute("src", "<?= VIDEO_BASE_URL; ?>/vid3web.mp4");
                            vid3.load();
                            vid3.play();
                        }
                        
                        window.addEventListener("resize", function() {
                            var w = window.matchMedia("(max-width: 700px)");
                            var vid3 = document.getElementById("vid3");
                            var source3 = document.getElementById("hvid3");
                        
                            if (w.matches) {
                                vid3.pause();
                                source3.src = "<?= VIDEO_BASE_URL; ?>/vid3hp.mp4";
                                vid3.load();
                                vid3.play();
                            } else {
                                vid3.pause();
                                source3.src = "<?= VIDEO_BASE_URL; ?>/vid3web.mp4";
                                vid3.load();
                                vid3.play();
                            }
                        });
                     </script>
               </div>
               <div class="swiper-slide">
                  <video id="vid4" controls></video>
                     <script>
                        var w = window.matchMedia("(max-width: 700px)");
                         var vid4 = document.getElementById("vid4");
                        var source4 = document.createElement("source");
                        source4.id = "hvid4";
                        source4.setAttribute("type", "video/mp4");
                        vid4.appendChild(source4);
                        
                        if (w.matches) {
                            vid4.pause();
                            source4.removeAttribute("src");
                            source4.setAttribute("src", "<?= VIDEO_BASE_URL; ?>/vid4hp.mp4");
                            vid4.load();
                            vid4.play();
                        } else {
                            vid4.pause();
                            source4.removeAttribute("src");
                            source4.setAttribute("src", "<?= VIDEO_BASE_URL; ?>/vid4web.mp4");
                            vid4.load();
                            vid4.play();
                        }
                        
                        window.addEventListener("resize", function() {
                            var w = window.matchMedia("(max-width: 700px)");
                            var vid4 = document.getElementById("vid4");
                            var source4 = document.getElementById("hvid4");
                        
                            if (w.matches) {
                                vid4.pause();
                                source4.src = "<?= VIDEO_BASE_URL; ?>/vid4hp.mp4";
                                vid4.load();
                                vid4.play();
                            } else {
                                vid4.pause();
                                source4.src = "<?= VIDEO_BASE_URL; ?>/vid4web.mp4";
                                vid4.load();
                                vid4.play();
                            }
                        });
                     </script>
               </div>
               <div class="swiper-slide">
                 <video id="vid5" controls></video>
                     <script>
                        var w = window.matchMedia("(max-width: 700px)");
                         var vid5 = document.getElementById("vid5");
                        var source5 = document.createElement("source");
                        source5.id = "hvid5";
                        source5.setAttribute("type", "video/mp4");
                        vid5.appendChild(source5);
                        
                        if (w.matches) {
                            vid5.pause();
                            source5.removeAttribute("src");
                            source5.setAttribute("src", "<?= VIDEO_BASE_URL; ?>/vid5hp.mp4");
                            vid5.load();
                            vid5.play();
                        } else {
                            vid5.pause();
                            source5.removeAttribute("src");
                            source5.setAttribute("src", "<?= VIDEO_BASE_URL; ?>/vid5web.mp4");
                            vid5.load();
                            vid5.play();
                        }
                        
                        window.addEventListener("resize", function() {
                            var w = window.matchMedia("(max-width: 700px)");
                            var vid5 = document.getElementById("vid5");
                            var source5 = document.getElementById("hvid5");
                        
                            if (w.matches) {
                                vid5.pause();
                                source5.src = "<?= VIDEO_BASE_URL; ?>/vid5hp.mp4";
                                vid5.load();
                                vid5.play();
                            } else {
                                vid5.pause();
                                source5.src = "<?= VIDEO_BASE_URL; ?>/vid5web.mp4";
                                vid5.load();
                                vid5.play();
                            }
                        });
                     </script>
               </div>
			   <div class="swiper-slide">
                 <video id="vid6" controls></video>
                     <script>
                        var w = window.matchMedia("(max-width: 700px)");
                         var vid6 = document.getElementById("vid6");
                        var source6 = document.createElement("source");
                        source6.id = "hvid6";
                        source6.setAttribute("type", "video/mp4");
                        vid6.appendChild(source6);
                        
                        if (w.matches) {
                            vid6.pause();
                            source6.removeAttribute("src");
                            source6.setAttribute("src", "<?= VIDEO_BASE_URL; ?>/vid6hp.mp4");
                            vid6.load();
                            vid6.play();
                        } else {
                            vid6.pause();
                            source6.removeAttribute("src");
                            source6.setAttribute("src", "<?= VIDEO_BASE_URL; ?>/vid6web.mp4");
                            vid6.load();
                            vid6.play();
                        }
                        
                        window.addEventListener("resize", function() {
                            var w = window.matchMedia("(max-width: 700px)");
                            var vid6 = document.getElementById("vid6");
                            var source6 = document.getElementById("hvid6");
                        
                            if (w.matches) {
                                vid6.pause();
                                source6.src = "<?= VIDEO_BASE_URL; ?>/vid6hp.mp4";
                                vid6.load();
                                vid6.play();
                            } else {
                                vid6.pause();
                                source6.src = "<?= VIDEO_BASE_URL; ?>/vid6web.mp4";
                                vid6.load();
                                vid6.play();
                            }
                        });
                     </script>
               </div>
			   <div class="swiper-slide">
                 <video id="vid7" controls></video>
                     <script>
                        var w = window.matchMedia("(max-width: 700px)");
                         var vid7 = document.getElementById("vid7");
                        var source7 = document.createElement("source");
                        source7.id = "hvid7";
                        source7.setAttribute("type", "video/mp4");
                        vid7.appendChild(source7);
                        
                        if (w.matches) {
                            vid7.pause();
                            source7.removeAttribute("src");
                            source7.setAttribute("src", "<?= VIDEO_BASE_URL; ?>/vid7hp.mp4");
                            vid7.load();
                            vid7.play();
                        } else {
                            vid7.pause();
                            source7.removeAttribute("src");
                            source7.setAttribute("src", "<?= VIDEO_BASE_URL; ?>/vid7web.mp4");
                            vid7.load();
                            vid7.play();
                        }
                        
                        window.addEventListener("resize", function() {
                            var w = window.matchMedia("(max-width: 700px)");
                            var vid7 = document.getElementById("vid7");
                            var source7 = document.getElementById("hvid7");
                        
                            if (w.matches) {
                                vid7.pause();
                                source7.src = "<?= VIDEO_BASE_URL; ?>/vid7hp.mp4";
                                vid7.load();
                                vid7.play();
                            } else {
                                vid7.pause();
                                source7.src = "<?= VIDEO_BASE_URL; ?>/vid7web.mp4";
                                vid7.load();
                                vid7.play();
                            }
                        });
                     </script>
               </div>
			   <div class="swiper-slide">
 <video id="vid8" controls></video>
	 <script>
		var w = window.matchMedia("(max-width: 700px)");
		 var vid8 = document.getElementById("vid8");
		var source8 = document.createElement("source");
		source8.id = "hvid8";
		source8.setAttribute("type", "video/mp4");
		vid8.appendChild(source8);
		
		if (w.matches) {
			vid8.pause();
			source8.removeAttribute("src");
			source8.setAttribute("src", "<?= VIDEO_BASE_URL; ?>/vid8hp.mp4");
			vid8.load();
			vid8.play();
		} else {
			vid8.pause();
			source8.removeAttribute("src");
			source8.setAttribute("src", "<?= VIDEO_BASE_URL; ?>/vid8web.mp4");
			vid8.load();
			vid8.play();
		}
		
		window.addEventListener("resize", function() {
			var w = window.matchMedia("(max-width: 700px)");
			var vid8 = document.getElementById("vid8");
			var source8 = document.getElementById("hvid8");
		
			if (w.matches) {
				vid8.pause();
				source8.src = "<?= VIDEO_BASE_URL; ?>/vid8hp.mp4";
				vid8.load();
				vid8.play();
			} else {
				vid8.pause();
				source8.src = "<?= VIDEO_BASE_URL; ?>/vid8web.mp4";
				vid8.load();
				vid8.play();
			}
		});
	 </script>
</div>
           
                 
             </div>
                <div class="swiper-pagination swiper-pagination-square swiper-pagination-white"></div>
                <div class="swiper-scrollbar d-none d-md-inline-block"></div>
                <div class="swiper-next-style2 text-small alt-font d-none d-md-inline-block">Next <i class="fas fa-long-arrow-alt-right icon-very-small position-relative text-extra-dark-gray top-2 margin-5px-left" aria-hidden="true"></i></div>
                <div class="swiper-prev-style2 text-small alt-font d-none d-md-inline-block"><i class="fas fa-long-arrow-alt-left icon-very-small position-relative text-extra-dark-gray top-2 margin-5px-right" aria-hidden="true"></i> Prev</div>
            </div>
            </div>
            
        </section>
        <?php include 'include/vfooter.php';?>
        
        <!-- end scroll to top  -->
        <!-- javascript libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
        <script src="<?php echo FRONTEND_BASE_URL?>/js/jquery.validate.min.js"></script>
        <script src="<?php echo FRONTEND_BASE_URL; ?>/js/scriptForm.js"></script>
         <script src="https://www.google.com/recaptcha/api.js?onload=myCallBack&render=explicit" async defer></script>
     
      <script type="text/javascript">
        var recaptcha1;
        var recaptcha2;
         var myCallBack = function() {
          
            recaptcha2 = grecaptcha.render('recaptcha2', {
            		'sitekey' : '<?php echo SITE_KEY;?>', //Replace this with your Site key
            		'theme' : 'light',
                        'hl' : 'id'        
          	});
          
         };
      </script>
       
    </body>
</html>