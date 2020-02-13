<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Postal extends CI_Controller {
	public $arrMenu = array();
	public $data;
	public $privilege = array();
//	public $section = 8; //get module group id from database
//	public $module_id = 15; //get module id from database
	public $alias_category = "Postal";
	
	public function __construct()
	{
		parent::__construct();
                session_start();
		if(empty($_SESSION['admin_data'])){
			session_destroy();
			redirect(BASE_URL_BACKEND."/signin");
			exit();
		}
		
		$this->load->model(array('backend/Model_menu_frontend','backend/Model_address','backend/Model_properti','backend/Model_alias', 'backend/Model_language','backend/Model_logcms'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias'));
		
                $module_name=  $this->uri->segment(2);
                $getmodule = $this->Model_address->getModule($module_name);
                foreach ($getmodule as $gm) {
                 $this->module_id = $gm->module_id;
                 $this->section = $gm->module_group_id;
			     $_SESSION['module_id']=$this->module_id;
                }
		//get menu from helper menu
		$this->arrMenu = menu();
		$this->data = array();
                $this->data['ListMenu'] = $this->arrMenu;
                $this->data['CountMenu'] = count($this->arrMenu);
		$this->data['controller'] = $module_name;
                $this->data['MenuPostal'] = $this->Model_menu_frontend->getMenuContent($_SESSION['module_id']);
                $this->data['getProvince'] = $this->Model_address->getProvince(); 
		$this->privilege = accessprivilegeuserlevel($_SESSION['admin_data']['user_level_id'], $_SESSION['module_id']);
		$this->breadcrump = breadCrump($_SESSION['module_id']);
	}
	
	public function index()
	{
		$this->view();
	}
	
	function view()
        {
		$admin_data = $_SESSION['admin_data'];
		$this->data['admin_data'] = $admin_data;
		$this->data['section'] = $this->section; 
		$this->data['modul_id'] = $_SESSION['module_id'];
		$this->data['breadcrump'] = $this->breadcrump;
		
		$searchkey = "";
		$searchby = "";
		$where = "";
		$orderBy = "";
		$perpage = "";
		
		if(isset($_POST["tbSearch"])){
			$_SESSION["searchkey".$this->module_id] = '';
			$_SESSION["searchby".$this->module_id] = '';
			$_SESSION["perpage".$this->module_id] = '';
			
			$searchkey = $this->security->xss_clean(secure_input($_POST['searchkey']));
			$searchby = $this->security->xss_clean(secure_input($_POST['searchby']));
			$perpage = $this->security->xss_clean(secure_input($_POST['perpage']));
			
									
			$pesan = array();

			if ($searchkey=="") {
				$pesan[] = 'Keyword search is empty';
			} else if ($searchby=="") {
				$pesan[] = 'Search by has not been choose';
			}
			
			if (! count($pesan)==0 ) {
				foreach ($pesan as $indeks=>$pesan_tampil) {
					$_SESSION["searchkey".$this->module_id] = '';
					$_SESSION["searchby".$this->module_id] = '';
					$_SESSION["perpage".$this->module_id] = '';
				}
			} else {
				$_SESSION["searchkey".$this->module_id] = $searchkey;
				$_SESSION["searchby".$this->module_id] = $searchby;
				$_SESSION["perpage".$this->module_id] = $perpage;
					
				if(isset($_POST['searchkey'])){
					$searchkey = $_SESSION["searchkey".$this->module_id];
				}
				if(isset($_POST['searchby'])){
					$searchby = $_SESSION["searchby".$this->module_id];
				}
				
				if($searchkey != "" && $searchby != ""){
					$where   =   " WHERE ".$searchby." LIKE '%". $searchkey ."%' ";
				}
			}	
		} else {
			$searchkey = @$_SESSION["searchkey".$this->module_id];
			$searchby = @$_SESSION["searchby".$this->module_id];
			
			if($searchkey != "" && $searchby != ""){
				$where   =   " WHERE ".$searchby." LIKE '%". $searchkey ."%' ";
			}
			
			if(isset($_POST['perpage'])){
				$perpage = $this->security->xss_clean(secure_input($_POST['perpage'])); 
				$_SESSION["perpage".$this->module_id] = $perpage;
			} else {
				$perpage = @$_SESSION["perpage".$this->module_id];
				
				if($perpage == ""){
					$perpage = PER_PAGE;
				}
			}
		}
		
		$orderBy = "ORDER BY e.province_id Asc";
		
		$cond 			= $where." ".$orderBy;
		$rsUserLevel	= $this->Model_address->getListPostal($cond);
		$base_url		= BASE_URL_BACKEND."/Postal/view/";
		$total_rows		= count($rsUserLevel);
		$per_page		= $perpage;
		
		$this->data['paging']		= pagging($base_url , $total_rows, $per_page);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
		 $start = $per_page*$page - $per_page;
		if ($start<0) $start = 0;
		 $cond .= " LIMIT ".$start.",".$per_page;
                
		$ListPostal = $this->Model_address->getListPostal($cond);
		
//                print_r($ListPostal);
//                die;
//                
		$this->data["ListPostal"] = $ListPostal;
		
		//extract privilege
		$this->data["list"] = $this->privilege[0];
		$this->data["view"] = $this->privilege[1];
		$this->data["add"] = $this->privilege[2];
		$this->data["edit"] = $this->privilege[3];
		$this->data["publish"] = $this->privilege[4];
		$this->data["approve"] = $this->privilege[5];
		$this->data["delete"] = $this->privilege[6];
		$this->data["order"] = $this->privilege[7];
		
		if($this->data["list"] == 0){
			echo "<script>alert('Can\'t Access Module');window.location.href='".BASE_URL_BACKEND."/home';</script>";
			die;
		}
		
		$this->data['searchkey'] = $searchkey;
		$this->data['searchby'] = $searchby;
		$this->data['perpage'] = $perpage;
               
		
		$this->data['total'] = $total_rows;
		
		$this->load->view('backend/header',$this->data);
		$this->load->view('backend/Postal/list');
	}
	
	 function add(){
		//extract privilege
		$this->data["add"] = $this->privilege[2];
		
		if($this->data["add"] == 0){
			echo "<script>alert('Can\'t Access Module');window.location.href='".BASE_URL_BACKEND."/home';</script>";
			die;
		}
		
		$admin_data = $_SESSION['admin_data'];
		$this->data['admin_data'] = $admin_data;
		$this->data['section'] = $this->section; 
		$this->data['modul_id'] = $this->module_id;
		$this->data['breadcrump'] = $this->breadcrump;
		
		$this->load->view('backend/header',$this->data);
		$this->load->view('backend/Postal/add',$this->data);
	}
	
	public function doAdd(){
		//extract privilege
		$this->data["add"] = $this->privilege[2];
		
		if($this->data["add"] == 0){
			echo "<script>alert('Can\'t Access Module');window.location.href='".BASE_URL_BACKEND."/home';</script>";
			die;
		}
		
		$tb = $_POST['tbSave'];
		if (!$tb) {
			redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
			exit();
		}
		
		$admin_data = $_SESSION['admin_data'];
		$this->data['admin_data'] = $admin_data;
		$this->data['section'] = $this->section; 
		$this->data['modul_id'] = $this->module_id;
		$this->data['breadcrump'] = $this->breadcrump;
		
                $province_id = $this->security->xss_clean(secure_input($_POST['province_id']));
		$city_id = $this->security->xss_clean(secure_input($_POST['city_id']));	
                $districts_id = $this->security->xss_clean(secure_input($_POST['districts_id']));
		$villages_name = $this->security->xss_clean(secure_input($_POST['villages_name']));
               
                if ($villages_name == ''){
                    $villages_id = $this->security->xss_clean(secure_input($_POST['villages_id']));
                }
                else {
                    $villages_id = $this->Model_address->insertVillages($districts_id,$villages_name);
                }
		
		$postal_code_name = secure_input_editor($_POST['postal_code_name']);
		$pesan = array();
		// Validasi data
		if ($postal_code_name=="") {
			$pesan[] = 'Postal name is empty';
		} else if ($villages_id == "" ) {
			$pesan[] = 'Villages id is empty';
		} 
		
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
                                $this->data['province_id']=$province_id;
				$this->data['postal_code_name']=$postal_code_name;
				$this->data['villages_name']=$villages_name;
					
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Postal/add',$this->data);
			}
		} else {
                    $city_id = $this->Model_address->insertPostal($postal_code_name,$villages_id);				
                    $log_module = "Add ".$this->module;
                    $log_value = $city_id." | ".$postal_code_name." | ".$villages_id ;
                    $insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);

                    redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
                }	
	}
	
	
	
	function delete($id){
		if (empty($id)) {
			redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
			exit();
		}
		
		//extract privilege
		$this->data["delete"] = $this->privilege[6];
		
		if($this->data["delete"] == 0){
			echo "<script>alert('Can\'t Access Module');window.location.href='".BASE_URL_BACKEND."/home';</script>";
			die;
		}
		
		$rsPostal = $this->Model_address->getPostal($id); 
		$title = $rsPostal[0]['city_name'];
               
                
		$delete = $this->Model_address->deletePostal($id);
		
		$log_module = "Delete ".$this->module;
		$log_value = $id." | ".$title;
		$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
         
                redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
	}
      
	public function edit($id){
		if (empty($id)) {
			redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
			exit();
		}

		//extract privilege
		$this->data["edit"] = $this->privilege[3];
		
		if($this->data["edit"] == 0){
			echo "<script>alert('Can\'t Access Module');window.location.href='".BASE_URL_BACKEND."/home';</script>";
			die;
		}
		
		$admin_data = $_SESSION['admin_data'];
		$this->data['admin_data'] = $admin_data;
		$this->data['section'] = $this->section; 
		$this->data['modul_id'] = $this->module_id;
		$this->data['breadcrump'] = $this->breadcrump;
		
		$rsPostal = $this->Model_address->getPostal($id);  // mengambil database dari model untuk dikirim ke view
		
                $countPostal = count($rsPostal);
		
		$this->data['rsPostal'] = $rsPostal;
		$this->data['countPostal'] = $countPostal;
		
               
		$this->load->view('backend/header',$this->data);
		$this->load->view('backend/Postal/edit',$this->data);
	}
	
	public function doEdit($id){
		$tb = $_POST['tbEdit'];
		if (!$tb OR $id == '') {
			redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
			exit();
		}
		
		//extract privilege
		$this->data["edit"] = $this->privilege[3];
		
		if($this->data["edit"] == 0){
			echo "<script>alert('Can\'t Access Module');window.location.href='".BASE_URL_BACKEND."/home';</script>";
			die;
		}
		
		$admin_data = $_SESSION['admin_data'];
		$this->data['admin_data'] = $admin_data;
		$this->data['section'] = $this->section; 
		$this->data['modul_id'] = $this->module_id;
		$this->data['breadcrump'] = $this->breadcrump;		
		$rsPostal = $this->Model_address->getPostal($id);  // mengambil database dari model untuk dikirim ke view
		$countPostal = count($rsPostal);
		
		$this->data['rsPostal'] = $rsPostal;
		$this->data['countPostal'] = $countPostal;
                
		$province_id = $this->security->xss_clean(secure_input($_POST['province_id']));
		$city_id = $this->security->xss_clean(secure_input($_POST['city_id']));	
                $districts_id = $this->security->xss_clean(secure_input($_POST['districts_id']));
		
                if ($villages_name == ''){
                    $villages_id = $this->security->xss_clean(secure_input($_POST['villages_id']));
                }
                else {
                    $villages_name = $this->security->xss_clean(secure_input($_POST['villages_name']));
                    $villages_id = $this->Model_address->insertVillages($districts_id,$villages_name);
                }
		
		$postal_code_name = secure_input_editor($_POST['postal_code_name']);
		
		$pesan = array();
		// Validasi data
		if ($postal_code_name=="") {
			$pesan[] = 'Postal Code is empty';
		}
		
		
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Postal/edit',$this->data);
			}
		} else {
			$update = $this->Model_address->updatePostal($id,$postal_code_name,$villages_id);	
                        $log_module = "Edit ".$this->module;
                        $log_value = $id." | ".$postal_code_name." | ".$villages_id ;
                        $insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
                        redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);	
		}
		
	}
        
        
        function getCity($province_id) {
                    $tmp    = '';
                    
                    $data   = $this->Model_properti->getCity($province_id);
                    if(!empty($data)) {
                        $tmp .= "<option value='0'>City</option>";
                        foreach($data as $row){
                             $tmp .= "<option value='".$row->city_id."'>".$row->city_name."</option>";
                        }
                    } else {
                        $tmp .= "<option value='0'>City</option>";
                    }
                    die($tmp);
    }    
    function getDistrict($city_id) {
                    $tmp    = '';
                    
                    $data   = $this->Model_properti->getDistrict($city_id);
                    if(!empty($data)) {
                        $tmp .= "<option value='0'>Districts</option>";
                        foreach($data as $row){
                             $tmp .= "<option value='".$row->districts_id."'>".$row->districts_name."</option>";
                        }
                    } else {
                        $tmp .= "<option value='0'>Districts</option>";
                    }
                    die($tmp);
    }       
    function getVillages($districts_id) {
                    $tmp    = '';
                    
                    $data   = $this->Model_properti->getVillages($districts_id);
                    if(!empty($data)) {
                        $tmp .= "<select class='form-control' name='villages_id' id='villages_id'>";
                        $tmp .= "<option value='0'>Villages</option>";
                        foreach($data as $row){
                             $tmp .= "<option value='".$row->villages_id."'>".$row->villages_name."</option>";
                        }
                        $tmp .= "</select>";
                        $tmp .= "<input type='text' name='villages_name' id='villages_name' placeholder='tambahkan' class='form-control' value=''>";
                    } else {
                        $tmp .= "<input type='text' name='villages_name' id='villages_name' class='form-control' value=''>";
                    }
                    die($tmp);
    }
        
        
	
}