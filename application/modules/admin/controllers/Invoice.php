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
class Invoice extends CI_Controller {

    function __construct() {
        parent::__construct();
		date_default_timezone_set('Asia/Kolkata');
		$this->load->model('Invoice_mod');
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
		$numbers = array(918123456789, 918987654321);
		$sender = urlencode('TXTLCL');
		$message = rawurlencode('This is your message');
	 
		$numbers = implode(',', $numbers);
	 
		// Prepare data for POST request
		$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
	 
		// Send the POST request with cURL
		$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
	echo $result;
	}


	public function add(){
		// pr($_POST); die;
        if (isPostBack()) {
            
            $this->form_validation->set_rules('billing_date', 'Billing Date', 'trim|required');
            $this->form_validation->set_rules('account_name', 'Company Name', 'trim|required');
            $this->form_validation->set_rules('type_of_invoice', 'Type of Invoice', 'trim|required');
            $this->form_validation->set_rules('product_name', 'Product Name', 'trim|required');
            $this->form_validation->set_rules('hsn_code', 'HSN Code', 'trim|required');
            $this->form_validation->set_rules('uom', 'UOM', 'trim|required');
            $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
            $this->form_validation->set_rules('rate', 'Rate', 'trim|required');
            $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
            $this->form_validation->set_rules('cgst', 'CGST', 'trim|required');
            $this->form_validation->set_rules('sgst', 'SGST', 'trim|required');
            $this->form_validation->set_rules('igst', 'IGST', 'trim');
            $this->form_validation->set_rules('tax_gst_amount', 'Tax GST Amount', 'trim|required');
            $this->form_validation->set_rules('freight', 'Freight', 'trim');
            $this->form_validation->set_rules('others', 'Others', 'trim');
            $this->form_validation->set_rules('total_invoice', 'Total Invoice', 'trim|required');
            $this->form_validation->set_rules('truck_no', 'Truck No', 'trim');
            $this->form_validation->set_rules('driver_name', 'Driver Name', 'trim');
            $this->form_validation->set_rules('remark', 'Remark', 'trim');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
            
			if ($this->form_validation->run() == false) {
            } else {
				
				$middle = strtotime($_POST['billing_date']);             // returns bool(false)
				$new_date = date('Y-m-d', $middle);
				$isFoundAccountDetail = explode('_',$_POST['account_name']);
				$naam = explode('_',$_POST['naam']);

				$taxinvoice_no = ($this->Invoice_mod->getTaxId());
				
				if(!empty($taxinvoice_no)){
					$taxinvoice_no = ($taxinvoice_no->invoice_id)+1; 
				}else{
					$taxinvoice_no = 1;
				}
			
				$userdata = array(
					'invoice_id' => $taxinvoice_no,
					'billing_date' => $new_date,
					'account_id'=>$isFoundAccountDetail[1],
					'jama'=>$isFoundAccountDetail[1],
					'naam'=>$naam[1],
					'type_of_invoice' => $_POST['type_of_invoice'],
					'product_name' => $_POST['product_name'],
					'hsn_code' => $_POST['hsn_code'],
					'uom' => $_POST['uom'],
					'quantity' => $_POST['quantity'],
					'rate' => $_POST['rate'],
					'amount' => $_POST['amount'],
					'cgst' => $_POST['cgst'],
					'cgst_amount' => $_POST['cgst_amount'],
					'sgst' => $_POST['sgst'],
					'sgst_amount' => $_POST['sgst_amount'],
					'igst' => $_POST['igst'],
					'igst_amount' => $_POST['igst_amount'],
					'tax_gst_amount' => $_POST['tax_gst_amount'],
					'freight' => $_POST['freight'],
					'others' => $_POST['others'],
					'total_invoice' => $_POST['total_invoice'],
					'truck_no' => $_POST['truck_no'],
					'driver_name' => $_POST['driver_name'],
					'remark' => $_POST['remark'],
					'added_by' => $this->session->userdata('userinfo')->id,
					'status' => $_POST['status'],
					'FY' =>fy()->FY,	
					'product_type' =>fy()->product_type,
					'updated_date' =>  date("Y-m-d"),
				);
				
				$deposit_data = array(
					'rokad_date' =>$new_date,
					'type_of_account' => 'deposit',
					'remark' => $_POST['remark'],
					'account_name' => $_POST['naam'],
					'karch_amount' => $_POST['total_invoice'],
					'added_by' => $this->session->userdata('userinfo')->id,
					'status' => $_POST['status'],
					'account_no'=>$naam[1],
					'FY' =>fy()->FY,	
					'product_type' =>fy()->product_type,					
				);
				
				
				$expenses_data = array(
					'rokad_date' =>$new_date,
					'type_of_account' => 'expenses',
					'remark' => $_POST['remark'],
					'account_name' => $_POST['account_name'],
					'karch_amount' => $_POST['total_invoice'],
					'added_by' => $this->session->userdata('userinfo')->id,
					'status' => $_POST['status'],
					'account_no'=>$isFoundAccountDetail[1],
					'FY' =>fy()->FY,	
					'product_type' =>fy()->product_type,					
				);

			
				$result = $this->Invoice_mod->add_rokadh_entry($deposit_data , $expenses_data);
				$result = $this->Invoice_mod->add($userdata, $result);
				set_flashdata('success', 'Invoice Successfully Created');
				redirect('/admin/invoice/listing');     
            }
        }
		
		$data['page'] = 'invoice/add';
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
				$this->Invoice_mod->edit($city_id, $userdata);
				set_flashdata('success', 'Account Name updated successfully');
				redirect('/admin/account_name');
            }
        }
		$data['result'] = $this->Invoice_mod->view($city_id);   
		// pr($data); die; 
		$data['page'] = 'invoice/add';
		$data['title'] = "Track (The Rest Accounting Key) || Edit";
		$this->load->view('layout', $data);
	}
	
	

	public function listing(){
		
		$data['page'] = 'invoice/listing';
        $data['title'] = "Track (The Rest Accounting Key) || Listing";
        // $data['pageno'] = $pageno;
        //$data['users']= $this->Advertiser_mod->listing();
        $this->load->view('layout', $data);
	}


	public function view($id =null){
		
       
        $data['page'] = 'invoice/view';
        $data['title'] = "Track (The Rest Accounting Key) || Billing View";
		$data['users']= $this->Invoice_mod->Billing_details($id);
		$this->load->view('layout', $data);
		
		
	}
	
	public function account_name(){
		echo json_encode($this->Invoice_mod->account_name());
		//echo $data;
	}
	public function getSOBDate(){
		echo json_encode($this->Invoice_mod->getSOBDate());
		//echo $data;
	}


	
	public function view_all() {
        $requestData    = $this->input->post(null,true);
        /*Counting warehouse data*/
        $query          =   $this->Invoice_mod->count_Billing_data();
        $totalData      =   $query->num_rows();
        // pr($requestData); die;
        $totalFiltered  =   $totalData;  //
        /*End of counting warehouse data*/
        
       // $d = array('id' => 'city_id', 'name' => 'name', 'status' => 'status');
        $citydata = $this->Invoice_mod->get_Billing_data(); 
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
                
                // $nestedData[]   =   
                $nestedData[]   =   '<a href="'.base_url().'admin/invoice/GeneratePdf/'.ID_encode($row['invoice_id']).'">'.$row['invoice_id'].'</a>';
				$nestedData[]   =   $row["FY"];
				$nestedData[]   =   $row["billing_date"];
				// $nestedData[]   =   ;
				$nestedData[]   =   $row["account_name"].'_'.$row["account_id"];
				$nestedData[]   =   $row["quantity"];
				$nestedData[]   =   $row["total_invoice"];
				if($row["type_of_invoice"] == 2) {$nestedData[]   =   'Bill Of Supply';}else{
					$nestedData[]   =   'Tax Invoice';
				}
				$nestedData[]   =   $this->load->view("invoice/_action", array("row" => $row), true);
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
	
	function GeneratePdf($event){
		$city_id = ID_decode($event);
		$query['invoice_data']          =   $this->Invoice_mod->get_invoice_details($city_id);
		$this->load->view('welcome_message', $query);
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
		$query['invoice_data']   = $this->Invoice_mod->get_invoice_details($id);
		$this->Invoice_mod->delete($query['invoice_data']);
		set_flashdata('success', 'Reg Deleted Successfully');
		redirect('/admin/invoice/listing');
		
		
	}

}

/*End of class*/