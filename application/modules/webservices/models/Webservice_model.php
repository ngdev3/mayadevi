<?php

class Webservice_model extends CI_Model
{
    var $database_name = 'u930296518_mykisandata';
    /*constructor*/
    function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $email = $this->security->xss_clean($this->input->post('email', true));
        $password = $this->security->xss_clean($this->input->post('password', true));
        // die;

        /*using email finding password*/
        $this->db->select('*');
        $this->db->from("users");
        $this->db->where('email', $email);

        $query = $this->db->get();
        //  pr( $query->result());
        if ($query->num_rows() > 0) {

            $user_data = $query->row();

            /*check status is active or not*/
            if ($user_data->status != 'Active') {
                $res['status'] = 'error';
                $res['error_msg'] = 'Please contact to Admin your account is Inactivated !';
            } else {

                $password = md5($password);
                if ($user_data->password == $password) {
                    $user_info =  $user_data;
                    unset($user_info->password);


                    /*if user type 3 || 4 then login*/
                    if ($user_info->user_type != '') {

                        /*Update last login*/
                        $up['last_login'] = date("Y-m-d h:i:s");
                        $this->db->where('id', $user_info->id);
                        $this->db->update('users', $up);

                        $res['status'] = 'success';
                        $res['result'] = $user_info;
                    } else {
                        $res['status'] = 'error';
                        $res['error_msg'] = 'Invalid login credentials !';
                    }
                } else {
                    $res['status'] = 'error';
                    $res['error_msg'] = 'Password does not match !';
                }
            }
        } else {
            $res['status'] = 'error';
            $res['error_msg'] = 'Email Id does not exists !';
        }
        return $res;
    }

    public function forgot_password()
    {
        $email = $this->input->post('email', true);

        /*using email finding user data*/
        $this->db->select('*');
        $this->db->from('u930296518_mykisandata');
        $this->db->where('email', $email);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $user_data = $query->row();

            /*creating new password*/
            $mail_password = rand(100000, 999999);
            // pr($mail_password);die;
            $new_password = md5($mail_password);

            /*if status is active then update password*/
            if ($user_data->status != 'active') {
                $res['status'] = 'error';
                $res['error_msg'] = 'Please contact to Admin May be your account is deleted or Inactvated !';
            } else {
                if ($user_data->user_type == '3' || $user_data->user_type == '4') {
                    $upd['password'] = $new_password;
                    $this->db->where('id', $user_data->id);
                    $this->db->update('u930296518_mykisandata', $upd);

                    $res['status'] = 'success';
                    $res['new_password'] = $mail_password;
                    $res['result'] = $user_data;
                } else {
                    $res['status'] = 'error';
                    $res['error_msg'] = 'You seems like a admin, Account team and Backend user !';
                }
            }
        } else {
            $res['status'] = 'error';
            $res['error_msg'] = 'You are not registered yet, Retry or register as a new member';
        }
        return $res;
    }


    public function fetch_myprofile_data()
    {
        $id = $this->input->post('id', true);

        $this->db->select('*');
        $this->db->from('u930296518_mykisandata');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $res['status'] = 'success';
            $res['result'] = $query->row();
        } else {
            $res['status'] = 'error';
            $res['error_msg'] = 'Data not found !';
        }
        return $res;
    }

    public function update_myprofile_data()
    {
        $id = $this->input->post('id', true);

        $this->db->select('*');
        $this->db->from('u930296518_mykisandata');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {

            //finding first name
            $first_name = $_POST['name'];

            $upd['first_name'] = $first_name;
            // $upd['last_name'] = $last_name;
            $upd['mobile_number'] = $this->input->post('mobile_number', true);

            $this->db->where('id', $id);
            $this->db->update('u930296518_mykisandata', $upd);

            $this->db->select('*');
            $this->db->from('u930296518_mykisandata');
            $this->db->where('id', $id);
            $fetched_data_up = $this->db->get();
            $res['status'] = 'success';
            $res['success_msg'] = 'Profile Updated Successfully !';
            $res['result'] = $fetched_data_up->row();
        } else {
            $res['status'] = 'error';
            $res['error_msg'] = 'Profile not updated !';
        }
        return $res;
    }

    public function change_password()
    {
        $id = $this->input->post('id', true);
        $current_password = md5($this->input->post('current_password', true));
        $new_password = md5($this->input->post('new_password', true));

        /*using id and current password find password*/
        $this->db->select('*');
        $this->db->from('u930296518_mykisandata');
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $user_data = $query->row();
            /*update the password*/
            if ($user_data->password == $current_password) {

                $upd['password'] = $new_password;
                $this->db->where('id', $user_data->id);
                $update = $this->db->update('u930296518_mykisandata', $upd);
                if ($update) {
                    $res['result'] = $user_data;
                    $res['status'] = 'success';
                    $res['success_msg'] = 'Password updated Successfully';
                } else {
                    $res['status'] = 'error';
                    $res['error_msg'] = 'password not updated !';
                }
            } else {
                $res['status'] = 'error';
                $res['error_msg'] = 'Current password does not matched !';
            }
        } else {
            $res['status'] = 'error';
            $res['error_msg'] = 'password not updated !';
        }
        return $res;
    }

    public function device_register()
    {

        $this->db->select('*');
        $this->db->from('aa_whitelist_device');
        $this->db->where('device_id', $_POST['device_id']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $up['updated_at'] = date("Y-m-d H:i:s");
            $this->db->where('id', $query->row()->id);
            $this->db->update('aa_whitelist_device', $up);
            $data['data'] = $query->row();
            $data['status'] = 'success';
            return $data;
        } else {
            $data = array(
                'device_id' => $_POST['device_id'],
                'updated_at' => date('Y-m-d H:i:s'),
                'device_name' => $_POST['device_name'],
            );
            $this->db->insert('aa_whitelist_device', $data);
            $last_id = $this->db->insert_id();
            $data['data'] = $query->row();
            $data['status'] = 'success';
            $data['id'] = $last_id;
            return $data;
        }

        // pr($query->row());
        // die;



    }

    /**
     * check_preexistance
     *
     * function for check either color name pre exist
     * 
     * @access	public
     * @return	html data
     */
    function check_preexistance($id)
    {
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



    function add($data)
    {
        $this->db->insert('reg_kisanvahidata', $data);
        $last_id = $this->db->insert_id();
        if ($last_id) {
            return true;
        } else {
            return false;
        }
    }

    function update($data)
    {
        if ($_POST['Quantity'] != 0) {
            $data['Quantity']  = $_POST['Quantity'];
        }
        $this->db->where('Farmer_ID', $data['Farmer_ID']);
        $this->db->update('reg_kisanvahidata', $data);
        $last_id = $this->db->affected_rows();
        if ($last_id) {
            return true;
        } else {
            return false;
        }
    }
}
