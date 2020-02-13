<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicearea extends CI_Controller {

	public $arrMenu = array();
	public $data;
	public $privilege = array();
	public function __construct()

	{
		parent::__construct();
                  if (!$_SESSION) {
                    session_start();
                }
                 include 'checkSession.php'; 
              
                date_default_timezone_set('UTC');
		$this->load->model(array('backend/Model_menu_frontend','web/Model_label','web/Model_servicearea'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias'));		
                $module_name=  $this->uri->segment(1);
                $this->data["menu_id"]=3;
                $getmodule = $this->Model_servicearea->getModule($module_name);
                foreach ($getmodule as $gm) {
                 $this->module_id = $gm->module_id;
                 $this->section = $gm->module_group_id;
                 $_SESSION['module_id']=$this->module_id;
                }
		
		$this->data['controller'] = $module_name; 
                 $this->data['module_id']=$_SESSION['module_id'];
                
             
	}

	 function index()
	{
                $order_limit='';
                $order_limit .= " order by a.row_order ASC";
                $order_limit .= " limit  0, 100";
                $whereMaps = '';
                $whereMaps .= " WHERE a.row_active_status=1 and  a.row_parent=0 and a.module_id = ".$_SESSION['module_id'];
                $ListMaps = $this->Model_servicearea->getListContent($whereMaps,$order_limit);
                $this->data["countMaps"] = count($ListMaps);
		$this->data["ListMaps"] = $ListMaps;
               // echo '<pre>';
                //print_r($ListMaps);
              
		$this->load->view('vservicearea',$this->data);
	}
        function doSearch(){
            if($_POST)              
            {
            $search = $this->input->post("search");
             
            $getDis = $this->Model_servicearea->getAddress($search);
            $dataDist=array();
            foreach ($getDis as $val) {
              $dataDist[]=  $val['districts_id'];
            }
            
            $whereDist = implode(",",$dataDist);
            $order_map ='';
                $order_map .= " order by a.row_order ASC limit 0,10";
                $whereMap = '';
                $label_page ='';
               $whereMap .= " WHERE a.row_active_status=1 and a.row_active_status=1 and a.row_parent=0 and a.districts_id in(".$whereDist.") ";
               $List = $this->Model_servicearea->getListContent($whereMap,$order_map,$label_page);
              // echo '<pre>';
               //print_r($List);
            $ListMaps =array();
            $index  = 0;
            foreach ($List as $ls) {
             $ListMaps[$index]['title']= strtoupper(contentValue($ls, 'title'));
             $ListMaps[$index]['latitude']= contentValue($ls, 'latitude'); 
             $ListMaps[$index]['longitude']= contentValue($ls, 'longitude');  
             $ListMaps[$index]['images']= contentValue($ls, 'images');  
             $ListMaps[$index]['desc']= contentValue($ls, 'desc');  
             $ListMaps[$index]['phone']= contentValue($ls, 'phone'); 
             $ListMaps[$index]['website']= contentValue($ls, 'website');
             $ListMaps[$index]['category']= contentValue($ls, 'category');
             $ListMaps[$index]['row_id']= $ls['row_id'];
             $index ++; 
            
            }
            //echo '<pre>';
            //print_r($ListMaps);
            //echo json_encode($ListMaps);
            if($ListMaps !== FALSE)
                {
                    echo json_encode($ListMaps);
                }
                else
                {
                    echo json_encode(array());
                }
            
            }
            die;
        }

}