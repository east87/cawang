<!doctype html>
<html class="no-js" lang="en">
    <head>
        <!-- title -->
        <title>Cawang</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="author" content="ThemeZaa">
        <!-- description -->
        <meta name="description" content="Map Cawang">
        <!-- keywords -->
        <meta name="keywords" content="">
        <!-- favicon -->
        <link rel="shortcut icon" href="images/favicon.png">
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
        <link rel="stylesheet" type="text/css" href="revolution/<?= FRONTEND_BASE_URL; ?>/css/settings.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="revolution/<?= FRONTEND_BASE_URL; ?>/css/layers.css">
        <link rel="stylesheet" type="text/css" href="revolution/<?= FRONTEND_BASE_URL; ?>/css/navigation.css">
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
        <style media="screen" type="text/css">
            
        .navbar-top .dropdown-menu {
            top: auto;
            bottom: 100%;
        }
        .navbar-top .nav_logo a{
            display: none;
        }
        #map{
         position: relative;
         z-index: 1;
         min-height: 400px;
         height: 100%;
         }
          p.cawang-content-info{
         margin: 5px 0 3px;
         }
        
          ul#myDIV > li.active a {
              color: #ff214f;
              font-weight: 600;
            
         }
         ul#myDIV > li.active a span{
              color: #ff214f;
            
         }
         @media (max-width: 767px){
            ul#myDIV > div a div.border-all{
           margin-bottom: 5px;  
           max-height: 150px;
           min-height: 150px;
         } 
         }
    </style>
    </head>
    <body>
       
<section class="wow fadeIn padding-50px-all" style="">
            <div class="container">
                <div class="row flex-lg-row-reverse"> 
                
               <main class="col-12 col-lg-9 left-sidebar md-margin-60px-bottom sm-margin-40px-bottom pr-0 md-no-padding-left">
                     <div id="map" class="col-12 w-100 h-100">
                            
                    </div>
               </main>
                <aside class="col-12 col-lg-3">
                    <div class="margin-15px-tb">
                            <a href="<?= BASE_URL;?>/about"><img src="<?= IMAGES_BASE_URL;?>/logo-footer.png" alt="" class="margin-25px-bottom" data-no-retina=""></a>
                   </div>
                     <div class="d-inline-block width-100 margin-15px-tb">
                         <label class="text-small">Temukan Kami di</label>
                            <div class="position-relative">
                                    <input id="input-search" type="text" class="bg-transparent text-small m-0 border-color-extra-light-gray medium-input float-left" placeholder="Enter your keywords...">                                   
                                    <button id="submit-search" type="submit" class="search-btn bg-primary btn position-absolute right-0 top-1"><i class="fas fa-search no-margin-left"></i></button>
                            </div> 
                        </div>
                     <div class="margin-45px-bottom sm-margin-25px-bottom">
                            <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span id="loc_search">List</span></div>
                            <ul class="latest-post position-relative" id="myDIV">
                                <?php foreach ($ListMaps as $lp) {?>
                                <li class="media " id="linkbtn<?=$lp['row_id'];?>">
                                    <div class="col-8">
                                     <a class="media-body text-small" 
                                       data-id="<?=$lp['row_id'];?>" 
                                       data-title="<?= strtoupper(contentValue($lp, 'title'));?>" 
                                       data-lat="<?=contentValue($lp, 'latitude');?>" data-long="<?=contentValue($lp, 'longitude');?>" 
                                       data-img="<?=contentValue($lp, 'images');?>" data-addr="<?=contentValue($lp, 'desc');?>" 
                                       data-phone="<?=contentValue($lp, 'phone');?>"
                                       data-web="<?=contentValue($lp, 'website');?>"
                                       data-cat="<?=contentValue($lp, 'category');?>"
                                       onclick="setMap(this);">                      
                                        <span class="d-block margin-5px-bottom"><?= html_entity_decode(contentValue($lp, 'title'));?></span> 
                                        <span class="d-block text-medium-gray text-small"><?= html_entity_decode(contentValue($lp, 'desc'));?></span>
                                    </a>    
                                    </div>
                                   
                                    <div class="map-desc col-4">
                                        <?php 
                                        $str_arr = explode('-', contentValue($lp, 'category'));
                                        $HTML = '';
                                        $img1 = IMAGES_BASE_URL.'/'.$str_arr[0].'.png';
                                        $HTML .= '<img src="'.$img1.'">';  
                                        if (isset($str_arr[1])){
                                        $img2 = IMAGES_BASE_URL.'/'.$str_arr[1].'.png';
                                        $HTML .= '<img src="'.$img2.'">';  
                                    }    
                                      echo $HTML;
                                        ?>
                                    </div>
                                </li>
                                <?php  } ?>
                            </ul>
                        </div>
                </aside>
                
            </div>
         </div>
      </section>
   <script>
        $(document).ready(function () {
	$('button.search-btn').on('click', function (event) {

		event.preventDefault;
		var $_search = $("#input-search");
		var search = $_search.val();
                
		$("#input-search").val(search);
		$("#loc_search").text("Hasil Pencarian "+search);
		if (search !== '') {
			$.ajax({
					type: "POST",
					url: "<?= BASE_URL; ?>/servicearea/doSearch",
					data: {
						search: search
					},
					//dataType: 'html',
					timeout: 10000
				})
				.always(function () {
					$("#myDIV").empty();
				})
				.done(function (response) {

					var dynamicHTML = '';
					var json = JSON.parse(response);
                                        if(json.length > 0){
					for (var i = 0, length = json.length; i < length; i++) {
                                           var category = setIcon(json[i].category);
						// alert(json[i].images);
						dynamicHTML += '<li class="media " id="linkbtn' + json[i].row_id + '">';
                                                dynamicHTML += '<div class="col-6">';
						dynamicHTML += '<a href="#map" class="media-body text-small" data-id="' + json[i].row_id + '"\n\
                                                    data-title="' + json[i].title + '"\n\
                                                    data-lat="' + json[i].latitude + '"\n\
                                                    data-long="' + json[i].longitude + '"\n\
                                                    data-img="' + json[i].images + '" \n\
                                                    data-addr="' + json[i].desc + '" \n\
                                                    data-phone="' + json[i].phone + '" \n\
                                                    data-web="' + json[i].website + '" \n\
                                                    data-cat="' + json[i].category + '" \n\
                                                    onclick="setMap(this);">';
						dynamicHTML += '<span class="d-block margin-5px-bottom">' + json[i].title + '</span>';
						dynamicHTML += '<span class="d-block text-medium-gray text-small">' + json[i].desc + '</span>';
						dynamicHTML += '</a>';
                                                dynamicHTML += '</div>';
                                                dynamicHTML += '<div class="map-desc col-6">'  + category + '';
                                                dynamicHTML += '</div>';
						dynamicHTML += '</li>';


					}
                                        setMap(response);
                                        }
                                        else {
                                        dynamicHTML += '<li class="media">';
						dynamicHTML += '<span class="d-block margin-5px-bottom">Location Not Found</span>';
						dynamicHTML += '</li>';
                                        }
					$("#myDIV").append(dynamicHTML).fadeIn(1000);

					


				})
				.fail(function (msg) {
					console.log('Ajax error');
					console.log(msg);
				});

			function setMap(response) {
				var json = JSON.parse(response);
				var lat = parseFloat(json[0].latitude);
				var long = parseFloat(json[0].longitude);
				var center = {
					lat: lat,
					lng: long
				};

				var zoom = 10;
				var locks = "2";
				var locations = [];
				for (var i = 0, length = json.length; i < length; i++) {
                                            var title = json[i].title,
						latitude = json[i].latitude,
						longitude = json[i].longitude,
						images = json[i].images,
						addr = json[i].desc,
						phone = json[i].phone,
						website = json[i].website,
						row_id = json[i].row_id,
                                                category = json[i].category;
                                locations[i] = [title, latitude, longitude, images, addr, phone, website, row_id,category];


				}

				//console.log(locations);
				loadMap(center, zoom, locations, locks);
			}


		}
		return false;

	});

});


function initMap(title, lati, longi, img, addr, phem, web, category, lock) {
	if (title != null || lati != null || longi != null) {
		var latitude = parseFloat(lati);
		var longitude = parseFloat(longi);
		var center = {
			lat: latitude,
			lng: longitude
		};
		var zoom = 10;
		var locks = lock;
		var locations = [
			['AC CAWANG ' + title, latitude, longitude, img, addr, phem, web,'',category]
		];

	} else {
		var locks = "0";
		var center = {
			lat: -3.21462,
			lng: 116.84513
		};

		var zoom = 5;
		var locations = [
                      <?php foreach ($ListMaps as $lp) { 
                           $descs=(contentValue($lp, 'desc'));
                           $descsss= str_replace(array("\r", "\n"), '', $descs)
                          ?>
                                 
                        ['<?= strtoupper(contentValue($lp, 'title'));?>',
                      <?=contentValue($lp, 'latitude');?>, 
                      <?=contentValue($lp, 'longitude');?>,
                                  '<?=contentValue($lp, 'images');?> ',
                                  '<?= html_entity_decode($descsss);?>',
                                  '<?=contentValue($lp, 'phone');?>',
                                  '<?=contentValue($lp, 'website');?>',
                                  <?=$lp['row_id'];?>,
                                  '<?=contentValue($lp, 'category');?>'],         
                      <?php  } ?>
		];
	}
       // alert(locations);

	loadMap(center, zoom, locations, lock, locks);
}

function setMap(item) {
	$("ul#myDIV > li").removeClass("active");
	var lock = "1";
	var id = $(item).attr("data-id");
	var title = $(item).attr("data-title");
	var lati = $(item).attr("data-lat");
	var longi = $(item).attr("data-long");
	var img = $(item).attr("data-img");
	var addr = $(item).attr("data-addr");
	var phem = $(item).attr("data-phone");
	var web = $(item).attr("data-web");
        var category = $(item).attr("data-cat");
	document.getElementById("linkbtn" + id).className = "active";
	initMap(title, lati, longi, img, addr, phem, web,category, lock);
}

function loadMap(center, zoom, locations, locks) {
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: zoom,
		center: center
	});

	var infowindow = new google.maps.InfoWindow({});
	var marker, count;
	var image = '<?=IMAGES_BASE_URL?>/location.png';

	for (count = 0; count < locations.length; count++) {
		var title = locations[count][0];
		var images = locations[count][3];
		var address = locations[count][4];
		var phone = locations[count][5];
		var web = locations[count][6];
		var id = locations[count][7];
                var category = locations[count][8];
                var icons = setIcon(category);
		var contentString = '<div id="office-info-box col-6">\n\
                                 <div class="map-img">\n\
                                 <img class="" src="' + images + '" width="200" height="100">\n\
                                 </div>\n\
                                <div class="map-flex">\n\
                                 <div class="map-desc col-8">\n\
                                 <p class="cawang-content-info"><b>' + title + '</b><br/>\n\
                                  ' + address + '<br/>\
                                  Web : <a target="_blank" href="'+ web + '">' + web + '</a><br/>\
                                  Phone : ' + phone + '</p>\n\
                                 </div>\n\
                                \n\ <div class="map-category col-8">\n\
                                  ' + icons + '\n\
                                 </div>\n\
                                 </div>\n\
                                 </div>';

		infowindow = new google.maps.InfoWindow({
			content: contentString
		});
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(locations[count][1], locations[count][2]),
			map: map,
			icon: image,
			title: locations[count][0]

		});
		if (locks === "1") {
			infowindow.open(map, marker);
		}
		//     

		google.maps.event.addListener(marker, 'click', (function (marker, count) {
			return function () {
				map.setZoom(15);
				map.setCenter(marker.getPosition());
				$("ul#myDIV > li").removeClass("active");
				infowindow.setContent(contentString);
				infowindow.open(map, marker);
				document.getElementById("linkbtn" + id).className = "active";

			};
		})(marker, count));

	}
}

function setIcon(category){

var fields = category.split('-');
var HTML = '';
var img1 = fields[0]+'.png';
HTML += '<img src="<?=IMAGES_BASE_URL?>/'+img1+'"> ';
if (fields[1]){
  var img2 = fields[1]+'.png';
HTML += '<img src="<?=IMAGES_BASE_URL?>/'+img2+'">';  
}

return HTML;
}
      </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4zysKrYdrgo8t8Ed4wtgtNBEwpms79qY&callback=initMap">
    </script>
        <!-- start footer --> 
        
        <!-- end footer -->
        <!-- start scroll to top -->
        <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
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
        
        <script>
            $(document).ready(function(){
   window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("navbar");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("navbar-fixed-top");
    navbar.classList.remove("navbar-top");
  } else {
    navbar.classList.remove("navbar-fixed-top");
     navbar.classList.add("navbar-top");
      ;
  }
}
});
       
        </script>
    </body>
</html>