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
class Taxinvoice extends CI_Controller {

    function __construct() {
        parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
		$this->load->model('Taxinvoice_mod');
		is_adminprotected();
		validate_admin_login();

	// 	$apiKey = urlencode('Nzk0ZjZlMzM1ODU0NDg2ZjM1N2EzOTYzNGE1MDU2NzU=');
	
	// // Message details
	// $numbers = array(918887905070);
	// $sender = urlencode('TXTLCL');
	// $message = rawurlencode('This is your message');
 
	// $numbers = implode(',', $numbers);
 
	// // Prepare data for POST request
	// $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// // Send the POST request with cURL
	// $ch = curl_init('https://api.textlocal.in/send/');
	// curl_setopt($ch, CURLOPT_POST, true);
	// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// $response = curl_exec($ch);
	// curl_close($ch);
	
	// // Process your response here
	// echo $response;

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
	
	public function smsapi(){
		
		$apiKey = urlencode('Nzk0ZjZlMzM1ODU0NDg2ZjM1N2EzOTYzNGE1MDU2NzU=');
	
		// Message details
		$numbers = array(9415777518,7827745516,8887905070,7398703084);
		$sender = urlencode('CRIND');
		$message = rawurlencode('Welcome CR Industries, Your Default Password is '.'6546546464');
	 
		$numbers = implode(',', $numbers);
	 
		// Prepare data for POST request
		$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
	 
		// Send the POST request with cURL
		$ch = curl_init('https://api.textlocal.in/send/');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);
		
		// Process your response here
		echo $response;
	}


	public function add(){
		
        if (isPostBack()) {
            
            $this->form_validation->set_rules('billing_date', 'Billing Date', 'trim|required');
            $this->form_validation->set_rules('account_name', 'Company Name', 'trim|required');
            $this->form_validation->set_rules('type_of_invoice', 'Type of Invoice', 'trim|required');

            $this->form_validation->set_rules('bos_number', 'BILL Of Supply', 'trim|required');
            $this->form_validation->set_rules('deduction_quantity', 'Deducation Quantity', 'trim|required');
            $this->form_validation->set_rules('net_weight', 'Net Weight', 'trim|required');
            $this->form_validation->set_rules('less_rebate', 'Less Rebate', 'trim|required');
            
			if ($this->form_validation->run() == false) {
            } else {
				
				$middle = strtotime($_POST['billing_date']);             // returns bool(false)
				$new_date = date('Y-m-d', $middle);
				$isFoundAccountDetail = explode('_',$_POST['account_name']);


				$taxinvoice_no = ($this->Taxinvoice_mod->getTaxId());
				if(!empty($taxinvoice_no)){
					$taxinvoice_no = ($taxinvoice_no->tax_invoice_fy_id)+1; 
				}else{
					$taxinvoice_no = 1;
				}


				$userdata = array(
					'tax_invoice_fy_id' => $taxinvoice_no,
					'billing_date' => $new_date,
					'bos_number'=>$_POST['bos_id'],
					'total_invoice' => $_POST['total_invoice'],
					'deduction_quantity' => $_POST['deduction_quantity'],
					'net_weight' => $_POST['net_weight'],
					'less_rebate_amount' => $_POST['less_rebate'],
					'cgst_amount' => $_POST['cgst_amount'],
					'sgst_amount' => $_POST['sgst_amount'],
					'tax_gst_amount' => $_POST['tax_gst_amount'],
					'type_of_invoice' => $_POST['type_of_invoice'],
					'added_by' => $this->session->userdata('userinfo')->id,
					'FY' =>fy()->FY,	
					'product_type' =>fy()->product_type,
					'updated_date' =>  date("Y-m-d"),
				);
				
			
				$result = $this->Taxinvoice_mod->add($userdata);
				// pr($_POST); die;
				set_flashdata('success', 'Invoice Successfully Created');
				redirect('/admin/taxinvoice/listing');     
            }
        }
		
		$data['page'] = 'taxinvoice/add';
		$data['title'] = "Track (The Rest Accounting Key) || Add";
		
        $this->load->view('layout', $data);
	}
	
	
	
	function edit($id = null){
		$city_id = ID_decode($id);
        if (isPostBack()) {
            $city_id = ID_decode($id);
			$this->form_validation->set_rules('account_name', 'Account Name', 'trim|required');
			$this->form_validation->set_rules('contact_person_number', 'Mobile No', 'trim');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
            } else {
				$userdata = array(
					'name' => $_POST['account_name'],
					'contact_person_number' => $_POST['contact_person_number'],
					'added_by' => $this->session->userdata('userinfo')->id,
					'status' => $_POST['status'],
					'updated_date' =>  date("Y-m-d"),
				);
				$this->Taxinvoice_mod->edit($city_id, $userdata);
				set_flashdata('success', 'Account Name updated successfully');
				redirect('/admin/account_name');
            }
        }
		$data['result'] = $this->Taxinvoice_mod->view($city_id);   
		// pr($data); die; 
		$data['page'] = 'invoice/add';
		$data['title'] = "Track (The Rest Accounting Key) || Edit";
		$this->load->view('layout', $data);
	}
	
	

	public function listing(){
		
		$data['page'] = 'taxinvoice/listing';
        $data['title'] = "Track (The Rest Accounting Key) || Listing";
        // $data['pageno'] = $pageno;
        //$data['users']= $this->Advertiser_mod->listing();
        $this->load->view('layout', $data);
	}


	public function view($id =null){
		
       
        $data['page'] = 'taxinvoice/view';
        $data['title'] = "Track (The Rest Accounting Key) || Billing View";
		$data['users']= $this->Taxinvoice_mod->Billing_details($id);
		$this->load->view('layout', $data);
		
		
	}
	
	public function account_name(){
		echo json_encode($this->Taxinvoice_mod->account_name());
		//echo $data;
	}
	public function getSOBDate(){
		echo json_encode($this->Taxinvoice_mod->getSOBDate());
		//echo $data;
	}


	
	public function view_all() {
        $requestData    = $this->input->post(null,true);
        /*Counting warehouse data*/
        $query          =   $this->Taxinvoice_mod->count_Billing_data();
        $totalData      =   $query->num_rows();
        // pr($requestData); die;
        $totalFiltered  =   $totalData;  //
        /*End of counting warehouse data*/
        
       // $d = array('id' => 'city_id', 'name' => 'name', 'status' => 'status');
        $citydata = $this->Taxinvoice_mod->get_Billing_data(); 
	
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
				// pr(($row));
				// die;
                
                // $nestedData[]   =   '<a href="'.base_url().'admin/invoice/view/'.ID_encode($row['account_id']).'">'.$row['account_id'].'</a>';
                $nestedData[]   =   $row["tax_invoice_fy_id"];
				$nestedData[]   =   $row["invoice_id"];
				$nestedData[]   =   $row["FY"];
				$nestedData[]   =   $row["deduction_quantity"];
				$nestedData[]   =   $row["less_rebate_amount"];
				$nestedData[]   =   $row['account_name'];
				$nestedData[]   =   $row['total_invoice'];
				$nestedData[]   =   'Tax Invoice';
				
				$nestedData[]   =   $this->load->view("taxinvoice/_action", array("row" => $row), true);
                $data[]         =   $nestedData;
            }
			// pr($row); die;
        }

        $json_data = array(
            "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal"    => intval( $totalData ),  // total number of records
            "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data"            => $data   // total data array
        );

        echo json_encode($json_data);  // send data as json format
	}
	
	function GeneratePdf($event){
		$city_id = ID_decode($event);
		$query['invoice_data']          =   $this->Taxinvoice_mod->get_invoice_details($city_id);
		// pr($query); die;
		$this->load->view('taxinvoice_welcome_message', $query);
		$html = $this->output->get_output();
		$this->load->library('pdf');
		$this->pdf->loadHtml($html);
		$this->pdf->setPaper('A4', 'portrait');
		$this->pdf->render();
		// // Output the generated PDF (1 = download and 0 = preview)
		$this->pdf->stream("html_contents.pdf", array("Attachment"=> 0));		
	}

	public function delete($id =null){
		$id = ID_decode($id);
		$query['invoice_data']   = $this->Taxinvoice_mod->get_invoice_details($id);
		$this->Taxinvoice_mod->delete($query['invoice_data']);
		set_flashdata('success', 'Reg Deleted Successfully');
		redirect('/admin/taxinvoice/listing');
		
		
	}

}

/*End of class*/