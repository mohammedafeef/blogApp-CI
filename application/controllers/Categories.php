<?php
    class Categories extends CI_Controller{
        public function index(){
            $data['tittle'] = 'Categories';
            $data['categories'] = $this->category_model->get_categories();
            $this->load->view('templates/header');
            $this->load->view('categories/index',$data);
            $this->load->view('templates/footer');
        }
        public function create(){
            if(!$this->session->userdata('logged_in')){
                redirect('user/login');
            }
            $data['tittle'] = 'Create category';
            $this->form_validation->set_rules('name','Name','required');
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('categories/create',$data);
                $this->load->view('templates/footer');
            }else{
                $this->category_model->set_category();
                redirect('posts');
            }
        }
        public function delete($id){
            if(!$this->session->userdata('logged_in')){
                redirect('user/login');
            }
            $this->category_model->delete_category(urldecode($id));
            $this->session->set_flashdata('category_deleted',"category has been deleted");
            redirect('categories');
        }
        public function posts($id){
            $data['tittle'] = $this->category_model->get_category($id);
            $data['tittle'] = $data['tittle']['name'];
            $data['posts'] = $this->post_model->get_posts_by_categories($id);
            $this->load->view('templates/header');
            $this->load->view('posts/index',$data);
            $this->load->view('templates/footer');
        }
    }