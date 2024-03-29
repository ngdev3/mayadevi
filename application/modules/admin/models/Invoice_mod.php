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
class Invoice_mod extends CI_Model {

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
       // pr($id); die;
        $this->db->select('acn.*, acn.name as account_name, is.*');
        $this->db->join('aa_account_name as acn','acn.account_id = is.account_id','left');
        $this->db->where('is.account_id',$id);
        $this->db->from('invoice_system is');
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        } else{
            return false;
        }
    }

    function add($data, $res){
        $this->db->insert('invoice_system', $data);
        $last_id = $this->db->insert_id();

        $userdata['rokadh_jama_id'] = $res['deposit_data'];
        $this->db->where('bos_id',$last_id);
        $this->db->update('invoice_system',$userdata);
        
        $userdata['rokadh_nama_id'] = $res['expenses_data'];
        $this->db->where('bos_id',$last_id);
        $this->db->update('invoice_system',$userdata);
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
        $this->db->where('account_id ',$id);
        $this->db->update('invoice_system',$userdata);
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
		
        $this->db->select("SQL_CALC_FOUND_ROWS kc.*,ck.name as company_name,ck.branch,ck.account_name,ck.total_balance,ck.used_balance, u.first_name, u.last_name,u.user_type,u.assigned_manager,ku.first_name as manager_first_name, ku.last_name as manager_last_name", false);
        $this->db->from("kyi_campaign as kc");
		$this->db->join("kyi_client as ck",'kc.client_id = ck.id','left');
        $this->db->join("kyi_users as u",'kc.added_by = u.id','left');
        $this->db->join("kyi_users as ku",'u.assigned_manager = ku.id','left');
      
        //$this->db->or_where('ku.assigned_manager',$user_id);
        //$this->db->order_by('kc.id','desc');
        $this->db->where('kc.id',$id);
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
	
	
	function account_payment_list_ajax($filter){
       
        $this->db->select('SQL_CALC_FOUND_ROWS kp.*,kc.name as company_name,kc.name,kc.branch,kc.account_name,kc.gstin,ku.first_name, ku.last_name,ku2.first_name as manager_first_name, ku2.last_name as manager_last_name,concat(ku.first_name ," " ,ku.last_name) as sales_person_name,ku.user_type,ku3.first_name as added_by_account_sales_person,(select first_name from kyi_users where id=kp.approve_by) AS APPROVER_NAME',False);
        $this->db->from('kyi_payment as kp');
        $this->db->join('kyi_client as kc','kp.client_id = kc.id','left');
        $this->db->join('kyi_users as ku','kp.added_by = ku.id','left');
		$this->db->join("kyi_users as ku2",'ku.assigned_manager = ku2.id','left');
		$this->db->join("kyi_users as ku3",'kp.sales_person_id = ku3.id','left');
		
		//$this->db->select("SQL_CALC_FOUND_ROWS kp.*,ku.id as user_id,ku.user_type,ku.first_name,ku.assigned_manager",false);
		//$this->db->from("kyi_payment as kp");
		//$this->db->join("kyi_users as ku","kp.added_by = ku.id","left");
		
		
		$columns = array('kp.id','kp.id','kp.created_date','kc.branch','kp.amount','sales_person_name','manager_first_name','kp.status');
        if (isset($filter['search']['value']) && $filter['search']['value']!=''){
            $search_keyboard    =   $filter['search']['value'];
            $search_keyboard=strtolower($search_keyboard);
            $str = "";
            $str = $str."(LOWER(kc.name) LIKE '$search_keyboard%' OR LOWER(kc.branch) LIKE '$search_keyboard%' OR LOWER(kc.account_name) LIKE '$search_keyboard%')";
            $this->db->where($str);    
        }
        if(isset($filter['order'][0]['column']) &&  $filter['order'][0]['column']!='' && isset($filter['order'][0]['dir']) && $filter['order'][0]['dir']!='' && isset($filter['length']) && $filter['length']!='' && isset($filter['start']) && $filter['start']!=''){
        $this->db->order_by($columns[$filter['order'][0]['column']], $filter['order'][0]['dir']);
        if ($filter['length'] != '-1') {  // for showing all records
             $this->db->limit($filter['length'], $filter['start']);
        }
        }
			
			
		
		if(isset($filter['status']) && $filter['status']!=''){
             $this->db->where("kp.is_approve",$filter['status']);
        }
		if(isset($filter['manager_id']) && $filter['manager_id']!=''){
			$manager_id = ID_decode($filter['manager_id']);
             //$this->db->where("ku.assigned_manager",ID_decode($filter['manager_id']));
			 //$this->db->or_where("kp.added_by ",ID_decode($filter['manager_id']));
			 $this->db->where("(ku.assigned_manager = '$manager_id'  OR kp.added_by = '$manager_id' )");
        }
		if(isset($filter['executive_id']) && $filter['executive_id']!='' &&  $filter['executive_id'] != 'No Records Found !'){
			$executive = $filter['executive_id'];
             //$this->db->where("ku.id",$filter['executive_id']);
			//$this->db->or_where("kp.added_by ",$filter['executive_id']);
			$this->db->where("(ku.id = '$executive'  OR kp.added_by = '$executive' )");
        }
			
		if(isset($filter['clients_ids']) && $filter['clients_ids']!=''){
             $this->db->where("kp.client_id",$filter['clients_ids']);
			//$this->db->or_where("kp.added_by ",$filter['executive_id']);
        }
		if(isset($filter['contact_person_ids']) && $filter['contact_person_ids']!=''){
             $this->db->where("kc.id",$filter['contact_person_ids']);
			//$this->db->or_where("kp.added_by ",$filter['executive_id']);
        }
			
			
			
        if(isset($filter['start_date']) && @$filter['start_date']!=''){
            $start_date = correct_date($filter['start_date']);            
             //$this->db->where("date(u.created_date) >=",date('Y-d-m',strtotime()));
             $this->db->where("date(kp.created_date) >=",$start_date);
        }
		if(isset($filter['end_date'])&& $filter['end_date']!=''){
            $end_date = correct_date($filter['end_date']);         
            //$this->db->where("date(u.created_date) <=",date('Y-d-m',strtotime($filter['end_date'])));
            $this->db->where("date(kp.created_date) <=",$end_date);

        }
		if(currentuserinfo()->user_type=='4'){
			$user_id = currentuserinfo()->id;
			
			$this->db->where("(kp.added_by = '$user_id'  OR ku.assigned_manager = '$user_id' )");
		}
    $this->db->order_by('kp.id','desc');
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
	
	function count_all_campaign_ajax($filter){
		$user_id = currentuserinfo()->id;
			
			
	
         $this->db->select('SQL_CALC_FOUND_ROWS kp.*,(select COUNT(id) from kyi_campaign where added_by = kp.added_by AND client_id = kp.client_id  GROUP BY kp.client_id) as Total_campaign,(select sum(total_cost) from kyi_campaign where added_by = kp.added_by AND client_id = kp.client_id  GROUP BY kp.client_id) as Total_balance  ,(select sum(used_sms_count) from kyi_campaign where added_by = kp.added_by AND client_id = kp.client_id  GROUP BY kp.client_id) as Total_used_sms_count  ,(select sum(sms_count) from kyi_campaign where added_by = kp.added_by AND client_id = kp.client_id  GROUP BY kp.client_id) as Total_sms_count,kts.name,kts.branch,kts.account_name',False);
        $this->db->from('kyi_campaign as kp');
        $this->db->join('kyi_client as kts',"kp.client_id=kts.id","left");
		//$this->db->join('kyi_client as kt',"kp.client_id=kt.id","left");
        $this->db->join('kyi_users as ku','kp.added_by = ku.id','left');
		$this->db->join("kyi_users as ku2",'ku.assigned_manager = ku2.id','left');
		//$this->db->join("kyi_users as ku3",'kp.sales_person_id = ku3.id','left');
		$this->db->where("(kp.added_by = '$user_id' )");
		$this->db->group_by("kp.client_id");
			
		
		$columns = array('kp.id','kp.id','kp.created_date','kc.name','kp.amount','sales_person_name','manager_first_name','kp.status');
        if (isset($filter['search']['value']) && $filter['search']['value']!=''){
            $search_keyboard    =   $filter['search']['value'];
            $search_keyboard=strtolower($search_keyboard);
            $str = "";
            $str = $str."(LOWER(kts.name) LIKE '$search_keyboard%' OR LOWER(kts.branch) LIKE '$search_keyboard%' OR LOWER(kts.account_name) LIKE '$search_keyboard%')";
            $this->db->where($str);    
        }
        if(isset($filter['order'][0]['column']) &&  $filter['order'][0]['column']!='' && isset($filter['order'][0]['dir']) && $filter['order'][0]['dir']!='' && isset($filter['length']) && $filter['length']!='' && isset($filter['start']) && $filter['start']!=''){
        $this->db->order_by($columns[$filter['order'][0]['column']], $filter['order'][0]['dir']);
        if ($filter['length'] != '-1') {  // for showing all records
             $this->db->limit($filter['length'], $filter['start']);
        }
        }
			
			
		
		if(isset($filter['status']) && $filter['status']!=''){
             $this->db->where("kp.is_approve",$filter['status']);
        }
		if(isset($filter['manager_id']) && $filter['manager_id']!=''){
             //$this->db->where("ku.assigned_manager",ID_decode($filter['manager_id']));
			 //$this->db->or_where("kp.added_by ",ID_decode($filter['manager_id']));
            $manager_id = ID_decode($filter['manager_id']);
             $this->db->where("(ku.assigned_manager = '$manager_id'  OR kp.added_by = '$manager_id' )");
        }
		if(isset($filter['executive_id']) && $filter['executive_id']!=''){
             $this->db->where("ku.id",$filter['executive_id']);
			$this->db->or_where("kp.added_by ",$filter['executive_id']);
        }
			
			
			
			
        if(isset($filter['start_date']) && @$filter['start_date']!=''){
            $start_date = correct_date($filter['start_date']);            
             //$this->db->where("date(u.created_date) >=",date('Y-d-m',strtotime()));
             $this->db->where("date(kp.created_date) >=",$start_date);
        }
		if(isset($filter['end_date'])&& $filter['end_date']!=''){
            $end_date = correct_date($filter['end_date']);         
            //$this->db->where("date(u.created_date) <=",date('Y-d-m',strtotime($filter['end_date'])));
            $this->db->where("date(kp.created_date) <=",$end_date);

        }
		
    $this->db->order_by('kp.id','desc');
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
	
    function add_account($data){
        $this->db->insert('invoice_system', $data);
           $last_id = $this->db->insert_id();
           return $last_id;			
       }
    
       
	function Billing_details($id){
		$this->db->select("ab.*, qual.name as quality_name, p_name.name as purchaser_name, p_name.*, s_name.name as seller_name, s_name.*, s_name.contact_person_number as cnt_number, s_name.account_name as cnt_name, site_name.name as site_name, site_name.*");
		$this->db->join('aa_quality as qual', 'qual.quality_id=ab.quality','left');
		$this->db->join('aa_billing as p_name', 'p_name.billing_id=ab.purchaser_name','left');
		$this->db->join('aa_seller as s_name', 's_name.seller_id=ab.seller_name','left');
		$this->db->join('aa_site as site_name', 'site_name.site_id=ab.site_name','left');
        $this->db->from("aa_billing as ab");
		
		$this->db->where('ab.id',ID_decode($id));
		$this->db->order_by('ab.id','desc');
        $query = $this->db->get();
            if ($query->num_rows() > 0) {
                return $query->row();
            }
            else{
                return false;
            }
		
	}

	
	
	function update($data,$id){
		$this->db->where('id',$id);
		$this->db->update('am_campaign',$data);
	}
	
	public function ajax_list_items($search='',$per_page=10,$start=0) 
    {
		$this->db->select("*");
		if($search!='')
        {
			$this->db->like("(CONCAT(am_campaign.campaign_name,' ',am_campaign.amount,' ',am_campaign.description))", $search); 
        }
		$this->db->limit($per_page,$start);
		$this->db->from("am_campaign");
		$data['result']=$this->db->get()->result();
		
        $this->db->select("COUNT(am_campaign.id) AS count");
        $this->db->from("am_campaign");
        $data['count']=$this->db->count_all_results();
		return $data; 
		
	}
	
	function count_Billing_data() {
        $requestData = $this->input->post(null, true);

		$this->db->select('*');
        $this->db->order_by('account_id','desc');
        if (isset($_GET['status'])) {
           
            $this->db->where("status =",$_GET["status"]);
        }
		
        if (!empty($requestData['search']['value'])) {
            $search_val = $requestData['search']['value'];
            $this->db->like("(CONCAT(name))", $search_val); 
        }
		
            $this->db->where('FY', fy()->FY);
            $this->db->where('product_type', fy()->product_type);

            $query =  $this->db->get('invoice_system');
          
            return  $query;
    }

  


    function account_name(){
        $this->db->select("ab.*, ab.updated_date as upd, acn.name as account_name");
        $this->db->join('aa_account_name as acn', 'acn.account_id  = ab.account_id ','left');
        $query = $this->db->get('invoice_system as ab')->result();
      //  pr($query); die;
        return $query;
    }


    function get_Billing_data($parent_id = "") {  
		
        $requestData = $this->input->post(null, true);
        $columns = array(
            1 => 'invoice_id',
            2 => 'account_id',
        );
      
        $this->db->select("ab.*, acn.name as account_name");
        $this->db->join('aa_account_name as acn', 'acn.account_id  = ab.account_id ','left');
        $this->db->where('ab.FY', fy()->FY);
        $this->db->where('ab.product_type', fy()->product_type);
        $this->db->from("invoice_system as ab");
        if (isset($_GET['type_of_invoice'])) {
            $this->db->where("type_of_invoice =",$_GET["type_of_invoice"]);
        }
		
         
        if (!empty($requestData['search']['value'])) {
            $search_val = $requestData['search']['value']; 
            $this->db->like("(CONCAT(name,' ',contact_person_number))", $search_val); 
            }
        
        if (@$requestData['order'][0]['column'] && @$requestData['order'][0]['dir']) {
            $order = @$requestData['order'][0]['dir'];
            $column_name = $columns[@$requestData['order'][0]['column']];
            $this->db->order_by("$column_name", "$order");
        } else {
            $this->db->order_by("invoice_id ", "desc");
        }
        if (@$requestData['length'] && $requestData['length'] != '-1') {
            $this->db->limit($requestData['length'], $requestData['start']);
        }
    
       

       
		$query = $this->db->get();
        // pr($this->db->last_query());
       
        // die;
		// pr($query->num_rows()); die;
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
    function check_preexistance($id, $city_name) {
        $this->db->select('*');
        $this->db->where('id !=', $id);
        $this->db->where('name ', $city_name);
        $query = $this->db->get('aa_billing');
        echo $this->db->last_query();
        return $query->num_rows();
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
        $this->db->select('is.updated_date as isupdated_date, is.*, acn.*, is.remark as invoice_remark');
        $this->db->where('invoice_id',$id);
        $this->db->where('is.FY', fy()->FY);
        $this->db->where('is.product_type', fy()->product_type);
        $this->db->join('aa_account_name as acn','acn.account_id = is.account_id','left');
        return $this->db->get('invoice_system as is')->row_array();
    }

    function find_rokadh_details($id){
        $this->db->select('*');
        $this->db->where('ar.isupdated_date',$id);
        $this->db->join('aa_account_name as acn','acn.account_id = is.account_id','left');
        return $this->db->get('invoice_system as ar')->row_array();
    }

    function getTaxId(){
        $this->db->select('invoice_id');
        $this->db->order_by('invoice_id','desc');
        $this->db->where('FY', fy()->FY);
        $this->db->where('product_type', fy()->product_type);
        return $this->db->get('invoice_system')->row();
    }

        //  pr($data); die;
    function add_rokadh_entry($deposit_data, $expenses_data){
        $this->db->insert('aa_rokad', $deposit_data);
        $last_id['deposit_data'] = $this->db->insert_id();

        $this->db->insert('aa_rokad', $expenses_data);
        $last_id['expenses_data'] = $this->db->insert_id();
        return $last_id;
    }

    function delete($id){
    
        $this->db->where('rokad_id', $id['rokadh_jama_id']);
        $this->db->delete('aa_rokad'); 
        
        $this->db->where('rokad_id', $id['rokadh_nama_id']);
        $this->db->delete('aa_rokad'); 
        
        $this->db->where('invoice_id', $id['invoice_id']);
        $this->db->delete('invoice_system'); 
       
        
	}

}
