<?php

class Users_model extends CI_MODEL
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_users($id = FALSE)
    {
        if ($id === FALSE) {
            return $this->db->from('User')->where('email !=', "admin@lusoleaves.com")->get()->result_array();
        }

        return $this->db->from('User')->where('id', $id)->where('email !=', "admin@lusoleaves.com")->get()->row_array();
    }

    public function add_user()
    {

        $salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));;
        $hashedPassword = $this->input->post('hashedPassword');
        $hashedSaltedPassword = hash('sha512', $hashedPassword . $salt);

        $data = array(
            'name' => $this->input->post('name'),
            'hashedSaltedPassword' => $hashedSaltedPassword,
            'salt' => $salt,
            'email' => $this->input->post('email'),
            'companyName' => $this->input->post('companyName'),
            'phoneNumber' => $this->input->post('phoneNumber'),
            'contribuinteNumber' => $this->input->post('contribuinteNumber'),
            'address' => $this->input->post('address'),
            'companyType' => 'unknown',
            'user_level' => 0
        );

        $this->db->insert('User', $data);
    }

    public function delete_user($id)
    {
        $this->db->delete('User', array('id' => $id));
    }

    function is_email_used($email)
    {
        $this->db->select('id')->from('User')->where('email', $email);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function is_admin($email)
    {
        $this->db->select('user_level')->from('User')->where('email', $email);
        $query = $this->db->get();

        if ($query->num_rows() > 0 && $query->row()->user_level == 1) {
            return true;
        } else {
            return false;
        }
    }

    function is_correct_credentials($email, $hashedPassword)
    {
        $query = $this->db->select('hashedSaltedPassword, salt')->from('User')->where('email', $email)->get();
        $row = $query->row();
        $hashedSaltedPassword = $row->hashedSaltedPassword;
        $salt = $row->salt;

        if (hash('sha512', $hashedPassword . $salt) == $hashedSaltedPassword) {
            return true;
        } else {
            return false;
        }
    }

    function get_company_type($email)
    {
        $query = $this->db->select('companyType')->from('User')->where('email', $email)->get();
        return $query->row()->companyType;
    }

    function update_company_type($id)
    {
        $this->db->where('id', $id)->update('User', array('companyType' => $this->input->post('companyType')));
    }
}