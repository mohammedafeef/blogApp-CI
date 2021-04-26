<?php
    class Posts extends CI_Controller{
        public function index(){
            $data['tittle'] = 'Latest Posts';
            $data['posts'] = $this->post_model->get_posts();
            $this->load->view('templates/header');
            $this->load->view('posts/index',$data);
            $this->load->view('templates/footer');
        }
        public function view($slug = NULL){
            $data['post'] = $this->post_model->get_posts(urldecode($slug));
            $post_id= $data['post']['id'];
            $data['comments'] = $this->comment_model->get_comments($post_id);
            if(empty($data['post'])){
                show_404();
            }
            $data['tittle'] = $data['post']['tittle'];
            $this->load->view('templates/header');
            $this->load->view('posts/view',$data);
            $this->load->view('templates/footer');            
        }
        public function create(){
            if(!$this->session->userdata('loggedin')){
                redirect('user/login');
            }
            $data['tittle'] = 'create post';
            $data['categories'] = $this->post_model->get_categories();
            $this->form_validation->set_rules('tittle',"Tittle","required");
            $this->form_validation->set_rules('body',"Body","required");
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('posts/create',$data);
                $this->load->view('templates/footer');
			} else {
				// Upload Image
				$config['upload_path'] = './assets/images/posts';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
					$post_image = 'defaultImg.png';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}

				$this->post_model->set_post($post_image);
                $this->session->set_flashdata('post_created',"post has been created");
                redirect('posts');
            }
        }
        public function delete($id){
            if(!$this->session->userdata('loggedin')){
                redirect('user/login');
            }
            $this->post_model->delete_post($id);
            $this->session->set_flashdata('post_deleted',"post has been deleted");
            redirect('posts');
        }
        public function edit($slug){
            if(!$this->session->userdata('loggedin')){
                redirect('user/login');
            }
            $data['post'] = $this->post_model->get_posts(urldecode($slug));
            if($this->session->usedata('user_id') != $data['post']['user_id']){
                redirect('posts');
            }
            $data['categories'] = $this->post_model->get_categories();
            if(empty($data['post'])){
                show_404();
            }
            $data['tittle'] = 'Edit Post';
            $this->load->view('templates/header');
            $this->load->view('posts/edit',$data);
            $this->load->view('templates/footer'); 
        }
        public function update(){
            if(!$this->session->userdata('loggedin')){
                redirect('user/login');
            }
            $this->post_model->update_post();
            $this->session->set_flashdata('post_updated',"post has been updated succssefully");
            redirect('posts');
        }

    }