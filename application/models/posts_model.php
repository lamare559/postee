<?php 
    class Posts_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }

        public function createPosts($post_image) {
            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $this->input->post('slug'),
                'body' => $this->input->post('body'),
                'username' => $this->session->userdata('username'),
                'post_image' => $post_image
            );

            return $this->db->insert('posts', $data);
        }

        public function getPosts($users) {
            if($users) {
                $this->db->get_where('posts', array('username' => $users));
                $query = $this->db->get('posts');
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function getPost($slug) {
            $query = $this->db->get_where('posts', array('slug' => $slug));
            if($query->num_rows() > 0) {
                return $query->row();
            } else {
                return false;
            }
        }

        public function getMyPosts($user) {
            if($user) {
                $this->db->where('username', $user);
                $query = $this->db->get('posts');
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function updatePost($slug) {
            $data = array(
                'title' => $this->input->post('title'),
                'body' => $this->input->post('body')
            );

            $this->db->where('slug', $slug);
            if(!empty($slug)) {
                return $this->db->update('posts', $data);
            }   
        }

        public function deletePost($slug) {
            $this->db->where('slug', $slug);
            $this->db->delete('posts');
            return true;
        }
    }