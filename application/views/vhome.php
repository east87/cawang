<!doctype html>
<html class="no-js" lang="en">
    <head>
             <!-- title -->
        <title>AC Cawang Pro | Dingin Lebih Cepat</title>
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
        <link rel="stylesheet" href="<?= FRONTEND_BASE_URL; ?>/css/bootsnavs.css">
        <!-- style -->
        <link rel="stylesheet" href="<?= FRONTEND_BASE_URL; ?>/css/style.css" />
        <!-- responsive css -->
        <link rel="stylesheet" href="<?= FRONTEND_BASE_URL; ?>/css/responsive.css" />
        <!--[if IE]>
            <script src="<?= FRONTEND_BASE_URL; ?>/js/html5shiv.js"></script>
        <![endif]-->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <?php include 'include/analytics.php';?>
        <style>
            #myDIV {
                max-height: 400px;
                overflow-y: auto;
            }
             div#office-info-box { max-width: 200px!important;}
            .tab-style4 .nav-tabs li a {
                line-height: 44px;
                padding: 5px 3px;
                letter-spacing: 0.7px;
            }
        
        </style>
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
                                                dynamicHTML += '<div class="col-8">';
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
                                                dynamicHTML += '<div class="map-desc col-4">'  + category + '';
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
                                 <div class="map-desc col-6">\n\
                                 <p class="cawang-content-info"><b>' + title + '</b><br/>\n\
                                  ' + address + '<br/>\
                                  Web : <a target="_blank" href="'+ web + '">' + web + '</a><br/>\
                                  Phone : ' + phone + '</p>\n\
                                 </div>\n\
                                \n\ <div class="map-category col-6">\n\
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
    </head>
    <body>
        <?php include 'include/tagmanager.php';?>
        <!-- start header -->
        <?php include 'include/vheader.php';?>
        <section id="home" class="p-0 inner-match-height md-no-padding-bottom" data-stellar-background-ratio="0.5">
            <div class="opacity-extra-medium"></div>
            <video id="vidbg" autoplay="" muted class="" poster="">
               
                
            </video>
        </section>
       <section class="padding-50px-all wow fadeIn position-relative cover-background background-position-top" style="background-image: url('<?= IMAGES_BASE_URL;?>/bg_perjalanan.jpg');">
                <div class="container">
                    <div class="row justify-content-right">
                    <div class="offset-lg-1 col-12 col-lg-8 text-xs-center text-right">
                        <div class="w-100">
                            <img src="<?= IMAGES_BASE_URL;?>/made_indonesia.png" width="300" alt="aku_indonesia">
                        </div>
                    </div>
                </div>
                 
                    <div class="row align-items-center padding-10px-all"> 
                        <div class="col-12 col-lg-5 md-margin-15px-bottom">
                           <h6 class="font-weight-600 alt-font text-extra-dark-gray">60 Tahun Perjalanan Cawang</h6>
                            <p>Cawang merupakan merk dagang Indonesia yang ada sejak tahun 1954. Produk pertama yang di produksi oleh merk ini adalah Radio Transistor yang begitu dikenal luas oleh masyarakat Indonesia. Tak hanya itu saja, “Tjawang” juga memproduksi televisi pertama karya anak bangsa yang bersejarah dalam ajang “Asian Games ke-4” tahun 1962 di Indonesia.</p>
                            <p>Kini, Cawang kembali hadir dengan produk baru untuk menjawab kebutuhan Indonesia. Cawang AC Pro merupakan AC yang memiliki keunggulan untuk memberikan rasa nyaman dan ramah lingkungan dengan harga yang terjangkau.</p>
                            <a href="<?= BASE_URL;?>/perjalanan" title="60 tahun perjalanan cawang" class="btn btn-small btn-rounded btn-primary" style="margin-top:30px">Ikuti Perjalanan Cawang</a>
                        </div>
                        <div class="col-12 col-lg-7 p-0">
                        <div class="right-swipe swiper-full-screen swiper-container white-move">
                            <div class="swiper-wrapper">
                           <div class="swiper-slide text-center"><img src="<?= IMAGES_BASE_URL;?>/sejarah-image-1-opt.png" alt="" data-no-retina=""></div>
                           <div class="swiper-slide text-center"> <img src="<?= IMAGES_BASE_URL;?>/sejarah-image-2-opt.png" alt="" data-no-retina=""></div>
                           <div class="swiper-slide text-center"> <img src="<?= IMAGES_BASE_URL;?>/sejarah-image-3-opt.png" alt="" data-no-retina=""></div>
                           <div class="swiper-slide text-center"> <img src="<?= IMAGES_BASE_URL;?>/sejarah-image-4-opt.png" alt="" data-no-retina=""></div>
                           <div class="swiper-slide text-center"> <img src="<?= IMAGES_BASE_URL;?>/sejarah-image-5-opt.png" alt="" data-no-retina=""></div>
                           <div class="swiper-slide text-center"> <img src="<?= IMAGES_BASE_URL;?>/sejarah-image-6-opt.png" alt="" data-no-retina=""></div>
                          <div class="swiper-slide text-center"> <img src="<?= IMAGES_BASE_URL;?>/sejarah-image-7-opt.png" alt="" data-no-retina=""></div>
                          <div class="swiper-slide text-center"> <img src="<?= IMAGES_BASE_URL;?>/sejarah-image-8-opt.png" alt="" data-no-retina=""></div>
                          <div class="swiper-slide text-center"> <img src="<?= IMAGES_BASE_URL;?>/sejarah-image-9-opt.png" alt="" data-no-retina=""></div>
                        </div>  
                        
                    </div>
                        </div> 
                    </div>
                </div>
            </section> 
        
        <!-- start tab style 04 section -->
        <section class="wow fadeIn padding-50px-all">
            <div class="container tab-style4">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-7 text-center margin-100px-bottom sm-margin-40px-bottom">
                        <div class="position-relative overflow-hidden w-100">
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Inovasi AC Cawang</span>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-12 col-lg-2 col-md-3 pr-0 position-relative z-index-1">
                        <!-- start tab navigation -->
                        <ul class="nav nav-tabs alt-font text-uppercase text-small font-weight-600">
                            <li class="nav-item"><a class="nav-link active" href="#tab-four1" data-toggle="tab">Anti Bocor & Karat</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab-four2" data-toggle="tab">Aman Korsleting</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab-four3" data-toggle="tab">Proteksi Kebakaran</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab-four4" data-toggle="tab">Suara Mesin Halus</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab-four5" data-toggle="tab">Instalasi Dimana Pun</a></li>
                        </ul>
                        <!-- end tab navigation -->
                    </div>
                    <div class="col-12 col-lg-10 col-md-9 pl-0">
                        <div class="tab-content">
                            <!-- start tab content -->
                            <div class="tab-pane med-text fade in active show" id="tab-four1">
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-6 sm-margin-30px-bottom">
                                        <img src="<?= IMAGES_BASE_URL;?>/coating-u.png" alt="" class="w-100">
                                    </div>
                                    <div class="col-12 col-lg-5 col-md-6 offset-lg-1">
                                        <h6 class="alt-font font-weight-700 text-extra-dark-gray margin-20px-bottom text-uppercase">Anti Bocor & Karat</h6>
                                        <span class="text-extra-large text-extra-dark-gray margin-20px-bottom d-block">Lapisan Pengaman yang membuat AC Lebih Tahan Lama</span>
                                        <p>Cawang AC Pro memiliki U Bend yang dilapisi oleh coating sehingga lebih tahan karat dan aman  dari kebocoran. Sedangkan merk lain U Bend tidak dilapisi coating sehingga tidak tahan karat dan rawan kebocoran.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab content -->
                            <!-- start tab content -->
                            <div class="tab-pane fade in" id="tab-four2">
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-6 sm-margin-30px-bottom">
                                        <img src="<?= IMAGES_BASE_URL;?>/silicon.png" alt="" class="w-100">
                                    </div>
                                    <div class="col-12 col-lg-5 col-md-6 offset-lg-1">
                                        <h6 class="alt-font font-weight-700 text-extra-dark-gray margin-20px-bottom text-uppercase">Aman Korsleting</h6>
                                        <span class="text-extra-large text-extra-dark-gray margin-20px-bottom d-block">Lapisan Silikon yang membuat AC menjadi Lebih Aman</span>
                                        <p>Cawang AC Pro terlindungi dari bahaya korsleting karena PCB dilapisi oleh silicon. Sedangkan merk lain rentan korsleting & arus pendek listrik karena PCB tidak dilapisi silicon.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab content -->
                            <!-- start tab content -->
                            <div class="tab-pane fade in" id="tab-four3">
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-6 sm-margin-30px-bottom">
                                        <img src="<?= IMAGES_BASE_URL;?>/alumunium-fire-protection.png" alt="" class="w-100">
                                    </div>
                                    <div class="col-12 col-lg-5 col-md-6 offset-lg-1">
                                        <h6 class="alt-font font-weight-700 text-extra-dark-gray margin-20px-bottom text-uppercase">Proteksi Kebakaran</h6>
                                        <span class="text-extra-large text-extra-dark-gray margin-20px-bottom d-block">Terdapat lapisan alumunium yang tahan percikan api</span>
                                        <p>Cawang AC Pro memiliki terminal board cover yang dilapisi aluminium foil sehingga tahan api. Sedangkan merk lain terminal board cover hanya berupa plastik, sehingga berbahaya jika ada percikan api.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab content -->
                            <!-- start tab content -->
                            <div class="tab-pane fade in" id="tab-four4">
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-6 sm-margin-30px-bottom">
                                        <img src="<?= IMAGES_BASE_URL;?>/kipas_ac_opt.png" alt="" class="w-100">
                                    </div>
                                    <div class="col-12 col-lg-5 col-md-6 offset-lg-1">
                                        <h6 class="alt-font font-weight-700 text-extra-dark-gray margin-20px-bottom text-uppercase">Tidak Berisik</h6>
                                        <span class="text-extra-large text-extra-dark-gray margin-20px-bottom d-block"><i>Dimple</i> pada kipas yang dapat meredam kebisingan AC</span>
                                        <p>Cawang AC Pro memiliki dimple (lubang kecil-kecil) pada kipas sehingga mengurangi suara berisik saat AC  beroperasi. Sedangkan AC merk lain tidak memiliki dimple pada kipas yang membuat suara berisik saat AC beroperasi.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab content -->
                            <!-- start tab content -->
                            <div class="tab-pane fade in" id="tab-four5">
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-6 sm-margin-30px-bottom">
                                        <img src="<?= IMAGES_BASE_URL;?>/flexible_instalation.jpg" alt="" class="w-100">
                                    </div>
                                    <div class="col-12 col-lg-5 col-md-6 offset-lg-1">
                                        <h6 class="alt-font font-weight-700 text-extra-dark-gray margin-20px-bottom text-uppercase">Pasang Dimana Pun</h6>
                                        <span class="text-extra-large text-extra-dark-gray margin-20px-bottom d-block">Dengan panjang pipa mencapai 20m, maka outdoor unit dapat dipasang di mana saja tanpa batas</span>
                                        <p>Cawang AC Pro memiliki pipa dengan panjang 20m sehingga unit indoor AC dapat dipasang sesuai keinginan. Sedangakan AC merk lain memiliki pipa dengan panjang maksimal 15m yang membuat unit indoor dan outdoor AC dipasang dengan jarak berdekatan.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab content -->
                        </div>
                    </div>       
                </div>                                
            </div>
        </section>
         <!-- SPEC -->
        
        
        <section class="wow fadeIn position-relative padding-50px-all cover-background background-position-top top-space" style="background-image: url('<?= IMAGES_BASE_URL;?>/bg_pilih_ac.jpg');">
                <div class="container">
                    <div class="row justify-content-center">
                    <div class="col-12 col-lg-7 text-center margin-30px-bottom sm-margin-40px-bottom">
                        <div class="position-relative overflow-hidden w-100">
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">AC Cawang Pro</span>
                        </div>
                    </div>
                </div>
                    <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <div class="row align-items-center margin-25px-bottom">
                            <!-- start features box item -->
                            <a href="<?= BASE_URL?>/products/1" title="" class="hover-zoom col-6 col-md-3 text-center wow zoomIn" data-wow-delay="0.4s">
                                <div class="float-left padding-nine-left">
                                     <h6 class="text-light-blue font-weight-600 margin-three-bottom">1/2 PK</h6>
                                    <span class="text-medium text-extra-dark-gray alt-font d-block">5000 Btu/H</span>
                                    <div class="separator-line-horrizontal-medium-light2 bg-extra-medium-gray d-inline-block"></div>
                                    <p class="p-0 text-small">EP-SN-5SGM</p>
                                </div>
                            </a>
                            <!-- end features box item -->
                            <!-- start features box item -->
                            <a href="<?= BASE_URL?>/products/2" title="" class="hover-zoom col-6 col-md-3 text-center wow zoomIn" data-wow-delay="0.4s">
                                <div class="float-left padding-nine-left">
                                     <h6 class="text-light-blue font-weight-600 margin-three-bottom">3/4 PK</h6>
                                    <span class="text-medium text-extra-dark-gray alt-font d-block">7000 Btu/H</span>
                                    <div class="separator-line-horrizontal-medium-light2 bg-extra-medium-gray d-inline-block"></div>
                                    <p class="p-0 text-small">EP-SN-7SGM</p>
                                </div>
                            </a>
                            <!-- end features box item -->
                            <!-- start features box item -->
                            <a href="<?= BASE_URL?>/products/3" title="" class="hover-zoom col-6 col-md-3 text-center wow zoomIn" data-wow-delay="0.4s">
                                <div class="float-left padding-nine-left">
                                     <h6 class="text-light-blue font-weight-600 margin-three-bottom">1 PK</h6>
                                    <span class="text-medium text-extra-dark-gray alt-font d-block">9000 Btu/H</span>
                                    <div class="separator-line-horrizontal-medium-light2 bg-extra-medium-gray d-inline-block"></div>
                                    <p class="p-0 text-small">EP-SN-9SGM</p>
                                </div>
                            </a>
                            <!-- end features box item -->
                            <!-- start features box item -->
                            <a href="<?= BASE_URL?>/products/4" title="" class="hover-zoom col-6 col-md-3 text-center wow zoomIn" data-wow-delay="0.6s" title="">
                               <div class="float-left padding-nine-left">
                                    <h6 class="text-light-blue font-weight-600 margin-three-bottom">1 1/2 PK</h6>
                                    <span class="text-medium text-extra-dark-gray alt-font d-block">12000 Btu/H</span>
                                    <div class="separator-line-horrizontal-medium-light2 bg-extra-medium-gray d-inline-block"></div>
                                    <p class="p-0 text-small">EP-SN-12GM</p>
                                </div>
                            </a>
                            <!-- end features box item -->
                        </div>
                    </div>
                </div> 
                    <div class="row align-items-center"> 
                        <div class="col-12 col-lg-5 md-margin-50px-bottom">
                            <h6 class="alt-font text-extra-dark-gray font-weight-600">Pilihlah kapasitas AC yang tepat <br>sesuai dengan kebutuhan ruangan Anda.</h6>
                            <p>Pemilihan kapasitas AC yang salah dapat membuat penggunaan listrik lebih boros.</p>
                           <!--
                           <a href="#modal-popup" class="modal-popup btn btn-small btn-rounded btn-primary">Hitung Kebutuhan AC</a>
                           -->
                        </div>
                        <div class="col-12 col-lg-7 text-center">
                            <img src="<?= IMAGES_BASE_URL;?>/ac-produk.png" alt="" class="width-100">
                        </div> 
                    </div>
                </div>
            </section>
        
        <section class="bg-light-gray wow fadeIn padding-50px-all hover-option4 blog-post-style3" style="display: none">
            <div class="container">
                 <div class="row justify-content-center">
                    <div class="col-12 col-lg-7 text-center margin-100px-bottom sm-margin-40px-bottom">
                        <div class="position-relative overflow-hidden w-100">
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Tips & Berita</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- start blog item -->
                    <div class="grid-item col-12  col-lg-3 col-md-6 margin-30px-bottom text-center text-md-left wow fadeInUp">
                        <div class="blog-post bg-white">
                            <div class="blog-post-images overflow-hidden position-relative">
                                <a href="blog-post-layout-01.html">
                                    <img src="<?= IMAGES_BASE_URL;?>/mode.jpg" alt="">
                                    <div class="blog-hover-icon"><span class="text-extra-large font-weight-300">+</span></div>
                                </a>
                            </div>
                           <div class="bg-blue post-details padding-10px-all">
                                <p class="text-light-gray text-small">Informasi</p>                                                        
                                <a href="blog-post-layout-03.html" class="text-white-2 alt-font post-title text-medium w-100 d-block margin-15px-bottom">Kenalilah simbol yang ada di remote AC-mu untuk menghemat biaya</a>
                            </div>
                        </div>
                    </div>
                    <!-- end blog item -->
                    <!-- start blog item -->
                    <div class="grid-item col-12  col-lg-3 col-md-6 margin-30px-bottom text-center text-md-left wow fadeInUp" data-wow-delay="0.2s">
                        <div class="blog-post bg-white">
                            <div class="blog-post-images overflow-hidden position-relative">
                                <a href="blog-post-layout-02.html">
                                    <img src="https://placehold.it/700x403" alt="">
                                    <div class="blog-hover-icon"><span class="text-extra-large font-weight-300">+</span></div>
                                </a>
                            </div>
                            <div class="bg-blue post-details padding-10px-all">
                                <p class="text-light-gray text-small">Tips & Trik</p>                                                        
                                <a href="blog-post-layout-03.html" class="text-white-2 alt-font post-title text-medium w-100 d-block margin-15px-bottom">7 Cara Menghemat Listrik Ac Hingga 2x Lipat</a>
                            </div>
                        </div>
                    </div>
                    <!-- end blog item -->
                    <!-- start blog item -->
                    <div class="grid-item col-12  col-lg-3 col-md-6 margin-30px-bottom text-center text-md-left wow fadeInUp" data-wow-delay="0.4s">
                        <div class="blog-post bg-white">
                            <div class="blog-post-images overflow-hidden position-relative">
                                <a href="blog-post-layout-03.html">
                                    <img src="https://placehold.it/700x403" alt="">
                                    <div class="blog-hover-icon"><span class="text-extra-large font-weight-300">+</span></div>
                                </a>
                            </div>
                            <div class="bg-blue post-details padding-10px-all">
                                <p class="text-light-gray text-small">Informasi</p>                                                        
                                <a href="blog-post-layout-03.html" class="text-white-2 alt-font post-title text-medium w-100 d-block margin-15px-bottom">AC sering bocor/ netes? Ketahuilah penyebabnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item col-12  col-lg-3 col-md-6 margin-30px-bottom text-center text-md-left wow fadeInUp" data-wow-delay="0.4s">
                        <div class="blog-post bg-white">
                            <div class="blog-post-images overflow-hidden position-relative">
                                <a href="blog-post-layout-03.html">
                                    <img src="https://placehold.it/700x403" alt="">
                                    <div class="blog-hover-icon"><span class="text-extra-large font-weight-300">+</span></div>
                                </a>
                            </div>
                            <div class="bg-blue post-details padding-10px-all">
                                <p class="text-light-gray text-small">Tutorial</p>                                                        
                                <a href="blog-post-layout-03.html" class="text-white-2 alt-font post-title text-medium w-100 d-block margin-15px-bottom">Cara membersihkan AC rumah sendiri dengan mudah & tepat</a>
                            </div>
                        </div>
                    </div>
                    <!-- end blog item -->
                </div>
            </div>
        </section>
        
         <section class="wow fadeIn padding-50px-all" style="display: none;">
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
       <script>
                        var w = window.matchMedia("(max-width: 700px)");
                        var vid1 = document.getElementById("vidbg");
                        var source1 = document.createElement("source");
                        source1.id = "hvid1";
                        source1.setAttribute("type", "video/mp4");
                        vid1.appendChild(source1);
                        
                        if (w.matches) {
                            vid1.pause();
                            source1.removeAttribute("src");
                            source1.setAttribute("src", "<?= VIDEO_BASE_URL; ?>/mobilevid.mp4");
                            vid1.load();
                            vid1.play();
                        } else {
                            vid1.pause();
                            source1.removeAttribute("src");
                            source1.setAttribute("src", "<?= VIDEO_BASE_URL; ?>/bg_video.mp4");
                            vid1.load();
                            vid1.play();
                        }
                        
                        window.addEventListener("resize", function() {
                            var w = window.matchMedia("(max-width: 700px)");
                            var vid1 = document.getElementById("vid1");
                            var source1 = document.getElementById("hvid1");
                        
                            if (w.matches) {
                                vid1.pause();
                                source1.src = "<?= VIDEO_BASE_URL; ?>/mobilevid.mp4";
                                vid1.load();
                                vid1.play();
                            } else {
                                vid1.pause();
                                source1.src = "<?= VIDEO_BASE_URL; ?>/bg_video.mp4";
                                vid1.load();
                                vid1.play();
                            }
                        });
                     </script>
    </body>
</html>