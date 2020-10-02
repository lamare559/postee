<?php
    class Posts extends CI_Controller {
        public function index() {
            $data['title'] = 'Posts';

            $users = $this->session->userdata('username');

            $data['posts'] = $this->posts_model->getPosts($users);

            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');
        }

        public function create() {
            if(!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $data['title'] = 'Create A Post';

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('slug', 'Slug', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');

            if($this->form_validation->run() === false) {
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
            } else {
                $config['upload_path'] = './assets/img/post';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);

                if(!$this->upload->do_upload('userfile')) {
                    $errors = array('error' => $this->upload->display_errors());
                    $post_image = 'noimage.jpg';
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $post_image = $_FILES['userfile']['name'];
                }

                $this->posts_model->createPosts($post_image);
                $this->session->set_flashdata('post_created', 'Post created successfully');
                redirect('posts/index');
            }
        }

        public function myposts() {
            if(!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $data['title'] = 'My Posts';

            $user = $this->session->userdata('username');

            $data['posts'] = $this->posts_model->getMyPosts($user);

            $this->load->view('templates/header');
            $this->load->view('posts/posts', $data);
            $this->load->view('templates/footer');
        }

        public function view($slug) {

            $data['post'] = $this->posts_model->getPost($slug);
            
            $this->load->view('templates/header');
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');

        }

        public function edit($slug) {
            $data['title'] = 'Update Post';

            $data['post'] = $this->posts_model->getPost($slug);

            $this->load->view('templates/header');
            $this->load->view('posts/edit', $data);
            $this->load->view('templates/footer');
        }

        public function update($slug) {
            if(!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $update = $this->posts_model->updatePost($slug);

            if($update) {
                redirect('posts/index');
                $this->session->set_flashdata('post_updated', 'You updated your post successfully');
            } else {
                redirect('posts/edit');
            }
        }

        public function delete($slug) {
            if(!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

            $this->posts_model->deletePost($slug);

            $this->session->set_flashdata('post_deleted', 'Your post has been deleted');
            redirect('posts/index');
        }
    }