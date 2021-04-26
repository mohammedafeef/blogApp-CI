<?php 
    class Users extends CI_Controller {
        public function register(){
            $data['tittle'] = 'Sign Up';
            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('password2','Confirm Password','matches[password]');
            if(!$this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/register',$data);
                $this->load->view('template/footer');
            }else{
                die('continue');
            }

        }
    }