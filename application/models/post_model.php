<?php
    class post_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }
        public function get_posts($slug = FALSE,$limit = FALSE,$offset = FALSE){
            if($limit){
                $this->db->limit($limit,$offset);
            }
            if($slug === FALSE){
                $this->db->order_by('posts.id','DESC');
                $this->db->join('categories','categories.id = posts.category_id');
                $query = $this->db->get('posts');
                return $query->result_array();
            }
            $query = $this->db->get_where('posts',array('slug'=>$slug));
            return $query->row_array();
        }
        public function get_posts_by_categories($id){
            $this->db->order_by('posts.id','DESC');
            $this->db->join('categories','categories.id = posts.category_id');
            $query = $this->db->get_where('posts',array('category_id'=>$id));
            return $query->result_array();
        }
        public function set_post($post_image){
            $slug = $this->input->post('tittle');
            $data = array(
                "tittle"=>$this->input->post('tittle'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                "category_id" => $this->input->post('category_id'),
                'user_id' => $this->session->userdata('user_id'),
                'image' => $post_image
            );
            return $this->db->insert('posts',$data);
        }
        public function delete_post($id){
            $this->db->where('id',$id);
            $this->db->delete('posts');
            return TRUE;
        }
        public function update_post(){
            $slug = url_title($this->input->post('tittle'));
            $data = array(
                "tittle"=>$this->input->post('tittle'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                "category_id" => $this->input->post('category_id')
            );
            $this->db->where('id',$this->input->post('id'));
            return $this->db->update('posts',$data);
        }
        public function get_categories(){
            $this->db->order_by('name');
            $query = $this->db->get('categories');
            return $query->result_array();

        }
    }