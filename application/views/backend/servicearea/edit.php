<!-- end::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
   <!-- begin:: Page -->
   <div class="m-grid m-grid--hor m-grid--root m-page">
      <?php include VIEWS_PATH_BACKEND."/menu.php"; ?>
      <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
         <?php include VIEWS_PATH_BACKEND."/leftMenu.php"; ?>	
         <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
               <div class="d-flex align-items-center">
                  <div class="mr-auto">
                     <h3 class="m-subheader__title m-subheader__title--separator">
                        <?php echo $breadcrump['module_group_name']; ?> - <?php echo $breadcrump['module_name']; ?> -  Edit
                     </h3>
                  </div>
               </div>
            </div>
            <!-- END: Subheader -->
            <div class="m-content">
               <div class="m-portlet">
                  <!--begin::Form-->
                  <form name="form1" action="<?php echo BASE_URL_BACKEND.'/'.$controller.'/doEdit/'.$row_id; ?>" method="post" role="form" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator">
                     <?php if(isset($error)){ ?>
                     <div class="form-group has-error">
                        <div class="col-lg-12">
                           <label for="inputError" class="control-label"><?php echo $error;?></label>
                        </div>
                     </div>
                     <?php } ?>    
                     <div class="m-portlet__body">
                       <div class="form-group m-form__group row">
                           <label class="col-lg-2 col-form-label">Province</label>
                           <div class="col-lg-3">
                               <select class="form-control m-input" name="province_id" id="province_id">
                                 <option value="">----</option>
                                 <?php foreach($getProvince as $prov){ ?>
                                 <option value="<?php echo $prov['province_id'];?>" <?php if($prov['province_id']==$addrs[0]['province_id']) echo 'selected'; ?>> <?php echo $prov['province_name']?> </option>
                                 <?php } ?>
                              </select>
                           </div>
                            <div class="col-lg-3 city" style="">
                            <select class="form-control m-input" name="city_id" id="city_id">
                                <?php foreach($city as $ct){ ?>
                                 <option value="<?php echo $ct['city_id'];?>" <?php if($ct['city_id']==$addrs[0]['city_id']) echo 'selected'; ?>> <?php echo $ct['city_name']?> </option>
                                 <?php } ?>
                            
                            </select> 
                            </div>
                            <div class="col-lg-3 districts" style="">
                            <select class="form-control m-input" name="districts_id" id="districts_id">
                                 <?php foreach($district as $dst){ ?>
                                 <option value="<?php echo $dst['districts_id'];?>" <?php if($dst['districts_id']==$addrs[0]['districts_id']) echo 'selected'; ?>> <?php echo $dst['districts_name']?> </option>
                                 <?php } ?>
                            </select> 
                            </div>
                        </div>
                     <?php echo formGenerate($controller,$rsContent);?>  
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                           <div class="m-form__actions m-form__actions--solid">
                              <div class="row">
                                 <div class="col-lg-2"></div>
                                 <div class="col-lg-6">
                                    <input name="tbEdit" class="btn btn-info btn-sm" type="submit" value="Edit">&nbsp;
                                    <a href="<?php echo BASE_URL_BACKEND.'/'.$controller; ?>" name="cancel" class="btn btn-danger btn-sm" > Cancel </a>                                                    
                                 </div>
                              </div>
                           </div>
                        </div>
                
                  <!--end::Form-->
                  </div>
                  </form>
                  <!--end::Form-->
               </div>
            </div>
         </div>
      </div>
      <?php include VIEWS_PATH_BACKEND."/footer.php"; ?>
   </div>
   <!-- end:: Page -->
   <!--begin::Base Scripts -->
   <script src="<?php echo BACKEND_BASE_URL; ?>/vendors/base/vendors.bundle.js" type="text/javascript"></script>
   <script src="<?php echo BACKEND_BASE_URL; ?>/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
   <!--end::Base Scripts -->   
   <!--begin::Page Vendors -->
   <script src="<?php echo BACKEND_BASE_URL; ?>/demo/default/custom/components/datatables/base/html-table.js" type="text/javascript"></script>
   <script src="<?php echo BACKEND_BASE_URL; ?>/demo/default/custom/components/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
   <script src="<?php echo BACKEND_BASE_URL; ?>/demo/default/custom/components/forms/widgets/bootstrap-timepicker.js" type="text/javascript"></script>   
    
   <script language="javascript">
    $(document).ready(function(){ 
      
    $('#province_id').change(function(){
         var province_id = $('#province_id').val();
       if(province_id == 0) {
           $(".city").hide();
       }
        else{                           
          $.post("<?php echo BASE_URL_BACKEND.'/servicearea/getCity';?>/"+province_id,                           
             function(obj){
            $(".city").show();   
            $('#city_id').html(obj);

        }); 
       }

    });

    $('#city_id').change(function(){
         var city_id = $('#city_id').val();
         //alert(city_id);
       if(city_id == 0) {

           $(".districts").hide();
       }
         else{                           
          $.post("<?php echo BASE_URL_BACKEND.'/servicearea/getDistrict';?>/"+city_id+"",                           
             function(obj){
            $(".districts").show();                   
            $('#districts_id').html(obj);
        }); 
       }

    });

   $('#districts_idss').change(function(){
         var districts_id = $('#districts_idss').val();
         //alert(districts_id);
       if(districts_id == 0) {

           $(".villages").hide();
       }
       else{
           
             $.ajax({
                type: "POST",
                url: "<?php echo BASE_URL_BACKEND.'/Servicearea/getVillages';?>/"+districts_id,
              
                success: function(obj){
                   $(".villages").show();                   
                    $('#villages_id').html(obj);
                }
            });  
       }

    });
        $('#villages_idss').change(function(){
         var villages_id = $('#villages_idss').val();
        // alert(villages_id);
       if(villages_id == 0) {

           $(".postal").hide();
       }
       else{
            $.ajax({
                type: "POST",
                url: "<?php echo BASE_URL_BACKEND.'/Servicearea/getPostal';?>/"+villages_id,
               
                success: function(obj){
                   $(".postal").show();                   
                   $('#postal').html(obj);
                }
            }); 
       }

    });

    });
</script>

   <!--end::Page Snippets -->
   
</body>
<!-- end::Body -->
</html>