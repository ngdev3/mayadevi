<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

   /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    /**
     * Constructor
     */ 
    function __construct() {
        parent::__construct();
        $this->load->model('Auth_mod');
        $this->load->model('AccountMapping_mod');

       //  is_adminprotected();
       //validate_admin_login();
        validate_admin_login();
    }

    function action(){
      $this->load->library("excel");
      $object = new PHPExcel();
    
      $object->setActiveSheetIndex(0);
    
      $table_columns = array("Name", "Address", "Gender", "Designation", "Age");
    
      $column = 0;
    
      foreach($table_columns as $field)
      {
       $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
       $column++;
      }
    
      $employee_data = $this->AccountMapping_mod->fetch_data();
    
      $excel_row = 2;
    
      foreach($employee_data as $row)
      {
       $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "Name");
       $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "address");
       $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "address");
       $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "designation");
       $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "age");
       $excel_row++;
      }
    
      $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="Employee Data.xls"');
      $object_writer->save('php://output');
     }
    
    
	
	/**
     * End of function
     */
	 
	 /**
     * index
     *
     * This function to render dashboard page initially
     * 
     * @access	public
     * @return  html
     */

    public function index() {
	
        // $api_url = 'https://eproc.up.gov.in/wheat2122/Uparjan/Nominee_Update.aspx';
    //     $api_url = urlencode($api_url);
    //     $api_url = file_get_contents($api_url);
    //    // $api_url = var_dump($api_url);
        
    //     pr($api_url); 
    //   //  curl_close($curlSession);
    //     die;

     
        $data['total_weight']   = $this->Auth_mod->RealTimeDataCount()['billing'];
        $data['FinalAmountPaddy']   = $this->Auth_mod->RealTimeDataCount()['FinalAmountPaddy'];
        $data['TotalKatti']   = $this->Auth_mod->RealTimeDataCount()['TotalKatti'];
        $data['maxpurchaser']   = $this->Auth_mod->RealTimeDataCount()['maxpurchaser'];
        $data['RealTimeDataCount']   = $this->Auth_mod->RealTimeDataCount();
        
        $totallength = count($data['RealTimeDataCount']['first']);
      //  pr($this->Auth_mod->RealTimeDataCount()); die;
      $data['ActiveParcha'] = 0;
      $data['todays_KisanVahi'] = 0;
      $data['total_runningcampaigns']   = 50;
        if($totallength > 0){
          $x = 0;
          for($i=0;$i<@count($totallength);$i++){
            $x += (($data['RealTimeDataCount']['first'])[$i]->totalQuant);
          }
          $data['totalrealtimeCenterSum'] = $x;
          $data['ActiveParcha']   = $this->Auth_mod->RealTimeActiveParcha();
          $data['todays_KisanVahi']   = $this->Auth_mod->todays_KisanVahi();
          $data['total_runningcampaigns']   = 50;
        }
       
        
       $data['page'] = 'dashboard/site_dashboard';
        $data['title'] = 'Track (The Rest Accounting Key) || Dashboard';
        $this->load->view('layout',$data);
    }
    public function profilesss() {
        $data['page'] = 'profile/profile';
        $data['title'] = 'Track (The Rest Accounting Key) || Dashboard';
        $this->load->view('layout',$data);
    }

    public function getmylatestkisanvahi(){
      echo json_encode($this->Auth_mod->todays_KisanVahi());
    }
    public function sendWhatsapp(){

      // pr($_POST); die;
            $custommsg = '???????????? ????????? ' .$_POST['totalExpenses']. ' ?????? ???????????? ?????? | ???????????? ????????? ' .$_POST['deposit']. ' ?????? ???????????? ?????? ????????? ????????? ' .$_POST['MyFinalExpenses']; 
            $chatApiToken = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2MjE0MzA1MDgsInVzZXIiOiI5MTg4ODc5MDUwNzAifQ.4LwafGBl-ZEmWAAixPeVTGZMDBSBPrzp7PV6DAlNXMM"; // Get it from https://www.phphive.info/255/get-whatsapp-password/
            $number = $_POST['mobile_no']; // Number
            $message = $custommsg; // Message
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://chat-api.phphive.info/message/send/text',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>json_encode(array("jid"=> $number."@s.whatsapp.net", "message" => $message)),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$chatApiToken,
                'Content-Type: application/json'),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            echo $response;
    }

  
	
    public function invoice_creation(){
        generate_kyi_invoice_pdf();
    }
    public function js_invoice_creation(){
       // $data['page'] = 'billing/add';
		//$data['title'] = "Track (The Rest Accounting Key) || Edit";
        
		$this->load->view('invoice_data/js_pdfs', true);
       // $this->load->view('layout', $data);
    }
	/*End of function*/
    
    

    public function mydata(){
      // $a = fy() ;
      // pr($a);
      // die;
        // Check form submit or not 
        if($this->input->post('upload') != NULL ){ 
           $data = array(); 
           if(!empty($_FILES['file']['name'])){ 
             // Set preference 
                $config['upload_path'] = 'uploads/'; 
                $config['allowed_types'] = 'csv'; ///
               // $config['encrypt_name'] = true; 
                $config['max_size'] = '1000'; // max_size in kb 
                $config['file_name'] = $_FILES['file']['name'];
    
                // Load upload library 
                $this->load->library('upload',$config); 
        
                // File upload
                if($this->upload->do_upload('file')){ 
                // Get data about the file
                $uploadData = $this->upload->data(); 
                $filename = $uploadData['file_name'];

                    $file = fopen("uploads/".$filename,"r");
                    $data = [];
                    $i = 0;
                    while(!feof($file))
                    {
                        $data[] = fgetcsv($file);
                    }
                  // pr($data);               

              for($j = 0 ; $j < count($data) ; ){
               // $date = str_replace('/', '-', $data[$j][12]);
                $updateData			=	array(
                
                  'Farmer_ID' =>  $data[$j][2],
                  'Purchase_ID' =>  $data[$j][1],
                  'PFMS_Status' =>  $data[$j][7],
                  'bank_name' =>  $data[$j][14],
                  'Ack_Status' =>  $data[$j][8],
                  'UTR_No' =>  $data[$j][11],
                  'Farmer_name_PFMS' =>  $data[$j][12],
                  'Payment_Status' =>  $data[$j][9],
                  'Payment_Date' => $data[$j][10], //date('d-m-Y',strtotime($date)),
                  'Account_purchase' => $data[$j][13], //date('d-m-Y',strtotime($date)),
                  'Latest_Account_no' => $data[$j][13], //date('d-m-Y',strtotime($date)),
                   );
                 
                  //  pr($updateData); 
                $this->db->where('Farmer_ID', $data[$j][2]);
                $this->db->where('FY', fy()->FY);
                $this->db->where('CenterName', $_POST['centerType']);
                $this->db->where('product_type', fy()->product_type);	
                $this->db->update('kisanvahidata',$updateData);
            $j++;
            }

            $data['response'] = '<h1>successfully uploaded '.$filename." Total Affected Rows: </h1>"; 
             }else{ 
                $data['response'] = 'failed'; 
             } 
          }else{ 
             $data['response'] = 'failed'; 
          } 
          // load view
          $data['center_list'] = $this->AccountMapping_mod->center_list();
          $this->load->view('invoice_data/js_pdfs',$data); 
        }else{
          // load view 
          $data['center_list'] = $this->AccountMapping_mod->center_list();
          $this->load->view('invoice_data/js_pdfs',$data); 
        }
    
      }

      public function all_mydata(){
        
        //      $file = fopen("uploads/fy_all_data_excel_2.csv","r");
        // $data = [];
        // $i = 0;
        // while(!feof($file))
        // {
        //     $data[] = fgetcsv($file);
        // }
            if($this->input->post('upload') != NULL ){ 
               $data = array(); 
               if(!empty($_FILES['file']['name'])){ 
                 // Set preference 
                    $config['upload_path'] = 'uploads/'; 
                    $config['allowed_types'] = 'csv'; 
                   // $config['encrypt_name'] = true; 
                    $config['max_size'] = '1000'; // max_size in kb 
                    $config['file_name'] = $_FILES['file']['name'];
        
                    // Load upload library 
                    $this->load->library('upload',$config); 
            
                    // File upload
                    if($this->upload->do_upload('file')){ 
                    // Get data about the file
                    $uploadData = $this->upload->data(); 
                    $filename = $uploadData['file_name'];
    
                        $file = fopen("uploads/".$filename,"r");
                        $data = [];
                        $i = 0;
                        while(!feof($file))
                        {
                            $data[] = fgetcsv($file);
                        }
                    //    pr($data);  die;                
    
                  for($j = 0 ; $j < count($data) ; ){
        //           $date = str_replace('/', '-', $data[$j][12]);
                    $updateData			=	array(
                    'Farmer_hindi_name' =>  $data[$j][2],
                    'mobile_no' =>  $data[$j][3],
                    'Farmer_ID' =>  $data[$j][4],
                    'Purchase_ID' =>  $data[$j][5],
                    'bank_name' =>  $data[$j][16],
                    'Latest_Account_no' =>  $data[$j][17],
                    'ifsc_code' =>  $data[$j][18],
                    'Ack_Status' =>  $data[$j][19],
                    'Payment_Status' =>  $data[$j][20],
                    'Payment_Date' =>  $data[$j][21],
                    'UTR_No' =>  $data[$j][22],
                     );
                    // pr($updateData);
                    $this->db->where('Farmer_ID', $data[$j][4]);
                    $this->db->where('Quantity', floatval($data[$j][7] + $data[$j][8]));
                    $this->db->where('FY', fy()->FY);
                    $this->db->where('CenterName', $_POST['centerType']);
                    $this->db->where('product_type', fy()->product_type);	
                    $this->db->update('kisanvahidata',$updateData);
                $j++;
                }
    
                $data['response'] = '<h1>successfully uploaded '.$filename."</h1>"; 
                 }else{ 
                    $data['response'] = 'failed'; 
                 } 
              }else{ 
                 $data['response'] = 'failed'; 
              } 
              // load view 
              $this->load->view('invoice_data/all_my_js_pdfs',$data); 
            }else{
              // load view 
              $this->load->view('invoice_data/all_my_js_pdfs'); 
            }
        
          }
    
          public function email($emailTo,$emailToName, $subject, $body){
            // pr($emailTo); die;
                 $this->load->library('Sendmail');
                 $mail = new PHPMailer(); // create a new object
                 $mail->IsSMTP(); // enable SMTP
                 $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
                 $mail->SMTPAuth = true; // authentication enabled
                 $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
                 $mail->Host = "smtp.gmail.com";
                 $mail->Port = 465; // or 587
                 $mail->IsHTML(true);
                 $mail->Username = "tekshapers.rajat@gmail.com";//ankit2@thealternativeaccount.com    OR   test.thealternativeaccount@gmail.com";
                 $mail->Password = "Google@5853";  
                 $mail->Subject = 'sss';
                 $mail->Body = 'sdfsdf';
                 $mail->AddAddress($emailTo, $emailToName);
                 $mail->SetFrom('admin@thecrindustries.com', 'Maya Industries');
                 $mail->Subject = $subject;
                 $mail->AltBody = $body;
                 $mail->MsgHTML($body);
                 $mail->Send();
                 if($mail->Send()){
                     echo  'TRUE';
           
                 }else{
                     echo 'FALSE';
           
                 }
         }
 
         
          public function getmyDataSPN(){ //657 : Hardoi, 688 : SPN
            // echo Date('d-m-Y');
            // die;
            $val = file_get_contents('https://cdn-api.co-vin.in/api/v2/appointment/sessions/public/calendarByDistrict?district_id=657&date='.Date('d-m-Y'));
          //  pr(json_decode($val)->centers);
          //  die;
           // $globalmsg;
            $varGlobal = json_decode($val)->centers;
            if(!empty($varGlobal)){
              for($i = 0 ; $i < count($varGlobal); $i++){
                // echo $varGlobal[$i]->name;
                // echo "</br>";
                // echo $varGlobal[$i]->district_name;
                // echo "</br>";
                for($j = 0; $j < count($varGlobal[$i]->sessions); $j++){
                 
                  if($varGlobal[$i]->sessions[$j]->available_capacity > 0 && $varGlobal[$i]->sessions[$j]->min_age_limit == '18'){
                    // available_capacity
                    $msg = "Center Name : ".$varGlobal[$i]->name .", <br> District : ".$varGlobal[$i]->district_name.", <br> Date: ".$varGlobal[$i]->sessions[$j]->date.',   Available Capacity: '.$varGlobal[$i]->sessions[$j]->available_capacity."</br> </br>";
                    $this->email('rajatinvoice@gmail.com','Rajat Covax',$varGlobal[$i]->name, $msg);
                    // echo "</br>";
                  }
                }
              }
            }
          }

          public function getmyDataHardoi(){ //657 : Hardoi, 688 : SPN
            $val = file_get_contents('https://cdn-api.co-vin.in/api/v2/appointment/sessions/public/calendarByDistrict?district_id=657&date='.Date('d-m-Y'));
          //  pr(json_decode($val)->centers);
          //  die;
           // $globalmsg;
            $varGlobal = json_decode($val)->centers;
            if(!empty($varGlobal)){
              for($i = 0 ; $i < count($varGlobal); $i++){
                // echo $varGlobal[$i]->name;
                // echo "</br>";
                // echo $varGlobal[$i]->district_name;
                // echo "</br>";
                for($j = 0; $j < count($varGlobal[$i]->sessions); $j++){
                 
                  if($varGlobal[$i]->sessions[$j]->available_capacity > 0 && $varGlobal[$i]->sessions[$j]->min_age_limit == '45'){
                    // available_capacity
                    $msg = "Center Name : ".$varGlobal[$i]->name .", <br> District : ".$varGlobal[$i]->district_name.", <br> Date: ".$varGlobal[$i]->sessions[$j]->date.',   Available Capacity: '.$varGlobal[$i]->sessions[$j]->available_capacity."</br> </br>";
                    $this->email('rajatinvoice@gmail.com','Rajat Covax',$varGlobal[$i]->name, $msg);
                    // echo "</br>";
                  }
                }
              }
            }
          }

          public function dataByhtml(){
            // $this->load->view('invoice_data/pdfs');
             $data['page'] = 'invoice_data/pdfs';
             $data['title'] = "Track (The Rest Accounting Key) || Search Report";
       //	$data['users']= $this->Report_mod->Billing_details($id);
         $this->load->view('layout', $data);
       
           }

      public function renewable(){
              $data['users']= $this->Auth_mod->getrenewable();
             $data['page'] = 'invoice_data/renew';
             $data['title'] = "Track (The Rest Accounting Key) || Search Report";
              $this->load->view('layout', $data);
           }

           public function renewablebyId($id){
              $id =  ID_decode($id);
              $data   =   array(
                'status' =>'active',
                'updated_date'=>date('Y-m-d')
              );
              $this->db->where('approval_id', $id); 
              $this->db->update('login_approval', $data);
              redirect(base_url('admin/dashboard/renewable'));
           }
}
/*End of class*/