<?php 
    class Users extends CI_Controller {
        public function register() {
            $data['title'] = 'Sign Up';

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_emails');
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password]|min_length[5]');

            if($this->form_validation->run() == false) {
                $this->load->view('templates/header');
                $this->load->view('users/register', $data);
            } else {
                $enc_password = md5($this->input->post('password'));

                $this->user_model->register($enc_password);

                $this->session->set_flashdata('signup', 'You created your account successfully');

                redirect('users/login');
            }
        }

        public function login() {
            $data['title'] = 'Sign In';

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if($this->form_validation->run() == false) {
                $this->load->view('templates/header');
                $this->load->view('users/login', $data);
            } else {

                $username = $this->input->post('username');

                $user_id = $this->input->post('user_id');
                
                $enc_password = md5($this->input->post('password'));

                $users = $this->user_model->login($enc_password, $username, $user_id);

                if($users) {
                    $user_data = array(
                        'user_id' => $user_id,
                        'username' => $username,
                        'logged_in' => true
                    );

                    $this->session->set_userdata($user_data);

                    $this->session->set_flashdata('signin', 'Login successful, welcome to your account');

                    redirect('posts/index');
                } else {

                    $this->session->set_flashdata('login_failed', 'Failed to login');

                    redirect('users/login');
                }
            }
        }

        public function logout() {
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');

            $this->session->set_flashdata('logout', 'Logout successful, see you late');

            redirect('welcome');
        }
    }