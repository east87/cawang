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
            <!-- start navigation -->
             <nav id="navbar" class="navbar navbar-default bootsnav navbar-top background-white nav-box-width navbar-expand-lg on no-full menu-center">
               <div class="container-fluid nav-header-container">
                    <!-- start logo -->
                    <div class="col-auto col-lg-2 pl-0 nav_logo">
                        <a href="index.html" title="Pofo" class="logo">
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
                        <div class="navbar-collapse collapse justify-content-center" id="navbar-collapse-toggle-1">
                            <ul id="accordion" class="nav navbar-nav no-margin alt-font text-normal" data-in="fadeIn" data-out="fadeOut">
                                <!-- Cawang -->
                                 <li class="dropdown megamenu-fw">
                                    <a href="#">Cawang</a><i class="fas fa-angle-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
                                    <!-- start sub menu -->
                                    <div class="menu-back-div dropdown-menu megamenu-content mega-menu collapse mega-menu-full">
                                        <ul>
                                            
                                            <!-- start sub menu column  -->
                                            
                                            <li class="mega-menu-column col-lg-6 cover-background" style="background-image:url('<?= IMAGES_BASE_URL;?>/buatan_indonesia.jpg');">
                                                <ul> 
                                                    <li class="dropdown-header margin-20px-top">
                                                        <span class="text-light-blue text-small decoration-underline alt-font font-weight-600">60 Tahun <br> Perjalanan Cawang</span>
                                                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table width-100px"></span>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-column col-lg-6 cover-background" style="background-image:url('<?= IMAGES_BASE_URL;?>/inovasi.jpg');">
                                                <ul class=""> 
                                                    <li class="dropdown-header margin-20px-top">
                                                        <span class="text-small text-white-2 decoration-underline alt-font font-weight-600">Inovasi Anak Bangsa</span>
                                                        <span class="separator-line-horrizontal-medium-light2 bg-white d-table width-100px"></span>
                                                    </li>
                                                    </ul>
                                                    <ul class="inovasi"> 
                                                    <li>
                                                        <a class="text-white-2" href="<?= BASE_URL?>/Product/1">
                                                            Aluminum Fire Protection
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="text-white-2" href="<?= BASE_URL?>/Product/1">
                                                           U Bend Coating
                                                        </a>
                                                    </li>
                                                     <li>
                                                        <a class="text-white-2" href="<?= BASE_URL?>/Product/1">
                                                           Silicon Coating
                                                        </a>
                                                    </li>
                                                     <li>
                                                        <a class="text-white-2" href="<?= BASE_URL?>/Product/1">
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
                                <li class="dropdown megamenu-fw">
                                    <a href="#">Products</a><i class="fas fa-angle-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
                                    <!-- start sub menu -->
                                    <div class="menu-back-div dropdown-menu megamenu-content mega-menu collapse mega-menu-full">
                                        <ul>
                                            
                                            <!-- start sub menu column  -->
                                            <li class="mega-menu-column col-lg-3">
                                                <!-- start sub menu item  -->
                                                <ul class="margin-5px-left">
                                                    <li class="dropdown-header margin-20px-top">
                                                        <span class="text-small decoration-underline alt-font font-weight-600">Cawang AC Pro</span>
                                                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto width-100px"></span>
                                                    </li>
                                                    <li>
                                                    <a href="<?= BASE_URL?>/Product/1">
                                                    <div class="d-flex align-items-center margin-15px-bottom alt-font">
                                                         <span class="text-large text-extra line-height-normal font-weight-600 width-40">1/2 PK</span>                  
                                                         <div class="char-value width-60"><span class="text-extra-small font-weight-400">EP/EU-SN-5SMG</span><br> <span class="text-medium-gray font-weight-500">5000 Btu/H</span></div>
                                                       </div>
                                                    </a>
                                                    </li>
                                                   <li>
                                                    <a href="<?= BASE_URL?>/Product/2">
                                                    <div class="d-flex align-items-center margin-15px-bottom alt-font">
                                                         <span class="text-large text-extra line-height-normal font-weight-600 width-40">3/4 PK</span>                  
                                                         <div class="char-value width-60"><span class="text-extra-small font-weight-400">EP/EU-SN-7SMG</span><br> <span class="text-medium-gray font-weight-500">7000 Btu/H</span></div>
                                                       </div>
                                                    </a>
                                                    </li>
                                                    <li>
                                                    <a href="<?= BASE_URL?>/Product/3">
                                                    <div class="d-flex align-items-center margin-15px-bottom alt-font">
                                                         <span class="text-large text-extra line-height-normal font-weight-600 width-40">1 PK</span>                  
                                                         <div class="char-value width-60"><span class="text-extra-small font-weight-400">EP/EU-SN-9SMG</span><br> <span class="text-medium-gray font-weight-500">7000 Btu/H</span></div>
                                                       </div>
                                                    </a>
                                                    </li>
                                                    <li>
                                                    <a href="<?= BASE_URL?>/Product/4">
                                                    <div class="d-flex align-items-center margin-15px-bottom alt-font">
                                                         <span class="text-large text-extra line-height-normal font-weight-600 width-40">1 1/2 PK</span>                  
                                                         <div class="char-value width-60"><span class="text-extra-small font-weight-400">EP/EU-SN-12SMG</span><br> <span class="text-medium-gray font-weight-500">12000 Btu/H</span></div>
                                                       </div>
                                                    </a>
                                                    </li>
                                                    
                                                </ul>
                                            </li>
                                            <li class="mega-menu-column col-lg-3 cover-background" style="background-image:url('<?= IMAGES_BASE_URL;?>/ruangan.jpg');">
                                                <ul> 
                                                    <li class="dropdown-header margin-20px-top">
                                                        <span class="text-small text-white-2 decoration-underline alt-font font-weight-600">Ruangan</span>
                                                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto width-100px"></span>
                                                    </li>
                                                    <li>
                                                    <a href="<?= BASE_URL?>/Product/1">
                                                    <div class="d-flex align-items-center margin-15px-bottom alt-font">                 
                                                         <div class="char-value width-100"><span class="text-white-2 text-large text-extra line-height-normal font-weight-600">Kamar Anak</span>
                                                             <br> <span class="text-white-2 font-weight-500">5 m2</span></div>
                                                       </div>
                                                    </a>
                                                    </li>
                                                   <li>
                                                    <a href="<?= BASE_URL?>/Product/1">
                                                    <div class="d-flex align-items-center margin-15px-bottom alt-font">                 
                                                         <div class="char-value width-100"><span class="text-white-2 text-large text-extra line-height-normal font-weight-600">Kamar Utama</span>
                                                             <br> <span class="text-white-2 font-weight-500">5 m2</span></div>
                                                       </div>
                                                    </a>
                                                    </li>
                                                    <li>
                                                    <a href="<?= BASE_URL?>/Product/1">
                                                    <div class="d-flex align-items-center margin-15px-bottom alt-font">                 
                                                         <div class="char-value width-100"><span class="text-white-2 text-large text-extra line-height-normal font-weight-600">Ruang Utama</span>
                                                             <br> <span class="text-white-2 font-weight-500">5 m2</span></div>
                                                       </div>
                                                    </a>
                                                    </li>
                                                    <li>
                                                    <a href="<?= BASE_URL?>/Product/1">
                                                    <div class="d-flex align-items-center margin-15px-bottom alt-font">                 
                                                         <div class="char-value width-100"><span class="text-white-2 text-large text-extra line-height-normal font-weight-600">Ruang Keluarga</span>
                                                             <br> <span class="text-white-2 font-weight-500">5 m2</span></div>
                                                       </div>
                                                    </a>
                                                    </li>
                                                    
                                                </ul>
                                            </li>
                                            <li class="mega-menu-column col-lg-3 cover-background" style="background-image:url('<?= IMAGES_BASE_URL;?>/beli.jpg');">
                                                <!-- start sub menu item  -->
                                                <ul>
                                                    <li class="dropdown-header margin-20px-top">
                                                        <a href="" class="pl-0">
                                                        <span class="text-small decoration-underline alt-font font-weight-600">Beli Produk</span>
                                                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto width-100px"></span>   
                                                        </a>
                                                        
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-column col-lg-3 cover-background" style="background-image:url('<?= IMAGES_BASE_URL;?>/ac_tepat.jpg');">
                                                <!-- start sub menu item  -->
                                                <ul>
                                                    <li class="dropdown-header margin-20px-top">
                                                        <span class="text-small decoration-underline alt-font font-weight-600">Ac yang Tepat</span>
                                                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto width-100px"></span>
                                                    </li>
                                                    <li class="margin-5px-left">
                                                    <a href="#" class="position-absolute btn-btu text-center text-white-2 btn btn-small btn-rounded btn-primary">HITUNG BTU</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <!-- end sub menu -->
                                    </div>
                                </li>
                                 <!-- Hubungi -->
                                 <li class="dropdown megamenu-fw"></li>
                              <li class="dropdown megamenu-fw">
                                    <a href="#">Hubungi Kami</a><i class="fas fa-angle-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
                                    <!-- start sub menu -->
                                    <div class="menu-back-div dropdown-menu megamenu-content mega-menu collapse mega-menu-full"  style="display: block!important;">
                                        <ul class="cover-background" style="background-image:url('<?= IMAGES_BASE_URL;?>/ruangan.jpg');">
                                            
                                            <!-- start sub menu column  -->
                                            <li class="mega-menu-column col-lg-4">
                                                <!-- start sub menu item  -->
                                                <ul>
                                                    <li class="dropdown-header margin-20px-top">
                                                        <span class="text-small decoration-underline alt-font font-weight-600">Hubungi Kami</span>
                                                        <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto width-100px"></span>
                                                    </li>
                                                    <li class="margin-5px-left logo-hubungi">
                                                         <img src="<?= IMAGES_BASE_URL;?>/logo-footer.png" data-rjs="<?= IMAGES_BASE_URL;?>/logo-footer.png" class="logo-dark" alt="cawang">
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mega-menu-column col-lg-4">
                                                <div class="menu-address">
                                                  <p class="text-small d-block margin-15px-bottom width-80 sm-width-100">
                                                        PT. Gobel Dharma Nusantara<br>
                                                        Jl. Dewi Sartika No. 14 (Cawang II)<br> 
                                                        Jakarta 13630 - Indonesia
                                                    </p>
                                                     <p class="text-small d-block margin-5px-bottom width-80 sm-width-100">
                                                        Pusat Pelayanan Pelanggan
                                                    </p>

                                                    <div class="text-small">Tel : (021) 801-5666 Ext. 111</div>
                                                    <div class="text-small">Fax : (021) 801-5675</div>  
                                                </div>
                                                    
                                            </li>
                                            <li class="mega-menu-column col-lg-4">
                                                <!-- start sub menu item  -->
                                                <ul class="menu-address"> 
                                                    <li>
                                                        <a class="text-white-2" href="<?= BASE_URL?>/Product/1">
                                                            <img src="<?= IMAGES_BASE_URL;?>/icon-ig.png" height="40" width="40" alt="Dealer">
                                                             Menjadi Dealer
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="text-white-2" href="<?= BASE_URL?>/Product/1">
                                                           U Bend Coating
                                                        </a>
                                                    </li>
                                                     <li>
                                                        <a class="text-white-2" href="<?= BASE_URL?>/Product/1">
                                                           Silicon Coating
                                                        </a>
                                                    </li>
                                                     <li>
                                                        <a class="text-white-2" href="<?= BASE_URL?>/Product/1">
                                                            Peredam Suara
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            
                                        </ul>
                                        <!-- end sub menu -->
                                    </div>
                                </li>
                                <li class="">
                                    <a href="team-classic.html" class="btn-dealer btn-small btn btn-rounded">Menjadi Dealer</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto col-lg-2 pr-0 text-right">
                        
                    </div>
                </div>
            </nav>
            <!-- end navigation --> 
        </header>
        <!-- end header -->