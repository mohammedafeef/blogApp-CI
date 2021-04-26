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
            if(empty($data['post'])){
                show_404();
            }
            $data['tittle'] = $data['post']['tittle'];
            $this->load->view('templates/header');
            $this->load->view('posts/view',$data);
            $this->load->view('templates/footer');            
        }
        public function create(){
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
                redirect('posts');
            }
        }
        public function delete($id){
            $this->post_model->delete_post($id);
            redirect('posts');
        }
        public function edit($slug){
            $data['post'] = $this->post_model->get_posts(urldecode($slug));
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
            $this->post_model->update_post();
            redirect('posts');
        }

    }