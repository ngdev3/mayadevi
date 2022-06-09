<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  Client Controller
 *
 * @package		Admin
 * @category    Client
 * @author		
 * @website		http://www.thealternativeaccount.com
 * @company     thealternativeaccount Inc
 * @since		Version 1.0
 */
class Kisanreg extends CI_Controller {

    function __construct() {
        parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
		$this->load->model('Kisanreg_mod');
		$this->load->model('AccountMapping_mod');
		is_adminprotected();
		validate_admin_login();
    }

    /* End of constructor */

    /**
     * index
     *
     * This function show list of Client
     * 
     * @access	public
     * @return	html data
     */
    

	public function index($pageno=1)
    {

       $this->listing();
    }
	
		

	public function listing(){
		// die;
		$data['page'] = 'regkisanvahi/listing';
        $data['title'] = "Track (The Rest Accounting Key) || Listing";
        // $data['pageno'] = $pageno;
        //$data['users']= $this->Advertiser_mod->listing();
        $this->load->view('layout', $data);
	}



	public function add(){
		// pr($_POST); die;
        if (isPostBack()) {
            
            $this->form_validation->set_rules('reg_date', 'Reg Date', 'trim|required');
            $this->form_validation->set_rules('account_name', 'account Name', 'trim|required');
            $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
            $this->form_validation->set_rules('origin_type', 'Origin Type', 'trim|required');
            $this->form_validation->set_rules('farmer_name', 'Farmer Name', 'trim|required');
            $this->form_validation->set_rules('farmer_id', 'Farmer Id', 'trim|required');
            $this->form_validation->set_rules('aadhar_card', 'Aadhar Card', 'trim|required');
            $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
            
			if ($this->form_validation->run() == false) {
				
            } else {
				
				$middle = strtotime($_POST['reg_date']);             // returns bool(false)
				$new_date = date('Y-m-d', $middle);

				$isFoundAccountDetail = explode('_',$_POST['account_name']);
				// $naam = explode('_',$_POST['naam']);

				$userdata = array(
					'reg_date'=>$new_date,
					'account_no'=>$isFoundAccountDetail[1],
					'quantity' => $_POST['quantity'],
					'origin_type' => $_POST['origin_type'],
					'farmer_name' => $_POST['farmer_name'],
					'Farmer_ID' => $_POST['farmer_id'],
					'aadhar_card' => $_POST['aadhar_card'],
					'dob' => $_POST['dob'],
					'added_by' => $this->session->userdata('userinfo')->id,
					'status' => $_POST['status'],
					'FY' =>fy()->FY,	
					'product_type' =>fy()->product_type,
					'updated_date' =>  date("Y-m-d"),
				);

				$stat = $this->Kisanreg_mod->check_preexistance($_POST['farmer_id']);
				// pr($stat); die;
					
					if(!$stat)
					{
						$result = $this->Kisanreg_mod->add($userdata);
						set_flashdata('success', 'Registration Added Successfully Created');
						redirect('/admin/Kisanreg/listing');     
					}else{
						set_flashdata('error', 'Registration Already Added');
						redirect('/admin/Kisanreg/add');     
					}
				}
        }
		
		$data['center_list'] = $this->AccountMapping_mod->origin_type();
		$data['page'] = 'regkisanvahi/add';
		$data['title'] = "Track (The Rest Accounting Key) || Add";
		
        $this->load->view('layout', $data);
	}
	
	function report(){
		
	}
	
	function edit($id = null){
		$city_id = ID_decode($id);
        if (isPostBack()) {
            $city_id = ID_decode($id);
			$this->form_validation->set_rules('reg_date', 'Reg Date', 'trim|required');
            $this->form_validation->set_rules('account_name', 'account Name', 'trim|required');
            $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
            $this->form_validation->set_rules('origin_type', 'Origin Type', 'trim|required');
            $this->form_validation->set_rules('farmer_name', 'Farmer Name', 'trim|required');
            $this->form_validation->set_rules('farmer_id', 'Farmer Id', 'trim|required');
            $this->form_validation->set_rules('aadhar_card', 'Aadhar Card', 'trim|required');
            $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
            } else {
			

				$userdata = array(
					'reg_date'=>$new_date,
					'account_no'=>$isFoundAccountDetail[1],
					'quantity' => $_POST['quantity'],
					'origin_type' => $_POST['origin_type'],
					'farmer_name' => $_POST['farmer_name'],
					'Farmer_ID' => $_POST['farmer_id'],
					'aadhar_card' => $_POST['aadhar_card'],
					'dob' => $_POST['dob'],
					'added_by' => $this->session->userdata('userinfo')->id,
					'status' => $_POST['status'],
					'FY' =>fy()->FY,	
					'product_type' =>fy()->product_type,
					'updated_date' =>  date("Y-m-d"),
				);


				$this->Kisanreg_mod->edit($city_id, $userdata);
				set_flashdata('success', 'Reg Added Successfully Created');
				redirect('/admin/Kisanreg/listing');  
            }
        }
		// pr($userdata); die;
		$data['center_list'] = $this->AccountMapping_mod->origin_type();
		$data['result'] = $this->Kisanreg_mod->view($city_id);   
	//	pr($data); die; 
		$data['page'] = 'regkisanvahi/add';
		$data['title'] = "Track (The Rest Accounting Key) || Edit";
		$this->load->view('layout', $data);
	}
	
	

	public function view($id =null){
		
       
        $data['page'] = 'regkisanvahi/view';
        $data['title'] = "Track (The Rest Accounting Key) || Billing View";
		$data['users']= $this->Kisanreg_mod->Billing_details($id);
		// pr($data['users']); die;
		$this->load->view('layout', $data);
		
		
	}

	public function delete($id =null){
		
		$this->Kisanreg_mod->delete($id);
		set_flashdata('success', 'Reg Deleted Successfully');
		redirect('/admin/Kisanreg/listing');
		
		
	}
	
	public function account_name(){
		echo json_encode($this->Kisanreg_mod->account_name());
		//echo $data;
	}
	
	public function view_all() {
        $requestData    = $this->input->post(null,true);
        /*Counting warehouse data*/
        $query          =   $this->Kisanreg_mod->count_Billing_data();
        $totalData      =   $query->num_rows();
        // pr($query->num_rows()); die;
        $totalFiltered  =   $totalData;  //
        /*End of counting warehouse data*/
        
       // $d = array('id' => 'city_id', 'name' => 'name', 'status' => 'status');
        $citydata = $this->Kisanreg_mod->get_Billing_data(); 
		// pr(count($citydata));
		// die;
        //   die;     
        $data   =   array();
        if(count($citydata) > 0)
        {
            $j = $requestData['start'];
            for( $i=0; $i<count($citydata);$i++ ) 
            {  
                $j++;
                $row    =   (array)$citydata[$i];
				$nestedData     =   array();
                $nestedData[]   =   $j;
                
                // $nestedData[]   =   '<a href="'.base_url().'admin/regkisanvahi/view/'.ID_encode($row['account_id']).'">'.$row['account_id'].'</a>';
				$nestedData[]   =   $row["Farmer_ID"];
				$nestedData[]   =   $row["Farmer_name"];
				$nestedData[]   =   $row["Quantity"];
				$nestedData[]   =   $row["reg_date"];
                $nestedData[]   =   $row["dob"];
				$nestedData[]   =   $row["account_name"];
				$nestedData[]   =   $row["status"];
				// $nestedData[]   =   $row["contact_person_number"];
                // $nestedData[]   =   $row["site_name"];
                // $nestedData[]   =   $row["gst_amount"];

				$nestedData[]   =   $this->load->view("regkisanvahi/_action", array("row" => $row), true);
				// pr($row); die;
                $data[]         =   $nestedData;
            }
        }

        $json_data = array(
            "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal"    => intval( $totalData ),  // total number of records
            "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data"            => $data   // total data array
        );

        echo json_encode($json_data);  // send data as json format
	}
	
	
}

/*End of class*/