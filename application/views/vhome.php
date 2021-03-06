<!doctype html>
<html class="no-js" lang="en">
    <head>
             <!-- title -->
        <title><?= html_entity_decode(contentValue($ListMeta[0], 'title'));?> | Dingin Lebih Cepat</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="author" content="Cawang">
        <!-- description -->
        <meta name="description" content="<?= html_entity_decode(contentValue($ListMeta[0], 'meta_desc'));?>">
        <!-- keywords -->
        <meta name="keywords" content="<?= html_entity_decode(contentValue($ListMeta[0], 'meta_title'));?>">
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
            div.gmnoprint{
                 margin: 1px!important;
            }
            .gmnoprint .gm-style-mtc div{
                height: 25px!important;
                font-size: 14px!important;
            }
            button.gm-fullscreen-control{
                margin: 1px!important;
                height: 25px!important;
                width: 25px!important;
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
					timeout: 5000
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
                                                dynamicHTML += '<div class="col-10">';
						dynamicHTML += '<a href="#lokasi" class="media-body text-small" data-id="' + json[i].row_id + '"\n\
                                                    data-title="' + json[i].title + '"\n\
                                                    data-lat="' + json[i].latitude + '"\n\
                                                    data-long="' + json[i].longitude + '"\n\
                                                    data-img="' + json[i].images + '" \n\
                                                    data-addr="' + json[i].desc + '" \n\
                                                    data-phone="' + json[i].phone + '" \n\
                                                    data-web="' + json[i].website + '" \n\
                                                    data-cat="' + json[i].category + '" \n\
                                                    data-dir="' + json[i].direction + '" \n\
                                                    onclick="setMap(this);">';
						dynamicHTML += '<span class="d-block text-extra-dark-gray alt-font margin-5px-bottom">' + json[i].title + '</span>';
						dynamicHTML += '<span class="d-block text-extra-small">' + json[i].desc + '</span>';
						dynamicHTML += '</a>';
                                                dynamicHTML += '</div>';
                                                dynamicHTML += '<div class="p-0 map-desc col-2 elements-social social-icon-style-8"><ul class="small-icon no-margin-bottom float-right">'  + category + '</ul>';
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
				var locks = "0";
				var locations = [];
				for (var i = 0, length = json.length; i < length; i++) {
                                            var title = json[i].title,
						latitude = json[i].latitude,
						longitude = json[i].longitude,
						images = json[i].images,
						addr = json[i].desc,
						phone = json[i].phone,
						website = json[i].website,
						id = json[i].row_id,
                                                category = json[i].category,
                                                direction = json[i].direction;
                                locations[i] = [title, latitude, longitude, images, addr, phone, website, id,category,direction];
				}
				//console.log(locations);
				loadMap(center, zoom, locations, locks);
			}
		}
		return false;

	});

});


function initMap(id, title, lati, longi, img, addr, phem, web,category,direction,lock) {

	if (title != null || lati != null || longi != null) {
		var latitude = parseFloat(lati);
		var longitude = parseFloat(longi);
		var center = {
			lat: latitude,
			lng: longitude
		};
		var zoom = 20;
		var locks = lock;
		var locations = [
			[title, latitude, longitude, img, addr, phem, web,id,category,direction]
		];
		

	} else {
		var locks = "0";
		var center = {
			lat: -3.21462,
			lng: 116.84513
		};

		var zoom = 4.7;
		var locations = [
                      <?php foreach ($ListMaps as $lp) { 
                           $descs=(contentValue($lp, 'desc'));
                           $descsss= str_replace(array("\r", "\n"), '', $descs)
                          ?>
                                 
                        ['<?= contentValue($lp, 'title');?>',
                      <?=contentValue($lp, 'latitude');?>, 
                      <?=contentValue($lp, 'longitude');?>,
                                  '<?= contentValue($lp, 'images');?> ',
                                  '<?= html_entity_decode($descsss);?>',
                                  '<?= contentValue($lp, 'phone');?>',
                                  '<?= contentValue($lp, 'website');?>',
                                   '<?= $lp['row_id'];?>',
                                  '<?= contentValue($lp, 'category');?>',
                                  '<?= contentValue($lp, 'direction');?>'],         
                      <?php  } ?>
		];
	}
       // alert(locations);

	loadMap(center, zoom, locations, locks);
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
        var direction = $(item).attr("data-dir");
	document.getElementById("linkbtn" + id).className = "active";
	initMap(id,title, lati, longi, img, addr, phem, web,category,direction, lock);
}

function loadMap(center, zoom, locations, locks) {
	var map = new google.maps.Map(document.getElementById('map'), {
		zoom: zoom,
		center: center,
                scrollwheel: false,
                gestureHandling: 'greedy',
                mapTypeId: 'roadmap'
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
                var direction = locations[count][9];
                var icons = setIcon(category);
		var contentString ='<div class="p-0 col-md-12" id="iw-container">' +
                                    '<div class="p-0 iw-content" id="imgcontent'+id+'" img_id="'+images+'">' +
                                    '<img id="map_image'+id+'" src="" alt="' + title + '">' +
                                    '</div>' +
                                    '<div class="padding-five-lr padding-five-top"><span class=" alt-font text-small iw-title">' + title + '</span></div>' +
                                    '<div class="cscroll scroll-style">' +
                                        '<p class="padding-five-lr text-small"> ' + address +'</p>' +
                                        '<div class="p-0 col-md-12 addr-icon">' +   
                                                '<div class="col-md-6 addrs text-small">' +
                                                    '<span class="text-small"><a href="#">' + phone + '</a><br/>' +
                                                    '<a target="_blank" href="'+ web + '">' + web + '</a><br/>' +
                                                    '<a target="_blank" href="'+ direction + '">Direction</a></span>' +
                                                '</div>' +
                                                '<div class="col-md-6 icons elements-social social-icon-style-8"><ul class="padding-five-lr padding-five-top small-icon no-margin-bottom float-right"> ' + icons + '</ul></div>' +
                                        '</div>' +
                                    '</div>' +
                                    '</div>';
                                     
		infowindow = new google.maps.InfoWindow({
			content: contentString
		});
                //alert(contentString);
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(locations[count][1], locations[count][2]),
			map: map,
			ids: locations[count][7],
                        img: locations[count][3],
                        icon: image,
			title: locations[count][0]

		});
              //infowindow.open(map, marker);
		if (locks === "1") {
			infowindow.open(map, marker);
                        setImagesBy(id,images);
		}    

		google.maps.event.addListener(marker, 'click', (function (marker,contentString) {
			return function () {
                              window.setTimeout(function() {
                                map.panTo(marker.getPosition());
                              }, 500);
                              
                              var ids = marker.ids;
                               var img = marker.img;
                              //alert(ids);
				map.setZoom(20);
				
				$("ul#myDIV > li").removeClass("active");
                                map.setCenter(marker.getPosition());
				infowindow.setContent(contentString);
				infowindow.open(map, marker);
				document.getElementById("linkbtn" + ids).className = "active";
                                window.setTimeout (function(){
                               
                                $("#map_image"+ids).attr("src",img); 
                                $("#map_image"+ids).fadeIn('slow');
                                
                            }, 1000);
                

			};
		})(marker,contentString,count));

	}
}

            function setIcon(category){

            var fields = category.split('-');
            var HTML = '';
            var img1 = fields[0]+'.png';
            HTML += '<li><img src="<?=IMAGES_BASE_URL?>/'+img1+'"></li>';
            if (fields[1]){
              var img2 = fields[1]+'.png';
            HTML += '<li><img src="<?=IMAGES_BASE_URL?>/'+img2+'"></li>';  
            }

            return HTML;
            }
            function setImagesBy(id,images){
            setTimeout(function(){ $("#map_image"+id).attr("src",images); }, 500);
            $("#map_image"+id).fadeIn('slow');
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
        
        <?php 
            if($ListSejarah){
              $i=0;
                foreach($ListSejarah as $pg){
                $i++; 

               $child=array();
                 foreach ($pg['content'] as $key => $sc) {
                  if(@$sc['slider']){
                     $child = $sc['slider'];
                  }
                 } 
        ?> 
                     
               
           
       <section class="padding-50px-all wow fadeIn position-relative cover-background background-position-top" style="background-image: url('<?= IMAGES_BASE_URL;?>/bg_perjalanan.jpg');">
                <div class="container">
                    <div class="row justify-content-right">
                    <div class="offset-lg-1 col-12 col-lg-8 text-xs-center text-right">
                        <div class="w-100">
                            <img src="<?= html_entity_decode(contentValue($pg, 'images'));?>" width="300" alt="aku_indonesia">
                        </div>
                    </div>
                </div>
                 
                    <div class="row align-items-center padding-10px-all"> 
                        <div class="col-12 col-lg-5 md-margin-15px-bottom">
                           <h6 class="font-weight-600 alt-font text-extra-dark-gray"><?= html_entity_decode(contentValue($pg, 'title'));?></h6>
                            <p><?= html_entity_decode(contentValue($pg, 'desc'));?></p>
                            <a href="<?= BASE_URL;?>/perjalanan" title="60 tahun perjalanan cawang" class="btn btn-small btn-rounded btn-primary" style="margin-top:30px">Ikuti Perjalanan Cawang</a>
                        </div>
                        <div class="col-12 col-lg-7 p-0">
                        <div class="right-swipe swiper-full-screen swiper-container white-move">
                            <div class="swiper-wrapper">
                        <?php  foreach ($child as $ch) { ?>      
                           <div class="swiper-slide text-center"><img src="<?= html_entity_decode(contentValue($ch, 'slider_images'));?>" alt="<?= html_entity_decode(contentValue($ch, 'title_slider'));?>" data-no-retina=""></div>
                          <?php } ?>
                        </div>  
                        
                    </div>
                        </div> 
                    </div>
                </div>
            </section> 
         <?php  }} ?>
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
                            <?php 
                            if($ListInovasi){
                              $i=0;
                            foreach($ListInovasi as $in){
                            $i++; 
                            ?> 
                                <li class="nav-item"><a class="nav-link <?php if($i==1){ echo 'active';}?>" href="#inovasi<?=$in['row_id'];?>" data-toggle="tab"><?= html_entity_decode(contentValue($in, 'title'));?></a></li>
                           <?php  }} ?>
                        </ul>
                        <!-- end tab navigation -->
                    </div>
                    <div class="col-12 col-lg-10 col-md-9 pl-0">
                        <div class="tab-content">
                            <!-- start tab content -->
                             <?php 
                            if($ListInovasi){
                              $i=0;
                            foreach($ListInovasi as $in){
                            $i++; 
                            ?> 
                            <div class="tab-pane med-text fade in  <?php if($i==1){ echo 'active show';}?>" id="inovasi<?=$in['row_id'];?>">
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-6 sm-margin-30px-bottom">
                                        <img src="<?= html_entity_decode(contentValue($in, 'images'));?>" alt="<?= html_entity_decode(contentValue($in, 'title'));?>" class="w-100">
                                    </div>
                                    <div class="col-12 col-lg-5 col-md-6 offset-lg-1">
                                        <h6 class="alt-font font-weight-700 text-extra-dark-gray margin-20px-bottom text-uppercase"><?= html_entity_decode(contentValue($in, 'right_title'));?></h6>
                                        <span class="text-extra-large text-extra-dark-gray margin-20px-bottom d-block"><?= html_entity_decode(contentValue($in, 'sub_title'));?></span>
                                        <p><?= html_entity_decode(contentValue($in, 'desc'));?></p>
                                    </div>
                                </div>
                            </div>
                             <?php  }} ?>
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
                            <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase">Cawang AC Pro</span>
                        </div>
                    </div>
                </div>
                    <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <div class="row align-items-center margin-25px-bottom">
                            <!-- start features box item -->
                                        <?php if($countProducts > 0){
                                                         $i=0;
                                                        foreach($Products as $hp){  $i++; 
                                                        $i++;
                                                        if ($hp['row_alias'] !=''){                          
                                                            $ref =BASE_URL.'/'.$hp['row_alias'];
                                                            }                       
                                                            else {                          
                                                         $ref = BASE_URL.'/products/'.$hp['row_id'];           
                                                         } 
                                                        ?>
                            <a href="<?= $ref?>" title="" class="hover-zoom col-6 col-md-3 text-center wow zoomIn" data-wow-delay="0.4s">
                                <div class="float-left padding-nine-left">
                                     <h6 class="text-light-blue font-weight-600 margin-three-bottom"><?= html_entity_decode(contentValue($hp, 'title'));?></h6>
                                    <span class="text-medium text-extra-dark-gray alt-font d-block"><?= html_entity_decode(contentValue($hp, 'btu'));?> Btu/H</span>
                                    <div class="separator-line-horrizontal-medium-light2 bg-extra-medium-gray d-inline-block"></div>
                                    <p class="p-0 text-small"><?= html_entity_decode(contentValue($hp, 'ep'));?></p>
                                </div>
                            </a>
                             <?php }}?>   
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
          <section class="wow fadeIn padding-50px-all" id="lokasi">
            <div class="container">
                <div class="row flex-lg-row-reverse"> 
                
               <main class="col-xs-12 col-lg-9 left-sidebar pr-0 md-no-padding-left">
                     <div id="map" class="col-12 w-100 h-100">
                            
                    </div>
               </main>
                <aside class="col-12 col-lg-3">
                    <div class="margin-15px-tb">
                            <a href="<?= BASE_URL;?>"><img src="<?= IMAGES_BASE_URL;?>/logo-footer.png" alt="" class="margin-25px-bottom" data-no-retina=""></a>
                   </div>
                     <div class="d-inline-block width-100 margin-15px-tb">
                         <label class="text-small">Temukan Kami di</label>
                            <div class="position-relative">
                                    <input id="input-search" type="text" class="bg-transparent text-small m-0 border-color-extra-light-gray medium-input float-left" placeholder="Nama kota / daerah">                                   
                                    <button id="submit-search" type="submit" class="search-btn bg-primary btn position-absolute right-0 top-1"><i class="fas fa-search no-margin-left"></i></button>
                            </div> 
                        </div>
                     <div class="margin-45px-bottom sm-margin-25px-bottom">
                            <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span id="loc_search">List</span></div>
                            <ul class="latest-post position-relative scroll-style" id="myDIV">
                                <?php foreach ($ListMaps as $lp) {?>
                                <li class="media " id="linkbtn<?=$lp['row_id'];?>">
                                    <div class="col-10">
                                        <a href="#lokasi" class="media-body text-small" 
                                       data-id="<?=$lp['row_id'];?>" 
                                       data-title="<?= contentValue($lp, 'title');?>" 
                                       data-lat="<?=contentValue($lp, 'latitude');?>" data-long="<?=contentValue($lp, 'longitude');?>" 
                                       data-img="<?=contentValue($lp, 'images');?>" data-addr="<?=contentValue($lp, 'desc');?>" 
                                       data-phone="<?=contentValue($lp, 'phone');?>"
                                       data-web="<?=contentValue($lp, 'website');?>"
                                       data-cat="<?=contentValue($lp, 'category');?>"
                                       data-dir="<?=contentValue($lp, 'direction');?>"
                                       onclick="setMap(this);">                      
                                        <span class="d-block text-extra-dark-gray alt-font margin-5px-bottom"><?= html_entity_decode(contentValue($lp, 'title'));?></span> 
                                        <span class="d-block text-extra-small"><?= html_entity_decode(contentValue($lp, 'desc'));?></span>
                                    </a>    
                                    </div>
                                   
                                    <div class="p-0 map-desc col-2 elements-social social-icon-style-8">
                                        <ul class="small-icon no-margin-bottom float-right">
                                        <?php 
                                        $str_arr = explode('-', contentValue($lp, 'category'));
                                        $HTML = '';
                                        $img1 = IMAGES_BASE_URL.'/'.$str_arr[0].'.png';
                                        $HTML .= '<li><img src="'.$img1.'"></li>'; 
                                        if (isset($str_arr[1])){
                                        $img2 = IMAGES_BASE_URL.'/'.$str_arr[1].'.png';
                                        $HTML .= '<li><img src="'.$img2.'"></li>';  
                                    }    
                                      echo $HTML;
                                        ?>
                                        </ul>
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
                            source1.setAttribute("src", "<?= html_entity_decode(contentValue($ListBanner[0], 'video_hp'));?>");
                            vid1.load();
                            vid1.play();
                        } else {
                            vid1.pause();
                            source1.removeAttribute("src");
                            source1.setAttribute("src", "<?= html_entity_decode(contentValue($ListBanner[0], 'video'));?>");
                            vid1.load();
                            vid1.play();
                        }
                        
                        window.addEventListener("resize", function() {
                            var w = window.matchMedia("(max-width: 700px)");
                            var vid1 = document.getElementById("vid1");
                            var source1 = document.getElementById("hvid1");
                        
                            if (w.matches) {
                                vid1.pause();
                                source1.src = "<?= html_entity_decode(contentValue($ListBanner[0], 'video_hp'));?>";
                                vid1.load();
                                vid1.play();
                            } else {
                                vid1.pause();
                                source1.src = "<?= html_entity_decode(contentValue($ListBanner[0], 'video'));?>";
                                vid1.load();
                                vid1.play();
                            }
                        });
                     </script>
    </body>
</html>