<?php

class Todo extends Model {
	function getAll() {
	
		$this->load->database();
		
	
		
		$this->db->select('id, title, desc, status, post_date');
		$this->db->from('lists');
		$this->db->order_by("id", "desc"); 
		$q = $this->db->get();
		
		
		
		if($q->num_rows() >0) {
			foreach ($q->result() as $row){
				$data[] = $row;
			}
	
			return $data;
		}
	}
	function add_record($data) {
		$this->load->database();
		$this->db->insert('lists', $data);
		return;
	}
	function delete_row() {
		// CI akan cari id kat url segmen no 3(xxx)
		// http://www.asd.com/site/index/xxx
		$this->load->database();
		$this->db->where('id', $this->uri->segment(3));
		$this->db->delete('lists');
	}	
	
	function update_record_finish($data) {
		$this->load->database();
		$this->db->get('lists');
		$this->db->where('id', $this->uri->segment(3));		
		$this->db->update('lists',$data);		
	}
	function update_record_notfinish($data) {
		$this->load->database();
		$this->db->get('lists');
		$this->db->where('id', $this->uri->segment(3));		
		$this->db->update('lists',$data);		
	}		
				
}

?>