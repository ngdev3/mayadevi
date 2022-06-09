<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Profile Model
 *
 * @package		Profile
 * @category            Profile
 * @author		Arvind Soni
 * @website		http://www.thealternativeaccount.com
 * @company     thealternativeaccount Inc
 * @since		Version 1.0
 */
class Kisanreg_mod extends CI_Model {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
    }
     /**
     * client_list_ajax
     * @access	public
     * @return array
     */
    function campaign_list_ajax($filter){
        $this->db->select("SQL_CALC_FOUND_ROWS kc.*,ck.name as company_name,ck.branch,ck.account_name,ck.total_balance,ck.used_balance, u.first_name, u.last_name,u.user_type,u.assigned_manager,ku.first_name as manager_first_name, ku.last_name as manager_last_name", false);
        $this->db->from("kyi_campaign as kc");
		$this->db->join("kyi_client as ck",'kc.client_id = ck.id','left');
        $this->db->join("kyi_users as u",'kc.added_by = u.id','left');
        $this->db->join("kyi_users as ku",'u.assigned_manager = ku.id','left');
        $columns = array('kc.id','kc.id','kc.id','kc.id','kc.id','manager_first_name','ck.branch');
        if (isset($filter['search']['value']) && $filter['search']['value']!=''){
            $search_keyboard    =   $filter['search']['value'];
            $search_keyboard=strtolower($search_keyboard);
            $str = "";
            $str = $str."(LOWER(ck.name) LIKE '$search_keyboard%' OR LOWER(ck.branch) LIKE '$search_keyboard%' OR LOWER(ck.account_name) LIKE '$search_keyboard%')";
            $this->db->where($str);    
        }
        if(isset($filter['order'][0]['column']) &&  $filter['order'][0]['column']!='' && isset($filter['order'][0]['dir']) && $filter['order'][0]['dir']!='' && isset($filter['length']) && $filter['length']!='' && isset($filter['start']) && $filter['start']!=''){
        $this->db->order_by($columns[$filter['order'][0]['column']], $filter['order'][0]['dir']);
        if ($filter['length'] != '-1') {  // for showing all records
             $this->db->limit($filter['length'], $filter['start']);
        }
        }
			
			
		
		if(isset($filter['status']) && $filter['status']!=''){
             $this->db->where("kc.status",$filter['status']);
        }
		
		if(isset($filter['date_type']) && @$filter['date_type']!=''){
			
			if($filter['date_type']=="execution_date")
			{
				if(isset($filter['start_date']) && @$filter['start_date']!=''){
					$start_date = correct_date($filter['start_date']);            
					 //$this->db->where("date(u.created_date) >=",date('Y-d-m',strtotime()));
					 $this->db->where("date(kc.execution_date) >=",$start_date);
				}
					if(isset($filter['end_date'])&& $filter['end_date']!=''){
						$end_date = correct_date($filter['end_date']);         
						//$this->db->where("date(u.created_date) <=",date('Y-d-m',strtotime($filter['end_date'])));
						$this->db->where("date(kc.execution_date) <=",$end_date);

					}
			
			}
			
			
			if($filter['date_type']=="posted_date")
			{
				if(isset($filter['start_date']) && @$filter['start_date']!=''){
					$start_date = correct_date($filter['start_date']);            
					 //$this->db->where("date(u.created_date) >=",date('Y-d-m',strtotime()));
					 $this->db->where("date(kc.post_date) >=",$start_date);
				}
					if(isset($filter['end_date'])&& $filter['end_date']!=''){
						$end_date = correct_date($filter['end_date']);         
						//$this->db->where("date(u.created_date) <=",date('Y-d-m',strtotime($filter['end_date'])));
						$this->db->where("date(kc.post_date) <=",$end_date);

					}
			
			}
			
             //$this->db->where("u.assigned_manager ",ID_decode($filter['manager_id']));
        }	
			
			
			
        if(isset($filter['start_date']) && @$filter['start_date']!='' && $filter['date_type']==''){
            $start_date = correct_date($filter['start_date']);            
             //$this->db->where("date(u.created_date) >=",date('Y-d-m',strtotime()));
             $this->db->where("date(kc.created_date) >=",$start_date);
        }
		if(isset($filter['end_date'])&& $filter['end_date']!='' && $filter['date_type']==''){
            $end_date = correct_date($filter['end_date']);         
            //$this->db->where("date(u.created_date) <=",date('Y-d-m',strtotime($filter['end_date'])));
            $this->db->where("date(kc.created_date) <=",$end_date);

        }
		if(currentuserinfo()->user_type=='4' || currentuserinfo()->user_type=='3'){
			$user_id = currentuserinfo()->id;
			
			$this->db->where("(kc.added_by = '$user_id'  OR ku.assigned_manager = '$user_id' )");
        }
        

        $this->db->order_by('kc.id','desc');
        $query = $this->db->get();
		//echo $this->db->last_query();die;
        if ($query->num_rows() > 0) {
            $res['result']=$query->result();
            $total_record           =   $this->db->query('SELECT FOUND_ROWS() AS count');
            $res['totalData']       =   $total_record->row()->count;
            $res['totalFiltered']   =   $total_record->row()->count; 
            $res['status']="success";
        } else {
            $res['result']          =   '';
            $res['totalData']       =   0;  
            $res['totalFiltered']       =   0; 
            $res['status']          =   "error";
        }
        return $res;
    }

    /**
     * view client datails
     *
     * this function view client datails via id 
     */
    public function view($id){
    //    pr($id); die;
        $this->db->select('acn.*, acn.name as account_name, is.*');
        $this->db->join('aa_account_name as acn','acn.account_id = is.account_no','left');
        $this->db->where('is.Kisan_ID',$id);
        $this->db->from('reg_kisanvahidata is');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        } else{
            return false;
        }
    }

    function add($data){
       $this->db->insert('reg_kisanvahidata', $data);
          $last_id = $this->db->insert_id();
        //   pr($last_id);
        //   die;
          return $last_id;			
      }



     /* 
     * update user details
     *
     * this function update user details
     * @access	public
     * @return array
     */
    function edit($id = null, $userdata){  
        $this->db->where('Kisan_ID ',$id);
        $this->db->update('reg_kisanvahidata',$userdata);
        $affected = $this->db->affected_rows();
        if($affected>= 0){
            $res['status'] ='success';
            $res['msg'] ='Account details updated successfully';
        } else {
            $res['status'] ='error';
            $res['msg'] ='Account details not updated successfully';
        }
        return $res;
        }
    

	
	function client_person_mobile_exist($valuekey)
    {
		//pr($valuekey);die;
        $encoded_Id = $this->uri->segment('4');    
        
        $user_id = ID_decode($encoded_Id);    

        $this->db->where('id !=',$user_id);
        $this->db->where('mobile =',$valuekey);
        $query = $this->db->get('kyi_client');
      //echo $this->db->last_query(); die;
        if ($query->num_rows() > 0){
            return $query->num_rows();
        }
        else{
            return false;
        }
    }
	
	/**
     * view client datails
     *
     * this function view client datails via id 
     */
    public function views($id){
		
        $this->db->select("*", false);
		// $this->db->join("kyi_client as ck",'kc.client_id = ck.id','left');
        $this->db->from("reg_kisanvahidata as kc");
        $this->db->where('kc.Kisan_ID',$id);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        } else{
            return false;
        }
    }
	
	// add payments
	
	function add_payment(){
        $added_by                    =   currentuserinfo()->id;
        
        $data['sales_person_id']      =   $_POST['pay_sales_person'];
        $data['client_id']              =   $_POST['client_name_id'];
        $data['added_by']          =   $added_by;
		
        $data['based_on']             =   $_POST['based_on']; 
		$data['tax_status']             =   $_POST['gen_type']; 
		$data['payment_mod']             =   $_POST['mod_payment_id'];
		$data['amount']             =   $_POST['amount_collected'];
       // $data['is_verify']          =   '1';
        //$data['user_type']          =   '3';
		//$data['role_id']            =   '3';

       // $data['added_by']           =   $user_id;
        $data['created_date']       =   date('Y-m-d H:i:s');
        $data['updated_date']       =   $data['created_date'];
        //pr($data);die;
        $this->db->insert("kyi_payment", $data);
        $seller_id  =   $this->db->insert_id();
        if($seller_id){
          $rs_data['status']      =   'success';
		  $rs_data['msg']      =   'Payment Added successfully';
        }else{
            $rs_data['status'] = 'error';
            $rs_data['error_msg'] = "Invalid Request";
        }
        return $rs_data;
    }
	
	
	
    function add_account($data){
        $this->db->insert('reg_kisanvahidata', $data);
           $last_id = $this->db->insert_id();
           return $last_id;			
       }
    
    
	
	function update($data,$id){
		$this->db->where('id',$id);
		$this->db->update('am_campaign',$data);
	}
	

	function count_Billing_data() {
        $requestData = $this->input->post(null, true);
        // die;
        $this->db->select("ab.*, acn.name as account_name");
        $this->db->join('aa_account_name as acn', 'acn.account_id  = ab.account_no ','left');
        $this->db->where("ab.status !=",'Dead');
        if (isset($_GET['status'])) {
           
            $this->db->where("ab.status",$_GET["status"]);
        }
		
        if (!empty($requestData['search']['value'])) {
            $search_val = $requestData['search']['value'];
            $this->db->like("(CONCAT(acn.name,' ',Farmer_name,' ',Farmer_ID))", $search_val); 
        }
		
       
		return $query = $this->db->get('reg_kisanvahidata as ab');
    }

    function account_name(){
        $this->db->select("ab.*, ab.updated_date as upd, acn.name as account_name");
        $this->db->join('aa_account_name as acn', 'acn.account_id  = ab.account_no ','left');
        $query = $this->db->get('reg_kisanvahidata as ab')->result();
      //  pr($query); die;
        return $query;
    }

       
	function Billing_details($id){
		$this->db->select("*");
		// $this->db->join('aa_billing as p_name', 'p_name.billing_id=ab.purchaser_name','left');
        $this->db->from("reg_kisanvahidata as ab");
		$this->db->where('ab.Kisan_ID ',ID_decode($id));
		$this->db->order_by('ab.Kisan_ID ','desc');
        $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->row();
            }
            else{
                return false;
            }
		
	}


    function get_Billing_data($parent_id = "") {  
		// die;
        $requestData = $this->input->post(null, true);
        $columns = array(
            1 => 'Kisan_ID',
            2 => 'Farmer_name',
            3 => 'Quantity',
            4 => 'reg_date',
            5 => 'dob',
            6 => 'name',
            7 => 'status',
        );
       
        $this->db->select("ab.*, acn.name as account_name");
        $this->db->join('aa_account_name as acn', 'acn.account_id  = ab.account_no ','left');
        $this->db->where("ab.status !=",'Dead');
        $this->db->from("reg_kisanvahidata as ab");
        if (isset($_GET['status'])) {
            $this->db->where("ab.status",$_GET["status"]);
        }
		
         
        if (!empty($requestData['search']['value'])) {
            $search_val = $requestData['search']['value']; 
            $this->db->like("(CONCAT(acn.name,' ',Farmer_name,' ',Farmer_ID))", $search_val); 
            }
        
        if (@$requestData['order'][0]['column'] && @$requestData['order'][0]['dir']) {
            $order = @$requestData['order'][0]['dir'];
            $column_name = $columns[@$requestData['order'][0]['column']];
            $this->db->order_by("$column_name", "$order");
        } else {
            $this->db->order_by("Kisan_ID ", "desc");
        }
        if (@$requestData['length'] && $requestData['length'] != '-1') {
            $this->db->limit($requestData['length'], $requestData['start']);
        }
    
       
		$query = $this->db->get();
		//pr($query->num_rows()); die;
        if ($query->num_rows()) {
            return $query->result();
        } else {
           return [];
        }
    }
    

  /**
     * check_preexistance
     *
     * function for check either color name pre exist
     * 
     * @access	public
     * @return	html data
     */
    function check_preexistance($id) {
        $this->db->select('*');
        $this->db->where('status !=', 'Dead');
        $this->db->where('Farmer_ID', $id);
        $query = $this->db->get('reg_kisanvahidata');
        if ($query->num_rows()) {
            return true;
        } else {
           return false;
        }
        //die();
    }




    function checkRandomEntery(){
        $this->db->select_max('billing_id');
        $query = $this->db->get('aa_account_name')->row_array();
       // pr($query); die;
        if($query['billing_id'] == ''){
            return '1';
        }else{
            return $query['billing_id'];

        }
    }

    function get_invoice_details($id){
        $this->db->select('is.updated_date as isupdated_date, is.*, acn.*');
        $this->db->where('Kisan_ID',$id);
        $this->db->join('aa_account_name as acn','acn.account_id = is.Kisan_ID','left');
        return $this->db->get('reg_kisanvahidata as is')->row_array();
    }

    
    function add_rokadh_entry($deposit_data, $expenses_data){
        $this->db->insert('aa_rokad', $deposit_data);
        $last_id['deposit_data'] = $this->db->insert_id();

        $this->db->insert('aa_rokad', $expenses_data);
        $last_id['expenses_data'] = $this->db->insert_id();

    }

    function delete($id){
        // pr(ID_decode($id)); die;
		$this->db->where('Kisan_ID ', ID_decode($id));
		$this->db->update('reg_kisanvahidata', array('status' => 'Dead'));
       
	}

}
