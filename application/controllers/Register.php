<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Register extends CI_Controller {
    public $data = array();
    public function __construct()
    {
        parent::__construct();
            if (!$_SESSION) {
                    session_start();
                }
                 include 'checkSession.php'; 
              
                date_default_timezone_set('UTC');
           
        $this->load->model(array('backend/Model_menu_frontend','web/Model_register','web/Model_label','web/Model_content'));
		
        $this->load->helper(array('funcglobal','menu','accessprivilege','alias','url'));
        error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
        $this->data["method"]='register';
    }

    public function index()
    {
    if ($_POST) {    
            $name = $this->security->xss_clean(trim($_POST['firstname']));
            $last = $this->security->xss_clean(trim($_POST['lastname']));
            $email = $this->security->xss_clean(trim($_POST['email']));
            $phone = $this->security->xss_clean(trim($_POST['phone'])); 
            $company = $this->security->xss_clean(trim($_POST['company']));  
            $position    = $this->security->xss_clean(secure_input($_POST['position']));
            $signup_date = date("Y-m-d H:i:s");
            $password    = '';
            $email_verification_code = random_string('alnum', 20);     
            $check_email = $this->Model_register->checkEmail($email);
                if (count($check_email->result_array()) > 0) {
                    $data = 0;
                } else {
                    $status      = 0;
                    $step=0;
                    $agent_id    = $this->Model_register->AddAgent($name, $last, $email, $phone, $password, $company, $position, $status, $signup_date,$step,$email_verification_code);
                    if ($agent_id){
                        $this->sendmailAdmin($name, $last, $email, $phone,$company, $position, $signup_date);
                        $this->sendmail($name, $last, $email,$email_verification_code);
                    } 
                    $data = 1;
                }
             echo json_encode($data);
    }
    else {
        redirect(BASE_URL.'/home');
    }
    }
    function sendmailAdmin($name, $last, $email, $phone,$company, $position, $signup_date)
    {
        $htmlContent = '<h1>NEW APPLICATION</h1><br/>';
        $htmlContent .= '<p>From</p>';
        $htmlContent .= 'Name : ' . $name . '-' . $last . '<br/>';
        $htmlContent .= 'Phone : ' . $phone . ' <br/>';
        $htmlContent .= 'Position : ' . $position . ' <br/>';
        $htmlContent .= 'Company : ' . $company . ' <br/>';
        $htmlContent .= 'Date : ' . date_convert($signup_date) . ' <br/>';
        $subject = 'Register member';
        $this->load->library('email');
        $config['useragent'] = "CodeIgniter";
        $config['mailpath']  = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']  = "mail";
        $config['smtp_host'] = "localhost";
        $config['newline']   = "\r\n";
        $config['mailtype']  = 'html';
        $config['charset']   = 'iso-8859-1';
        $config['wordwrap']  = TRUE;
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->set_crlf("\r\n");
        $this->email->from($email); // change it to yours
        $this->email->to('hl.prbadolsa@gmail.com'); // change it to yours
        $this->email->subject($subject);
        $this->email->message($htmlContent);
        if ($this->email->send()) {
            //unlink(FILE_PATH_ASSETS.$attach);
            // redirect($session_url);     
           // return true;
        } else {
            show_error($this->email->print_debugger());
        }
    }
    function sendmail($name, $last, $email,$email_verification_code)
    {
        
        $message_email = "Wellcome<br>";
        $message_email .= "" . $name . " " . $last . "<br>";
        $message_email .= "Sign up success<br>";
        $message_email .= "we will send your password <br>";
        $message_email .= "Email : " . $email . "<br>";
        $message_email .= "Please click link below to email verification<br>";
        $message_email .= "<a href=".BASE_URL."/Register/verify/" .$email_verification_code.">";
        $message_email .= BASE_URL."/Register/verify/"; 
        $message_email .= "</a> <br>";	
        $subject = 'Register member';
        $this->load->library('email');
        $config['useragent'] = "CodeIgniter";
        $config['mailpath']  = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']  = "mail";
        $config['smtp_host'] = "localhost";
        $config['newline']   = "\r\n";
        $config['mailtype']  = 'html';
        $config['charset']   = 'iso-8859-1';
        $config['wordwrap']  = TRUE;
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->set_crlf("\r\n");
        $this->email->from($email); // change it to yours
        $this->email->to($email); // change it to yours
        $this->email->subject($subject);
        $this->email->message($message_email);
        if ($this->email->send()) {
            //unlink(FILE_PATH_ASSETS.$attach);
            // redirect($session_url);     
           // return true;
        } else {
            show_error($this->email->print_debugger());
        }
    }
    function verify($verificationText=NULL) { 			
                $noOfRecords = $this->Model_register->verifyEmailAddress($verificationText);
                if ($noOfRecords > 0) {  
                    $hasil = $this->Model_register->getByVerify($verificationText);	

                            if (!empty($hasil)){
                             redirect(BASE_URL.'/home');

                            } else { 

                            redirect(BASE_URL.'/home');

                              }                  					

                        } else { 
                              redirect(BASE_URL.'/home');

                        }  

            }
}