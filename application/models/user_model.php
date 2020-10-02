<?php  
    class User_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        public function register($enc_password) {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $enc_password
            );

            return $this->db->insert('users', $data);
        }

        public function login($enc_password, $username) {
            $this->db->where('username', $username);
            $this->db->where('password', $enc_password);

            $result = $this->db->get('users');
            if($result->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }