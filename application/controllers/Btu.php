<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');class Btu extends CI_Controller {	public $data = array();	public function __construct()	{		parent::__construct();                               date_default_timezone_set('UTC');                $this->load->model(array('backend/Model_menu_frontend','web/Model_label','web/Model_content'));		$this->load->helper(array('funcglobal','menu','accessprivilege','alias','text'));                $this->data['controller'] = $this->uri->segment(1);                $this->data['menu_id']=  5;	}		public function index()                          	{                $this->load->view('vbtu',$this->data);	}               }