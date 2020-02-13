<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nopage extends CI_Controller {

	public $arrMenu = array();
	public $data;
	public $privilege = array();
	public function __construct()

	{
		parent::__construct();
                if(! $_SESSION)
                {
                    session_start();
                }
               
		$this->load->model(array('backend/Model_menu_frontend','web/Model_label','web/Model_content'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias'));
               $this->data["menu_id"]=1;
               
           
	}
        
	public function index()
	{
                $this->load->view('vnopage',$this->data);
	}
	
	
}