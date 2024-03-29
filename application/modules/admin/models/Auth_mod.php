<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Auth_mod Model 
 *
 * @package		Auth_mod
 * @subpackage	Models
 * @category	Auth_mod 
 * @author		Dharmendra Pal
 * @website		http://www.thealternativeaccount.com
 * @company     thealternativeaccount Inc
 * @since		Version 1.0
 */
class Auth_mod extends CI_Model
{

    var $user_table = "users";

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
    }

    /* End of Constructor */

    function cron_job_test()
    {

        $this->db->select('lp.*, usa.*');
        $this->db->where('lp.status', 'inactive');
        $this->db->join('users as usa', 'usa.id = lp.user_id','left');
        $this->db->from('login_approval as lp');
        $query = $this->db->get();
        return $query;

        //     $data = array(
        //     'module_name'=>"Rajat",
        // );

        // $this->db->insert('cronjob',$data);
    }
    /**
     *
     * This function login authenticate 
     * 
     * @access	public
     * @param   String   plain string
     * @return	String   encrypted string
     */
    function login_authorize()
    {
        $this->form_validation->set_rules('email', "Email Id", 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $email = $this->security->xss_clean($this->input->post('email', true));
        $password = $this->security->xss_clean($this->input->post('password', true));
        $data = array();
        if ($this->form_validation->run() === false) {
        }

        $this->db->where("u.email", $email);
        $query = $this->db->get("$this->user_table as u");

        if ($query->num_rows() > 0) {

            $row = $query->row();
            if ($row->user_type == 2 || $row->user_type == 1 || $row->user_type == 3) {
                $password = md5($password);
                if ($password == $row->password) {
                    $user_info = $row;
                    unset($user_info->password);
                    //-----------------------------------------------------

                    if ($user_info->status == "Inactive") {

                        $data['error_msg'] = "Your account has been inactive";

                        $data['status'] = 'error';
                        return $data;
                    } else    if ($user_info->status == "Delete") {

                        $data['error_msg'] = "Your account has been deleted ! Contact Admin";
                        $data['status'] = 'error';
                        return $data;
                    } else {

                        //------update last login date time------
                        $login_time = date("Y-m-d h:i:s");
                        $up['last_login'] = $login_time;
                        $this->db->where('id', $user_info->id);
                        $this->db->update($this->user_table, $up);
                        $data['status'] = 'success';
                        $data['result'] = $user_info;

                        //---------- end ---------------------------------------
                        //-----------
                    }
                    //------------------------------------------------------
                    return $data;
                }
            }
        }

        $data['error_msg'] = "Invalid login credentials";
        $data['status'] = 'error';
        return $data;
    }

    function login_ip_verification($rs)
    {
        // echo date('Y-m-d'); die;
        $this->db->where("updated_date", date('Y-m-d'));
        $this->db->where("user_id", $rs->id);
        $this->db->where("status", 'active');
        $result    = $this->db->get('login_approval');
        if ($result->num_rows() > 0) {
            $return['success']        =   true;
        } else {
            $up['status'] = 'inactive';
            $this->db->where('user_id', $rs->id);
            $this->db->update('login_approval', $up);
            $return['success']        =   false;
        }
        return $return;
    }
    /**
     * forget
     *
     * This function set password and send verification mail
     * 
     * @access	public
     * @return	mixed Array 
     */
    function forgot($token)
    {
        // pr($_POST);die;
        $this->form_validation->set_rules('email', "Email Id", 'trim|required|valid_email');
        $email  =   $this->input->post('email', true);
        if ($this->form_validation->run() === false) {
            $return['error_msg']    =   validation_errors();
            $return['valid']        =    false;

            return $return;
        }

        $this->db->where("email", $email);
        $this->db->where("status", 'Active');
        $result    = $this->db->get($this->user_table);
        //  echo $this->db->last_query();die;
        // pr($result->num_rows()); die;  
        if ($result->num_rows() > 0) {

            $userData       =    $result->row();
            if ($userData->user_type == 1) {
                $name           =    $userData->first_name . ' ' . $userData->last_name;
                //------------- secure encryption-------------------
                $updateData            =    array(
                    'password' => '',
                    'token'  =>  $token,
                    'token_valid' => date('Y-m-d')
                );
                              
                $this->db->where('id', $userData->id);
                $this->db->update($this->user_table, $updateData);

                $return['valid']        =   true;
                $return['name']             =   $name;
                return $return;
            } else {
                $return['valid']        =    false;
                $return['name']         =   "Invalid credentials!";
                return $return;
            }
        } else {

            $return['valid']        =    false;
            return $return;
        }
    }

    public function tokenVerification($token, $email)
    {
        $this->db->select('*');
        $this->db->where('email', $email);
        $this->db->where('token', $token);
        $this->db->from('users');
        $query = $this->db->get();

        $date_diff = date_diff(date_create($query->row()->token_valid), date_create(date('Y-m-d')));
        $ValidAt    =   $date_diff->format("%a");

        if ($ValidAt <= 2) {
            if ($query->num_rows() == 1) {
                $return['uid']        =   $query->row()->id;
                $return['valid']        =   true;
                return $return;
            } else {
                $return['msg']        =  'Invalid Token';
                $return['valid']        =   false;
                return $return;
            }
        } else {
            $return['valid']        =   false;
            $return['msg']        =  'Link Expired';
            return $return;
        }
    }

    public function updatedpassword($uid)
    {
        $data   =   array(
            'password' => md5($_POST['new_password']),
            'token' =>  '',
            'token_valid' => ''
        );
        $this->db->where('id', $uid); //which row want to upgrade  
        $this->db->update('users', $data);
        if ($this->db->affected_rows() > 0) {
            $return['valid']        =   true;
            return $return;
        } else {
            $return['valid']        =   false;
            return $return;
        }
    }

    public function RealTimeDataCount()
    {


        $this->db->select('SUM(total_weight) as FinalWeight');
        $this->db->where('FY', fy()->FY);
        $this->db->where('product_type', fy()->product_type);
        $this->db->from('aa_billing');
        $billing = $this->db->get();

        $this->db->select('SUM(final_amount) as FinalAmountPaddy');
        $this->db->where('FY', fy()->FY);
        $this->db->where('product_type', fy()->product_type);
        $this->db->from('aa_billing');
        $FinalAmountPaddy = $this->db->get();

        $this->db->select('SUM(total_katti) as TotalKatti');
        $this->db->where('FY', fy()->FY);
        $this->db->where('product_type', fy()->product_type);
        $this->db->from('aa_billing');
        $TotalKatti = $this->db->get();

        $this->db->select('MAX(final_amount) as maxpurchaser');
        $this->db->where('FY', fy()->FY);
        $this->db->where('product_type', fy()->product_type);
        $this->db->from('aa_billing');
        $maxpurchaser = $this->db->get();

        $TotalQuant = $this->db->query("SELECT acn.name , ROUND(SUM(Quantity),2) AS totalQuant FROM kisanvahidata  LEFT JOIN aa_center_name as acn ON kisanvahidata.CenterName = acn.center_id  WHERE status_rec = 'done'  AND FY = '" . fy()->FY . "' AND product_type = '" . fy()->product_type . "' GROUP by CenterName");
        if (!empty($TotalQuant)) {
            $data_count['billing'] = $billing->result()[0];
            $data_count['FinalAmountPaddy'] = $FinalAmountPaddy->result()[0];
            $data_count['TotalKatti'] = $TotalKatti->result()[0];
            $data_count['maxpurchaser'] = $maxpurchaser->result()[0];

            //  pr($TotalQuant->result());
            // die;
            $data_count['first'] = [];
            if (!empty($TotalQuant->result()[0])) {
                $data_count['first'] = $TotalQuant->result();
            }
        } else {
            $data_count['todharpur'] = 0;
            $data_count['upss'] = 0;
            $data_count['reva'] = 0;
            $data_count['pcf'] = 0;
            $data_count['jamura'] = 0;
            $data_count['second'] = 0;
            $data_count['first'] = 0;
            $data_count['maxpurchaser'] = 0;
            $data_count['todharpur'] = 0;
            $data_count['TotalKatti'] = 0;
            $data_count['FinalAmountPaddy'] = 0;
            $data_count['billing'] = 0;
            $data_count['FinalWeight'] = 0;
            // $data_count = 0;
        }
        // pr($data_count);
        // die;
        //   $TotalQuant = $this->db->query("SELECT ROUND(SUM(Quantity),2) AS totalQuant FROM kisanvahidata WHERE status_rec = 'done' AND FY = ". fy()->FY . " AND product_type = ". fy()->product_type . " GROUP by CenterName");

        $this->db->select('*');

        $this->db->from('aa_rokad');
        $rokad = $this->db->get();

        //pr($data_count);
        //die;

        $data_count['rokad'] = $rokad->num_rows();
        return $data_count;
    }

    function RealTimeActiveParcha()
    {
        $this->db->select('*');
        $this->db->from('aa_rokad');
        $this->db->order_by('rokad_id', 'desc');
        $this->db->limit(1);
        $rokad = $this->db->get();
        $data_count['activeParcha'] = $rokad->row()->rokad_date;
        return $data_count;
    }

    function todays_KisanVahi()
    {
        $middle = @strtotime($_POST['activeKishan']);             // returns bool(false)
        $new_date = date('d-m-Y', $middle);
        $this->db->select('Round(SUM(Quantity),2) as quant, count(Kisan_ID) as totalKisan, acn.*');
        $this->db->join("aa_center_name as acn", 'kv.CenterName = acn.center_id', 'left');
        $this->db->where('FY', fy()->FY);
        $this->db->where('Purchase_Date', $new_date);
        $this->db->where('product_type', fy()->product_type);
        $this->db->group_by('kv.CenterName');
        $this->db->from('kisanvahidata kv');

        $rokad = $this->db->get()->result();
        return $rokad;
    }

    function getrenewable()
    {
        $this->db->select('login_approval.*, acn.*');
        $this->db->join("users as acn", 'acn.id = login_approval.user_id', 'left');
        $this->db->where('login_approval.status !=', 'active');
        // $this->db->where('login_approval.FY', fy()->FY);
        $this->db->from('login_approval');
        $rokad = $this->db->get()->result();
        return $rokad;
    }
}

/* End of class */
