<?php 
    $ci =& get_instance();
    $ci->load->model('web/Model_content');
    $ListSosmed =array();
    $ListLoc =array();
    
    $sosmed=121;
    $string =$sosmed;
    $arrayin=array_map('intval', explode(',', $string));
    $where_in = implode(",",$arrayin);
    $order_sosmed='';
    $order_sosmed .= " order by a.row_order ASC";
    $order_sosmed .= " limit  0, 8";
    $whereSosmed = '';
    $whereSosmed .= " WHERE a.row_active_status=1 and a.row_active_status=1 and a.row_parent=0 and a.module_id in(".$where_in.") ";            
    $ListSosmedAll = $ci->Model_content->getListContent($whereSosmed,$order_sosmed);        
    foreach ($ListSosmedAll as $lc){
                    if ($lc['module_id']== $sosmed){
                        $ListSosmed[]=$lc; 
                        $countSosmed = count($ListSosmed);
                    } 
                }
    ?>
  <!-- start header -->
        <header>
        <meta name="theme-color" content="#FF0000" />
            <!-- start navigation -->
             <nav id="navbar" class="navbar navbar-default bootsnav navbar-top background-white nav-box-width navbar-expand-lg on no-full menu-center">
               <div class="container-fluid nav-header-container">
                    <!-- start logo -->
                    <div class="col-auto col-lg-1 pl-0 nav_logo">
                        <a href="<?= BASE_URL;?>" title="<?= BASE_URL;?>" class="logo">
                            <img src="<?= IMAGES_BASE_URL;?>/logo-cawang.png" data-rjs="<?= IMAGES_BASE_URL;?>/logo-cawang.png" class="logo-dark" alt="cawang">
                            <img src="<?= IMAGES_BASE_URL;?>/logo-cawang.png" data-rjs="<?= IMAGES_BASE_URL;?>/logo-cawang.png" alt="cawang" class="logo-light default"></a>
                    </div>
                    <!-- end logo -->
                    <div class="col accordion-menu pr-0 pr-md-3">
                        <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar-collapse-toggle-1">
                            <span class="sr-only">toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-collapse collapse" id="navbar-collapse-toggle-1">
                            <ul id="accordion" class="nav navbar-nav no-margin alt-font text-normal" data-in="fadeIn" data-out="fadeOut">
                                <!-- Cawang -->
                                 <li class="margin-5px-left dropdown megamenu-fw">
                                    <a href="#">Cawang</a><i class="fas fa-angle-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
                                    <!-- start sub menu -->
                                    <div class="menu-back-div dropdown-menu megamenu-content mega-menu collapse mega-menu-full">
                                        <ul>
										
                                            <li class="mega-menu-column col-lg-6 cover-background" style="background-image:url('<?= IMAGES_BASE_URL;?>/buatan_indonesia.jpg');">
                                                <a href="<?= BASE_URL;?>/perjalanan" title="perjalanan">
												<ul> 
                                                    <li class="li-min-h  dropdown-header margin-20px-top li-first">
                                                        
                                                            <span class="text-light-blue text-small decoration-underline alt-font font-weight-600">60 Tahun <br> Perjalanan Cawang</span>
                                                            <span class="separator-line-horrizontal-medium-light2 bg-extra-medium-gray d-table width-100px"></span>
                                                   
                                                      
                                                     </li>
                                                </ul>
											  </a>
                                            </li>
											
                                            <li class="mega-menu-column col-lg-6 cover-background" style="background-image:url('<?= IMAGES_BASE_URL;?>/inovasi.jpg'); margin-bottom: 10px;">
                                                <ul class=""> 
                                                    <li class="dropdown-header margin-20px-top li-first">
                                                        <span class="text-small text-white-2 decoration-underline alt-font font-weight-600">Inovasi Anak Bangsa</span>
                                                        <span class="separator-line-horrizontal-medium-light2 bg-white d-table width-100px"></span>
                                                    </li>
                                                    </ul>
                                                    <ul class="inovasi col-lg-4 col-xs-12"> 
                                                    <li>
                                                        <a class="text-white-2" href="<?= BASE_URL?>" title="">
                                                            Aluminum Fire Protection
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="text-white-2" href="<?= BASE_URL?>" title="">
                                                           U Bend Coating
                                                        </a>
                                                    </li>
                                                     <li>
                                                        <a class="text-white-2" href="<?= BASE_URL?>" title="">
                                                           Silicon Coating
                                                        </a>
                                                    </li>
                                                     <li>
                                                        <a class="text-white-2" href="<?= BASE_URL?>" title="">
                                                            Peredam Suara
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                            </li>
                                        </ul>
                                        <!-- end sub menu -->
                                    </div>
                                </li>
                                <!-- Product-->
                               <li class="margin-5px-left dropdown megamenu-fw mt-xs-10">
                                    <a href="#">Produk</a><i class="fas fa-angle-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
                                  <!-- start sub menu -->
                                    <div class="menu-back-div dropdown-menu megamenu-content mega-menu collapse mega-menu-full">
                                        <ul>
                                            
                                            <!-- start sub menu column  -->
                                            <li class="li-min-h mega-menu-column col-lg-3 li-first">
                                                <!-- start sub menu item  -->
                                                <ul class="margin-5px-left">
                                                    <li class="dropdown-header margin-20px-top">
                                                        <span class="text-small decoration-underline alt-font font-weight-600">Cawang AC Pro</span>
                                                        <span class="separator-line-horrizontal-medium-light2 bg-extra-medium-gray d-table mx-auto width-100px"></span>
                                                    </li>
                                                    <li>
                                                    <a href="<?= BASE_URL?>/products/1" title="">
                                                    <div class="d-flex align-items-center margin-15px-bottom alt-font">
                                                         <span class="text-large text-extra line-height-normal font-weight-600 width-40">1/2 PK</span>                  
                                                         <div class="char-value width-60"><span class="text-extra-small font-weight-400">EP/EU-SN-5SGM</span><br> <span class="text-medium-gray font-weight-500">5000 Btu/H</span></div>
                                                       </div>
                                                    </a>
                                                    </li>
                                                   <li>
                                                    <a href="<?= BASE_URL?>/products/2" title="">
                                                    <div class="d-flex align-items-center margin-15px-bottom alt-font">
                                                         <span class="text-large text-extra line-height-normal font-weight-600 width-40">3/4 PK</span>                  
                                                         <div class="char-value width-60"><span class="text-extra-small font-weight-400">EP/EU-SN-7SGM</span><br> <span class="text-medium-gray font-weight-500">7000 Btu/H</span></div>
                                                       </div>
                                                    </a>
                                                    </li>
                                                    <li>
                                                    <a href="<?= BASE_URL?>/products/3" title="">
                                                    <div class="d-flex align-items-center margin-15px-bottom alt-font">
                                                         <span class="text-large text-extra line-height-normal font-weight-600 width-40">1 PK</span>                  
                                                         <div class="char-value width-60"><span class="text-extra-small font-weight-400">EP/EU-SN-9SGM</span><br> <span class="text-medium-gray font-weight-500">9000 Btu/H</span></div>
                                                       </div>
                                                    </a>
                                                    </li>
                                                    <li>
                                                    <a href="<?= BASE_URL?>/products/4">
                                                    <div class="d-flex align-items-center margin-15px-bottom alt-font">
                                                         <span class="text-large text-extra line-height-normal font-weight-600 width-40">1 1/2 PK</span>                  
                                                         <div class="char-value width-60"><span class="text-extra-small font-weight-400">EP/EU-SN-12SGM</span><br> <span class="text-medium-gray font-weight-500">12000 Btu/H</span></div>
                                                       </div>
                                                    </a>
                                                    </li>
                                                    
                                                </ul>
                                            </li>
                                            <li class="mega-menu-column col-lg-3 cover-background li-first" style="background-image:url('<?= IMAGES_BASE_URL;?>/ruangan.jpg');">
                                                <ul class="margin-5px-left"> 
                                                    <li class="dropdown-header margin-20px-top">
                                                        <span class="text-small text-white-2 decoration-underline alt-font font-weight-600">Ruangan</span>
                                                        <span class="separator-line-horrizontal-medium-light2 bg-extra-medium-gray d-table mx-auto width-100px"></span>
                                                    </li>
                                                    <li>
                                                    <a href="<?= BASE_URL?>/products/1" title="">
                                                    <div class="d-flex align-items-center margin-15px-bottom alt-font">                 
                                                         <div class="char-value width-100"><span class="text-white-2 text-large text-extra line-height-normal font-weight-600">Ruang Tidur</span>
                                                             <br> <span class="text-white-2 font-weight-500">~16 m2</span></div>
                                                       </div>
                                                    </a>
                                                    </li>
                                                   <li>
                                                    <a href="<?= BASE_URL?>/products/2" title="">
                                                    <div class="d-flex align-items-center margin-15px-bottom alt-font">                 
                                                         <div class="char-value width-100"><span class="text-white-2 text-large text-extra line-height-normal font-weight-600">Ruang Keluarga</span>
                                                             <br> <span class="text-white-2 font-weight-500">~25 m2</span></div>
                                                       </div>
                                                    </a>
                                                    </li>
                                                    <li>
                                                    <a href="<?= BASE_URL?>/products/3" title="">
                                                    <div class="d-flex align-items-center margin-15px-bottom alt-font">                 
                                                         <div class="char-value width-100"><span class="text-white-2 text-large text-extra line-height-normal font-weight-600">Ruang Tamu</span>
                                                             <br> <span class="text-white-2 font-weight-500">~36 m2</span></div>
                                                       </div>
                                                    </a>
                                                    </li>
                                                    <li>
                                                    <a href="<?= BASE_URL?>/products/4">
                                                    <div class="d-flex align-items-center margin-15px-bottom alt-font">                 
                                                         <div class="char-value width-100"><span class="text-white-2 text-large text-extra line-height-normal font-weight-600">Ruang Pertemuan</span>
                                                             <br> <span class="text-white-2 font-weight-500">~49 m2</span></div>
                                                       </div>
                                                    </a>
                                                    </li>
                                                    
                                                </ul>
                                            </li>
                                            <li class="li-min-h mega-menu-column col-lg-3 cover-background li-first" style="background-image:url('<?= IMAGES_BASE_URL;?>/beli.jpg');">
                                                <!-- start sub menu item  -->
                                                <ul>
                                                    <li class="dropdown-header margin-20px-top">
                                                        <a href="<?= BASE_URL?>/products/1" class="pl-0 text-uppercase">
                                                        <span class="decoration-underline alt-font font-weight-600">Beli Produk</span>
                                                        <span class="separator-line-horrizontal-medium-light2 bg-extra-medium-gray d-table mx-auto width-100px"></span>   
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="li-min-h mega-menu-column col-lg-3 cover-background li-first" style="background-image:url('<?= IMAGES_BASE_URL;?>/ac_tepat.jpg');">
                                                <!-- start sub menu item  -->
                                                <ul>
                                                    <li class="dropdown-header margin-20px-top">
                                                        <span class="text-small decoration-underline alt-font font-weight-600">Ac yang Tepat</span>
                                                        <span class="separator-line-horrizontal-medium-light2 bg-extra-medium-gray d-table mx-auto width-100px"></span>
                                                    </li>
                                                    <li class="margin-5px-left">
                                                        <!--
                                                    <a href="#modal-popup" class="modal-popup position-absolute btn-btu text-center text-white-2 btn btn-small btn-rounded btn-primary">HITUNG BTU</a>
                                                        -->
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <!-- end sub menu -->
                                    </div>
                                </li>
                                 <!-- Hubungi -->
                                 <li class="margin-5px-left" style="display: none">
                                     <a href="#">Tips & Trik</a>
                                 </li>
                                 <li class="margin-5px-left">
                                     <a href="<?= BASE_URL?>/contact">Hubungi Kami</a>
                                 </li>
                                <li class="margin-30px-left">
                                    <div class="dealer col-auto col-lg-4 pr-0 text-xs-left text-lg-right">
                                         <a href="#form-dealer" class="modal-popup btn-dealer btn-primary btn-small btn btn-rounded text-uppercase margin-15px-tb ">Menjadi Dealer</a>
                
                                    </div>
                                    
                                 </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </nav>
            <!-- end navigation --> 
        </header>
        <!-- end header -->
        
         