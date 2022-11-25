<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/webservices/REST_Controller.php';
require APPPATH . '/libraries/webservices/Message.php';

class Webservices extends REST_Controller
{
    public $apikey = 'fpcmey2840bg56ud75y007ghg54bsj6410';

    function __construct()
    {
        parent::__construct();
        // die;
        header('Access-Control-Allow-Origin: *');
        $this->load->model('Webservice_model');
    }

    public function login_post()
    {
        header('Access-Control-Allow-Origin: *');
        //    pr($_POST);
        //    die;
        if (isset($_POST['api_key']) && !empty($_POST['api_key'])) {
            if (API_KEY == $_POST['api_key']) {
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                if ($this->form_validation->run() === true) {
                    $result = $this->Webservice_model->login();
                    if ($result['status'] == 'success') {
                        $success = array('responseCode' => '200', 'responseStatus' => 'success', 'responseMessage' => 'Login successfully !', 'data' => $result['result']);
                        $this->response($success, 200);
                    } else {
                        $error = array('responseCode' => '400', 'responseStatus' => 'error', 'responseMessage' => $result['error_msg']);
                        $this->response($error, 200);
                    }
                } else {
                    $error_msg = validation_errors();
                    $error = array('responseCode' => '400', 'responseStatus' => 'error', 'responseMessage' => $error_msg);
                    $this->response($error, 200);
                }
            } else {
                $error_msg = 'API key is invalid';
                $error = array('responseCode' => '400', 'responseStatus' => 'error', 'responseMessage' => $error_msg);
                $this->response($error, 200);
            }
        } else {
            $error_msg = 'api_key field is required !';
            $error = array('responseCode' => '400', 'responseStatus' => 'error', 'responseMessage' => $error_msg);
            $this->response($error, 200);
        }
    }

    public function forgot_password_post()
    {
        header('Access-Control-Allow-Origin: *');
        if (isset($_POST['api_key']) && !empty($_POST['api_key'])) {
            if (API_KEY == $_POST['api_key']) {
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                if ($this->form_validation->run() === true) {
                    $result = $this->Webservice_model->forgot_password();
                    if ($result['status'] == 'success') {

                        /*Sending mail with password*/
                        $email_data['to'] = $result['result']->email;
                        $email_data['from'] = ADMIN_EMAIL;
                        $email_data['sender_name'] = ADMIN_NAME;
                        $email_data['subject'] = "Forgot Password";
                        $email_data['message'] = array(
                            'header' => 'Forgot Password !',
                            'body' => '<br/><b> Your Password </b>
					<br/><br/><b>Dear ' . ucfirst($result['result']->first_name . ' ' . $result['result']->last_name) . ' ,</b><br>
					<br>Your new password is: ' . $result['new_password'] . ' <br>',
                            'mail_footer' => 'Thanks,<br/><br/> Team KYI <br/><br/><br/>'
                        );
                        _sendEmailNew($email_data);   /* email function for mailjet configuration */
                        $success = array('responseCode' => '200', 'responseStatus' => 'success', 'responseMessage' => 'Password Has been Sent Successfully on Your Email Address', 'data' => $result);
                        $this->response($success, 200);
                    } else {
                        $error = array('responseCode' => '400', 'responseStatus' => 'error', 'responseMessage' => $result['error_msg']);
                        $this->response($error, 200);
                    }
                } else {
                    $error_msg = validation_errors();
                    $error = array('responseCode' => '400', 'responseStatus' => 'error', 'responseMessage' => $error_msg);
                    $this->response($error, 200);
                }
            } else {
                $error_msg = 'API key is invalid';
                $error = array('responseCode' => '400', 'responseStatus' => 'error', 'responseMessage' => $error_msg);
                $this->response($error, 200);
            }
        } else {
            $error_msg = 'api_key field is required !';
            $error = array('responseCode' => '400', 'responseStatus' => 'error', 'responseMessage' => $error_msg);
            $this->response($error, 200);
        }
    }

    public function fetch_myprofile_data_post()
    {
        header('Access-Control-Allow-Origin: *');
        if (isset($_POST['api_key']) && !empty($_POST['api_key'])) {
            if (API_KEY == $_POST['api_key']) {
                $this->form_validation->set_rules('id', 'Id', 'trim|required');
                if ($this->form_validation->run() === true) {
                    $result = $this->Webservice_model->fetch_myprofile_data();
                    if ($result['status'] == 'success') {
                        $success = array('responseCode' => '200', 'responseStatus' => 'success', 'responseMessage' => 'Data found successfully !', 'data' => $result['result']);
                        $this->response($success, 200);
                    } else {
                        $error = array('responseCode' => '400', 'responseStatus' => 'error', 'responseMessage' => $result['error_msg']);
                        $this->response($error, 200);
                    }
                } else {
                    $error_msg = validation_errors();
                    $error = array('responseCode' => '400', 'responseStatus' => 'error', 'responseMessage' => $error_msg);
                    $this->response($error, 200);
                }
            } else {
                $error_msg = 'API key is invalid';
                $error = array('responseCode' => '400', 'responseStatus' => 'error', 'responseMessage' => $error_msg);
                $this->response($error, 200);
            }
        } else {
            $error_msg = 'api_key field is required !';
            $error = array('responseCode' => '400', 'responseStatus' => 'error', 'responseMessage' => $error_msg);
            $this->response($error, 200);
        }
    }

    function alpha_dash_space($str)
    {
        return (!preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
    }

    public function update_myprofile_post()
    {
        header('Access-Control-Allow-Origin: *');
        if (isset($_POST['api_key']) && !empty($_POST['api_key'])) {
            if (API_KEY == $_POST['api_key']) {
                $this->form_validation->set_rules('id', 'Id', 'trim|required');
                $this->form_validation->set_rules('name', 'Name', 'required|callback_alpha_dash_space');
                $this->form_validation->set_message("alpha_dash_space", "Manager Name contains only alphabetic characters.");
                $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required|numeric|min_length[10]|max_length[10]', array(
                    'min_length' => 'Mobile Number can not be less than 10 digits.', 'max_length' => 'Mobile Number can not be greater than 10 digits.'
                ));
                if ($this->form_validation->run() === true) {
                    $result = $this->Webservice_model->update_myprofile_data();
                    if ($result['status'] == 'success') {
                        $success = array('responseCode' => '200', 'responseStatus' => 'success', 'responseMessage' => $result['success_msg'], 'data' => $result['result']);
                        $this->response($success, 200);
                    } else {
                        $error = array('responseCode' => '400', 'responseStatus' => 'error', 'responseMessage' => $result['error_msg']);
                        $this->response($error, 200);
                    }
                } else {
                    $error_msg = validation_errors();
                    $error = array('responseCode' => '400', 'responseStatus' => 'error', 'responseMessage' => $error_msg);
                    $this->response($error, 200);
                }
            } else {
                $error_msg = 'API key is invalid';
                $error = array('responseCode' => '400', 'responseStatus' => 'error', 'responseMessage' => $error_msg);
                $this->response($error, 200);
            }
        } else {
            $error_msg = 'api_key field is required !';
            $error = array('responseCode' => '400', 'responseStatus' => 'error', 'responseMessage' => $error_msg);
            $this->response($error, 200);
        }
    }

    public function change_password_post()
    {
        header('Access-Control-Allow-Origin: *');
        if (isset($_POST['api_key']) && !empty($_POST['api_key'])) {
            if (API_KEY == $_POST['api_key']) {
                $this->form_validation->set_rules('id', 'Id', "trim|required");
                $this->form_validation->set_rules('current_password', 'Current Password', "trim|required");
                $this->form_validation->set_rules('new_password', 'New Password', "trim|required");
                $this->form_validation->set_rules('confirm_password', 'Confirm Password', "trim|required|matches[new_password]");
                if ($this->form_validation->run() === true) {
                    $result = $this->Webservice_model->change_password();
                    if ($result['status'] == 'success') {

                        $email_data['to']             = $result['result']->email;
                        $email_data['from']         = ADMIN_EMAIL;
                        $email_data['sender_name']     = ADMIN_NAME;
                        $email_data['subject']         = "Change Password";
                        $email_data['message']         = array(
                            'header' => 'Change Password.',
                            'body' => '<br/><b>Your Password has been changed successfully</b>',
                            'mail_footer' => 'Thanks,<br/><br/> Team KYI <br/><br/><br/>'
                        );
                        _sendEmailNew($email_data);
                        $success = array('responseCode' => '200', 'responseStatus' => 'success', 'responseMessage' => $result['success_msg']);
                        $this->response($success, 200);
                    } else {
                        $error = array('responseCode' => '400', 'responseStatus' => 'error', 'responseMessage' => $result['error_msg']);
                        $this->response($error, 200);
                    }
                } else {
                    $error_msg = validation_errors();
                    $error = array('responseCode' => '400', 'responseStatus' => 'error', 'responseMessage' => $error_msg);
                    $this->response($error, 200);
                }
            } else {
                $error_msg = 'API key is invalid';
                $error = array('responseCode' => '400', 'responseStatus' => 'error', 'responseMessage' => $error_msg);
                $this->response($error, 200);
            }
        } else {
            $error_msg = 'api_key field is required !';
            $error = array('responseCode' => '400', 'responseStatus' => 'error', 'responseMessage' => $error_msg);
            $this->response($error, 200);
        }
    }

    public function device_register_post()
    {
        // pr($_POST);

        // pr($_POST);
        if (isset($_POST['api_key']) && !empty($_POST['api_key'])) {
            if (API_KEY == $_POST['api_key']) {
                $this->form_validation->set_rules('device_name', 'Device Name', 'trim|required');
                $this->form_validation->set_rules('device_id', 'Device ID', 'trim|required');
                if ($this->form_validation->run() === true) {
                    $result = $this->Webservice_model->device_register();
                    if ($result['status'] == 'success') {
                        $success = array('responseCode' => '200', 'responseStatus' => 'success', 'responseMessage' => 'Device Registered', 'data' => $result['data']);
                        $this->response($success, 200);
                    } else {
                        $error = array('responseCode' => '201', 'responseStatus' => 'error', 'responseMessage' => $result['error_msg']);
                        $this->response($error, 200);
                    }
                } else {
                    $error_msg = validation_errors();
                    $error = array('responseCode' => '201', 'responseStatus' => 'error', 'responseMessage' => $error_msg);
                    $this->response($error, 200);
                }
            } else {
                $error_msg = 'API key is invalid';
                $error = array('responseCode' => '201', 'responseStatus' => 'error', 'responseMessage' => $error_msg);
                $this->response($error, 200);
            }
        } else {
            $error_msg = 'api_key field is required !';
            $error = array('responseCode' => '201', 'responseStatus' => 'error', 'responseMessage' => $error_msg);
            $this->response($error, 200);
        }
    }

    public function invoice_create_post()
    {
        pr($_POST);
        if (isset($_POST['api_key']) && !empty($_POST['api_key'])) {
            if (API_KEY == $_POST['api_key']) {
                $this->form_validation->set_rules('company_id', 'Company ID', 'trim|required');
                $this->form_validation->set_rules('type_of_invoice', 'Type Of Invoice', 'trim|required');
                $this->form_validation->set_rules('invoice_date', 'Invoice Date', 'trim|required');
                $this->form_validation->set_rules('invoice_number', 'Invoice Number', 'trim|required');
                $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required');
                $this->form_validation->set_rules('product_type', 'Product_type', 'trim|required');
                $this->form_validation->set_rules('hsn_code', 'HSN Code', 'trim');
                $this->form_validation->set_rules('rate', 'Rate', 'trim|required');
                $this->form_validation->set_rules('total_amount', 'Total Amount', 'trim|required');
                $this->form_validation->set_rules('final_amount', 'Final Amount', 'trim|required');
                $this->form_validation->set_rules('transport_type', 'Transport Type', 'trim');
                $this->form_validation->set_rules('transport_number', 'Transport Number', 'trim');
                $this->form_validation->set_rules('driver_name', 'Driver Name', 'trim');
                $this->form_validation->set_rules('igst', 'IGST', 'trim');
                $this->form_validation->set_rules('cgst', 'CGST', 'trim');
                $this->form_validation->set_rules('sgst', 'SGST', 'trim');
                $this->form_validation->set_rules('amount_in_words', 'Amount in Words', 'trim');
                $this->form_validation->set_rules('remark', 'Remark', 'trim');
                if ($this->form_validation->run() === true) {
                }
            }
        }
    }

    public function sendDataToServer_post()
    {
        header('Access-Control-Allow-Origin: *');
    
        $this->form_validation->set_rules('Farmer_name', 'Farmer_name', 'trim|required');
        $this->form_validation->set_rules('account_id', 'account_id', 'trim|required');
        $this->form_validation->set_rules('Farmer_ID', 'Farmer_ID', 'trim|required');
        $this->form_validation->set_rules('aadharcard', 'aadharcard', 'trim|required');
        $this->form_validation->set_rules('dob', 'dob', 'trim|required');
        if ($this->form_validation->run() === true) {

            // $middle = strtotime($_POST['reg_date']);             // returns bool(false)
            // $new_date = date('Y-m-d', $middle);

            $userdata = array(
                'reg_date' => date("Y-m-d"),
                'account_no' => $_POST['account_id'],
                'quantity' => $_POST['Quantity'],
                'origin_type' => '',
                'farmer_name' => $_POST['Farmer_name'],
                'Farmer_ID' => $_POST['Farmer_ID'],
                'aadhar_card' => $_POST['aadharcard'],
                'dob' => $_POST['dob'],
                'nominee_name' => $_POST['nominee_name'],
                'added_by' => 2,
                'status' => 'Unverified',
                'FY' => '2022-2023',
                'product_type' => 2,
                'updated_date' =>  date("Y-m-d"),
            );

            $stat = $this->Webservice_model->check_preexistance($_POST['Farmer_ID']);
            // pr($stat); die;

            if (!$stat) {
                $result = $this->Webservice_model->add($userdata);

                if($result){
                    $success = array('responseCode' => '200', 'responseStatus' => 'success', 'responseMessage' => 'Record Sync Successfully', 'data' => 'Record Sync Successfully');
                    $this->response($success, 200);
                }else{
                    $success = array('responseCode' => '200', 'responseStatus' => 'success', 'responseMessage' => 'Record Not Sync Successfully', 'data' =>'Record Not Sync Successfully');
                    $this->response($success, 200);
                }
                
            } else {
                $error = array('responseCode' => '201', 'responseStatus' => 'error', 'responseMessage' => "Data Already Available At CR Server !!!");
                $this->response($error, 200);
            }
        } else {
            $error_msg = validation_errors();
            $error = array('responseCode' => '201', 'responseStatus' => 'error', 'responseMessage' => $error_msg);
            $this->response($error, 200);
        }
    }
    public function sendDataToServerVerifyUser_post()
    {
        header('Access-Control-Allow-Origin: *');
        $this->form_validation->set_rules('Farmer_ID', 'Farmer_ID', 'trim|required');
        if ($this->form_validation->run() === true) {
            // $middle = strtotime($_POST['reg_date']);             // returns bool(false)
            // $new_date = date('Y-m-d', $middle);
            $userdata = array(
                'Farmer_ID' => $_POST['Farmer_ID'],
                'status' => 'Verified',
                'updated_date' =>  date("Y-m-d"),
            );

            $result = $this->Webservice_model->update($userdata);

            if($result){
                $success = array('responseCode' => '200', 'responseStatus' => 'success', 'responseMessage' => 'Record Sync Successfully', 'data' => 'Record Sync Successfully');
                $this->response($success, 200);
            }else{
                $success = array('responseCode' => '200', 'responseStatus' => 'success', 'responseMessage' => 'Record Not Sync Successfully', 'data' =>'Record Not Sync Successfully');
                $this->response($success, 200);
            }
        } else {
            $error_msg = validation_errors();
            $error = array('responseCode' => '201', 'responseStatus' => 'error', 'responseMessage' => $error_msg);
            $this->response($error, 200);
        }
    }
}
