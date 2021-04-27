<?php 
    class Users extends CI_Controller {
        public function register(){
            $data['tittle'] = 'Sign Up';
            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('email','Email','required|callback_check_email_exists');
            $this->form_validation->set_rules('username','Username','required|callback_check_username_exists');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('password2','Confirm Password','matches[password]');
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/register',$data);
                $this->load->view('templates/footer');
            }else{
                $enc_password = md5($this->input->post('password'));
                $this->user_model->register($enc_password);
                $this->session->set_flashdata('user_registered',"You are registered able to sign in");
                redirect('posts');
            }

        }
        // login user
        public function login(){
            $data['tittle'] = 'Sign In';
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');
            if($this->form_validation->run() === FALSE){
                $this->load->view('templates/header');
                $this->load->view('users/login',$data);
                $this->load->view('templates/footer');
            }else{
                //get username
                $username = $this->input->post('username');
                // get encrypted password
                $password = md5($this->input->post('password'));
                $user_id = $this->user_model->login($username,$password);
                if($user_id){
                    $user_data = array(
                        'user_id'=>$user_id,
                        'logged_in'=>TRUE,
                        'username'=>$username
                        
                    );
                    $this->session->set_userdata($user_data);
                    $this->session->set_flashdata('user_login',"You are currently loged in");
                    redirect('posts');
                }else{
                    $this->session->set_flashdata('user_login_failed',"login failed");
                    redirect('users/login');
                }
                // set message
            }

        }
        public function logout(){
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('user_id');
            // loged out msg
            $this->session->set_flashdata('user_logedout',"successfully logedout");
            redirect('posts');

        }
        function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists','That username is taken please choose another one');
            if($this->user_model->check_username_exists($username)){
                return true;
            }else{
                return false;
            }
        }
        function check_email_exists($email){
            $this->form_validation->set_message('check_email_exists','That email is taken please choose another one');
            if($this->user_model->check_email_exists($email)){
                return true;
            }else{
                return false;
            }
        }
    }