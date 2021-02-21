<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Model {
	public function __construct(){
		parent::__construct();
    }
    
    public function create($data){
        $this->db->insert('posting', $data);	
        return true;
	}

	public function read()
	{
		$this->db->select('*');
        $this->db->from('posting');
		$this->db->join('users','users.id=posting.user_id');
		$this->db->order_by('updated_at', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	
    public function update($data, $id){
        $this->db->where('post_id', $id);
        $this->db->update('posting', $data);
        return true;
    }

    public function delete($id){
        $this->db->where('post_id', $id);
        $this->db->delete('posting');
    }

    public function get($id){
        $this->db->select('*');
        $this->db->from('posting');
		$this->db->join('users','users.id=posting.user_id');
        $this->db->where('post_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_post($id){
        $this->db->select('*');
        $this->db->from('posting');
		$this->db->join('users','users.id=posting.user_id');
        $this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
}
