<?php if (!defined('BASEPATH')) exit('No direct script access allowed');class Model_register extends CI_Model{    function __construct()    {        parent::__construct();    }    function getProfile($member_id, $email)    {        if ($email != '') {            $where = "WHERE member_id = '" . $member_id . "' and  email = '" . $email . "' ";        }        $query = " Select a.member_id ,a.register_id ,a.first_name,a.last_name ,a.email ,a.phone ,a.password ," . " DATE_FORMAT( a.date_of_birth, '%d-%m-%Y %H:%i:%s' ) as date_of_birth," . "a.address1,a.address2 ,a.province_id ,a.city_id ,a.districts_id ,a.villages_id ,a.postal_code_id ," . " a.phone ,a.photo ,a.ktp ,a.npwp ,a.no_ktp ,a.no_npwp ,a.account_number ,a.account_bank_name ," . " a.bank_code ,a.status , a.step ," . " DATE_FORMAT( a.signup_date, '%d-%m-%Y %H:%i:%s' ) as signup_date, a.fb_link ,a.tw_link, a.gplus_link,a.wa,a.bbm, a.about, " . " b.province_name, b.province_id , c.city_name, " . " d.districts_id, d.districts_name, e.villages_id, e.villages_name, f.postal_code_id, f.postal_code_name, " . " g.bank_code, g.bank_name " . " FROM tbl_member as a " . " inner join tbl_province as b on a.province_id = b.province_id " . " inner join tbl_city as c on a.city_id  = c.city_id " . " inner join tbl_districts as d on a.districts_id  = d.districts_id " . " inner join tbl_villages as e on a.villages_id  = e.villages_id " . " inner join tbl_postal_code as f on a.postal_code_id  = f.postal_code_id " . " inner join tbl_bank as g on a.bank_code  = g.bank_code " . " $where ";        $query = $this->db->query($query)->result_array();        return $query;    }   function getCountry()    {        $sql   = "SELECT * FROM `tbl_country` order by country_name ASC";        $query = $this->db->query($sql)->result_array();        return $query;    }    function AddMember($name,$phone, $email)    {        $sql     = "INSERT INTO tbl_member SET                             full_name='" . $name . "',                            phone='" . $phone . "',                            email='" . $email . "',                            member_date=now() ";        $query   = $this->db->query($sql);        $last_id = $this->db->insert_id();        return $last_id;    }    function checkMember($email)    {            $data  = array();        $sql   = "select * from tbl_member WHERE email ='" . $email . "'";        $hasil = $this->db->query($sql);        if ($hasil->num_rows() > 0) {            $data = $hasil->result();        }        $hasil->free_result();        $this->db->close();        return $data;                    }    function updateMember($name,$phone, $email)    {        $sql     = "UPDATE tbl_member SET                            full_name='" . $name . "',                           phone='" . $phone . "'                           WHERE email ='" . $email . "' ";                                   $query	= $this->db->query($sql);		        return $query;    }        function getCatalogue($id = '')	{		$where = '';		if($id != ''){			$where = "WHERE catalogue_type = ".$id;		}		$sql	= "SELECT a.catalogue_id,a.catalogue_title,a.catalogue_file "                                    . "FROM tbl_catalogue as a "                                    . " $where "                                    . " ORDER BY catalogue_id ASC";			$query	= $this->db->query($sql);		$rs		= $query->result_array(); 				return $rs;		}                                                function setRegisterId($member_id, $register_id)    {        $this->db->set('register_id', $register_id)->where('member_id', $member_id)->update('tbl_member');        return $this->db->affected_rows();    }    function verifyEmailAddress($verificationCode)    {        $sql   = "UPDATE tbl_member SET  step = 1  WHERE email_verification_code = '" . $verificationCode . "' and status=0";        $query = $this->db->query($sql);        return $query;    }      function cekSignUp($email, $password)    {        $data  = array();        $sql   = "select * from tbl_member where email ='" .$email. "' and password= '" .$password."' and status = 1";        $hasil = $this->db->query($sql);        if ($hasil->num_rows() > 0) {            $data = $hasil->result();        }        $hasil->free_result();        $this->db->close();        return $data;    }    function getPersonal($member_id)    {        $data  = array();        $sql   = "select a.*, b.province_name from tbl_member a " . " inner join tbl_province as b on a.province_id = b.province_id " . " where a.member_id='$member_id' and a.status = 1 ";        $hasil = $this->db->query($sql);        if ($hasil->num_rows() > 0) {            $data = $hasil->result();        }        $hasil->free_result();        $this->db->close();        return $data;    }    function updatePassword($member_id, $newpass)    {        $sql   = "UPDATE tbl_member SET                    password='" . $newpass . "' WHERE member_id = " . $member_id . "";        $query = $this->db->query($sql);        return $query;    }    function updateForgetPassword($email, $newpass)    {        $sql   = "UPDATE tbl_member SET                    password='" . $newpass . "' WHERE email = '" . $email . "'";        $query = $this->db->query($sql);        return $query;    }    function cekPassword($member_id, $password)    {        $data  = array();        $sql   = "select member_id as a from tbl_member where member_id='$member_id' and password= '" . $password . "' and status = 1 ";        $hasil = $this->db->query($sql);        if ($hasil->num_rows() > 0) {            $data = $hasil->result();        }        $hasil->free_result();        $this->db->close();        return $data;    }    function checkEmailEdit($email, $member_id)    {        $query = $this->db->query("select * from tbl_member WHERE email ='" . $email . "' and member_id =" . $member_id . " ");        return $query;    }    function checkEmailNoEdit($email, $member_id)    {        $query = $this->db->query("select * from tbl_member WHERE email ='" . $email . "' and member_id <>" . $member_id . " ");        return $query;    }    function newverifyEmailAddress($verificationCode)          {                  $sql	= "UPDATE tbl_member SET  step= 1 WHERE email_verification_code = '".$verificationCode."' and status=0";			$query	= $this->db->query($sql);		return $query;        }                 function getByVerify($verificationText)		        {	                                         $sql = "select * from tbl_member where email_verification_code='$verificationText'";		                                                                 $hasil = $this->db->query($sql);                        if($hasil->num_rows() > 0){				$data = $hasil->result();			}			$hasil->free_result();                        $this->db->close();			return $data;       //     return $query;                        		        }     function checkSubs($email)    {        $data  = array();       echo $sql   = "select * from tbl_subscriber where email ='".$email."' ";        $hasil = $this->db->query($sql);        if ($hasil->num_rows() > 0) {            $data = $hasil->result();        }        $hasil->free_result();        $this->db->close();        return $data;    }        function insertSubscribe($subscribe_email)	{		$sql	= "INSERT INTO tbl_subscriber SET "                        . " email='".$subscribe_email."',"                        . " subscriber_date = now(), "                        . "subscriber_status= 1";                $query  = $this->db->query($sql);		$last_id  = $this->db->insert_id();		return $last_id;	}             function   AddContactUs ($from, $name,$email, $subject, $message){        {		$sql	= "INSERT INTO tbl_contactus SET "                        . " contactus_from='".$from."',"                        . " contactus_name='".$name."',"                        . " contactus_email='".$email."',"                        . " contactus_subject='".$subject."',"                        . " contactus_message='".$message."',"                        . " contactus_date = now() ";                $query  = $this->db->query($sql);		$last_id  = $this->db->insert_id();		return $last_id;	}      }}